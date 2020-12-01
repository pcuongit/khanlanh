<div class="main-header">
    @php
    $listCate = App\Models\Category::get();
    @endphp
    <div class="container h-100 mw-100 ">
        <div class="row h-100 ">
            <div class="col-xl-2 col-8 d-flex align-items-center">
                <a href="{{route('home.index')}}">
                    <img class="logo" src="{{asset('home/custom/images/logo.jpg')}}" />
                    <span class="company">Khăn lạnh toàn phát</span>
                </a>
            </div>
            <div class="col-xl-10 col-4 d-flex justify-content-between">
                <div class="h-100 search d-flex align-items-center">
                    <div class="sort-theme d-none d-lg-block">
                        <a href="javascript:;">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="29px" height="27px">
                                <defs>
                                    <filter id="Filter_0">
                                        <feFlood flood-color="rgb(18, 210, 136)" flood-opacity="1" result="floodOut">
                                        </feFlood>
                                        <feComposite operator="atop" in="floodOut" in2="SourceGraphic" result="compOut">
                                        </feComposite>
                                        <feBlend mode="normal" in="compOut" in2="SourceGraphic"></feBlend>
                                    </filter>
                                </defs>
                                <g filter="url(#Filter_0)">
                                    <path fill-rule="evenodd" fill="rgb(159, 159, 159)"
                                        d="M11.500,3.000 L28.500,3.000 C28.776,3.000 29.000,3.224 29.000,3.500 C29.000,3.776 28.776,4.000 28.500,4.000 L11.500,4.000 C11.224,4.000 11.000,3.776 11.000,3.500 C11.000,3.224 11.224,3.000 11.500,3.000 Z">
                                    </path>
                                    <path fill-rule="evenodd" fill="rgb(159, 159, 159)"
                                        d="M3.500,-0.000 C5.433,-0.000 7.000,1.567 7.000,3.500 C7.000,5.433 5.433,7.000 3.500,7.000 C1.567,7.000 -0.000,5.433 -0.000,3.500 C-0.000,1.567 1.567,-0.000 3.500,-0.000 Z">
                                    </path>
                                    <path fill-rule="evenodd" fill="rgb(159, 159, 159)"
                                        d="M11.500,13.000 L28.500,13.000 C28.776,13.000 29.000,13.224 29.000,13.500 C29.000,13.776 28.776,14.000 28.500,14.000 L11.500,14.000 C11.224,14.000 11.000,13.776 11.000,13.500 C11.000,13.224 11.224,13.000 11.500,13.000 Z">
                                    </path>
                                    <path fill-rule="evenodd" fill="rgb(159, 159, 159)"
                                        d="M3.500,10.000 C5.433,10.000 7.000,11.567 7.000,13.500 C7.000,15.433 5.433,17.000 3.500,17.000 C1.567,17.000 -0.000,15.433 -0.000,13.500 C-0.000,11.567 1.567,10.000 3.500,10.000 Z">
                                    </path>
                                    <path fill-rule="evenodd" fill="rgb(159, 159, 159)"
                                        d="M11.500,23.000 L28.500,23.000 C28.776,23.000 29.000,23.224 29.000,23.500 C29.000,23.776 28.776,24.000 28.500,24.000 L11.500,24.000 C11.224,24.000 11.000,23.776 11.000,23.500 C11.000,23.224 11.224,23.000 11.500,23.000 Z">
                                    </path>
                                    <path fill-rule="evenodd" fill="rgb(159, 159, 159)"
                                        d="M3.500,20.000 C5.433,20.000 7.000,21.567 7.000,23.500 C7.000,25.433 5.433,27.000 3.500,27.000 C1.567,27.000 -0.000,25.433 -0.000,23.500 C-0.000,21.567 1.567,20.000 3.500,20.000 Z">
                                    </path>
                                </g>
                            </svg>
                        </a>
                        @php
                        $search_by = $listCate->toArray()[0]['slug'];
                        @endphp
                        <div class="sort-by">
                            <ul>
                                @foreach($listCate as $cate)
                                <li data-sort="{{$cate->slug}}">{{ $cate->name }}</li>
                                @endforeach
                            </ul>
                            <input type="hidden" name="search_by" value="{{$search_by}}" />
                        </div>
                    </div>
                    <form id="form-search">
                        <input type="text" placeholder="Bạn tìm sản phẩm gì?" name="search_key" class="search-key"
                            autocomplete="off" autocorrect="off">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        <div class="search_list">
                            <ul>
                            </ul>
                        </div>
                    </form>
                </div>
                <ul class="main-menu d-none d-xl-flex align-items-center">
                    <li class="@if(in_array(Route::currentRouteName(), ['home.index'])){{'active'}}@endif">
                        <a href="{{route('home.index')}}"><i class="fa fa-home"></i> Trang Chủ</a>
                    </li>
                    <li class="dropdown @if(in_array(Route::currentRouteName(), ['home.products'])){{'active'}}@endif">
                        <a href="javascript:void(0)">Sản Phẩm <i class="fa fa-angle-down"></i></a>
                        @php
                        $current = '';
                        if(Route::currentRouteName() == 'home.products') {
                        $current = request()->route()->parameters()['slug'];
                        }
                        @endphp
                        <ul class="child-menu other p-0">
                            @foreach($listCate as $cate)
                            <li class="@if($current === $cate->slug) active @endif">
                                <a href="{{route('home.products', ['slug' => $cate->slug])}}">{{$cate->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="@if(in_array(Route::currentRouteName(), ['home.abountme'])){{'active'}}@endif">
                        <a href="{{route('home.aboutme.index')}}">Giới Thiệu</i></a>
                    </li>
                    <li class="@if(in_array(Route::currentRouteName(), ['home.contact'])){{'active'}}@endif">
                        <a href="{{route('home.contact.index')}}">Liên Hệ</i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
$('.dropdown').click(function() {
    $(this).find('.child-menu').toggleClass('d-block');
})
</script>