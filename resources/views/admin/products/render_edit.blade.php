<div class="alert alert-danger alert-dismissible hidden" role="alert" id="errors_edit">
    <button type="button" class="close" onClick="closeAlert(event)">
        <span aria-hidden="true">×</span>
    </button>
    <p class="msg">
    </p>
</div>
<div class="alert alert-success alert-dismissible hidden" role="alert" id="success_edit">
    <button type="button" class="close" id="close-alert">
        <span aria-hidden="true">×</span>
    </button>
    <p class="msg">
    </p>
</div>
<form class="percent-100" id="form_edit">
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
                onKeyUp="calculatePriceAfterDiscount(event)" aria-label="Amount (to the nearest dollar)"
                value="{{ $product->price }}">
            <div class="input-group-append">
                <span class="input-group-text">VNĐ</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="discount">khuyến mãi</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control" name="discount" max="100" min="0"
                onKeyUp="calculatePriceAfterDiscount(event)" aria-label="Amount (to the nearest dollar)"
                value="{{ $product->discount_percent }}">
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
                <span class="input-group-text">VNĐ</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="description">mô tả</label>
        <textarea class="form-control" name="description">{{ $product->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="image_url">Ảnh</label>
        <img class="design" src="{{asset($product->image_url)}}" alt="" id="preview">
        <div class="custom-file mt-3">
            <input type="file" class="custom-file-input" id="customFile" name="image_url"
                accept="image/png,image/jpg,image/svg" onChange="loadFile(event, 'preview')">
            <label class="custom-file-label" for="customFile">chọn ảnh</label>
        </div>
    </div>
</form>