@extends('user.base')

@section('content')
    <div class="row">
        <div class="col-xl-7 mx-auto">
            <hr/>
            <div class="card border-top border-0 border-4 border-primary shadow-sm">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center mb-4">
                        <i class="bx bxs-wallet me-2 font-22 text-primary"></i>
                        <h5 class="mb-0 text-primary">{{ $pageName }}</h5>
                    </div>


                    <div class="text-end mb-3">
                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addWalletModal">
                            <i class="fas fa-plus me-1"></i> Add Withdrawal Account
                        </button>
                    </div>

                    {{-- Notifications --}}
                    @include('templates.notification')

                    {{-- Balances Summary --}}
                    @if($user->canWithdraw)
                        <div class="alert alert-light border mb-4">
                            <div class="d-flex justify-content-between text-sm">
                                @if($user->canWithdrawCapital)
                                    <span><strong>Capital:</strong> ${{ number_format($user->balance, 2) }}</span>
                                @endif
                                @if($user->canWithdrawProfit)
                                    <span><strong>Profit:</strong> ${{ number_format($user->profit, 2) }}</span>
                                @endif
                                <span><strong>Referral:</strong> ${{ number_format($user->referral, 2) }}</span>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('withdraw.new') }}" class="row g-4">
                        @csrf

                        {{-- Amount --}}
                        <div class="col-md-12">
                            <label for="amount" class="form-label">Amount (USD)</label>
                            <input type="number" min="1" step="0.01" class="form-control" id="amount" name="amount" placeholder="Enter amount to withdraw" required>
                        </div>

                        {{-- Asset --}}
                        <div class="col-md-12">
                            <label for="asset" class="form-label">Asset</label>
                            <select class="form-select" id="asset" name="asset" required>
                                <option value="">Select an Asset</option>
                                @foreach($coins as $coin)
                                    <option value="{{ $coin->asset }}">{{ $coin->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Wallet Address --}}
                        <div class="col-md-12">
                            <label for="wallet" class="form-label">Wallet Address</label>
                            <select class="form-select" id="wallet" name="wallet" required>
                                <option value="">Select your Wallet Address</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->details }} - ({{ $account->payment_method }})</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Source Account --}}
                        <div class="col-md-12">
                            <label for="account" class="form-label">Withdraw From</label>
                            <select class="form-select" id="account" name="account" required>
                                <option value="">Select Balance Source</option>
                                @if($user->canWithdraw)
                                    @if($user->canWithdrawCapital)
                                        <option value="capital">Capital Balance</option>
                                    @endif
                                    @if($user->canWithdrawProfit)
                                        <option value="profit">Profit Balance</option>
                                    @endif
                                    <option value="referral">Referral Balance</option>
                                @endif
                            </select>
                        </div>

                        {{-- Submit --}}
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="fas fa-paper-plane me-1"></i> Submit Withdrawal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- Withdrawal Accounts --}}
    @if ($accounts->count())
        <div class="mb-4">
            <h6 class="text-muted fw-bold mb-2">Your Saved Wallets</h6>
            <div class="table-responsive">
                <table class="table table-sm table-hover border mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Details</th>
                        <th>Asset/Method</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($accounts as $index => $account)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $account->details }}</td>
                            <td> {{ $account->payment_method }}</td>
                            <td>
                                @if ($account->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    {{-- Add Withdrawal Account Modal --}}
    <div class="modal fade" id="addWalletModal" tabindex="-1" aria-labelledby="addWalletModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('withdrawal.account.add') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addWalletModalLabel">Add Withdrawal Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Details --}}
                    <div class="mb-3">
                        <label for="details" class="form-label">Wallet Address </label>
                        <input type="text" class="form-control" id="details" name="details" placeholder="Enter wallet or account number" required>
                    </div>

                    {{-- Asset --}}
                    <div class="mb-3">
                        <label for="asset" class="form-label">Asset</label>
                        <select name="asset" id="asset" class="form-select" required>
                            <option value="">Select Asset</option>
                            @foreach($coins as $coin)
                                <option value="{{ $coin->asset }}">{{ $coin->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Account</button>
                </div>
            </form>
        </div>
    </div>

@endsection
