@extends('admin.base')
@section('content')
    @inject('injected','App\Defaults\Custom')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Transfers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-light">
                    <tr>
                        <th>Type</th>
                        <th>Sender</th>
                        <th>Recipient</th>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Initiated At</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deposits as $deposit)
                        @php
                            $isUserTransfer = $deposit->sender && $deposit->recipient;
                        @endphp
                        <tr>
                            {{-- Type --}}
                            <td>
                                @if ($isUserTransfer)
                                    <span class="badge bg-secondary">User Transfer</span>
                                @elseif ($deposit->recipientHolder === 'capital_to_profit')
                                    <span class="badge bg-info text-dark">Capital → Profit</span>
                                @elseif ($deposit->recipientHolder === 'profit_to_capital')
                                    <span class="badge bg-warning text-dark">Profit → Capital</span>
                                @else
                                    <span class="badge bg-light text-muted">System</span>
                                @endif
                            </td>

                            {{-- Sender --}}
                            <td>
                                {{ $deposit->sender ? $injected->getInvestor($deposit->sender) : 'System' }}
                            </td>

                            {{-- Recipient --}}
                            <td>
                                @if ($isUserTransfer)
                                    {{ $injected->getInvestor($deposit->recipient) }}
                                @elseif ($deposit->recipientHolder === 'capital_to_profit')
                                    → Profit
                                @elseif ($deposit->recipientHolder === 'profit_to_capital')
                                    → Capital
                                @else
                                    —
                                @endif
                            </td>

                            {{-- Reference --}}
                            <td>{{ $deposit->reference }}</td>

                            {{-- Amount --}}
                            <td>${{ number_format($deposit->amount, 2) }}</td>

                            {{-- Date --}}
                            <td>{{ $deposit->created_at }}</td>

                            {{-- Status --}}
                            <td>
                                @switch($deposit->status)
                                    @case(1)
                                        <span class="badge bg-success">Completed</span>
                                        @break
                                    @case(2)
                                        <span class="badge bg-info text-white">Pending</span>
                                        @break
                                    @case(3)
                                        <span class="badge bg-danger">Cancelled</span>
                                        @break
                                    @default
                                        <span class="badge bg-dark">Partial</span>
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="table-light">
                    <tr>
                        <th>Type</th>
                        <th>Sender</th>
                        <th>Recipient</th>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Initiated At</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
