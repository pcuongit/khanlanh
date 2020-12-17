@extends('layouts.home.master')
@section('breadcrumb')
<div class="shop-page-title category-page-title page-title ">
    <div class="page-title-inner flex-row  medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-medium">
                <nav class="woocommerce-breadcrumb breadcrumbs uppercase">
                    <a href="{{route('home.index')}}">Trang chủ</a>
                    <span class="divider">/</span> {{$category->name}}
                </nav>
            </div>
            <div class="category-filtering category-filter-row show-for-medium"> 
                <a href="javascript:void(0)" id="open_sidebar" data-visible-after="true" data-pos="left" class="filter-button uppercase plain"> 
                    <i class="fas fa-filter"></i> 
                    <strong>Lọc</strong> 
                </a>
                <div class="inline-block"></div>
            </div>
        </div>
        <!-- <div class="flex-col medium-text-center">
            <p class="woocommerce-result-count hide-for-medium"> Showing all 8 results</p>
            <form class="woocommerce-ordering" method="get"> <select name="orderby" class="orderby"
                    aria-label="Đơn hàng của cửa hàng">
                    <option value="menu_order" selected="selected">Thứ tự mặc định</option>
                    <option value="popularity">Thứ tự theo mức độ phổ biến</option>
                    <option value="rating">Thứ tự theo điểm đánh giá</option>
                    <option value="date">Mới nhất</option>
                    <option value="price">Thứ tự theo giá: thấp đến cao</option>
                    <option value="price-desc">Thứ tự theo giá: cao xuống thấp</option>
                    </select> <input type="hidden" name="paged" value="1">
            </form>
        </div> -->
    </div>
</div>
@endsection
@section('content')
<div class="row category-page-row">
    <div class="col large-3 hide-for-medium ">
        <div id="shop-sidebar" class="sidebar-inner col-inner">
            <aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories"><span
                    class="widget-title shop-sidebar">Danh mục sản phẩm</span>
                <div class="is-divider small"></div>
                <ul class="product-categories">
                    @foreach($listCate as $cate)
                    <li class="cat-item @if($cate->id === $category->id) {{'current-cat active'}} @endif">
                        <a class="mw-200" href="{{route('home.products', ['slug' => $cate->slug])}}">{{$cate->name}}</a>
                        <span class="count">({{$cate->count}})</span>
                    </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
    <div class="col large-9">
        <div class="shop-container">
            <div class="woocommerce-notices-wrapper"></div>
            <div class="woof_products_top_panel" style="display: none;"></div>
            <div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-equal-box-heights">
                @foreach($products as $product)
                <div
                    class="product-small col has-hover product type-product post-1189 status-publish first instock product_cat-khan-lanh-mang-ghep has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                    <div class="col-inner">
                        <div class="badge-container absolute left top z-1">
                            <div class="callout badge badge-square">
                                <div class="badge-inner secondary on-sale"><span
                                        class="onsale">-{{$product->discount_percent}}%</span></div>
                            </div>
                        </div>
                        <div class="product-small box ">
                            <div class="box-image">
                                <div class="image-zoom"> <a
                                        href="{{route('product.detail_product', ['slug_cate' => $category->slug, 'slug_product' => $product->slug])}}">
                                        <img width="300" height="300" src="/{{$product->image_url}}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazy-load-active"
                                            alt="" sizes="(max-width: 300px) 100vw, 300px">
                                    </a>
                                </div>
                                <div class="image-tools is-small top right show-on-hover"></div>
                                <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                                <div
                                    class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                </div>
                            </div>
                            <div class="box-text box-text-products">
                                <div class="title-wrapper">
                                    <p class="name product-title">
                                        <a href="">{{$product->name}}</a>
                                    </p>
                                </div>
                                <div class="price-wrapper"> <span class="price">
                                        <del>
                                            <span class="woocommerce-Price-amount amount">
                                                {{number_format($product->price)}}
                                                <span class="woocommerce-Price-currencySymbol">₫</span>
                                            </span>
                                        </del>
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                {{number_format($product->final_amount)}}
                                                <span class="woocommerce-Price-currencySymbol">₫</span>
                                            </span>
                                        </ins>
                                </div>
                                <div class="add-to-cart-button">
                                    <a href="?add-to-cart=1189" data-quantity="1"
                                        class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-flat"
                                        data-product_id="1189" data-product_sku=""
                                        aria-label="Thêm “{{$product->name}}” vào giỏ hàng" rel="nofollow">Mua
                                        hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
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
function openFilter() {
    if(mobileStatus) {
        $('#filter_bg').toggleClass('mfp-ready')
        $('#filter_bg_2').toggleClass('mfp-ready')
        $('#filter_bg_2 button').toggleClass('d-block')
    }
}

$('#open_sidebar').on('click', function(e) {
    openFilter();
})
$('#close_filter').on('click', function(e) {
    openFilter();
})
</script>
@endsection