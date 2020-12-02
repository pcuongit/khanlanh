@extends('layouts.admin.master')
@section('title', 'giới thiệu')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Giới Thiệu</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">giới thiệu</li>
        </ol>
    </div>
    @include('layouts.admin.alert')
    <div class="row">
        <div class="col-lg-12" id="box_button_create">
            <div class="" id="bg_box">
                <div class="card-body">
                    <div class="row">
                        <div class="flex percent-100 f-right">
                            <button type="button" class="btn btn-primary mb-1 w-100" id="btn_save">Cập Nhật</button>
                        </div>
                        <form class="percent-100" method="post" enctype="multipart/form-data" id="form_create">
                            @csrf
                            @if(isset($description))
                            <input type="hidden" name="id_aboutme" value="{{$description->id}}" />
                            @endif
                            <div class="form-group">
                                <textarea name="editor1" class="form-control"
                                    required>@if(isset($description)){{$description->description}}@endif</textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
@endsection
@section('scripts')
<script src="{{asset('admin/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script>
// CKEDITOR.plugins.addExternal('cloudservices', '/admin/ckeditor/plugins', 'plugin.js');
CKEDITOR.replace('editor1');
$(window).on('load', function() {
    $("#btn_save").on('click', function() {
        setupAjax();
        var formData = new FormData();
        formData.append('id_aboutme', $('[name=id_aboutme]').length > 0 ? $('[name=id_aboutme]').first()
            .val() : null);
        formData.append('description', CKEDITOR.instances.editor1.getData());
        $.ajax({
            url: 'ajax/aboutme',
            type: 'POST',
            data: formData,
            timeout: 600000,
            processData: false,
            contentType: false,
            cache: false,
            success: function(result, status, xhr) {
                $("#success>.msg").text(result.messages);
                $("#success").slideDown("slow");
            },
            error: function(xhr, status, error) {}
        });
    });
});
</script>
@endsection