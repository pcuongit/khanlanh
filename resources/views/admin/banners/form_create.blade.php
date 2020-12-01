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
        <button type="button" class="btn btn-warning ml-1 mb-1 w-100 hidden" id="btn_cancel_form">Hủy</button>
    </div>
    <div class="form-group">
        <label for="name_cate">Độ ưu tiên</label>
        <input type="number" name="priorty" class="form-control">
    </div>
    <div class="form-group">
        <label for="image_url">Ảnh</label>
        <img class="design mb-3" alt="" src="{{asset('image_common/no-image.png')}}" id="preview">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="image_url"
                accept="image/png,image/jpg,image/svg" onChange="loadFile(event, 'preview')">
            <label class="custom-file-label" for="customFile">chọn ảnh</label>
        </div>
    </div>
</form>