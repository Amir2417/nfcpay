@php
    $app_local  = get_default_language_code();
    $slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::BANNER_SECTION);
    $banner = App\Models\Admin\SiteSections::getData($slug)->first();
@endphp
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
                        <h5 class="sub-title">{{ @$banner->value->language->$app_local->title }}</h5>
                        @php
                            $header = explode('|', @$banner->value->language->$app_local->heading ?? "");
                        @endphp
                        @if(isset($header) ||   $header != null)
                        <h1 class="title">@isset($header[0]) {{ $header[0] }} @endisset 
                            <span>
                                @isset($header[1]) {{ $header[1] }} @endisset
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                            </span>
                        </h1>
                        @endif
                        <p>{{ @$banner->value->language->$app_local->sub_heading }}</p>
                        <div class="banner-btn">
                            <a href="" class="btn--base"><i class="las la-compress-arrows-alt me-2"></i> {{ @$banner->value->language->$app_local->button_name }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="banner-thumb">
                    <img src="{{ get_image(@$banner->value->image,'site-section') }}" alt="banner">
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->