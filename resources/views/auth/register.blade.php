
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

    <!-- Favicon -->
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
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6">
            <!-- Register Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-6">
                        <a href="{{url('/')}}" class="app-brand-link">
                            <img src=" {{asset('home/images/'.$web->logo)}}" style="width: 150px;">
                        </a>

                    </div>
                    <!-- /Logo -->

                    <form class="mb-6 g-5" method="post" action="{{route('auth.register')}}">
                        @include('templates.notification')
                        @csrf
                        <div class="row">
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" placeholder="Enter your name"
                                           value="{{old('name')}}" name="name">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" placeholder="Enter your username"
                                           name="username" value="{{old('username')}}"/>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email"  name="email" value="{{old('email')}}"
                                           placeholder="Enter your email">
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" placeholder="Enter your Phone"
                                           name="phone" value="{{old('phone')}}"/>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password"
                                           placeholder="Enter your password">
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label>Repeat password</label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                           placeholder="Enter your repeat password">
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label>Referral</label>
                                    <input class="form-control" type="text" placeholder="Enter your Phone"
                                           name="referral" value="{{old('referral')}} {{$referral}}"/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>ReCaptcha:</strong>
                                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="my-8">
                            <div class="form-check mb-0 ms-2">
                                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                <label class="form-check-label" for="terms-conditions">
                                    I agree to
                                    <a href="{{url('terms')}}">privacy policy & terms</a>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100">Sign up</button>
                    </form>

                    <p class="text-center mt-3">
                        <span>Already have an account?</span>
                        <a href="{{route('login')}}">
                            <span>Sign in instead</span>
                        </a>
                    </p>

                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
</div>

<!-- / Content -->

<!-- Core JS -->


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

<!-- Page JS -->
<script src="{{asset('dashboard/user/js/pages-auth.js')}}"></script>
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
</body>
</html>
