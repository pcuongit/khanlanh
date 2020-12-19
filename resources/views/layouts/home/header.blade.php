<header class="header">
    <div class="header-wrapper">
        <div id="top-bar" class="header-top hide-for-sticky nav-dark">
            <div class="flex-row container">
                <div class="flex-col hide-for-medium flex-left">
                    <ul class="nav nav-left medium-nav-center nav-small  nav-">
                        <li class="html custom html_topbar_left">Chào mừng bạn đến với khăn lạnh toàn phát</li>
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-center">
                    <ul class="nav nav-center nav-small  nav-"></ul>
                </div>
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="nav top-bar-nav nav-right nav-small  nav-"></ul>
                </div>
                <div class="flex-col show-for-medium flex-grow">
                    <ul class="nav nav-center nav-small mobile-nav  nav-">
                        <li class="html custom html_topbar_left">Chào mừng bạn đến với khăn lạnh toàn phát</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="masthead" class="header-main hide-for-sticky nav-dark">
            <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
                <div id="logo" class="flex-col logo">
                    <a href="{{route('home.index')}}"
                        title="Sản xuất khăn lạnh, bao tăm,.. giá rẻ nhất thị trường – khanomi.vn - Chuyên sản xuất khăn lạnh, bao tăm, ..giá rẻ nhất thị trường"
                        rel="home">
                        <img width="246" height="92" src="{{asset('/home/custom/images/logo.png')}}"
                            class="header-logo-dark lazyloaded"
                            alt="Sản xuất khăn lạnh, bao tăm,.. giá rẻ nhất thị trường – khanlanh.vn"></a>
                </div>
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left ">
                        <li class="nav-icon has-icon">
                            <a href="#" id="open_menu" data-pos="left" data-bg="main-menu-overlay" data-color=""
                                class="is-small" aria-label="Menu" aria-controls="main-menu" aria-expanded="false">
                                <i class="fas fa-bars" style="color: #fff"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-left flex-grow">
                    <ul class="header-nav header-nav-main nav nav-left  nav-uppercase">
                        <li class="header-block">
                            <div class="header-block-block-1">
                                <div class="row row-small" id="row-1055226980">
                                    <div class="col medium-8 small-12 large-8">
                                        <div class="col-inner">
                                            <div class="gap-element clearfix"
                                                style="display:block; height:auto; padding-top:22px"></div>
                                            <div class="searchform-wrapper ux-search-box relative is-normal">
                                                <div class="searchform">
                                                    <div class="flex-row relative">
                                                        <div class="flex-col search-form-categories"> 
                                                        <select class="search_categories resize-select mb-0"
                                                                name="product_cat" style="width: 54.657px;">
                                                            <option value="" >all</option>
                                                            @php
                                                                $listCate = \App\Models\Category::get();
                                                            @endphp
                                                            @foreach($listCate as $cate)
                                                            <option value="{{$cate->slug}}">{{$cate->name}}</option>
                                                            @endforeach   
                                                            </select>
                                                        </div>
                                                        <div class="flex-col flex-grow">
                                                            <label class="screen-reader-text"
                                                                for="woocommerce-product-search-field-0">Tìm
                                                                kiếm:
                                                            </label>
                                                            <input type="search" id="woocommerce-product-search-field-0"
                                                                class="search-field mb-0"
                                                                name="search_input"
                                                                placeholder="Tìm kiếm sản phẩm..." value="" name=""
                                                                autocomplete="off">
                                                            <input type="hidden" name="post_type" value="product">
                                                            <div class="search_result">
                                                                <ul></ul>
                                                            </div>
                                                        </div>
                                                        <div class="flex-col">
                                                            <button type="button" id="search" value="Tìm kiếm"
                                                                class="ux-search-submit submit-button secondary button icon mb-0 justify-content-center align-items-center d-flex">
                                                                <i class="fa fa-search" style="color: #fff"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="live-search-results text-left z-top">
                                                        <div class="autocomplete-suggestions"
                                                            style="position: absolute; display: none; max-height: 300px; z-index: 9999;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col medium-4 small-12 large-4">
                                        <div class="col-inner">
                                            <div class="gap-element clearfix"
                                                style="display:block; height:auto; padding-top:17px"></div>
                                            <div class="icon-box featured-box icon-box-left text-left">
                                                <div class="icon-box-img" style="width: 20px">
                                                    <div class="icon">
                                                        <div class="icon-inner">
                                                            <i class="fa fa-phone"></i>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="icon-box-text last-reset">
                                                    <p><strong><span style="color: #fffcfc; font-size: 80%;">Gọi đặt
                                                                hàng</span></strong></p>
                                                    <p><strong><span style="font-size: 150%; color: red;">0315 762 650</span></strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="header-nav header-nav-main nav nav-right nav-uppercase"></ul>
                </div>
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">
                        <!-- <li class="cart-item has-icon">
                            <a href="" class="header-cart-link off-canvas-toggle nav-top-link is-small"
                                data-open="#cart-popup" data-class="off-canvas-cart" title="Giỏ hàng" data-pos="right">
                                <i class="fas fa-shopping-basket" style="color: #ffff"></i>
                            </a>
                            <div id="cart-popup" class="mfp-hide widget_shopping_cart">
                                <div class="cart-popup-inner inner-padding">
                                    <div class="cart-popup-title text-center">
                                        <h4 class="uppercase">Giỏ hàng</h4>
                                        <div class="is-divider"></div>
                                    </div>
                                    <div class="widget_shopping_cart_content">
                                        <p class="woocommerce-mini-cart__empty-message">Chưa có sản phẩm trong giỏ hàng.
                                        </p>
                                    </div>
                                    <div class="cart-sidebar-content relative"></div>
                                </div>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div id="wide-nav" class="header-bottom wide-nav hide-for-sticky nav-dark flex-has-center hide-for-medium">
            <div class="flex-row container">
                <div class="flex-col hide-for-medium flex-left">
                    <ul class="nav header-nav header-bottom-nav nav-left d-block nav-size-medium nav-spacing-xlarge">
                        <div id="mega-menu-wrap" class="ot-vm-click">
                            <div id="mega-menu-title"> <i class="fas fa-bars"></i> Danh mục sản phẩm</div>
                            <ul id="mega_menu" class="sf-menu sf-vertical sf-js-enabled sf-arrows"
                                style="touch-action: pan-y;">
                                @php
                                    $listCate = \App\Models\Category::get();
                                @endphp
                                @foreach($listCate as $item)
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom">
                                        <a href="{{ route('home.products', ['slug' => $item->slug]) }}">
                                            {{$item->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-center">
                    <ul class="nav header-nav header-bottom-nav nav-center  nav-size-medium nav-spacing-xlarge">
                        <li id="menu-item-105"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item active  menu-item-105">
                            <a href="{{route('home.index')}}" class="nav-top-link">Trang chủ</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a
                                href="{{route('home.aboutme.index')}}" class="nav-top-link">Giới thiệu</a></li>
                        @php
                            $firstCate = \App\Models\Category::first();
                        @endphp
                        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a
                                href="{{ route('home.products', ['slug' => $firstCate->slug]) }}" class="nav-top-link">Sản phẩm</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a
                                href="{{route('home.contact.index')}}" class="nav-top-link">Liên hệ</a></li>
                    </ul>
                </div>
                <!-- <div class="flex-col hide-for-medium flex-right flex-grow">
                    <ul class="nav header-nav header-bottom-nav nav-right  nav-size-medium nav-spacing-xlarge">
                        <li class="cart-item has-icon has-dropdown"><a href="https://khanomi.vn/gio-hang/"
                                title="Giỏ hàng" class="header-cart-link is-small"><span class="header-cart-title"> Giỏ
                                    hàng </span> <i class="fas fa-shopping-basket" data-icon-label="0">
                                </i> </a>
                            <ul class="nav-dropdown nav-dropdown-default" style="">
                                <li class="html widget_shopping_cart">
                                    <div class="widget_shopping_cart_content">

                                        <p class="woocommerce-mini-cart__empty-message">Chưa có sản phẩm trong giỏ hàng.
                                        </p>


                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</header>
<div class="mfp-bg off-canvas off-canvas-left main-menu-overlay" id="sidebar_bg"></div>
<div class="mfp-wrap mfp-auto-cursor off-canvas off-canvas-left" id="sidebar_bg_2" tabindex="-1" style="overflow: hidden auto;">
    <div class="mfp-container mfp-s-ready mfp-inline-holder">
        <div class="mfp-content">
            <div id="main-menu" class="mobile-sidebar no-scrollbar">
                <div class="sidebar-menu no-scrollbar ">
                    <ul class="nav nav-sidebar  nav-vertical nav-uppercase">
                        @php
                            $firstCate = \App\Models\Category::first();
                        @endphp
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home"><a href="" class="nav-top-link">Trang chủ</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{route('home.aboutme.index')}}" class="nav-top-link">Giới thiệu</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('home.products', ['slug' => $firstCate->slug]) }}" class="nav-top-link">Sản phẩm</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{route('home.contact.index')}}" class="nav-top-link">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close" id="close_menu">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
</div>
<div class="mfp-bg off-canvas undefined off-canvas-left" id="filter_bg"></div>
<div class="mfp-wrap mfp-auto-cursor off-canvas undefined off-canvas-left" id="filter_bg_2" tabindex="-1" style="overflow: hidden auto;">
    <div class="mfp-container mfp-s-ready mfp-inline-holder">
        <div class="mfp-content">
            <div id="shop-sidebar" class="sidebar-inner col-inner">
                <aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
                    <span class="widget-title shop-sidebar">Danh mục sản phẩm</span>
                    <div class="is-divider small"></div>
                    <ul class="product-categories">
                        @foreach($listCate as $cate)
                        <li class="cat-item @if(isset($category) && $cate->id === $category->id) {{'current-cat active'}} @endif">
                            <a class="mw-200" href="{{route('home.products', ['slug' => $cate->slug])}}">{{$cate->name}}</a>
                            <span class="count">({{$cate->count}})</span>
                        </li>
                        @endforeach
                    </ul>
                </aside>
            </div>
        </div>
        <div class="mfp-preloader">Loading...</div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close" id="close_filter">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
</div>
<script>
var mobileStatus = false;
checkWidth();
$( window ).resize(function() {
    checkWidth();
});
function checkWidth() {
    let width = $( window ).width();
    if (width <= 849) {
        mobileStatus = true;
    } else {
        mobileStatus = false;
    }
}
function openMenu() {
    if(mobileStatus) {
        $('#sidebar_bg').toggleClass('mfp-ready')
        $('#sidebar_bg_2').toggleClass('mfp-ready')
        $('#sidebar_bg_2 button').toggleClass('d-block')
    }
}
$('#open_menu').on('click', function(e) {
    openMenu();
})
$('#close_menu').on('click', function(e) {
    openMenu();
})

$('#mega-menu-title').on('click', function(e) {
    $('#mega_menu').toggleClass('active');
})
$('#woocommerce-product-search-field-0').on('keyup', function(e) {
    let slug_cate = $('[name=product_cat]').val();
    let search_text = $('[name=search_input]').val();
    if(e.keyCode === 13) {
        search(slug_cate,search_text);
    }
})
$('#search').on('click',function(e){
    let slug_cate = $('[name=product_cat]').val();
    let search_text = $('[name=search_input]').val();
    search(slug_cate,search_text);
})
</script>