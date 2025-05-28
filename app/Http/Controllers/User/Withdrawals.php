<?php

namespace App\Http\Controllers\User;

use App\Defaults\Regular;
use App\Http\Controllers\Controller;
use App\Jobs\SendInvestmentNotification;
use App\Models\Coin;
use App\Models\GeneralSetting;
use App\Models\Package;
use App\Models\User;
use App\Models\Withdrawal;
use App\Models\WithdrawalAccount;
use App\Notifications\InvestmentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Withdrawals extends Controller
{
    use Regular;
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView = [
            'web'=>$web,
            'user'=>$user,
            'withdrawals'=>Withdrawal::where('user',$user->id)->paginate(15),
            'pageName'=>'Withdrawal Lists',
            'siteName'=>$web->name
        ];

        return view('user.withdrawals',$dataView);
    }
    public function newWithdrawal()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView = [
            'web'=>$web,
            'user'=>$user,
            'pageName'=>'New Withdrawal',
            'siteName'=>$web->name,
            'coins'=>Coin::where('status',1)->get(),
            'accounts' => WithdrawalAccount::where('user',$user->id)->where('status', 1)->get()
        ];

        return view('user.new_withdrawal',$dataView);
    }

    public function processWithdrawal(Request $request)
    {
        $user = Auth::user();
        $web = GeneralSetting::first();

        // Validate request
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:1'],
            'asset' => ['required', 'alpha_dash'],
            'account' => ['required'],
            'wallet' => [
                'required',
                Rule::exists('withdrawal_accounts', 'id')->where('user', $user->id),
            ],
        ]);

        // Check outstanding loan
        if ($user->loan > 0) {
            return back()->with('error', 'You cannot make any withdrawal until you have cleared your loan of $' . number_format($user->loan, 2) . '. Please contact support.');
        }

        // Determine source account and check balance
        switch ((int) $validated['account']) {
            case 1: // Profit
                $balance = $user->profit;
                $newBalance = ['profit' => $balance - $validated['amount']];
                $source = 'profit';
                break;
            case 2: // Referral
                $balance = $user->refBal;
                $newBalance = ['refBal' => $balance - $validated['amount']];
                $source = 'referral';
                break;
            default: // Capital
                $balance = $user->balance;
                $newBalance = ['balance' => $balance - $validated['amount']];
                $source = 'balance';
                break;
        }

        // Ensure sufficient funds
        if ($balance < $validated['amount']) {
            return back()->with('error', 'Insufficient balance in selected account.');
        }

        // Fetch withdrawal account
        $account = WithdrawalAccount::where('id', $validated['wallet'])
            ->where('user', $user->id)
            ->where('status', 1)
            ->first();

        if (! $account) {
            return back()->with('error', 'Invalid or inactive wallet address selected.');
        }

        // Permission checks
        if ($source === 'profit' && $user->canWithdrawProfit != 1) {
            return back()->with('error', 'You are not allowed to withdraw from your profit balance. Contact support.');
        }

        if ($source === 'balance' && $user->canWithdrawCapital != 1) {
            return back()->with('error', 'You are not allowed to withdraw from your capital balance. Contact support.');
        }

        // Generate unique reference
        $reference = $this->generateId('withdrawals', 'reference', 10);

        // Create withdrawal
        $withdrawal = Withdrawal::create([
            'user' => $user->id,
            'reference' => $reference,
            'amount' => $validated['amount'],
            'asset' => $validated['asset'],
            'details' => $account->details,
        ]);

        if ($withdrawal) {
            // Update user balance
            User::where('id', $user->id)->update($newBalance);

            // Send notification to user
            $userMessage = "Your new withdrawal request of $<b>{$validated['amount']}</b> has been received. Your reference ID is <b>{$reference}</b>.";
            $user->notify(new InvestmentMail($user, $userMessage, 'New Withdrawal'));

            // Notify admin
            $admin = User::where('is_admin', 1)->first();
            if ($admin) {
                $adminMessage = "A new withdrawal request of $<b>{$validated['amount']}</b> has been submitted by investor <b>{$user->name}</b>. Ref: <b>{$reference}</b>";
                $admin->notify(new InvestmentMail($admin, $adminMessage, 'New Withdrawal Request'));
            }

            return redirect()->route('withdrawal.index')->with('success', 'Withdrawal submitted successfully.');
        }

        return back()->with('error', 'Something went wrong. Please try again.');
    }
    public function addWithdrawalAccount(Request $request)
    {
        $user = Auth::user();

        // Validate input
        $request->validate([
            'details' => ['required', 'string', 'max:255'],
            'asset' => ['required', 'string', 'max:100'],
        ]);

        // Create account
        $account = new WithdrawalAccount();
        $account->user = $user->id;
        $account->details = $request->details;
        $account->payment_method = $request->asset;
        $account->status = 1;
        $account->save();

        return back()->with('success', 'Withdrawal account added successfully.');
    }

}
