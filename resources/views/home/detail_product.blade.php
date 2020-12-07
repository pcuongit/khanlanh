@extends('layouts.home.master')
@section('content')
<div class="div_breadcrumb">
    <div class="breadcrumb">
        <div class="container">
            <a href="" title="Trang chủ">Trang chủ <i class="fa fa-angle-right"></i></a>
            <a href="javascript:void(0)" title="Sản phẩm">Sản phẩm <i class="fa fa-angle-right"></i></a>
            <a href="{{route('home.products', ['slug' => $category->slug])}}"
                title="{{$category->name}}">{{$category->name}} <i class="fa fa-angle-right"></i></a>
            <span>{{$product->name}}</span>
        </div>
    </div>
</div>
<div class="container">
    <div class="box_container mb-2">
        <div class="div_info_product">

            <div class="zoom_slick  mb-4">
                <img id="zoom_img" src='{{asset($product->image_url)}}' alt="{{$product->name}}" />
                <!-- <a href="{{asset($product->image_url)}}" class="MagicZoom"><img
                        src="{{asset($product->image_url)}}"></a> -->
            </div>
            <ul class="info_product">
                <li class="my-flex-between no-border-bottom">
                    <h2 class="tieude_detail">{{$product->name}}</h2>
                </li>
                <!-- <li class="my-flex-between">
                    <span>Mã sản phẩm:</span>
                    <span><b>T1 – Chevrolet Cruze 2016 – 2019</b></span>
                </li> -->
                <li class="my-flex-between">
                    <span>Giá bán:
                        @if($product->discount_percent > 0)
                        <span class="price_bf_discount">{{number_format($product->price)}} <b>VNĐ</b></span> <i
                            class="fas fa-angle-double-right"></i>
                        @endif
                        {{number_format($product->final_amount)}}
                        <b>VNĐ</b></span>
                    <span>
                        <b class="motgia">Liên hệ</b>
                    </span>
                </li>
                <li>Mô tả: <p class="pl-3 mb-0">{{$product->description}}</p>
                </li>
                <li>
                    <p><b>Số lượng:</b></p>
                    <div class="product-qty">
                        <div>
                            <div class="controls">
                                <button class="fa fa-minus"></button>
                                <input type="text" value="1" readonly="" id="qty">
                                <button class="fa fa-plus is-up"></button>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="cart">
                            <button class="add-cart" id="add-cart" data-id="410"
                                data-name="Màn hình DVD Android KOVAR T1 – Chevrolet Cruze 2016 – 2019"
                                onclick="return addCart()">
                                <i class="fa fa-cart-plus"></i>
                                <span> Thêm vào giỏ hàng</span>
                            </button>
                        </div>
                    </div>
                </li>
                <li class="no-border-bottom">
                    <a href="gio-hang.html" class="btn-mua-ngay" onclick="return addCart()">
                        <span>Mua ngay sản phẩm này</span>
                        <span>Cam kết hàng chính hãng, thật 100%</span>
                    </a>
                    <div class="goingay no-border-bottom">Gọi ngay: 0315 762 650 Để có được giá tốt nhất</div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('home/custom/js/jquery.zoom.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.zoom_slick img')
        .wrap('<span class="zoom"></span>')
        .parent()
        .zoom({
            magnify: 2,
            // on: 'grab'
        });
});
</script>
@endsection