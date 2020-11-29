@if(isset($list))
<div class="row list-items">
    @foreach($list as $item)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="theme-item responsive">
            <div class="theme-image">
                <img src="{{asset($item->image_url)}}">
                <div class="discount">
                    <b>{{$item->discount_percent}}%</b>
                </div>
                <div class="theme-action">
                    <div class="button">
                        <a href="/demo/oh-bach-hoa" class="view-demo action-preview-theme btn-registration"
                            data-url="https://oh-bach-hoa.mysapo.net/" target="_blank">Xem thử</a>
                        <a href="/oh-bach-hoa" class="view-detail btn-registration">Chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="theme-info">
                <h3><a href="/oh-bach-hoa" class="title">{{$item->name}}</a></h3>
                <span class="price ">
                    <b>{{$item->price}}</b> <sub>vnđ</sub></b>
                </span>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif