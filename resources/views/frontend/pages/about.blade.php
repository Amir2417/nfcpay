@extends('frontend.layouts.master')
@php
    $app_local  = get_default_language_code();
    $slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::ABOUT_US_SECTION);
    $about = App\Models\Admin\SiteSections::getData($slug)->first();
@endphp

@section('content')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start About
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="about-section pt-120">
    <div class="container">
        <div class="row justify-content-center align-items-center mb-30-none">
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="about-content">
                    <div class="section-header">
                        <span class="title-badge"></span>
                        <h5 class="section-sub-title">{{ @$about->value->language->$app_local->title }}</h5>
                        @php
                            $header = explode('|',@$about->value->language->$app_local->heading);
                        @endphp
                        <h2 class="section-title">@isset($header[0]) {{ $header[0] }} @endisset
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                                @isset($header[1]) {{ $header[1] }} @endisset
                            </span>
                        </h2>
                    </div>
                    <p>{{ @$about->value->language->$app_local->sub_heading }}</p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="about-thumb-wrapper">
                    <div class="about-thumb-one">
                        <img src="{{ get_image(@$about->value->image_one,'site-section') }}" alt="element">
                    </div>
                    <div class="about-thumb-two">
                        <img src="{{ get_image(@$about->value->image_two,'site-section') }}" alt="element">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End About
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Faq
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="faq-section ptb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 text-center">
                <div class="section-header">
                    <span class="title-badge"></span>
                    <h5 class="section-sub-title">FAQs</h5>
                    <h2 class="section-title">Frequently Aksed 
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                            Questions
                        </span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="faq-wrapper">
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">What is multi-currency account & how does it work?</span><span class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Moreover general optional service in addition to the purchase of NFC Tags. We read all the Unique IDs (UID) of the Tags and send you via email.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">
                            What is the best features & services we deliver?</span><span
                                class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Moreover general optional service in addition to the purchase of NFC Tags. We read all the Unique IDs (UID) of the Tags and send you via email.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">What Modes Of Payment Do You Accept?</span><span
                                class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Moreover general optional service in addition to the purchase of NFC Tags. We read all the Unique IDs (UID) of the Tags and send you via email.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">
                            What happened to the borderless account?</span><span
                                class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Moreover general optional service in addition to the purchase of NFC Tags. We read all the Unique IDs (UID) of the Tags and send you via email.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="faq-wrapper">
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">What is multi-currency account & how does it work?</span><span class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Moreover general optional service in addition to the purchase of NFC Tags. We read all the Unique IDs (UID) of the Tags and send you via email.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">
                            What is the best features & services we deliver?</span><span
                                class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Moreover general optional service in addition to the purchase of NFC Tags. We read all the Unique IDs (UID) of the Tags and send you via email.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">What Modes Of Payment Do You Accept?</span><span
                                class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Moreover general optional service in addition to the purchase of NFC Tags. We read all the Unique IDs (UID) of the Tags and send you via email.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">
                            What happened to the borderless account?</span><span
                                class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Moreover general optional service in addition to the purchase of NFC Tags. We read all the Unique IDs (UID) of the Tags and send you via email.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Faq
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection