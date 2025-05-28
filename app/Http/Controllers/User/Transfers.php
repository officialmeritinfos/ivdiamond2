<?php

namespace App\Http\Controllers\User;

use App\Defaults\Regular;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\ManageAccount;
use App\Models\ManageAccountDuration;
use App\Models\Transfer;
use App\Models\User;
use App\Notifications\InvestmentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Transfers extends Controller
{
    use Regular;
    //landing page
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Transfer Funds',
            'user'     =>  $user,
            'web'       =>$web,
            'durations'=>ManageAccountDuration::get(),
            'transfers'  =>Transfer::where('sender',$user->id)->orWhere('recipient',$user->id)->get()
        ];

        return view('user.transfers',$dataView);
    }

    public function newTransfer(Request $request)
    {
        $user = Auth::user();
        $web = GeneralSetting::first();

        // Validate shared fields
        $rules = [
            'type' => ['required', 'in:user,capital_to_profit,profit_to_capital'],
            'amount' => ['required', 'numeric', 'min:1'],
            'password' => ['required', 'current_password:web'],
        ];

        // Add username rule only if transferring to another user
        if ($request->type === 'user') {
            $rules['username'] = ['required', 'string', 'exists:users,username'];
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        $input = $validator->validated();
        $amount = $input['amount'];
        $type = $input['type'];

        // Handle transfer types
        if ($type === 'user') {
            // Permission check
            if ($user->canLoan !=1) {
                return back()->with('error', 'You are not permitted to transfer to another user.');
            }

            // Can't transfer to self
            if ($user->username === $input['username']) {
                return back()->with('error', 'You cannot transfer to yourself.');
            }

            $receiver = User::where('username', $input['username'])->first();

            if ($amount > $user->balance) {
                return back()->with('error', 'Insufficient capital balance.');
            }

            // Perform transfer
            $user->balance -= $amount;
            $receiver->balance += $amount;

            $transfer = Transfer::create([
                'sender' => $user->id,
                'recipient' => $receiver->id,
                'recipientHolder' => $receiver->username,
                'reference' => $this->generateId('transfers', 'reference', 15),
                'status' => 1,
                'amount' => $amount,
            ]);

            if ($transfer) {
                $user->save();
                $receiver->save();

                // Notify both parties
                $user->notify(new InvestmentMail($user, "You transferred $$amount to {$receiver->username}. Ref: {$transfer->reference}", 'Transfer Sent'));
                $receiver->notify(new InvestmentMail($receiver, "You received $$amount from {$user->username}.", 'Transfer Received'));

                $admin = User::where('is_admin', 1)->first();
                if ($admin) {
                    $admin->notify(new InvestmentMail($admin, "User <b>{$user->name}</b> transferred $<b>{$amount}</b> to <b>{$receiver->name}</b>. Ref: <b>{$transfer->reference}</b>", 'New User Transfer'));
                }

                return back()->with('success', 'Transfer completed successfully.');
            }

            return back()->with('error', 'Unable to complete transfer.');
        }

        // Internal Transfer: Capital ↔ Profit
        if ($type === 'capital_to_profit') {
            if ($user->canTransferCapital !=1) {
                return back()->with('error', 'You are not allowed to transfer from capital to profit.');
            }

            if ($amount > $user->balance) {
                return back()->with('error', 'Insufficient capital balance.');
            }

            $user->balance -= $amount;
            $user->profit += $amount;

            $transfer = Transfer::create([
                'sender' => $user->id,
                'recipientHolder' => 'capital_to_profit',
                'reference' => $this->generateId('transfers', 'reference', 15),
                'status' => 1,
                'amount' => $amount,
            ]);

            if ($transfer) {
                $user->save();
                $user->notify(new InvestmentMail($user, "You moved $$amount from Capital to Profit. Ref: {$transfer->reference}", 'Internal Transfer'));
                return back()->with('success', 'Capital successfully transferred to profit.');
            }

            return back()->with('error', 'Transfer failed.');
        }

        if ($type === 'profit_to_capital') {
            if ( $user->canTransferProfit !=1) {
                return back()->with('error', 'You are not allowed to transfer from profit to capital.');
            }

            if ($amount > $user->profit) {
                return back()->with('error', 'Insufficient profit balance.');
            }

            $user->profit -= $amount;
            $user->balance += $amount;

            $transfer = Transfer::create([
                'sender' => $user->id,
                'recipientHolder' => 'profit_to_capital',
                'reference' => $this->generateId('transfers', 'reference', 15),
                'status' => 1,
                'amount' => $amount,
            ]);

            if ($transfer) {
                $user->save();
                $user->notify(new InvestmentMail($user, "You moved $$amount from Profit to Capital. Ref: {$transfer->reference}", 'Internal Transfer'));
                return back()->with('success', 'Profit successfully transferred to capital.');
            }

            return back()->with('error', 'Transfer failed.');
        }

        return back()->with('error', 'Invalid transfer type selected.');
    }

}
