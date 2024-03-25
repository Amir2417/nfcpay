@php
    $app_local = get_default_language_code();
    $slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::TESTIMONIAL);
    $testimonial = App\Models\Admin\SiteSections::getData($slug)->first();
@endphp
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Testimonial
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="testimonial-section ptb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 text-center">
                <div class="section-header">
                    <span class="title-badge"></span>
                    <h5 class="section-sub-title">{{ @$testimonial->value->language->$app_local->heading }}</h5>
                    @php
                        $sub_header = explode('|',@$testimonial->value->language->$app_local->sub_heading)
                    @endphp
                    @if(isset($sub_header) ||   $sub_header != null)
                        <h2 class="section-title">@isset($sub_header[0]) {{ $sub_header[0] }} @endisset
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                                @isset($sub_header[1]) {{ $sub_header[1] }} @endisset
                            </span>
                        </h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="testimonial-area">
            <div class="testimonial-slider">
                <div class="swiper-wrapper">
                    @if (isset($testimonial->value->items))
                        @foreach (@$testimonial->value->items ?? [] as $item)
                            <div class="swiper-slide">
                                <div class="testimonial-wrapper">
                                    <div class="testimonial-content">
                                        <div class="testimonial-user-wrapper">
                                            <div class="testimonial-user-thumb">
                                                <img src="{{ asset('public/frontend') }}/images/user/user-1.png" alt="user">
                                            </div>
                                            <div class="testimonial-user-content">
                                                <h5 class="title">{{ $item->name }}</h5>
                                                <span class="sub-title">{{ $item->designation }}</span>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <img src="{{ asset('public/frontend') }}/images/element/quote.png" alt="element">
                                        </div>
                                        <p>“ {{ @$item->language->$app_local->comment }} “</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                </div>
                <div class="swiper-pagination"></div>
            </div>  
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Testimonial
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->