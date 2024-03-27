@extends('frontend.layouts.master')
@php
    $app_local  = get_default_language_code();
    $slug       = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::SERVICES_SECTION);
    $service    = App\Models\Admin\SiteSections::getData($slug)->first();
@endphp

@section('content')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Service
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="service-section ptb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 text-center">
                <div class="section-header">
                    <span class="title-badge"></span>
                    <h5 class="section-sub-title">{{ @$service->value->language->$app_local->title }}</h5>
                    @php
                        $header     = explode('|',@$service->value->language->$app_local->heading);
                    @endphp
                    <h2 class="section-title">@isset ($header[0]) {{ $header[0] }} @endisset
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                            @isset ($header[1]) {{ $header[1] }} @endisset
                        </span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
            @if(isset($service->value->items))
                @foreach (@$service->value->items ?? [] as $item)
                    <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                            <div class="service-content">
                                <h3 class="title">{{ @$item->language->$app_local->title }}</h3>
                                <p>{{ @$item->language->$app_local->description }}</p>
                            </div>
                        </div>
                    </div>  
                @endforeach
            @endif
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Service
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection