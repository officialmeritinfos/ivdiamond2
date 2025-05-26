@extends('home.base')
@section('content')

    <!--Main Slider Three Start-->
    <section class="main-slider-three">
        <div class="swiper-container thm-swiper__slider" data-swiper-options='{
        "slidesPerView": 1,
        "loop": true,
        "effect": "fade",
        "pagination": {
            "el": "#main-slider-pagination",
            "type": "bullets",
            "clickable": true
        },
        "navigation": {
            "nextEl": "#main-slider__swiper-button-next",
            "prevEl": "#main-slider__swiper-button-prev"
        },
        "autoplay": {
            "delay": 5000
        }}'>

            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="image-layer-three" style="background-image: url({{ asset('home/images/backgrounds/main-slider-3-1.jpg') }});"></div>
                    <div class="main-slider__shape-1" style="background-image: url({{ asset('home/images/backgrounds/main-slider-shape-1.jpg') }});"></div>
                    <div class="main-slider__shape-2 float-bob-y">
                        <img src="{{ asset('home/images/shapes/main-slider-shape-2.png') }}" alt="">
                    </div>
                    <div class="main-slider__shape-3 float-bob-x">
                        <img src="{{ asset('home/images/shapes/main-slider-shape-4.png') }}" alt="">
                    </div>
                    <div class="main-slider-three__overly-bg"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="main-slider-three__content">
                                    <div class="main-slider-three__sub-title-box">
                                        <p class="main-slider-three__sub-title">Welcome to {{ $siteName }}</p>
                                    </div>
                                    <h2 class="main-slider-three__title">Empowering Your <br> Financial Future</h2>
                                    <p class="main-slider-three__text">We provide strategic investment opportunities in crypto, gold, real estate, and beyond — designed to help you grow and protect your wealth long-term.</p>
                                    <div class="main-slider-three__btn-box">
                                        <a href="{{ route('register') }}" class="thm-btn main-slider-three__btn-1">Create an Account</a>
                                        <a href="{{ route('login') }}" class="thm-btn main-slider-three__btn-2">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="image-layer-three" style="background-image: url({{ asset('home/images/backgrounds/main-slider-3-2.jpg') }});"></div>
                    <div class="main-slider__shape-1" style="background-image: url({{ asset('home/images/backgrounds/main-slider-shape-1.jpg') }});"></div>
                    <div class="main-slider__shape-2 float-bob-y">
                        <img src="{{ asset('home/images/shapes/main-slider-shape-2.png') }}" alt="">
                    </div>
                    <div class="main-slider__shape-3 float-bob-x">
                        <img src="{{ asset('home/images/shapes/main-slider-shape-4.png') }}" alt="">
                    </div>
                    <div class="main-slider-three__overly-bg"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="main-slider-three__content">
                                    <div class="main-slider-three__sub-title-box">
                                        <p class="main-slider-three__sub-title">Secure. Diverse. Scalable.</p>
                                    </div>
                                    <h2 class="main-slider-three__title">Invest In What Matters<br> For Tomorrow</h2>
                                    <p class="main-slider-three__text">From medical cannabis and retirement planning to oil & gas and blockchain — {{ $siteName }} connects you to real assets with real potential.</p>
                                    <div class="main-slider-three__btn-box">
                                        <a href="{{ route('register') }}" class="thm-btn main-slider-three__btn-1">Create an Account</a>
                                        <a href="{{ route('login') }}" class="thm-btn main-slider-three__btn-2">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="image-layer-three" style="background-image: url({{ asset('home/images/backgrounds/main-slider-3-3.jpg') }});"></div>
                    <div class="main-slider__shape-1" style="background-image: url({{ asset('home/images/backgrounds/main-slider-shape-1.jpg') }});"></div>
                    <div class="main-slider__shape-2 float-bob-y">
                        <img src="{{ asset('home/images/shapes/main-slider-shape-2.png') }}" alt="">
                    </div>
                    <div class="main-slider__shape-3 float-bob-x">
                        <img src="{{ asset('home/images/shapes/main-slider-shape-4.png') }}" alt="">
                    </div>
                    <div class="main-slider-three__overly-bg"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="main-slider-three__content">
                                    <div class="main-slider-three__sub-title-box">
                                        <p class="main-slider-three__sub-title">Trusted by Smart Investors</p>
                                    </div>
                                    <h2 class="main-slider-three__title">Build Your Portfolio<br> With Expert Insight</h2>
                                    <p class="main-slider-three__text">At {{ $siteName }}, we don’t just follow trends — we anticipate them. Join a platform built for serious investors seeking sustainable growth.</p>
                                    <div class="main-slider-three__btn-box">
                                        <a href="{{ route('register') }}" class="thm-btn main-slider-three__btn-1">Create an Account</a>
                                        <a href="{{ route('login') }}" class="thm-btn main-slider-three__btn-2">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="swiper-pagination" id="main-slider-pagination"></div>

            <!-- Navigation -->
            <div class="main-slider-three__nav">
                <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                    <i class="icon-right-arrow"></i>
                </div>
                <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                    <i class="icon-right-arrow1"></i>
                </div>
            </div>

        </div>
    </section>
    <!--Main Slider Three End-->


    <!--CTA Two Start-->
    <section class="cta-two cta-two--three">
        <div class="cta-two__shape-1">
            <img src="{{ asset('home/images/shapes/cta-two---three-shape-1.png') }}" alt="">
        </div>
        <div class="cta-two__shape-2">
            <img src="{{ asset('home/images/shapes/cta-two---three-shape-2.png') }}" alt="">
        </div>
        <div class="container">
            <div class="cta-two__inner">
                <div class="cta-two__title-box">
                    <h3 class="cta-two__title">Start Building Wealth with {{ $siteName }}</h3>
                    <p class="cta-two__text">Join thousands of investors who trust us for cryptocurrency, gold, oil, real estate, and more.</p>
                </div>
                <div class="cta-two__btn-box">
                    <a href="{{ route('register') }}" class="thm-btn cta-two__btn">Create an Account</a>
                </div>
            </div>
        </div>
    </section>
    <!--CTA Two End-->


    <!--About Three Start-->
    <section class="about-three">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-three__left">
                        <div class="about-three__img-box">
                            <div class="about-three__img-one">
                                <img src="{{ asset('home/images/resources/about-three-img-1.jpg') }}" alt="">
                            </div>
                            <div class="about-three__img-two">
                                <img src="{{ asset('home/images/resources/about-three-img-2.jpg') }}" alt="">
                            </div>
                            <div class="about-three__happy-client">
                                <div class="about-three__happy-client-icon">
                                    <img src="{{ asset('home/images/icon/about-three-icon.png') }}" alt="">
                                </div>
                                <div class="about-three__count-box count-box">
                                    <h3 class="count-text" data-stop="80" data-speed="1500">00</h3>
                                    <span>k</span>
                                </div>
                                <p class="about-three__happy-client-text-1">Happy Clients</p>
                                <p class="about-three__happy-client-text-2">Investors growing their wealth with {{ $siteName }}</p>
                            </div>
                            <div class="about-three__shape-1 zoominout"></div>
                            <div class="about-three__shape-2 float-bob-x"></div>
                            <div class="about-three__shape-3 img-bounce"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-three__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Who We Are</span>
                            <h2 class="section-title__title">Smart Investment Strategies<br> for a Secure Future</h2>
                        </div>
                        <p class="about-three__text">
                            At {{ $siteName }}, we empower individuals and businesses to diversify their investments into high-growth sectors like cryptocurrency, oil & gas, gold, real estate, medical cannabis, and retirement planning. Our team is committed to helping you make informed financial decisions that last a lifetime.
                        </p>
                        <div class="about-three__grow-your-business">
                            <div class="about-three__grow-your-business-work-hours">
                                <div class="about-three__grow-your-business-work-hours-inner">
                                    <div class="about-three__grow-your-business-check-icon">
                                        <span class="icon-heavy-check"></span>
                                    </div>
                                    <h5>1</h5>
                                    <h4>Million</h4>
                                    <p>Transactions Handled</p>
                                </div>
                            </div>
                            <div class="about-three__grow-your-business-content">
                                <h4 class="about-three__grow-your-business-content-title">Your Wealth, Our Priority</h4>
                                <p class="about-three__grow-your-business-content-text">
                                    We simplify the investment process, offering expert tools and support to help you grow, manage, and protect your portfolio.
                                </p>
                                <div class="about-three__grow-your-business-points-box">
                                    <ul class="list-unstyled about-three__grow-your-business-points">
                                        <li>
                                            <div class="icon"><span class="icon-heavy-check"></span></div>
                                            <div class="text"><p>Crypto & Gold Investment</p></div>
                                        </li>
                                        <li>
                                            <div class="icon"><span class="icon-heavy-check"></span></div>
                                            <div class="text"><p>Oil & Gas Ventures</p></div>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled about-three__grow-your-business-points about-three__grow-your-business-points--two">
                                        <li>
                                            <div class="icon"><span class="icon-heavy-check"></span></div>
                                            <div class="text"><p>Medical Cannabis Funds</p></div>
                                        </li>
                                        <li>
                                            <div class="icon"><span class="icon-heavy-check"></span></div>
                                            <div class="text"><p>Retirement & Real Estate</p></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="about-three__business-start-year">
                            <div class="about-three__business-start-year-icon">
                                <span class="icon-badge-rank"></span>
                            </div>
                            <div class="about-three__business-start-year-content">
                                <h5>Since 2019</h5>
                                <p>With over two decades of industry experience, {{ $siteName }} continues to lead the way in offering trusted investment solutions that stand the test of time.</p>
                            </div>
                        </div>
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
    <!--About Three End-->


    <!--Services One Start-->
    <section class="services-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Our Services</span>
                <h2 class="section-title__title">What We’re Offering</h2>
            </div>
            <div class="row">
                @foreach($services as $service)
                    <!--Services One Single Start-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="services-one__single">
                            <div class="services-one__inner">
                                <div class="services-one__shape-1"></div>
                                <div class="services-one__shape-2">
                                    <div class="services-one__shape-3">
                                        <img src="{{asset('home/images/shapes/services-one-shape-3.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="services-one__icon">
                                    <img src="{{asset('home/serv/'.$service->photo)}}" alt="" style="width:100px;">
                                </div>
                                <h3 class="services-one__title"><a href="{{route('service.details',['id'=>$service->id])}}">{{$service->title}}</a>
                                </h3>
                                <p class="services-one__text">
                                    {{$service->short}}
                                </p>
                                <div class="services-one__btn-box">
                                    <a href="{{route('service.details',['id'=>$service->id])}}" class="services-one__btn">Read More<i
                                            class="icon-right-arrow-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Services One Single End-->
                @endforeach

            </div>
        </div>
    </section>
    <!--Services One End-->




    <!--Pricing One Start-->
    <section class="pricing-one pricing-page">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline section-title__tagline--two">Our Investment Plan</span>
            </div>
            <div class="row justify-content-center">
                @foreach($packages as $package)
                    @inject('option','App\Defaults\Custom')
                    <!--Pricing One Single Start-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="pricing-one__single">
                            <div class="pricing-one__price-box">
                                <div class="pricing-one__shape-1">
                                    <img src="{{asset('home/images/shapes/pricing-one-shape-1.png')}}" alt="">
                                </div>
                                <h2 class="pricing-one__price">{{$package->roi}}% <span> {{$option->getReturnType($package->returnType)}}</span></h2>
                            </div>
                            <div class="pricing-one__content">
                                <p class="pricing-one__pack-name">{{$package->name}}</p>
                                <p class="pricing-one__text">Chooses to enjoy a no annoying.</p>
                                <ul class="list-unstyled pricing-one__content-list">
                                    <li>
                                        <div class="icon">
                                            <i class="icon-check-2"></i>
                                        </div>
                                        <div class="text">
                                            <p>
                                                Price: ${{number_format($package->minAmount,2)}} - @if($package->isUnlimited !=1)
                                                    ${{number_format($package->maxAmount,2)}}
                                                @else
                                                    Unlimited
                                                @endif
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="icon-check-2"></i>
                                        </div>
                                        <div class="text">
                                            <p>Total Profit return: {{$package->numberOfReturns*$package->roi}}%</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="icon-check-2"></i>
                                        </div>
                                        <div class="text">
                                            <p>Contract Duration: {{$package->Duration}}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="icon-check-2"></i>
                                        </div>
                                        <div class="text">
                                            <p>Referral Bonus: {{$package->referral}}%</p>
                                        </div>
                                    </li>
                                </ul>
                                <a href="{{route('register')}}" class="thm-btn pricing-one__btn">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <!--Pricing One Single End-->
                @endforeach

            </div>
        </div>
    </section>
    <!--Pricing One End-->

    <!--How It Work Start-->
    <section class="how-it-work how-it-work-two">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">How It Works</span>
                <h2 class="section-title__title">Start Investing in 5 Simple Steps</h2>
            </div>
            <div class="how-it-work__bottom">
                <div class="row">
                    <!-- Step 1: Register -->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="how-it-work__single">
                            <div class="how-it-work__count">01</div>
                            <div class="how-it-work__icon">
                                <span class="icon-user"></span>
                            </div>
                            <h3 class="how-it-work__title">Create an Account</h3>
                            <p class="how-it-work__text-2">Sign up quickly with your details to access all investment opportunities on {{ $siteName }}.</p>
                        </div>
                    </div>

                    <!-- Step 2: Deposit -->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <div class="how-it-work__single">
                            <div class="how-it-work__count">02</div>
                            <div class="how-it-work__icon">
                                <span class="icon-wallet"></span>
                            </div>
                            <h3 class="how-it-work__title">Fund Your Wallet</h3>
                            <p class="how-it-work__text-2">Securely deposit into your wallet using crypto or supported methods to get started.</p>
                        </div>
                    </div>

                    <!-- Step 3: Invest -->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                        <div class="how-it-work__single">
                            <div class="how-it-work__count">03</div>
                            <div class="how-it-work__icon">
                                <span class="icon-investment"></span>
                            </div>
                            <h3 class="how-it-work__title">Choose an Investment</h3>
                            <p class="how-it-work__text-2">Pick from plans in crypto, gold, oil, real estate, and more — based on your financial goals.</p>
                        </div>
                    </div>

                    <!-- Step 4: Earn -->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                        <div class="how-it-work__single">
                            <div class="how-it-work__count">04</div>
                            <div class="how-it-work__icon">
                                <span class="icon-bar-chart-1"></span>
                            </div>
                            <h3 class="how-it-work__title">Watch Your Earnings Grow</h3>
                            <p class="how-it-work__text-2">Track returns in real time with full transparency and insight into your portfolio growth.</p>
                        </div>
                    </div>

                    <!-- Step 5: Withdraw -->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="500ms">
                        <div class="how-it-work__single">
                            <div class="how-it-work__count">05</div>
                            <div class="how-it-work__icon">
                                <span class="icon-withdraw"></span>
                            </div>
                            <h3 class="how-it-work__title">Withdraw Anytime</h3>
                            <p class="how-it-work__text-2">Easily withdraw your profits or capital to your wallet or linked bank account.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--How It Work End-->
    <!--Why Choose One Start-->
    <section class="why-choose-one why-choose-two">
        <div class="container">
            <div class="why-choose-one__top">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="why-choose-one__left">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">WHY CHOOSE US</span>
                                <h2 class="section-title__title">Trusted Investment Strategies <br> That Deliver Real Results</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="why-choose-one__right">
                            <div class="why-choose-one__experience">
                                <div class="why-choose-one__count-box count-box">
                                    <h3 class="count-text" data-stop="08" data-speed="1500">00</h3>
                                    <span class="why-choose-one__count-plus">+</span>
                                    <span class="why-choose-one__count-letter">Years</span>
                                </div>
                                <p class="why-choose-one__experience-text">Experience in Global Investment Management</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="why-choose-one__bottom">
                <div class="row">
                    <!-- Why Choose Item 1 -->
                    <div class="col-xl-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="why-choose-one__single">
                            <div class="why-choose-one__icon">
                                <img src="{{ asset('home/images/icon/why-choose-one-icon-1.png') }}" alt="">
                            </div>
                            <h3 class="why-choose-one__title">Proven Wealth <br> Building Systems</h3>
                            <p class="why-choose-one__text">From cryptocurrency and gold to oil and cannabis — we connect you with high-growth, high-trust investment options.</p>
                            <div class="why-choose-one__btn-box">
                                <a href="about" class="why-choose-one__btn">
                                    <i class="icon-arrow-right"></i>Learn More
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Why Choose Item 2 -->
                    <div class="col-xl-4 wow fadeInUp" data-wow-delay="200ms">
                        <div class="why-choose-one__single">
                            <div class="why-choose-one__icon">
                                <img src="{{ asset('home/images/icon/why-choose-one-icon-2.png') }}" alt="">
                            </div>
                            <h3 class="why-choose-one__title">Smart Portfolio <br> Planning</h3>
                            <p class="why-choose-one__text">Our experts help you diversify across real estate, retirement products, and digital assets — tailored to your goals.</p>
                            <div class="why-choose-one__btn-box">
                                <a href="about" class="why-choose-one__btn">
                                    <i class="icon-arrow-right"></i>Learn More
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Why Choose Item 3 -->
                    <div class="col-xl-4 wow fadeInUp" data-wow-delay="300ms">
                        <div class="why-choose-one__single-two">
                            <div class="why-choose-one__single-two__bg"
                                 style="background-image: url({{ asset('home/images/backgrounds/why-choose-one-single-bg.jpg') }});">
                            </div>
                            <div class="why-choose-one__single-two-img-box">
                                <div class="why-choose-one__single-two-img">
                                    <img src="{{ asset('home/images/resources/why-choose-one-img-1.jpg') }}" alt="">
                                </div>
                                <div class="why-choose-one__single-two-img-2">
                                    <img src="{{ asset('home/images/resources/why-choose-one-img-2.jpg') }}" alt="">
                                </div>
                                <div class="why-choose-one__single-two-img-3">
                                    <img src="{{ asset('home/images/resources/why-choose-one-img-3.jpg') }}" alt="">
                                </div>
                            </div>
                            <p class="why-choose-one__single-two-text">Over 20,000 investors across 30+ countries trust {{ $siteName }} to grow and secure their wealth.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Why Choose One End-->

    <!--Testimonial Three Start-->
    <section class="testimonial-two">
        <div class="container">
            <div class="section-title text-left">
                <span class="section-title__tagline">CUSTOMER FEEDBACKS</span>
                <h2 class="section-title__title">See What Our Investors Say</h2>
            </div>
            <div class="testimonial-two__carousel thm-owl__carousel owl-theme owl-carousel" data-owl-options='{
                "items": 3,
                "margin": 30,
                "smartSpeed": 700,
                "loop":true,
                "autoplay": 6000,
                "nav":true,
                "dots":false,
                "navText": ["<span class=\"icon-right-arrow\"></span>","<span class=\"icon-right-arrow1\"></span>"],
                "responsive":{
                    "0":{"items":1},
                    "768":{"items":2},
                    "992":{"items":3}
                }
            }'>

                <!-- Testimonial 1 -->
                <div class="item">
                    <div class="testimonial-two__single">
                        <div class="testimonial-two__rating-and-quote">
                            <div class="testimonial-two__rating">
                                @for ($i = 0; $i < 5; $i++) <i class="fa fa-star"></i> @endfor
                            </div>
                            <div class="testimonial-two__quote">
                                <span class="icon-bubble-message"></span>
                            </div>
                        </div>
                        <h4 class="testimonial-two__title">Reliable and Transparent</h4>
                        <p class="testimonial-two__text">{{ $siteName }} has made investing feel effortless. I love how transparent everything is — from deposits to withdrawals.</p>
                        <div class="testimonial-two__client-details">
                            <div class="testimonial-two__client-img">
                                <img src="https://ui-avatars.com/api/?name=Emily+Clark&background=0D8ABC&color=fff" alt="Emily Clark">
                            </div>
                            <div class="testimonial-two__info">
                                <h3 class="testimonial-two__client-name">Emily Clark</h3>
                                <div class="testimonial-two__client-sub-title">Freelancer, Australia</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="item">
                    <div class="testimonial-two__single">
                        <div class="testimonial-two__rating-and-quote">
                            <div class="testimonial-two__rating">
                                @for ($i = 0; $i < 5; $i++) <i class="fa fa-star"></i> @endfor
                            </div>
                            <div class="testimonial-two__quote">
                                <span class="icon-bubble-message"></span>
                            </div>
                        </div>
                        <h4 class="testimonial-two__title">Great Investment Options</h4>
                        <p class="testimonial-two__text">I was looking for more than just crypto. {{ $siteName }} gave me access to real estate and oil portfolios. It’s a well-rounded platform.</p>
                        <div class="testimonial-two__client-details">
                            <div class="testimonial-two__client-img">
                                <img src="https://ui-avatars.com/api/?name=Daniel+Reed&background=0D8ABC&color=fff" alt="Daniel Reed">
                            </div>
                            <div class="testimonial-two__info">
                                <h3 class="testimonial-two__client-name">Daniel Reed</h3>
                                <div class="testimonial-two__client-sub-title">Consultant, UK</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="item">
                    <div class="testimonial-two__single">
                        <div class="testimonial-two__rating-and-quote">
                            <div class="testimonial-two__rating">
                                @for ($i = 0; $i < 5; $i++) <i class="fa fa-star"></i> @endfor
                            </div>
                            <div class="testimonial-two__quote">
                                <span class="icon-bubble-message"></span>
                            </div>
                        </div>
                        <h4 class="testimonial-two__title">Smooth Withdrawals</h4>
                        <p class="testimonial-two__text">Unlike some platforms I’ve tried, {{ $siteName }} processes withdrawals fast. That’s what made me stick with them.</p>
                        <div class="testimonial-two__client-details">
                            <div class="testimonial-two__client-img">
                                <img src="https://ui-avatars.com/api/?name=Rachel+Mendoza&background=0D8ABC&color=fff" alt="Rachel Mendoza">
                            </div>
                            <div class="testimonial-two__info">
                                <h3 class="testimonial-two__client-name">Rachel Mendoza</h3>
                                <div class="testimonial-two__client-sub-title">Investor, Philippines</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="item">
                    <div class="testimonial-two__single">
                        <div class="testimonial-two__rating-and-quote">
                            <div class="testimonial-two__rating">
                                @for ($i = 0; $i < 5; $i++) <i class="fa fa-star"></i> @endfor
                            </div>
                            <div class="testimonial-two__quote">
                                <span class="icon-bubble-message"></span>
                            </div>
                        </div>
                        <h4 class="testimonial-two__title">Perfect for Long-Term Growth</h4>
                        <p class="testimonial-two__text">As someone focused on retirement, I needed a platform that’s safe and forward-looking. I’ve seen consistent growth through {{ $siteName }}.</p>
                        <div class="testimonial-two__client-details">
                            <div class="testimonial-two__client-img">
                                <img src="https://ui-avatars.com/api/?name=Michael+Fischer&background=0D8ABC&color=fff" alt="Michael Fischer">
                            </div>
                            <div class="testimonial-two__info">
                                <h3 class="testimonial-two__client-name">Michael Fischer</h3>
                                <div class="testimonial-two__client-sub-title">Retired Engineer, Germany</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Testimonial Three End-->
    s

    <!--Blog One Start-->
    <section class="blog-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">NEWS & UPDATES</span>
                <h2 class="section-title__title">Latest Blog & Articles</h2>
            </div>
            <div class="row">

                <!--Blog One Single Start-->
                <div class="col-xl-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
                    <div class="blog-one__single">
                        <rssapp-wall id="38kEBNRCi1vuK60z"></rssapp-wall>
                        <script src="https://widget.rss.app/v1/wall.js" type="text/javascript" async></script>
                    </div>
                </div>
                <!--Blog One Single End-->

            </div>
        </div>
    </section>
    <!--Blog One End-->

@endsection
