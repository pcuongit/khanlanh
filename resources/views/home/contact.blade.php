@extends('layouts.home.master')
@section('content')
@extends('layouts.home.master')
@section('content')
<div class="page-wrapper page-right-sidebar">
    <div class="row">
        <div id="content" class="large-9 left col col-divided" role="main">
            <div class="page-inner">
                @if(isset($contact) && $contact->count()) {!! $contact->description !!} @endif
            </div>
        </div>
        <div class="large-3 col">
            <div id="secondary" class="widget-area " role="complementary">
                <!-- <aside id="text-3" class="widget widget_text">
                    <span class="widget-title "><span>Bài viết liên quan</span></span>
                    <div class="is-divider small"></div>
                    <div class="textwidget"></div>
                </aside>
                <aside id="flatsome_recent_posts-2" class="widget flatsome_recent_posts">
                    <span class="widget-title "><span>Recent Posts</span></span>
                    <div class="is-divider small"></div>
                    <ul>
                        <li class="recent-blog-posts-li">
                            <div class="flex-row recent-blog-posts align-top pt-half pb-half">
                                <div class="flex-col mr-half">
                                    <div class="badge post-date  badge-square">
                                        <div class="badge-inner bg-fill" style="background: url(https://khanomi.vn/wp-content/uploads/2019/07/khanomi-150x150.jpg); border:0;"></div>
                                    </div>
                                </div>
                                <div class="flex-col flex-grow"> <a href="https://khanomi.vn/khan-lanh-man-ngoc-omi/" title="KHĂN LẠNH MÀN NGỌC OMI">KHĂN LẠNH MÀN NGỌC OMI</a> <span class="post_comments op-7 block is-xsmall"><a href="https://khanomi.vn/khan-lanh-man-ngoc-omi/#respond"></a></span></div>
                            </div>
                        </li>
                    </ul>
                </aside> -->
                <aside id="text-4" class="widget widget_text">
                    <span class="widget-title "><span>Sản phẩm mới</span></span>
                    <div class="is-divider small"></div>
                    <div class="textwidget"></div>
                </aside>
                <aside id="woocommerce_products-3" class="widget woocommerce widget_products">
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
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection