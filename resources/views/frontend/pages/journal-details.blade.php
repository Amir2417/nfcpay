@extends('frontend.layouts.master')
@php
    $app_local  = get_default_language_code();
@endphp

@section('content')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Blog
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="blog-section ptb-120">
    <div class="container">
        <div class="row mb-30-none">
            <div class="col-xl-8 col-lg-8 mb-30">
                <div class="blog-item details">
                    <div class="blog-thumb">
                        <img src="{{ get_image(@$journal->data->image, 'site-section') }}" alt="blog">
                    </div>
                    <div class="blog-content">
                        <span class="date"><i class="las la-calendar"></i> {{ \Carbon\Carbon::parse(@$journal->created_at)->format('F j, Y') }}</span>
                        <h3 class="title">{{ @$journal->data->language->$app_local->title }}</h3>
                        <p>{!! @$journal->data->language->$app_local->description !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 mb-30">
                <div class="blog-sidebar">
                    <div class="widget-box mb-30">
                        <h4 class="widget-title">{{ __("Categories") }}</h4>
                        <div class="category-widget-box">
                            <ul class="category-list">
                                @foreach (@$category ?? [] as $item)
                                    <li><a href="{{ setRoute('frontend.journal.category',$item->id) }}">{{ $item->name->language->$app_local->name ?? "" }} <span>{{ $item->announcements_count }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget-box mb-30">
                        <h4 class="widget-title">{{ __("Recent Posts") }}</h4>
                        <div class="popular-widget-box">
                            @foreach (@$recent_posts ?? [] as $item)
                                <div class="single-popular-item d-flex flex-wrap align-items-center">
                                    <div class="popular-item-thumb">
                                        <a href="{{ setRoute('journal.details',$item->slug) }}"><img src="{{ get_image($item->data->image , 'site-section') }}" alt="blog"></a>
                                    </div>
                                    <div class="popular-item-content">
                                        @php
                                            $date = $item->created_at ?? "";
                                            $formattedDate = date('M d, Y', strtotime($date));
                                        @endphp
                                        <span class="date">{{ $formattedDate }}</span>
                                        <h6 class="title"><a href="{{ setRoute('journal.details',$item->slug) }}">{{ Str::words($item->data->language->$app_local->title ?? "","5","...") }}</a></h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="widget-box">
                        <h4 class="widget-title">{{ __("Tags") }}</h4>
                        <div class="tag-widget-box">
                            @php
                                $tags    = @$journal->data->language->$app_local->tags ?? [];
                            @endphp
                            <ul class="tag-list">
                                @foreach ($tags as $item)
                                    <li><a href="javascript:void(0)">{{ $item }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Blog
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection