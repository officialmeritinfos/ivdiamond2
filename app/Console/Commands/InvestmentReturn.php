<?php

namespace App\Console\Commands;

use App\Jobs\SendInvestmentNotification;
use App\Models\Investment;
use App\Models\Package;
use App\Models\ReturnType;
use App\Models\User;
use App\Notifications\InvestmentMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InvestmentReturn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'investment:return';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Processes investments and adds returns depending on the return type.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        logger('🔁 Starting Investment Return Job');

        $investments = Investment::where('status', 4)
            ->where('nextReturn', '<=', now()->timestamp)
            ->get();

        foreach ($investments as $investment) {
            $user = User::find($investment->user);
            $package = Package::find($investment->package);
            $returnTypeModel = ReturnType::find($investment->returnType);

            if (! $user || ! $package || ! $returnTypeModel) {
                Log::warning('⛔ Missing model(s) for investment ID: ' . $investment->id);
                continue;
            }

            $currentReturn = $investment->currentReturn;
            $numberOfReturn = $investment->numberOfReturns;
            $currentProfit = $investment->currentProfit;
            $profitToAdd = $investment->profitPerReturn;
            $returnType = $returnTypeModel->duration;

            if ($currentReturn < $numberOfReturn) {
                $instantCurrentReturn = $currentReturn + 1;
                $newProfit = $currentProfit + $profitToAdd;

                $dataReturns = [
                    'amount' => $profitToAdd,
                    'investment' => $investment->id,
                    'user' => $investment->user,
                ];

                $dataInvestment = [
                    'currentProfit' => $newProfit,
                    'currentReturn' => $instantCurrentReturn,
                    'nextReturn' => strtotime($returnType, now()->timestamp),
                ];

                if ($instantCurrentReturn === $numberOfReturn) {
                    $dataInvestment['status'] = 1;
                    $dataInvestment['nextReturn'] = now()->timestamp;
                }

                try {
                    DB::transaction(function () use (
                        $investment,
                        $user,
                        $package,
                        $dataInvestment,
                        $dataReturns,
                        $profitToAdd,
                        $newProfit,
                        $instantCurrentReturn,
                        $numberOfReturn
                    ) {
                        $investment->update($dataInvestment);
                        \App\Models\InvestmentReturn::create($dataReturns);

                        if ($instantCurrentReturn === $numberOfReturn) {
                            if ($package->withdrawEnd != 1) {
                                $user->profit += $profitToAdd;
                            } else {
                                $user->profit += $newProfit;
                            }
                            $user->balance += $investment->amount;
                        } else {
                            if ($package->withdrawEnd != 1) {
                                $user->profit += $profitToAdd;
                            }
                        }

                        $user->save();

                        $userMessage = $instantCurrentReturn === $numberOfReturn
                            ? "Your Investment with reference Id <b>{$investment->reference}</b> has completed and the earned returns added to your profit account."
                            : "Your Investment with reference Id <b>{$investment->reference}</b> has returned <b>\${$profitToAdd}</b> to your account.<br>
                               You can find this in the specific investment Current Profit column.<br>
                               <p><b>Note:</b> All returns will be credited to your profit balance at the end of the cycle.</p>";

                        $user->notify(new InvestmentMail($user, $userMessage, $instantCurrentReturn === $numberOfReturn ? 'Investment Completion' : 'Investment Return'));

                        if ($instantCurrentReturn === $numberOfReturn) {
                            $admin = User::where('is_admin', 1)->first();
                            if ($admin) {
                                $adminMessage = "
                                    An investment started by <b>{$user->name}</b> with reference
                                    <b>{$investment->reference}</b> has completed and returns credited to profit balance.
                                ";
                                $admin->notify(new InvestmentMail($admin, $adminMessage, 'Investment Completion'));
                            }
                        }
                    });
                } catch (\Throwable $e) {
                    Log::error("❌ Transaction failed for investment ID {$investment->id}: " . $e->getMessage());
                    continue;
                }
            }
        }

        logger('✅ Investment Return Job completed.');
    }
}
