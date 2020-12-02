@extends('layouts.home.master')
@section('content')
<div class="themes-list">
    @include('home.renders.slider')
    <div class="tieude_index">
        <p class="tt_sub">Sản phẩm</p>
        <h2 class="tt_main"><span>chúng tôi cung cấp</span></h2>
    </div>
    @if(isset($listCate) && $listCate->count() > 0)
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
    @endif
    <div class="container">
        @include('home.spinner')
        <div id="list_product">
            <div class="row list-items">
                @include('home.renders.product')
            </div>
        </div>
        <div id="loadMore" class="hidden" onclick="loadmore()">
            @include('home.spinner_small')
            <p>xem thêm</p>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
var firstCate = $('.tab_category li').first().data('slug_cate')
var currentPage = 0;
getProductsByCategory(firstCate, 'refresh', currentPage);

function loadmore() {
    let totalPage = $('[name="total_product"]').val();
    let limit = $('[name="limit_product"]').val();
    if (currentPage < Math.round(totalPage / limit) - 1) {
        currentPage++;
        clearInputHidden();
        getProductsByCategory($('.tab_category li.active').data('slug_cate'), 'loadmore', currentPage);
    } else {
        $('#loadMore').addClass('hidden');
    }
}

function clearInputHidden() {
    $('[name="total_product"]').remove();
    $('[name="limit_product"]').remove();
}

function showBtnLoadMore() {
    let totalPage = $('[name="total_product"]').val();
    let limit = $('[name="limit_product"]').val();
    if ((Math.round(totalPage / limit) - 1) > currentPage || Math.round(totalPage / limit) != 0) {
        $('#loadMore').removeClass('hidden');
    }

}

function hiddenBtnLoadMore() {
    let totalPage = $('[name="total_product"]').val();
    let limit = $('[name="limit_product"]').val();
    if ((Math.round(totalPage / limit) - 1) == currentPage || Math.round(totalPage / limit) == 0) {
        $('#loadMore').addClass('hidden');
    }
}

function getProductsByCategory(cateName, type, page) {
    $.ajax({
        url: 'ajax/render-product',
        type: 'GET',
        data: {
            slug: cateName,
            page: page
        },
        timeout: 600000,
        beforeSend: () => {
            if (type == 'loadmore') {
                $('#loadMore div').first().toggleClass('hidden');
                $('#loadMore p').addClass('hidden');
            } else {
                $('#list_product .list-items').html("");
                showSpinner();
            }
        },
        success: (result, status, xhr) => {
            if (type == 'loadmore') {
                setTimeout(() => {
                    $('#loadMore div').first().toggleClass('hidden');
                    $('#loadMore p').removeClass('hidden');
                    $('#list_product .list-items').append(result);
                    showBtnLoadMore();
                }, 1000)
            } else {
                $('#list_product .list-items').html(result);
                showBtnLoadMore();
                hideSpinner();
            }
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
        currentPage = 0;
        $('#loadMore').addClass('hidden');
        getProductsByCategory($(this).data('slug_cate'), 'refresh', 0);
    })
})
</script>
@endsection