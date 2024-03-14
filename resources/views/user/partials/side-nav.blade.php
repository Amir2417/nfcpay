<div class="sidebar bg_img" data-background="{{ asset('public/frontend') }}/images/banner/bg.jpg">
    <div class="sidebar-inner">
        <div class="sidebar-area">
            <div class="sidebar-logo">
                <a href="{{ setRoute('frontend.index') }}" class="sidebar-main-logo">
                    <img src="{{ get_logo($basic_settings) }}" data-white_img="{{ asset($basic_settings) }}"
                    data-dark_img="{{ get_logo($basic_settings,"dark") }}" alt="logo">
                </a>
                <button class="sidebar-menu-bar">
                    <i class="fas fa-exchange-alt"></i>
                </button>
            </div>
            <div class="sidebar-menu-wrapper">
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a href="{{ setRoute('user.dashboard') }}">
                            <i class="menu-icon las la-palette"></i>
                            <span class="menu-title">{{ __("Dashboard") }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="payments.html">
                            <i class="menu-icon las la-credit-card"></i>
                            <span class="menu-title">{{ __("Payments") }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="2fa.html">
                            <i class="menu-icon las la-qrcode"></i>
                            <span class="menu-title">{{ __("2FA Security") }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="javascript:void(0)" class="logout-btn">
                            <i class="menu-icon las la-sign-out-alt"></i>
                            <span class="menu-title">{{ __("Logout") }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-doc-box bg_img" data-background="{{ asset('public/frontend') }}/images/element/side-bg.avif">
            <div class="sidebar-doc-icon">
                <i class="fas fa-question-circle"></i>
            </div>
            <div class="sidebar-doc-content">
                <h5 class="title">{{ __("Need Help?") }}</h5>
                <p>{{ __("Please check our docs") }}</p>
                <div class="sidebar-doc-btn">
                    <a href="support-tickets.html" class="btn--base w-100"><span class="w-100 text-center">{{ __("Get Support") }}</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    $(".logout-btn").click(function(){
      
        var actionRoute = "{{ setRoute('user.logout') }}";
        var target      = 1;
        var message     = `{{ __("Are you sure to") }} <strong>{{ __("Logout") }}</strong>?`;
  
        openAlertModal(actionRoute,target,message,"Logout","POST");
    });
  </script>
@endpush