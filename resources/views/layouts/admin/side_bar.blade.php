<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('adminstrator.index')}}">
        <div class="sidebar-brand-icon">
            <img src="{{asset('admin/img/logo/logo2.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3">Admin Page</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(in_array(Route::currentRouteName(), ['adminstrator.index'])){{'active'}}@endif">
        <a class="nav-link" href="{{route('adminstrator.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Thống Kê</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Chức năng
    </div>
    <li class="nav-item @if(in_array(Route::currentRouteName(), ['category.index'])){{'active'}}@endif">
        <a class="nav-link" href="{{route('category.index')}}">
            <i class="fas fa-fw fa-columns"></i>
            <span>danh mục</span>
        </a>
    </li>

    <li class="nav-item @if(in_array(Route::currentRouteName(), ['product.index'])){{'active'}}@endif">
        <a class="nav-link" href="{{route('product.index')}}">
            <i class="fas fa-fw fa-box"></i>
            <span>sản phẩm</span>
        </a>
    </li>

    <li class="nav-item @if(in_array(Route::currentRouteName(), ['order.index'])){{'active'}}@endif">
        <a class="nav-link" href="{{route('order.index')}}">
            <i class="fas fa-fw fa-shipping-fast"></i>
            <span>đơn hàng</span>
        </a>
    </li>

    <li class="nav-item @if(in_array(Route::currentRouteName(), ['aboutme.index'])){{'active'}}@endif">
        <a class="nav-link" href="{{route('aboutme.index')}}">
            <i class="fas fa-fw fa-info"></i>
            <span>giới thiệu</span>
        </a>
    </li>

    <li class="nav-item @if(in_array(Route::currentRouteName(), ['contact.index'])){{'active'}}@endif">
        <a class="nav-link" href="{{route('contact.index')}}">
            <i class="fas fa-fw fa-address-book"></i>
            <span>liên hệ</span>
        </a>
    </li>

    <li class="nav-item @if(in_array(Route::currentRouteName(), ['banner.index'])){{'active'}}@endif">
        <a class="nav-link" href="{{route('banner.index')}}">
            <i class="fas fa-fw fa-image"></i>
            <span>banner</span>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Bootstrap UI</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Bootstrap UI</h6>
                <a class="collapse-item" href="alerts.html">Alerts</a>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="dropdowns.html">Dropdowns</a>
                <a class="collapse-item" href="modals.html">Modals</a>
                <a class="collapse-item" href="popovers.html">Popovers</a>
                <a class="collapse-item" href="progress-bar.html">Progress Bars</a>
            </div>
        </div>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
            aria-controls="collapseForm">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Forms</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Forms</h6>
                <a class="collapse-item" href="form_basics.html">Form Basics</a>
                <a class="collapse-item" href="form_advanceds.html">Form Advanceds</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tables</h6>
                <a class="collapse-item" href="simple-tables.html">Simple Tables</a>
                <a class="collapse-item" href="datatables.html">DataTables</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="ui-colors.html">
            <i class="fas fa-fw fa-palette"></i>
            <span>UI Colors</span>
        </a>
    </li> -->
    <hr class="sidebar-divider">
    <!-- <div class="version" id="version-ruangadmin"></div> -->
</ul>
<!-- Sidebar -->