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
                @foreach($listCate as $key => $cate)
                <li data-slug_cate="{{$cate->slug}}" data-description_cate="{{$cate->description}}"
                    class="@if($key == 0){{'active'}}@endif">
                    <a href="javascript:void(0)">{{$cate->name}}</a>
                </li>
                @endforeach
            </ul>
            <p class="desc" id="description_cate">{{$firstCate->description}}</p>
        </div>
    </div>
    <div class="container">
        @include('home.spinner')
        <div id="list_product">
            @include('home.renders.product')
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
var firstCate = $('.tab_category li').first().data('slug_cate')
// console.log("🚀 ~ file: index.blade.php ~ line 29 ~ firstCate", firstCate)
getProductsByCategory(firstCate);

function getProductsByCategory(cateName) {
    $.ajax({
        url: 'ajax/render-product',
        type: 'GET',
        data: {
            slug: cateName
        },
        timeout: 600000,
        beforeSend: () => {
            $('#list_product').html("");
            showSpinner();
        },
        success: (result, status, xhr) => {
            $('#list_product').html(result);
            hideSpinner();
        },
        error: (xhr, status, error) => {
            hideSpinner();
        },
    });
}
$(window).on('load', function() {
    $('.tab_category li').on('click', function(event) {
        $('.tab_category li').removeClass('active');
        $(this).addClass('active');
        $('#description_cate').html($(this).data('description_cate'));
        getProductsByCategory($(this).data('slug_cate'));
    })
})
</script>
@endsection