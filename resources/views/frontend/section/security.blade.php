@php
    $app_local  = get_default_language_code();
    $slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::SECURITY_SECTION);
    $security = App\Models\Admin\SiteSections::getData($slug)->first();
@endphp
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Security
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="security-section pt-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 text-center">
                <div class="section-header">
                    <span class="title-badge"></span>
                    <h5 class="section-sub-title">{{ @$security->value->language->$app_local->title }}</h5>
                    @php
                        $header = explode("|", @$security->value->language->$app_local->heading)
                    @endphp
                    @if(isset($header) ||   $header != null)
                    <h2 class="section-title">@isset($header[0]) {{ $header[0] }} @endisset 
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                            @isset($header[1]) {{ $header[1] }} @endisset
                        </span>
                    </h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
            @if(isset($security->value->items))
                @foreach (@$security->value->items ?? [] as $item)
                    @if ($item->status == 1)
                        <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                            <div class="security-item">
                                <div class="security-icon">
                                    <i class="{{ @$item->icon }}"></i>
                                </div>
                                <div class="security-content">
                                    <h3 class="title">{{ @$item->language->$app_local->item_title }}</h3>
                                    <p>{{ @$item->language->$app_local->item_heading }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Security
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->