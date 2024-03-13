
@extends('layouts.master')

@push('css')
    
@endpush

@section('content')
 <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Account
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="account-section bg_img" data-background="{{ asset('public/frontend') }}/images/banner/bg.jpg">
    <div class="account-inner">
        <div class="account-area change-form">
            <div class="account-thumb">
                <img src="{{ asset('public/frontend') }}/images/element/process.png" alt="element">
            </div>
            <div class="account-form-area">
                <div class="account-logo">
                    <a class="site-logo site-title" href="{{ setRoute('frontend.index') }}"><img src="{{ get_logo($basic_settings) }}" alt="site-logo"></a>
                </div>
                <h4 class="title">Login Information</h4>
                <p>Please input your email and login to your account to get access to your dashboard.</p>
                <form action="{{ setRoute('user.login.submit') }}" class="account-form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <input type="email" class="form-control form--control" name="credentials" placeholder="Enter Email..." required>
                        </div>
                        <div class="col-lg-12 form-group show_hide_password">
                            <input type="password" class="form-control form--control" name="password" placeholder="Enter Password..." required>
                            <span class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-lg-12 form-group">
                            <div class="forgot-item text-end">
                                <label><a href="#0">Forgot Password?</a></label>
                            </div>
                        </div>
                        <div class="col-lg-12 form-group text-center">
                            <button type="submit" class="btn--base w-100">Login Now</button>
                        </div>
                        <div class="or-area">
                            <span class="or-line"></span>
                            <span class="or-title">You can also login with</span>
                            <span class="or-line"></span>
                        </div>
                        <div class="col-lg-12 form-group">
                            <div class="account-form-btn">
                                <a href="#0" class="facebook">
                                    <svg viewBox="0 0 24 24" width="24" height="24" class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy"><path d="M13.213 5.22c-.89.446-.606 3.316-.606 3.316h3.231v2.907h-3.23v10.359H8.773V11.444H6.39V8.536h2.423c-.221 0 .12-2.845.146-3.114.136-1.428 1.19-2.685 2.544-3.153 1.854-.638 3.55-.286 5.385.17l-.484 2.504s-2.585-.455-3.191.277z"></path></svg>
                                </a>
                                <a href="#0" class="google">
                                    <svg viewBox="0 0 24 24" width="24" height="24" class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy"><path d="M15.303 8.287l2.26-2.206C16.174 4.791 14.368 4 12.206 4a8 8 0 0 0-7.151 4.412l2.588 2.01c.65-1.93 2.446-3.326 4.563-3.326 1.504 0 2.518.649 3.096 1.191zm4.59 3.897c0-.659-.054-1.139-.17-1.637h-7.516v2.97h4.412c-.089.74-.569 1.851-1.636 2.598l2.526 1.957c1.512-1.396 2.384-3.451 2.384-5.888zm-12.24 1.405a4.928 4.928 0 0 1-.267-1.583c0-.552.098-1.086.258-1.584l-2.588-2.01a8.013 8.013 0 0 0-.854 3.594c0 1.29.311 2.508.854 3.593l2.597-2.01zm4.554 6.422c2.162 0 3.976-.711 5.302-1.939l-2.526-1.957c-.676.472-1.584.8-2.776.8-2.117 0-3.914-1.396-4.554-3.326l-2.588 2.01c1.316 2.615 4.011 4.412 7.142 4.412z"></path></svg>
                                </a>
                                <a href="#0" class="apple">
                                    <svg viewBox="0 0 24 24" width="24" height="24" class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy"><path d="M19.6437 17.5861C19.3385 18.2848 18.9772 18.928 18.5586 19.5193C17.9881 20.3255 17.5209 20.8835 17.1609 21.1934C16.6027 21.702 16.0048 21.9625 15.3644 21.9773C14.9047 21.9773 14.3504 21.8477 13.705 21.5847C13.0576 21.323 12.4626 21.1934 11.9186 21.1934C11.348 21.1934 10.7361 21.323 10.0815 21.5847C9.42601 21.8477 8.89793 21.9847 8.49417 21.9983C7.88012 22.0242 7.26806 21.7563 6.65713 21.1934C6.2672 20.8563 5.77947 20.2786 5.1952 19.4601C4.56832 18.586 4.05294 17.5725 3.64918 16.417C3.21677 15.1689 3 13.9603 3 12.7902C3 11.4498 3.29226 10.2938 3.87766 9.32509C4.33773 8.54696 4.94978 7.93315 5.71581 7.48255C6.48185 7.03195 7.30955 6.80232 8.20091 6.78763C8.68863 6.78763 9.32822 6.93713 10.123 7.23095C10.9156 7.52576 11.4245 7.67526 11.6476 7.67526C11.8144 7.67526 12.3798 7.50045 13.3382 7.15194C14.2445 6.82874 15.0094 6.69492 15.636 6.74763C17.334 6.88343 18.6097 7.54675 19.4581 8.74177C17.9395 9.6536 17.1883 10.9307 17.2032 12.5691C17.2169 13.8452 17.6841 14.9071 18.6022 15.7503C19.0183 16.1417 19.483 16.4441 20 16.6589C19.8879 16.9811 19.7695 17.2898 19.6437 17.5861ZM15.7494 2.40011C15.7494 3.40034 15.3806 4.33425 14.6456 5.19867C13.7586 6.22629 12.6857 6.8201 11.5223 6.7264C11.5075 6.6064 11.4989 6.48011 11.4989 6.3474C11.4989 5.38718 11.9207 4.35956 12.6698 3.51934C13.0438 3.09392 13.5194 2.74019 14.0962 2.45801C14.6718 2.18004 15.2162 2.02632 15.7282 2C15.7431 2.13371 15.7494 2.26744 15.7494 2.4001V2.40011Z"></path></svg>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="account-item">
                                <label>{{ __("Don't Have An Account?") }} <a href="{{ setRoute('user.register') }}" class="account-control-btn">{{ __("Register Now") }}</a></label>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="terms-item">
                                <label>{{ __("By clicking Login you are agreeing with our") }} <a href="#0">{{ __("Terms of feature") }}</a></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Account
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection

@push('script')
    
@endpush