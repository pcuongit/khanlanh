@extends('layouts.home.master')
@section('slider')
@include('home.renders.slider')
@endsection
@section('content')
@foreach($listCate as $item)
<section class="section thoi-trang-nam" id="section_783796966">
    <div class="bg section-bg fill bg-fill  bg-loaded"></div>
    <div class="section-content relative">
        <div class="gap-element clearfix" style="display:block; height:auto; padding-top:30px"></div>
        <div class="row row-small tieu-de" id="row-880967037">
            <div class="col cot3 medium-6 small-12 large-6">
                <div class="col-inner" style="padding:0px 0px 0 0px;margin:0px 0px 0 0px;">
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1254917957">
                        <div class="img-inner image-cover dark" style="padding-top:190%;">
                            <img width="287" height="485"
                                src="{{asset($item->image_url)}}"
                                sizes="(max-width: 287px) 100vw, 287px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col sub-menu small-12 large-12">
                <div class="col-inner text-right" style="padding:0px 0px 0 0px;margin:0px 0px 0 0px;">
                    <div class="tabbed-content">
                        <ul class="nav nav-line-grow nav-uppercase nav-size-normal nav-left">
                            <li class="tab active has-icon">
                                <a href="#{{$item->slug}}">
                                    <span>{{$item->name}}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-panels">
                            <div class="panel active entry-content">
                                <div class="row large-columns-4 medium-columns- small-columns-2 row-small has-shadow row-box-shadow-2-hover">
                                    @foreach($item->products as $product)
                                    <div class="col">
                                        <div class="col-inner">
                                            <div class="badge-container absolute left top z-1">
                                                <div class="callout badge badge-square">
                                                    <div class="badge-inner secondary on-sale"><span
                                                            class="onsale">-{{$product->discount_percent}}%</span></div>
                                                </div>
                                            </div>
                                            <div class="product-small box has-hover box-normal box-text-bottom">
                                                <div class="box-image">
                                                    <div class="image-overlay-add image-cover"
                                                        style="padding-top:100%;">
                                                        <a
                                                            href="{{route('product.detail_product', ['slug_cate' => $item->slug, 'slug_product' => $product->slug])}}">
                                                            <img width="1280" height="960" src="{{$product->image_url}}"
                                                                class="attachment-original size-original lazy-load-active"
                                                                alt="" sizes="(max-width: 1280px) 100vw, 1280px">
                                                        </a>
                                                        <div class="overlay fill"
                                                            style="background-color: rgba(0, 0, 0, 0.14)"></div>
                                                    </div>
                                                    <div class="image-tools top right show-on-hover"></div>
                                                    <div
                                                        class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                    </div>
                                                </div>
                                                <div class="box-text text-left"
                                                    style="background-color:rgb(255, 255, 255);padding:7px 7px 15px 7px;">
                                                    <div class="title-wrapper">
                                                        <p class="name product-title">
                                                            <a
                                                                href="{{route('product.detail_product', ['slug_cate' => $item->slug, 'slug_product' => $product->slug])}}">{{$product->name}}</a>
                                                        </p>
                                                    </div>
                                                    <div class="price-wrapper">
                                                        <span class="price">
                                                            <del>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    {{number_format($product->price)}}<span
                                                                        class="woocommerce-Price-currencySymbol">₫</span>
                                                                </span>
                                                            </del>
                                                            <ins>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    {{number_format($product->final_amount)}}
                                                                    <span class="woocommerce-Price-currencySymbol">₫
                                                                    </span>
                                                                </span></ins>
                                                        </span>
                                                    </div>
                                                    <div class="add-to-cart-button">
                                                        <a href="{{route('product.detail_product', ['slug_cate' => $item->slug, 'slug_product' => $product->slug])}}" data-quantity="1"
                                                            class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-flat"
                                                            data-product_id=""
                                                            aria-label="Thêm “{{$product->name}}” vào giỏ hàng"
                                                            rel="nofollow">Mua hàng</a>
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
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
@endsection
@section('scripts')
<script>

</script>
@endsection