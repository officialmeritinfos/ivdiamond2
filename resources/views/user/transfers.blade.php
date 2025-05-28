@extends('user.base')
@section('content')
    @inject('injected','App\Defaults\Custom')

    <div class="today-card-area pt-24 mb-5">
        <div class="container-fluid">
            @include('templates.notification')

            <div class="row justify-content-center g-4">
                {{-- Capital Balance --}}
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single-today-card d-flex align-items-center border shadow-sm rounded p-3 bg-white">
                        <div class="flex-grow-1">
                            <span class="today text-muted small">Capital Balance</span>
                            <h6 class="mb-0 text-primary fw-bold">${{ number_format($user->balance, 2) }}</h6>
                        </div>

                    </div>
                </div>

                {{-- Profit Balance --}}
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single-today-card d-flex align-items-center border shadow-sm rounded p-3 bg-white">
                        <div class="flex-grow-1">
                            <span class="today text-muted small">Profit Balance</span>
                            <h6 class="mb-0 text-success fw-bold">${{ number_format($user->profit, 2) }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">{{$pageName}}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post" action="{{ route('transfer.new') }}" id="transferForm">
                        @csrf

                        {{-- Transfer Type --}}
                        <div class="col-md-12">
                            <label class="form-label">Transfer Type</label>
                            <select name="type" class="form-select" id="transferType" required>
                                <option value="">Select Transfer Type</option>
                                @if($user->canLoan)
                                    <option value="user">To Another User</option>
                                @endif
                                @if($user->canTransferCapital)
                                    <option value="capital_to_profit">From Capital to Profit</option>
                                @endif
                                @if($user->canTransferProfit)
                                    <option value="profit_to_capital">From Profit to Capital</option>
                                @endif
                            </select>
                        </div>

                        {{-- Recipient Username (only for "user" transfer) --}}
                        <div class="col-md-12 d-none" id="usernameGroup">
                            <label for="username" class="form-label">Recipient Username</label>
                            <input type="text" class="form-control" name="username" id="usernameInput" placeholder="Enter recipient's username">
                        </div>

                        {{-- Amount --}}
                        <div class="col-md-12">
                            <label for="amount" class="form-label">Amount ($)</label>
                            <input type="number" class="form-control" name="amount" placeholder="Enter amount to transfer" min="1" required>
                        </div>

                        {{-- Password --}}
                        <div class="col-md-12">
                            <label for="password" class="form-label">Account Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Confirm with your password" required>
                        </div>

                        {{-- Charge Note --}}
                        <div class="form-group col-md-12">
                            <p class="mb-0">Transfer Charges: <strong>{{ $web->transferCharge }}%</strong> (applies only to user-to-user transfers)</p>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Proceed</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid mt-5">
        <div class="ui-kit-cards grid mb-24">
            <h3 class="mb-3">Transfer History</h3>

            <div class="latest-transaction-area">
                <div class="table-responsive h-auto" data-simplebar>
                    <table class="table align-middle mb-0 table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th>Type</th>
                            <th>Sender</th>
                            <th>Recipient</th>
                            <th>Amount</th>
                            <th>Reference</th>
                            <th>Sent At</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($transfers as $transfer)
                            <tr>
                                {{-- Transfer Type --}}
                                <td>
                                    @if($transfer->recipient && $transfer->sender)
                                        <span class="badge bg-secondary">User Transfer</span>
                                    @elseif($transfer->recipientHolder === 'capital_to_profit')
                                        <span class="badge bg-info text-dark">Capital → Profit</span>
                                    @elseif($transfer->recipientHolder === 'profit_to_capital')
                                        <span class="badge bg-warning text-dark">Profit → Capital</span>
                                    @else
                                        <span class="badge bg-light text-muted">Unknown</span>
                                    @endif
                                </td>

                                {{-- Sender --}}
                                <td>
                                    @if($transfer->sender)
                                        {{ $injected->getInvestorUsername($transfer->sender) }}
                                    @else
                                        <span class="text-muted">System</span>
                                    @endif
                                </td>

                                {{-- Recipient --}}
                                <td>
                                    @if($transfer->recipientHolder && $transfer->recipient)
                                        {{ $transfer->recipientHolder }}
                                    @elseif($transfer->recipientHolder === 'capital_to_profit')
                                        <span class="text-info">→ Profit</span>
                                    @elseif($transfer->recipientHolder === 'profit_to_capital')
                                        <span class="text-warning">→ Capital</span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>

                                <td>${{ number_format($transfer->amount, 2) }}</td>
                                <td>{{ $transfer->reference }}</td>
                                <td>{{ $transfer->created_at }}</td>
                                <td>
                                    @switch($transfer->status)
                                        @case(1)
                                            <span class="badge bg-success">Completed</span>
                                            @break
                                        @case(2)
                                            <span class="badge bg-info">Pending</span>
                                            @break
                                        @case(4)
                                            <span class="badge bg-primary">Ongoing</span>
                                            @break
                                        @default
                                            <span class="badge bg-danger">Cancelled</span>
                                    @endswitch
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">No transfers yet.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @push('js')
        <script>
            $(document).ready(function () {
                $('#transferType').on('change', function () {
                    const type = $(this).val();
                    if (type === 'user') {
                        $('#usernameGroup').removeClass('d-none');
                        $('#usernameInput').attr('required', true);
                    } else {
                        $('#usernameGroup').addClass('d-none');
                        $('#usernameInput').removeAttr('required');
                    }
                });
            });
        </script>
    @endpush

@endsection
