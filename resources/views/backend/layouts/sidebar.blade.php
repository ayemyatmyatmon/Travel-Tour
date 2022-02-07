<div class="app-header__logo">
    <div class="logo-src"></div>
    <div class="header__pane ml-auto">
        <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
</div>

<div class="app-header__mobile-menu">
    <div>
        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div>
</div>

<div class="app-header__menu">
    <span>
        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
                <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
        </button>
    </span>
</div>

<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboards</li>

            <li>
                <a href="{{route('home')}}" class="@yield('dashboard')">
                    <i class="metismenu-icon pe-7s-home"></i> Dashboard
                </a>
            </li>

            <li>
                <a href="{{route('adminuser.index')}}" class="@yield('adminuser')">
                    <i class=" metismenu-icon pe-7s-users"></i> Admin User
                </a>
            </li>

            <li>
                <a href="{{route('city.index')}}" class="@yield('city')">
                    <i class=" metismenu-icon pe-7s-map"></i> City
                </a>
            </li>

            <li>
                <a href="{{route('bus.index')}}" class="@yield('bus')">
                    <i class=" metismenu-icon pe-7s-car"></i> Bus Operator
                </a>
            </li>

            <li>
                <a href="{{route('level.index')}}" class="@yield('level')">
                    <i class=" metismenu-icon pe-7s-car"></i> Bus Level
                </a>
            </li>

            <li>
                <a href="{{route('bustype.index')}}" class="@yield('bustype')">
                    <i class=" metismenu-icon pe-7s-car"></i> Bus Type
                </a>
            </li>

            <li>
                <a href="{{route('hotel.index')}}" class="@yield('hotel')">
                    <i class=" metismenu-icon pe-7s-culture"></i> Hotels
                </a>
            </li>

            <li>
                <a href="{{route('day.index')}}" class="@yield('day')">
                    <i class=" metismenu-icon pe-7s-date"></i> Day Page
                </a>
            </li>

            <li>
                <a href="{{route('schedule.index')}}" class="@yield('schedule')">
                    <i class=" metismenu-icon pe-7s-car"></i>Bus Schedule
                </a>
            </li>

            <li>
                <a href="{{route('package.index')}}" class="@yield('package')">
                    <i class=" metismenu-icon pe-7s-next-2"></i> Package
                </a>
            </li>

            <li>
                <a href="{{route('packagedetail.index')}}" class="@yield('packagedetail')">
                    <i class=" metismenu-icon pe-7s-next-2"></i> Package Detail
                </a>
            </li>
            <li>
                <a href="{{route('booking.index')}}" class="@yield('booking')">
                    <i class=" metismenu-icon pe-7s-next-2"></i> Booking Detail
                </a>
            </li>
            <li>
                <a href="{{route('contactus')}}" class="@yield('contactus')">
                    <i class=" metismenu-icon pe-7s-global"></i> Contact Us
                </a>
            </li>

        </ul>
    </div>
</div>
