
<!doctype html>

<html
    lang="en"
    class="light-style layout-menu-fixed layout-compact"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{asset('dashboard/user/')}}/"
    data-template="horizontal-menu-template"
    data-style="dark">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('home/images/'.$web->logo)}}">
    <!-- Title -->
    <title>{{$pageName}} - {{$siteName}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/fonts/tabler-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/fonts/flag-icons.css')}}" />

    @stack('css')
    <!-- Core CSS -->

    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="{{asset('dashboard/user/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/libs/node-waves/node-waves.css')}}" />

    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/libs/swiper/swiper.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/css/pages/cards-advance.css')}}" />

    <!-- Helpers -->
    <script src="{{asset('dashboard/user/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js')}} in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js')}}.  -->
    <script src="{{asset('dashboard/user/vendor/js/template-customizer.js')}}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('dashboard/user/js/config.js')}}"></script>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
    <div class="layout-container">
        <!-- Navbar -->

        <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="container-xxl">
                <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
                    <a href="{{url('account/dashboard')}}" class="app-brand-link">
                        <img src="{{asset('home/images/'.$web->logo)}}" alt="image" style="width: 50px;">
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                        <i class="ti ti-x ti-md align-middle"></i>
                    </a>
                </div>

                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="ti ti-menu-2 ti-md"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Style Switcher -->
                        <li class="nav-item dropdown-style-switcher dropdown">
                            <a
                                class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                                href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <i class="ti ti-md"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                        <span class="align-middle"><i class="ti ti-sun ti-md me-3"></i>Light</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                        <span class="align-middle"><i class="ti ti-moon-stars ti-md me-3"></i>Dark</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                        <span class="align-middle"
                        ><i class="ti ti-device-desktop-analytics ti-md me-3"></i>System</span
                        >
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- / Style Switcher-->



                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a
                                class="nav-link dropdown-toggle hide-arrow p-0"
                                href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{empty($user->photo)?'https://ui-avatars.com/api/?name='.$user->name:asset('dashboard/user/images/'.$user->photo)}}" alt class="rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item mt-0" href="{{url('account/settings')}}">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-2">
                                                <div class="avatar avatar-online">
                                                    <img src="{{empty($user->photo)?'https://ui-avatars.com/api/?name='.$user->name:asset('dashboard/user/images/'.$user->photo)}}" alt class="rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">{{$user->name}}</h6>
                                                <small class="text-muted">Investor</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider my-1 mx-n2"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{url('account/settings')}}">
                                        <i class="ti ti-settings me-3 ti-md"></i><span class="align-middle">Settings</span>
                                    </a>
                                </li>

                                <li>
                                    <div class="d-grid px-2 pt-2 pb-1">
                                        <a class="btn btn-sm btn-danger d-flex" href="{{url('account/logout')}}">
                                            <small class="align-middle">Logout</small>
                                            <i class="ti ti-logout ms-2 ti-14px"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>

                <!-- Search Small Screens -->
                <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
                    <input
                        type="text"
                        class="form-control search-input border-0"
                        placeholder="Search..."
                        aria-label="Search..." />
                    <i class="ti ti-x search-toggler cursor-pointer"></i>
                </div>
            </div>
        </nav>

        <!-- / Navbar -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Menu -->
                <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
                    <div class="container-xxl d-flex h-100">
                        <ul class="menu-inner pb-2 pb-xl-0">
                            <!-- Dashboards -->
                            <li class="menu-item">
                                <a href="{{url('account/dashboard')}}" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                                    <div data-i18n="Dashboards">Dashboards</div>
                                </a>
                            </li>

                            <!-- Layouts -->
                            <li class="menu-item">
                                <a href="javascript:void(0)" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                                    <div data-i18n="Deposit">Deposits</div>
                                </a>

                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="{{url('account/new_investment')}}" class="menu-link">
                                            <i class="menu-icon tf-icons ti ti-mail"></i>
                                            <div data-i18n="New Deposit">New Deposit</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{url('account/investments')}}" class="menu-link">
                                            <i class="menu-icon tf-icons ti ti-messages"></i>
                                            <div data-i18n="Deposit History">Deposit History</div>
                                        </a>
                                    </li>
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{url('account/new_deposit')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-menu-2"></i>--}}
{{--                                            <div data-i18n="New Deposit">New Deposit</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{url('account/deposits')}}" class="menu-link" >--}}
{{--                                            <i class="menu-icon tf-icons ti ti-layout-distribute-vertical"></i>--}}
{{--                                            <div data-i18n="Deposit History">Deposit History</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                    <li class="menu-item">
                                        <a href="{{url('account/transfer')}}" class="menu-link">
                                            <i class="menu-icon tf-icons ti ti-menu-2"></i>
                                            <div data-i18n="Transfers">Transfers</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Apps -->
{{--                            <li class="menu-item">--}}
{{--                                <a href="javascript:void(0)" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-icon tf-icons ti ti-layout-grid-add"></i>--}}
{{--                                    <div data-i18n="Investments">Investments</div>--}}
{{--                                </a>--}}
{{--                                <ul class="menu-sub">--}}
{{--                                    --}}
{{--                                </ul>--}}
{{--                            </li>--}}

                            <!-- Pages -->
                            <li class="menu-item">
                                <a href="javascript:void(0)" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons ti ti-file"></i>

                                    <div data-i18n="Withdrawals">Withdrawals</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="{{url('account/new_withdrawals')}}" class="menu-link">
                                            <i class="menu-icon tf-icons ti ti-files"></i>
                                            <div data-i18n="New Withdrawal">New Withdrawal</div>
                                        </a>
                                    </li>

                                    <li class="menu-item">
                                        <a href="{{url('account/withdrawals')}}" class="menu-link">
                                            <i class="menu-icon tf-icons ti ti-user-circle"></i>
                                            <div data-i18n="Withdrawal History">Withdrawal History</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-item">
                                <a href="{{url('account/referral')}}" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-users-group"></i>
                                    <div data-i18n="Referrals">Referrals</div>
                                </a>
                            </li>
                            @if($user->is_admin==1)
                                <li class="menu-item">
                                    <a href="{{route('admin.admin.dashboard')}}" class="menu-link">
                                        <i class="menu-icon tf-icons ti ti-user-shield"></i>
                                        <div data-i18n="Admin">Admin</div>
                                    </a>
                                </li>
                            @endif


                            <!-- Pages -->
                            <li class="menu-item">
                                <a href="javascript:void(0)" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons ti ti-shield-cog"></i>

                                    <div data-i18n="Profile">Profile</div>
                                </a>
                                <ul class="menu-sub">

                                    <li class="menu-item">
                                        <a href="{{route('setting.kyc')}}" class="menu-link">
                                            <i class="menu-icon tf-icons ti ti-user-plus"></i>
                                            <div data-i18n="KYC">KYC</div>
                                        </a>
                                    </li>

                                    <li class="menu-item">
                                        <a href="{{url('account/settings')}}" class="menu-link">
                                            <i class="menu-icon tf-icons ti ti-user-cog"></i>
                                            <div data-i18n="Profile Settings">Profile Settings</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </aside>
                <!-- / Menu -->

                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>
                <!--/ Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl">
                        <div
                            class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                            <div class="text-body">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by <a href="{{url('/')}}" target="_blank" class="footer-link">{{$siteName}}</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!--/ Content wrapper -->
        </div>

        <!--/ Layout container -->
    </div>
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>

<!--/ Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js')}} -->

<script src="{{asset('dashboard/user/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('dashboard/user/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('dashboard/user/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('dashboard/user/vendor/libs/node-waves/node-waves.js')}}"></script>
<script src="{{asset('dashboard/user/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('dashboard/user/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{asset('dashboard/user/vendor/libs/i18n/i18n.js')}}"></script>
<script src="{{asset('dashboard/user/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('dashboard/user/vendor/js/menu.js')}}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('dashboard/user/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('dashboard/user/vendor/libs/swiper/swiper.js')}}"></script>
<script src="{{asset('dashboard/user/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('dashboard/user/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('dashboard/user/js/dashboards-analytics.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
<script>
    new ClipboardJS('.copy');
</script>
@stack('js')

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = '37a3e236acdeabea28c4eef54786422a7fa2b9c9';
    window.smartsupp||(function(d) {
        var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
        s=d.getElementsByTagName('script')[0];c=d.createElement('script');
        c.type='text/javascript';c.charset='utf-8';c.async=true;
        c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
    })(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
</body>
</html>
