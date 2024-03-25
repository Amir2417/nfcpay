@php
    $app_local = get_default_language_code();
    $slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::HOW_ITS_WORK_SECTION);
    $how_it_work = App\Models\Admin\SiteSections::getData($slug)->first();
@endphp
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start How it works
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="how-it-works-section ptb-120">
    <div class="container">
        <div class="row justify-content-center align-items-center mb-30-none">
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="how-it-works-thumb">
                    <img src="{{ asset(@$how_it_work->value->image,'site-section') }}" alt="element">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="section-header">
                    <span class="title-badge"></span>
                    <h5 class="section-sub-title">{{ @$how_it_work->value->language->$app_local->title }}</h5>
                    @php
                        $header = explode('|',@$how_it_work->value->language->$app_local->heading)
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
                <div class="how-it-works-item-wrapper">
                    @if (isset($how_it_work->value->items))
                        @php
                            $step = 0;
                        @endphp
                        @foreach (@$how_it_work->value->items as $item)
                            @php
                                $step++;
                            @endphp
                            <div class="how-it-works-item">
                                <div class="how-it-works-number">
                                    <span class="step">{{ $step }}</span>
                                </div>
                                <div class="how-it-works-content">
                                    <h4 class="title">{{ @$item->language->$app_local->item_title }}</h4>
                                    <p>{{ @$item->language->$app_local->item_heading }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End How it works
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->