@extends('layouts.home.master')
@section('css')
<link rel="stylesheet" href="{{ asset('home/custom/css/magiczoomplus.css')}}" />
@endsection
@section('content')
<div class="div_breadcrumb">
    <div class="breadcrumb">
        <div class="container">
            <a href="" title="Trang chủ">Trang chủ <i class="fa fa-angle-right"></i></a>
            <a href="san-pham.html" title="Sản phẩm">Sản phẩm <i class="fa fa-angle-right"></i></a>
            <a href="san-pham/man-hinh-dvd-android-kovar-t1" title="Màn hình DVD Android KOVAR T1">Màn hình DVD Android
                KOVAR T1 <i class="fa fa-angle-right"></i></a>
            <span>Màn hình DVD Android KOVAR T1 – Chevrolet Cruze 2016 – 2019</span>
        </div>
    </div>
</div>
<div class="container">
    <div class="box_container">
        <div class="div_info_product">
            <div class="zoom_slick">
                <a href="http://dcstoredn.com/upload/sanpham/chevrolet-cruze-2016-2019-dcstoredn-0301.jpg"
                    id="img_product" class="MagicZoom" data-options="expandZoomMode: off;">
                    <figure class="mz-figure mz-hover-zoom mz-ready"><img
                            src="http://dcstoredn.com/upload/sanpham/chevrolet-cruze-2016-2019-dcstoredn-0301.jpg"
                            alt="Công Ty TNHH Kinh Doanh Và Công Nghệ DC"
                            style="max-width: 1200px; max-height: 1200px;">
                        <div class="mz-lens"
                            style="top: 0px; transform: translate(-10000px, -10000px); width: 284px; height: 284px;">
                            <img src="http://dcstoredn.com/upload/sanpham/chevrolet-cruze-2016-2019-dcstoredn-0301.jpg"
                                style="position: absolute; top: 0px; left: 0px; width: 583px; height: 583px; transform: translate(-111px, -1px);">
                        </div>
                        <div class="mz-hint mz-hint-hidden"><span class="mz-hint-message">Click to expand</span></div>
                    </figure>
                </a>
                <div class="mini_img_product slick-initialized slick-slider" id="sl_hinhthem">
                    <div aria-live="polite" class="slick-list draggable">
                        <div class="slick-track" role="listbox"
                            style="opacity: 1; width: 0px; transform: translate3d(0px, 0px, 0px);"></div>
                    </div>
                </div>
            </div>
            <ul class="info_product">
                <li class="my-flex-between no-border-bottom">
                    <h2 class="tieude_detail">Màn hình DVD Android KOVAR T1 – Chevrolet Cruze 2016 – 2019</h2>
                </li>

                <li class="my-flex-between">
                    <span>Mã sản phẩm:</span>
                    <span><b>T1 – Chevrolet Cruze 2016 – 2019</b></span>
                </li>
                <li class="my-flex-between">
                    <span>Giá bán:</span>
                    <span>
                        <b class="motgia">Liên hệ</b>

                    </span>
                </li>
                <li>Mô tả</li>
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
                    <div class="goingay no-border-bottom">Gọi ngay: 0934.757.138 Để có được giá tốt nhất</div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection