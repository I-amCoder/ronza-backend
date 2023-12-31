<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('front.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('settings.site_name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ activeRoute('home') }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Site
    </div>
    <li class="nav-item {{ activeRoute('category.index') }}">
        <a class="nav-link " href="{{ route('category.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Categories</span></a>
    </li>
    <li class="nav-item {{ activeRoute(['products.index', 'products.edit', 'products.create']) }}">
        <a class="nav-link" href="{{ route('products.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Products</span></a>
    </li>


    <li class="nav-item {{ activeRoute('site.banners') }}">
        <a class="nav-link" href="{{ route('site.banners') }}">
            <i class="fas fa-home"></i>

            <span>Site Banners</span></a>
    </li>
    <li class="nav-item {{ activeRoute('site.carousel') }}">
        <a class="nav-link" href="{{ route('site.carousel') }}">
            <i class="fas fa-home"></i>
            <span>Main Carousel</span></a>
    </li>

    {{-- <li class="nav-item @yield('frontend')">
        <a class="nav-link" href="{{ route('site.settings') }}">
            <i class="fas fa-home"></i>
            <span>Site Settings</span></a>
    </li>

    <li class="nav-item @yield('frontend')">
        <a class="nav-link" href="{{ route('site.settings') }}">
            <i class="fas fa-home"></i>
            <span>Site Settings</span></a>
    </li> --}}
    <li class="nav-item {{ activeRoute('site.settings') }}">
        <a class="nav-link" href="{{ route('site.settings') }}">
            <i class="fas fa-home"></i>
            <span>Site Settings</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Utilities Collapse Menu -->







    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
