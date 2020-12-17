@extends('layouts.home.master')
@section('content')
<div class="shop-container">
    <div class="container">
        <div class="woocommerce-notices-wrapper"></div>
    </div>
    <div id="product-1180"
        class="product type-product post-1180 status-publish first instock product_cat-khan-lanh-mang-ngoc product_tag-khan-lanh-mang-ngoc has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
        <div class="row content-row row-divided row-large row-reverse">
            <div id="product-sidebar" class="col large-3 hide-for-medium shop-sidebar ">
                <aside id="woocommerce_products-2" class="widget woocommerce widget_products">
                    <span class="widget-title shop-sidebar">Có thể bạn thích</span>
                    <div class="is-divider small"></div>
                    <ul class="product_list_widget">
                        @foreach($randomProduct as $item)
                        <li>
                            <a href="{{route('product.detail_product', ['slug_cate' => $item->slug_cate, 'slug_product' => $item->slug])}}">
                                <img width="100" height="100"
                                    src="{{asset($item->image_url)}}"
                                    class="lazy-load attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail"
                                    alt="" srcset=""
                                    sizes="(max-width: 100px) 100vw, 100px"> 
                                    <span class="product-title">{{$item->name}}</span>
                            </a> 
                            <!-- <span class="amount">Liên hệ</span> -->
                            <del>
                                <span class="woocommerce-Price-amount amount">
                                    {{number_format($item->price)}}
                                    <span class="woocommerce-Price-currencySymbol">₫</span>
                                </span>
                            </del> 
                            <ins>
                                <span class="woocommerce-Price-amount amount">
                                    {{number_format($item->final_amount)}}
                                    <span class="woocommerce-Price-currencySymbol">₫</span>
                                </span>
                            </ins>
                        </li>
                        @endforeach
                    </ul>
                </aside>
            </div>
            <div class="col large-9">
                <div class="product-main">
                    <div class="row">
                        <div class="large-5 col">
                            <div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                data-columns="4" style="opacity: 1;">
                                <div class="badge-container is-larger absolute left top z-1">
                                    <div class="callout badge badge-square">
                                        <div class="badge-inner secondary on-sale">
                                            <span class="onsale">-{{$product->discount_percent}}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-tools absolute top show-on-hover right z-3"></div>
                                <figure
                                    class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half flickity-enabled slider-lazy-load-active"
                                    tabindex="0">
                                    <div class="flickity-viewport" style="height: 258.422px; touch-action: pan-y;">
                                        <div class="flickity-slider" style="left: 0px; transform: translateX(0%);">
                                            <div class="woocommerce-product-gallery__image slide first is-selected"
                                                aria-selected="true" style="position: absolute; left: 0%;">
                                                <a href="/{{$product->image_url}}">
                                                    <img width="600" height="450" src="/{{$product->image_url}}"
                                                        class="wp-post-image skip-lazy lazy-load-active" alt=""
                                                        title="6" data-caption="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="flickity-button flickity-prev-next-button previous" type="button"
                                        disabled="" aria-label="Previous">
                                        <svg class="flickity-button-icon" viewBox="0 0 100 100">
                                            <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow">
                                            </path>
                                        </svg>
                                    </button>
                                    <button class="flickity-button flickity-prev-next-button next" type="button"
                                        disabled="" aria-label="Next">
                                        <svg class="flickity-button-icon" viewBox="0 0 100 100">
                                            <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"
                                                transform="translate(100, 100) rotate(180) "></path>
                                        </svg>
                                    </button>
                                </figure>
                            </div>
                        </div>
                        <div class="product-info summary entry-summary col col-fit product-summary">
                            <nav class="woocommerce-breadcrumb breadcrumbs uppercase">
                                <a href="{{route('home.index')}}">Trang chủ</a>
                                <span class="divider">/</span>
                                <a href="https://khanomi.vn/danh-muc/khan-lanh-mang-ngoc/">{{$category->name}}</a>
                            </nav>
                            <h1 class="product-title product_title entry-title">{{$product->name}}</h1>
                            <div class="price-wrapper">
                                <p class="price product-page-price price-on-sale">
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
                                </p>
                            </div>
                            <div class="product-short-description">
                                <p>{{$product->description}}</p>
                            </div>
                            <button type="submit" style="background: #ff1515d1;font-weight: bold;" 
                                    class="single_add_to_cart_button button alt">Liên Hệ</button>
                            <!-- <form class="cart" action="" method="post" enctype="multipart/form-data">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus button is-form" id="minus_quantity">
                                    <label class="screen-reader-text" for="">Khăn lạnh màng ngọc –
                                        Mẫu 03 số lượng</label>
                                    <input type="number" class="input-text qty text"
                                        step="1" min="1" max="999999" name="quantity" value="1" title="SL" size="4"
                                        inputmode="numeric">
                                    <input type="button" value="+" class="plus button is-form" id="plus_quantity">
                                </div>
                                <button type="submit" name="add-to-cart" value="1180"
                                    class="single_add_to_cart_button button alt">Thêm vào giỏ hàng</button>
                            </form> -->
                            <div class="product_meta">
                                <span class="tagged_as">Từ khóa:
                                    <a href="{{route('product.index', ['slug' => $category->name])}}"
                                        rel="tag">{{$product->name}}</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('#minus_quantity').click(function() {
        let el = $('[name=quantity]');
        if(el.val() > 1) {
            el.val(parseInt(el.val()) - 1);
        } 
        
    })
    $('#plus_quantity').click(function() {
        let el = $('[name=quantity]');
        if(el.val() < 999999) {
            el.val(parseInt(el.val()) + 1);
        } 
    })
</script>
@endsection