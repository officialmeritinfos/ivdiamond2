@extends('home.base')
@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{asset('home/images/backgrounds/main-slider-2-1.jpg')}})">
        </div>
        <div class="page-header-bg-2" style="background-image: url({{asset('home/images/backgrounds/main-slider-2-1.jpg')}})">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <h2>{{$pageName}}</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="#">{{$pageName}}</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--About One Start-->
    <section class="about-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">About Us</span>
                <h2 class="section-title__title">Bring Your Finances to the
                    <br> Next Level</h2>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-one__left">
                        <div class="about-one__img-box">
                            <div class="about-one__img">
                                <img src="{{asset('home/images/resources/about-one-img-1.jpg')}}" alt="">
                            </div>
                            <div class="about-one__img-2">
                                <img src="{{asset('home/images/resources/about-one-img-2.jpg')}}" alt="">
                                <div class="about-one__shape-4 float-bob-x"></div>
                            </div>
                            <div class="about-one__shape-1 float-bob-x"></div>
                            <div class="about-one__shape-2 float-bob-y"></div>
                            <div class="about-one__shape-3 zoominout"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-one__right">
                        <p class="about-one__text-2">{{$siteName}} stands as one of the largest and most seasoned international private equity firms. Our accomplished team of investment professionals is primarily dedicated to strategic investments.</p>
                        <p class="about-one__text-2">
                            {{$siteName}} is managed by a team of trading experts specializing in generating profits through currency, stocks, options, and commodities trading on the foreign exchange market. We employ a variety of trading techniques to meet client goals.
                        </p>
                        <p class="about-one__text-2">
                            The {{$siteName}} team comprises financial market professionals assembled to provide the best possible trading conditions. Our specialists played a key role in developing technical specifications for a modern platform suitable for both beginners and experienced traders.
                        </p>
                        <p class="about-one__text-2">
                            Throughout our existence, we've aimed to balance lower risk and higher profits for our customers through innovative analysis, information dispersion, and expert assistance. Our team includes experienced professionals with diverse and in-depth knowledge, enhancing the entire investing process.
                        </p>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="about-one__right">
                        <p class="about-one__text-2">
                            Our multi-asset investment approach focuses on helping you achieve your desired outcomes. Portfolio management is at the core of our services. Based on our current market research, we anticipate implementing a long-term investment trading strategy that ensures guaranteed returns for our new members within the stipulated time.
                        </p>

                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="about-one__right text-center">
                         <a href="" target="_blank">
                            <img src="{{ asset('certificate.jpeg') }}" style="max-width:400px;"/>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About One End-->

@endsection
