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
        <label for="name_cate">Độ ưu tiên</label>
        <input type="number" name="priorty" value="{{$banner->priorty}}" class="form-control" min="0" max="5">
    </div>
    <div class="form-group">
        <label for="image_url">Ảnh</label>
        <img class="design mb-3" src="{{asset($banner->image_url)}}" alt="" id="preview">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="image_url"
                accept="image/*" onChange="loadFile(event, 'preview')">
            <label class="custom-file-label" for="customFile">chọn ảnh</label>
        </div>
    </div>
</form>