@extends('layouts.home.master')
@section('content')
<div class="themes-list">
    @include('home.renders.slider')
    <div class="tieude_index">
        <p class="tt_sub">Sản phẩm</p>
        <h2 class="tt_main"><span>chúng tôi cung cấp</span></h2>
    </div>
    <div class="index-title login-box">
        <div class="container">
            <ul class="tab_category">
                @foreach($listCate as $cate)
                <li>
                    <a href="{{route('home.products', ['slug' => $cate->slug])}}">{{$cate->name}}</a>
                </li>
                @endforeach
            </ul>
            <p class="desc">Những mẫu web bán hàng được nhiều người dùng nhất</p>
        </div>
    </div>
    <div class="container">
        @include('home.renders.product')
    </div>
</div>
@endsection