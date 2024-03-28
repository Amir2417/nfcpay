@php
    $app_local      = get_default_language_code();
    $slug           = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::DOWNLOAD_APP_SECTION);
    $data           = App\Models\Admin\SiteSections::getData($slug)->first();
@endphp
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start App
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="app-section pt-120">
    <div class="container">
        <div class="row justify-content-center align-items-center mb-30">
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="app-thumb">
                    <img src="{{ get_image(@$data->value->image,'site-section') }}" alt="element">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="app-content">
                    <div class="section-header">
                        <span class="title-badge"></span>
                        <h5 class="section-sub-title">{{ @$data->value->language->$app_local->title }}</h5>
                        @php
                            $heading    = explode('|',@$data->value->language->$app_local->heading);
                        @endphp
                        <h2 class="section-title">{{ isset($heading[0]) ? $heading[0] : '' }}
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                                {{ isset($heading[1]) ? $heading[1] : '' }}
                            </span>
                        </h2>
                    </div>
                    <p>{{ @$data->value->language->$app_local->sub_heading }}</p>
                    <div class="app-btn-wrapper">
                        @if(isset($data->value->items))
                            @foreach (@$data->value->items ?? [] as $item)
                                <a href="{{ $item->link }}" target="_blank" class="app-btn">
                                    <div class="content">
                                        <span>{{ @$item->language->$app_local->item_title }}</span>
                                        <h5 class="title">{{ @$item->language->$app_local->item_header }}</h5>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ get_image(@$item->icon_image,'site-section') }}" alt="element">
                                    </div>
                                    <div class="app-qr">
                                        <img src="{{ get_image(@$item->image,'site-section') }}" alt="element">
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End App
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->