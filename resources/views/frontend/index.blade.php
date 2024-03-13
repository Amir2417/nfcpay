@extends('frontend.layouts.master')

@push("css")
    
@endpush

@section('content') 
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="banner-section">
    <div class="container">
        <div class="row justify-content-center align-items-center mb-30-none">
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="banner-content-wrapper">
                    <div class="banner-content">
                        <span class="title-badge"></span>
                        <h5 class="sub-title">NFC Technology</h5>
                        <h1 class="title">Providing Payment System In 
                            <span>
                                Single Tap
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                            </span>
                        </h1>
                        <p>NFCPay is a community-led organization of hundreds of organizations looking to reinvent how we connect.</p>
                        <div class="banner-btn">
                            <a href="about.html" class="btn--base"><i class="las la-compress-arrows-alt me-2"></i> Explore Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="banner-thumb">
                    <img src="{{ asset('public/frontend') }}/images/banner/banner.png" alt="banner">
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Security
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="security-section pt-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 text-center">
                <div class="section-header">
                    <span class="title-badge"></span>
                    <h5 class="section-sub-title">Security System</h5>
                    <h2 class="section-title">5 Ways To 
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                            Security System
                        </span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                <div class="security-item">
                    <div class="security-icon">
                        <i class="las la-envelope-open-text"></i>
                    </div>
                    <div class="security-content">
                        <h3 class="title">SMS or Email Verification</h3>
                        <p>Dramatically supply transparent backward deliverables before caward comp internal or "organic" sources.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                <div class="security-item">
                    <div class="security-icon">
                        <i class="las la-user-check"></i>
                    </div>
                    <div class="security-content">
                        <h3 class="title">KYC Solution</h3>
                        <p>Dramatically supply transparent backward deliverables before caward comp internal or "organic" sources.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                <div class="security-item">
                    <div class="security-icon">
                        <i class="las la-qrcode"></i>
                    </div>
                    <div class="security-content">
                        <h3 class="title">Two Factor Authentication</h3>
                        <p>Dramatically supply transparent backward deliverables before caward comp internal or "organic" sources.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                <div class="security-item">
                    <div class="security-icon">
                        <i class="las la-compress-arrows-alt"></i>
                    </div>
                    <div class="security-content">
                        <h3 class="title">End-to-End Encryption</h3>
                        <p>Dramatically supply transparent backward deliverables before caward comp internal or "organic" sources.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                <div class="security-item">
                    <div class="security-icon">
                        <i class="lab la-bandcamp"></i>
                    </div>
                    <div class="security-content">
                        <h3 class="title">Behavior Tracking</h3>
                        <p>Dramatically supply transparent backward deliverables before caward comp internal or "organic" sources.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Security
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start How it works
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="how-it-works-section ptb-120">
    <div class="container">
        <div class="row justify-content-center align-items-center mb-30-none">
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="how-it-works-thumb">
                    <img src="{{ asset('public/frontend') }}/images/element/process.png" alt="element">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="section-header">
                    <span class="title-badge"></span>
                    <h5 class="section-sub-title">How It Works</h5>
                    <h2 class="section-title">Complete Process for your
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                            NFC Payment
                        </span>
                    </h2>
                </div>
                <div class="how-it-works-item-wrapper">
                    <div class="how-it-works-item">
                        <div class="how-it-works-number">
                            <span class="step">01</span>
                        </div>
                        <div class="how-it-works-content">
                            <h4 class="title">Registration</h4>
                            <p>Optional service in addition to the purchase of NFC Stickers and NFC Cards</p>
                        </div>
                    </div>
                    <div class="how-it-works-item">
                        <div class="how-it-works-number">
                            <span class="step">02</span>
                        </div>
                        <div class="how-it-works-content">
                            <h4 class="title">Add Card</h4>
                            <p>Optional service in addition to the purchase of NFC Stickers and NFC Cards</p>
                        </div>
                    </div>
                    <div class="how-it-works-item">
                        <div class="how-it-works-number">
                            <span class="step">03</span>
                        </div>
                        <div class="how-it-works-content">
                            <h4 class="title">Make Payment</h4>
                            <p>Optional service in addition to the purchase of NFC Stickers and NFC Cards</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End How it works
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Statistics
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="statistics-section section--bg ptb-120">
    <div class="container">
        <div class="row justify-content-center align-items-center mb-30-none">
            <div class="col-xl-5 col-lg-6 mb-30">
                <div class="section-header">
                    <span class="title-badge"></span>
                    <h5 class="section-sub-title">Overview</h5>
                    <h2 class="section-title">Last 15 years NFC Payment
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                            Statistics
                        </span>
                    </h2>
                </div>
                <p>We trust this NFCPay layout is helpful for your work. You can involve this layout for any reason. You might contribute a little sum by means of PayPal to help TemplateMo in making new layouts consistently.</p>
                <div class="statistics-wrapper">
                    <div class="row mb-30-none">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                            <div class="statistics-item">
                                <div class="statistics-content">
                                    <div class="odo-area">
                                        <h3 class="odo-title odometer" data-odometer-final="10">0</h3>
                                        <h3 class="title">+</h3>
                                    </div>
                                    <p>Payment Gateway</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                            <div class="statistics-item">
                                <div class="statistics-content">
                                    <div class="odo-area">
                                        <h3 class="odo-title odometer" data-odometer-final="100">0</h3>
                                        <h3 class="title">+</h3>
                                    </div>
                                    <p>Currencies</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                            <div class="statistics-item">
                                <div class="statistics-content">
                                    <div class="odo-area">
                                        <h3 class="odo-title odometer" data-odometer-final="500">0</h3>
                                        <h3 class="title">+</h3>
                                    </div>
                                    <p>Transactions Per Day</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 mb-30">
                <div class="statistics-thumb-wrapper">
                    <div class="statistics-thumb">
                        <img src="{{ asset('public/frontend') }}/images/element/statistics.png" alt="element">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Statistics
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start App
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="app-section pt-120">
    <div class="container">
        <div class="row justify-content-center align-items-center mb-30">
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="app-thumb">
                    <img src="{{ asset('public/frontend') }}/images/element/app.png" alt="element">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="app-content">
                    <div class="section-header">
                        <span class="title-badge"></span>
                        <h5 class="section-sub-title">Download App</h5>
                        <h2 class="section-title">Download and Register From
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                                Mobile App
                            </span>
                        </h2>
                    </div>
                    <p>Work with the pro, talented people at the most affordable price to get the most out of your time and cost using mobile apps.</p>
                    <p>In our dolore with people who are important to you, conversations that bring you to closer to each other and those who enjoy our dishes. Quisque pretium dolor turpis, quis blandit turpis semper ut. Nam malesuada eros nec luctus laoreet. Fusce sodales consequat velit eget dictum. Integer ornare magna.</p>
                    <div class="app-btn-wrapper">
                        <a href="#0" class="app-btn">
                            <div class="content">
                                <span>Get It On</span>
                                <h5 class="title">Google Play</h5>
                            </div>
                            <div class="icon">
                                <img src="{{ asset('public/frontend') }}/images/element/qr-icon.png" alt="element">
                            </div>
                            <div class="app-qr">
                                <img src="{{ asset('public/frontend') }}/images/element/play-qr.png" alt="element">
                            </div>
                        </a>
                        <a href="#0" class="app-btn">
                            <div class="content">
                                <span>Download On The</span>
                                <h5 class="title">Apple Store</h5>
                            </div>
                            <div class="icon">
                                <img src="{{ asset('public/frontend') }}/images/element/qr-icon.png" alt="element">
                            </div>
                            <div class="app-qr">
                                <img src="{{ asset('public/frontend') }}/images/element/app-qr.png" alt="element">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End App
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Testimonial
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="testimonial-section ptb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 text-center">
                <div class="section-header">
                    <span class="title-badge"></span>
                    <h5 class="section-sub-title">Testimonial</h5>
                    <h2 class="section-title">What People Say
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                            About Us
                        </span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="testimonial-area">
            <div class="testimonial-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                                <div class="testimonial-user-wrapper">
                                    <div class="testimonial-user-thumb">
                                        <img src="{{ asset('public/frontend') }}/images/user/user-1.png" alt="user">
                                    </div>
                                    <div class="testimonial-user-content">
                                        <h5 class="title">Annette Black</h5>
                                        <span class="sub-title">Founder & CEO</span>
                                    </div>
                                </div>
                                <div class="testimonial-quote">
                                    <img src="{{ asset('public/frontend') }}/images/element/quote.png" alt="element">
                                </div>
                                <p>“ Moreover general optional service in addition to the purchase of NFC Tags. We read all the Unique IDs (UID) of the Tags and send you via email. “</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                                <div class="testimonial-user-wrapper">
                                    <div class="testimonial-user-thumb">
                                        <img src="{{ asset('public/frontend') }}/images/user/user-2.png" alt="user">
                                    </div>
                                    <div class="testimonial-user-content">
                                        <h5 class="title">Leslie Alexander</h5>
                                        <span class="sub-title">Founder & CEO</span>
                                    </div>
                                </div>
                                <div class="testimonial-quote">
                                    <img src="{{ asset('public/frontend') }}/images/element/quote.png" alt="element">
                                </div>
                                <p>“ Moreover general optional service in addition to the purchase of NFC Tags. We read all the Unique IDs (UID) of the Tags and send you via email. “</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                                <div class="testimonial-user-wrapper">
                                    <div class="testimonial-user-thumb">
                                        <img src="{{ asset('public/frontend') }}/images/user/user-3.png" alt="user">
                                    </div>
                                    <div class="testimonial-user-content">
                                        <h5 class="title">Esther Howard</h5>
                                        <span class="sub-title">Founder & CEO</span>
                                    </div>
                                </div>
                                <div class="testimonial-quote">
                                    <img src="{{ asset('public/frontend') }}/images/element/quote.png" alt="element">
                                </div>
                                <p>“ Moreover general optional service in addition to the purchase of NFC Tags. We read all the Unique IDs (UID) of the Tags and send you via email. “</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Testimonial
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection


@push("script")
    
@endpush