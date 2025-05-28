@extends('user.base')
@section('content')
    @inject('injected','App\Defaults\Custom')

    @foreach($promos as $promo)
        <div class="ui-kit-card mb-24">
            <h3>{{$promo->title}}</h3>
            <div class="alert alert-primary" role="alert">
                <h4 class="alert-heading">{{$promo->title}}</h4>
                {!! $promo->content !!}
                <div class="mt-3">
                    <a href="{{route('user.enrollPromo',['id'=>$promo->id])}}" class="btn btn-primary">Enroll</a>
                </div>
            </div>
        </div>
    @endforeach

    @foreach($notifications as $notification)
        <div class="ui-kit-card mb-24">
            <h3>{{$notification->title}}</h3>
            <div class="alert alert-primary" role="alert">
                <h4 class="alert-heading">{{$notification->title}}</h4>
                {!! $notification->content !!}
            </div>
        </div>
    @endforeach

    <div class="row g-6 mt-6">
        <div class="card">
            <div class="row justify-content-between card-body">
                <div class="col-lg-3 col-sm-6 text-start col-4">
                    <div class="single-today-card d-flex align-items-center">
                        <a href="{{route('new_deposit')}}" class="btn btn-success rounded-pill">Deposit</a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 text-center col-4">
                    <div class="single-today-card d-flex align-items-center">
                        <a href="{{route('new_investment')}}" class="btn btn-info rounded-pill">Invest</a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 text-end col-4">
                    <div class="single-today-card d-flex align-items-center">
                        <a href="{{route('new_withdrawal')}}" class="btn btn-primary rounded-pill">Withdraw</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- Card Border Shadow -->

        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-warning"
                          ><i class="ti ti-alert-triangle ti-28px"></i
                              ></span>
                        </div>
                        <h4 class="mb-0">${{number_format($user->balance,2)}}</h4>
                    </div>
                    <p class="mb-1">Capital Balance</p>
                    <p class="mb-0">

                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-success"
                          ><i class="ti ti-git-fork ti-28px"></i
                              ></span>
                        </div>
                        <h4 class="mb-0">${{number_format($user->profit,2)}}</h4>
                    </div>
                    <p class="mb-1">Profit Balance</p>
                    <p class="mb-0">

                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-primary"
                          ><i class="ti ti-truck ti-28px"></i
                              ></span>
                        </div>
                        <h4 class="mb-0">${{number_format($injected->userDailyEarning($user->id),2)}}</h4>
                    </div>
                    <p class="mb-1">Today's Earning</p>
                    <p class="mb-0">

                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-success"
                          ><i class="ti ti-git-fork ti-28px"></i
                              ></span>
                        </div>
                        <h4 class="mb-0"> ${{number_format($ongoingInvestments,2)}}</h4>
                    </div>
                    <p class="mb-1">Ongoing Investments</p>
                    <p class="mb-0">

                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-success"
                          ><i class="ti ti-git-fork ti-28px"></i
                              ></span>
                        </div>
                        <h4 class="mb-0">${{number_format($completedInvestments,2)}}</h4>
                    </div>
                    <p class="mb-1">Completed Investments</p>
                    <p class="mb-0">

                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-success"
                          ><i class="ti ti-git-fork ti-28px"></i
                              ></span>
                        </div>
                        <h4 class="mb-0">${{number_format($withdrawals,2)}}</h4>
                    </div>
                    <p class="mb-1">Completed Withdrawals</p>
                    <p class="mb-0">

                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-success"
                          ><i class="ti ti-git-fork ti-28px"></i
                              ></span>
                        </div>
                        <h4 class="mb-0">${{number_format($user->withdrawals,2)}}</h4>
                    </div>
                    <p class="mb-1">Total Withdrawals</p>
                    <p class="mb-0">

                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-success"
                          ><i class="ti ti-git-fork ti-28px"></i
                              ></span>
                        </div>
                        <h4 class="mb-0">${{number_format($user->bonus,2)}}</h4>
                    </div>
                    <p class="mb-1">Bonus Balance</p>
                    <p class="mb-0">

                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-success"
                          ><i class="ti ti-git-fork ti-28px"></i
                              ></span>
                        </div>
                        <h4 class="mb-0">${{number_format($user->refBal,2)}}</h4>
                    </div>
                    <p class="mb-1">Referral Balance</p>
                    <p class="mb-0">

                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-success"
                          ><i class="ti ti-git-fork ti-28px"></i
                              ></span>
                        </div>
                        <h4 class="mb-0">${{number_format($totalDeposits,2)}}</h4>
                    </div>
                    <p class="mb-1">Total Deposit</p>
                    <p class="mb-0">

                    </p>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-success"
                          ><i class="ti ti-git-fork ti-28px"></i
                              ></span>
                        </div>
                        <h4 class="mb-0">${{number_format($pendingDeposit,2)}}</h4>
                    </div>
                    <p class="mb-1">Pending  Deposits</p>
                    <p class="mb-0">

                    </p>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-success"
                          ><i class="ti ti-git-fork ti-28px"></i
                              ></span>
                        </div>
                        <h4 class="mb-0">${{number_format($pendingWithdrawal,2)}}</h4>
                    </div>
                    <p class="mb-1">Pending Withdrawals</p>
                    <p class="mb-0">

                    </p>
                </div>
            </div>
        </div>



    </div>


@endsection
