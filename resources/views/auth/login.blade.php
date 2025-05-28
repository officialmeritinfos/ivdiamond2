
<!doctype html>

<html
    lang="en"
    class="light-style layout-wide customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{asset('dashboard/user/')}}/"
    data-template="horizontal-menu-template"
    data-style="light">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <link rel="icon" type="image/png" href="{{asset('home/images/'.$web->logo)}}">
    <title>{{$pageName}} - {{$siteName}}</title>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

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

    <!-- Core CSS -->

    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="{{asset('dashboard/user/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/libs/node-waves/node-waves.css')}}" />

    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/libs/typeahead-js/typeahead.css')}}" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/libs/@form-validation/form-validation.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('dashboard/user/vendor/css/pages/page-auth.css')}}" />

    <!-- Helpers -->
    <script src="{{asset('dashboard/user/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js')}} in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js')}}.  -->
    <script src="{{asset('dashboard/user/vendor/js/template-customizer.js')}}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('dashboard/user/js/config.js')}}"></script>
</head>

<body>
<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6">
            <!-- Login -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-6">
                        <a href="{{url('/')}}" class="app-brand-link">
                            <img src="{{asset('home/images/'.$web->logo)}}" style="width: 150px;">
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-1">Welcome Back! 👋</h4>
                    <p class="mb-6">Please sign-in to your account</p>

                    <form id="formAuthentication" class="mb-4" method="post" action="{{route('auth.login')}}">
                        @include('templates.notification')
                        @csrf
                        <div class="mb-6">
                            <label for="email" class="form-label">Username</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Enter your username"
                                name="email" value="{{old('email')}}"
                                autofocus />
                        </div>
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="my-8">
                            <div class="d-flex justify-content-between">
                                <div class="form-check mb-0 ms-2">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                                <a href="{{route('forgotPassword')}}">
                                    <p class="mb-0">Forgot Password?</p>
                                </a>
                            </div>
                        </div>
                        <div class="mb-6">
                            <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>New on our platform?</span>
                        <a href="{{route('register')}}">
                            <span>Create an account</span>
                        </a>
                    </p>

                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

<!-- / Content -->

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
<script src="{{asset('dashboard/user/vendor/libs/@form-validation/popular.js')}}"></script>
<script src="{{asset('dashboard/user/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
<script src="{{asset('dashboard/user/vendor/libs/@form-validation/auto-focus.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('dashboard/user/js/main.js')}}"></script>
<!-- Google language start -->
<style>

    #google_translate_element {
        z-index: 9999999;
        position: fixed;
        bottom: 25px;
        left: 15px;
    }

    .goog-te-gadget {
        font-family: Roboto, "Open Sans", sans-serif !important;
        text-transform: uppercase;
    }
    .goog-te-gadget-simple
    {
        padding: 0px !important;
        line-height: 1.428571429;
        color: white;
        vertical-align: middle;
        background-color: black;
        border: 1px solid #a5a5a599;
        border-radius: 4px;
        float: right;
        margin-top: -4px;
        z-index: 999999;
    }
    .goog-te-banner-frame.skiptranslate
    {
        display: none !important;
        color: white;
    }
    .goog-te-gadget-icon
    {
        background: none !important;
        display: none;
        color: white;
    }
    .goog-te-gadget-simple .goog-te-menu-value
    {
        font-size: 12px;
        color: white;
        font-family: 'Open Sans' , sans-serif;
    }
</style>
<div id="google_translate_element"></div>
<script type="text/javascript">
    window.onload = function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- Page JS -->
</body>
</html>
