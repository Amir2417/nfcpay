<nav class="navbar-wrapper">
    <div class="dashboard-title-part">
        <div class="left">
            <div class="icon">
                <button class="sidebar-menu-bar">
                    <i class="fas fa-exchange-alt"></i>
                </button>
            </div>
            <div class="dashboard-path">
                @yield('breadcrumb')
            </div>
        </div>
        <div class="right">
            @php
                $current_url  = URL::current();
            @endphp
            @if ($current_url  == setRoute('user.payment.index'))
                <form class="header-search-wrapper">
                    <div class="position-relative">
                        <input class="form-control" type="text" placeholder="{{ __("Ex: Payments") }}" aria-label="Search">
                        <span class="las la-search"></span>
                    </div>
                </form>
            @endif
            <div class="header-notification-wrapper">
                <button class="notification-icon">
                    <i class="las la-bell"></i>
                </button>
                <div class="notification-wrapper">
                    <div class="notification-header">
                        <h5 class="title">{{ __("Notification") }}</h5>
                    </div>
                    <ul class="notification-list">
                        <li>
                            <div class="thumb">
                                <img src="{{ asset('public/frontend') }}/images/user/user-1.png" alt="user">
                            </div>
                            <div class="content">
                                <div class="title-area">
                                    <h6 class="title">Cristina Pride</h6>
                                    <span class="time">Thu 3.30PM</span>
                                </div>
                                <span class="sub-title">Hi, How are you? What about our next meeting</span>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="header-user-wrapper">
                <div class="header-user-thumb">
                    <a href="{{ setRoute('user.profile.index') }}"><img src="{{ auth()->user()->userImage ?? asset('public/frontend/images/user/user-1.png') }}" alt="user"></a>
                </div>
            </div>
        </div>
    </div>
</nav>