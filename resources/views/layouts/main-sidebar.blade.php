<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="main-logo dark-theme"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="{{ URL::asset('assets/img/faces/6.jpg') }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">Petey Cruiser</h4>
                    <span class="mb-0 text-muted">Premium Member</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="slide">
                <a class="side-menu__item" href="{{ route('dashboard') }}">
                    <i class="fa fa-home mr-2" style="font-size: 20px"></i>
                    <span class="side-menu__label">Dashboard</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('brands.index') }}">
                    <i class="fa fa-image mr-2" style="font-size: 20px"></i>
                    <span class="side-menu__label">Brands</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('portfolio.index') }}">
                    <i class="fa fa-layer-group mr-2" style="font-size: 20px"></i>
                    <span class="side-menu__label">Portfolio</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('developer.index') }}">
                    <i class="fa fa-user mr-2" style="font-size: 20px"></i>
                    <span class="side-menu__label">Developer</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('contact_us.index') }}">
                    <i class="fa fa-envelope mr-2" style="font-size: 20px"></i>
                    <span class="side-menu__label">Contact us</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('setting.index') }}">
                    <i class="icon ion-ios-settings mr-2" style="font-size: 20px"></i>
                    <span class="side-menu__label">Setting</span></a>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
