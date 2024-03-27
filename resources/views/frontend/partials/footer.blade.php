@php
    $app_local      = get_default_language_code();
    $slug           = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::FOOTER_SECTION);
    $footer         = App\Models\Admin\SiteSections::getData($slug)->first();
    $useful_links   = App\Models\Admin\UsefulLink::where('status',true)->get()
@endphp
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<footer class="footer-section section--bg pt-40">
    <div class="footer-top-area">
        <div class="container">
            <div class="footer-top-wrapper">
                <div class="footer-logo">
                    <a class="site-logo site-title" href="{{ setRoute('frontend.index') }}"><img src="{{ get_logo($basic_settings) }}" alt="site-logo"></a>
                </div>
                <ul class="footer-social">
                    @foreach (@$footer->value->social_links ?? [] as $item)
                        <li><a href="{{ @$item->link }}"><i class="{{ @$item->icon }}"></i></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="footer-bottom-wrapper">
                <ul class="footer-list">
                    @foreach (@$useful_links ?? [] as $item)
                        <li><a href="{{ setRoute('frontend.useful.links',$item->slug) }}">{{ $item->title->language->$app_local->title }}</a></li>
                    @endforeach
                </ul>
                <div class="copyright-area">
                    <p>© 2024 <a href="{{ setRoute('frontend.index') }}">{{ $basic_settings->site_name }}</a> {{ __("is Proudly Powered by AppDevs") }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->