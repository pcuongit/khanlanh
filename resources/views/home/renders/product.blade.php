@if(isset($list))
@if(count($list) > 0)
@foreach($list as $item)
<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
    <div class="theme-item responsive">
        <div class="theme-image">
            <img src="{{asset($item->image_url)}}" onError="this.onerror=null;this.src='/assets_common/images/no-image.png';">
            <div class="discount">
                <b>{{$item->discount_percent}}%</b>
            </div>
            <div class="theme-action">
                <div class="button">
                    <a href="/demo/oh-bach-hoa" class="view-demo action-preview-theme btn-registration"
                        data-url="https://oh-bach-hoa.mysapo.net/" target="_blank">Xem thử</a>
                    <a href="{{route('product.detail_product', ['slug_cate' => $item->slug_cate, 'slug_product' => $item->slug])}}"
                        class="view-detail btn-registration">Chi tiết</a>
                </div>
            </div>
        </div>
        <div class="theme-info">
            <h3><a href="/oh-bach-hoa" class="title">{{$item->name}}</a></h3>
            <span class="price ">
                <b>{{number_format($item->price)}}</b> <sub>vnđ</sub></b>
            </span>
        </div>
    </div>
</div>
@endforeach
@else
<p>không tồn tại sản phẩm nào</p>
@endif
<input type="hidden" name="total_product" value="{{$totalProducts}}">
<input type="hidden" name="limit_product" value="{{$limit}}">
@endif