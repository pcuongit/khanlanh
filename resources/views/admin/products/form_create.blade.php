<div class="row">
    <div class="col-lg-12" id="box_button_create">
        <div class="" id="bg_box">
            <div class="card-body">
                <div class="row">
                    <div class="flex percent-100 f-right">
                        <button type="button" class="btn btn-primary mb-1 w-100" id="btn_create">thêm mới</button>
                    </div>
                    <form class="percent-100 hidden" method="post" enctype="multipart/form-data" id="form_create">
                        @csrf
                        <div class="flex percent-100 f-right">
                            <button type="button" class="btn btn-success mb-1 w-100 hidden" id="btn_save">
                                <span class="text">Lưu</span>
                                <div class="loadingio-spinner-rolling-tpm40fc0lgn hidden" id="loading-spinner">
                                    <div class="ldio-nr71hfyg91o">
                                        <div></div>
                                    </div>
                                </div>
                            </button>
                            <button type="button" class="btn btn-warning ml-1 mb-1 w-100 hidden"
                                id="btn_cancel_form">Hủy</button>
                        </div>
                        <div class="form-group">
                            <label for="discount">danh mục</label>
                            <select class="form-control" name="id_category">
                                @foreach($listCate as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price">giá</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="price" min="1000"
                                    onKeyUp="calculatePriceAfterDiscount(event)"
                                    aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discount">khuyến mãi</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="discount" max="100" min="0"
                                    onKeyUp="calculatePriceAfterDiscount(event)"
                                    aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="discount">giá cuối cùng</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" readonly value id="final_amount">
                                <div class="input-group-append">
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">mô tả</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image_url">Ảnh</label>
                            <img class="design mb-3" alt="" src="{{asset('assets_common/images/no-image.png')}}" id="preview">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image_url"
                                    accept="image/png,image/jpg,image/svg" onChange="loadFile(event, 'preview')">
                                <label class="custom-file-label" for="customFile">chọn ảnh</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>