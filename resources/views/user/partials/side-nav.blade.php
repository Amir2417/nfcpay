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
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="payments.html">
                            <i class="menu-icon las la-credit-card"></i>
                            <span class="menu-title">Payments</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="2fa.html">
                            <i class="menu-icon las la-qrcode"></i>
                            <span class="menu-title">2FA Security</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="login.html">
                            <i class="menu-icon las la-sign-out-alt"></i>
                            <span class="menu-title">Logout</span>
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
                <h5 class="title">Need Help?</h5>
                <p>Please check our docs</p>
                <div class="sidebar-doc-btn">
                    <a href="support-tickets.html" class="btn--base w-100"><span class="w-100 text-center">Get Support</span></a>
                </div>
            </div>
        </div>
    </div>
</div>