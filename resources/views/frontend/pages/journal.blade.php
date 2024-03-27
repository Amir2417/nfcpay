@extends('frontend.layouts.master')
@php
    $app_local  = get_default_language_code();
    $slug       = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::ANNOUNCEMENT_SECTION);
    $journal    = App\Models\Admin\SiteSections::getData($slug)->first();
@endphp

@section('content')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Blog
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="blog-section ptb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 text-center">
                <div class="section-header">
                    <span class="title-badge"></span>
                    <h5 class="section-sub-title">{{ @$journal->value->language->$app_local->title }}</h5>
                    @php
                        $heading    = explode('|',@$journal->value->language->$app_local->heading);
                    @endphp
                    <h2 class="section-title">{{ isset($heading[0]) ? $heading[0] : '' }}
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>
                            {{ isset($heading[1]) ? $heading[1] : '' }}
                        </span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
            @foreach ($journals ?? [] as $item)
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                    <div class="blog-item">
                        <div class="blog-thumb">
                            <img src="{{ get_image($item->data->image ,'site-section') }}" alt="blog">
                        </div>
                        <div class="blog-content">
                            <span class="date"><i class="las la-calendar"></i> {{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y') }}</span>
                            <h5 class="title"><a href="{{ setRoute('frontend.journal.details',$item->slug) }}">{{ Str::words($item->data->language->$app_local->title ?? "","5","...") }}</a></h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ get_paginate($journals) }}
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Blog
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection