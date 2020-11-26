<form class="percent-100" id="form_edit">
    <div class="flex percent-100 f-right">
        <button type="button" class="btn btn-success mb-1 w-100 " id="btn_save">
            <span class="text">Lưu</span>
            <div class="loadingio-spinner-rolling-tpm40fc0lgn hidden" id="loading-spinner">
                <div class="ldio-nr71hfyg91o">
                    <div></div>
                </div>
            </div>
        </button>
    </div>
    <div class="form-group">
        <label for="discount">danh mục</label>
        <select class="form-control" name="id_category">
            @foreach($listCate as $category)
            <option value="{{$category->id}}" @if($product->id_category == $category->id) selected @endif>
                {{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="price">giá</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control" name="price" min="1000"
                aria-label="Amount (to the nearest dollar)" value="{{ $product->price }}">
            <div class="input-group-append">
                <span class="input-group-text">VND</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="discount">khuyến mãi</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control" name="discount" max="100" min="0"
                aria-label="Amount (to the nearest dollar)" value="{{ $product->discount_percent }}">
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="discount">giá cuối cùng</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control" readonly
                value="{{ $product->price - round(($product->price * $product->discount_percent)/100) }}"
                id="final_amount">
            <div class="input-group-append">
                <span class="input-group-text">VND</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="description">mô tả</label>
        <textarea class="form-control" name="description">{{ $product->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="image_url">Ảnh</label>
        <span class="design" style="background:url({{asset($product->image_url)}}) no-repeat center center;"></span>
        <div class="custom-file mt-3">
            <input type="file" class="custom-file-input" id="customFile" name="image_url"
                accept="image/png,image/jpg,image/svg">
            <label class="custom-file-label" for="customFile">chọn ảnh</label>
        </div>
    </div>
</form>