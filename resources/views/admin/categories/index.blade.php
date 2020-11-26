@extends('layouts.admin.master')
@section('title', 'test')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh mục</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">danh mục</li>
        </ol>
    </div>
    @include('layouts.admin.alert')
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
                                <label for="name_cate">Tên danh mục</label>
                                <input type="text" name="name_cate" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image_url">Ảnh</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image_url"
                                        accept="image/png,image/jpg,image/svg">
                                    <label class="custom-file-label" for="customFile">chọn ảnh</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">danh mục</h6>
                </div>
                <div class="table-responsive">
                    @include('admin.categories.render', ['data' => $data])
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
@endsection
@section('scripts')
<script>
function successAnimation(message) {
    $("#success>.msg").text(message);
    $("#success").slideDown("slow");
}

function animateSave(object) {
    $("#btn_save>.text").text("Lưu");
    $("#loading-spinner").addClass("hidden");
    if (object.status === 200) {
        successAnimation(object.message);
        $('#btn_create').toggleClass('hidden');
        $("#form_create").hide();
        $("#box_button_create").toggleClass("mb-4")
        $("#box_button_create>#bg_box").toggleClass("card")
        resetForm();
        autoCloseAlert('success');
        search();
    }
}

function search(text) {
    setupAjax();
    $.ajax({
        // url: 'ajax/category/render?search=' + (text) ? text : '',
        url: 'ajax/category/render',
        type: 'GET',
        timeout: 600000,
        success: function(result, status, xhr) {
            $(".table-responsive").html(result);
        },
        error: function(xhr, status, error) {},
    });
    return false;
}

function editCate(event, id) {
    var _this = event.target;
    hiddenBtn($(".form_" + id));
    $(".text_default_" + id).toggleClass("hidden");
    $(".input_edit_" + id).toggleClass("hidden");
}

function updateCate(event, id) {
    var _this = $(".form_" + id).closest("tr");
    var formData = new FormData();
    var _id = _this.find("input[name=id]").val();
    formData.append('name_cate', _this.find('input[name="name_cate"]').val());
    formData.append('_method', 'PATCH');
    if (_this.find("input[type=file]")[0].files[0] !== undefined) {
        formData.append('image_url', _this.find(
            "input[type=file]")[0].files[0]);
    }
    setupAjax();
    $.ajax({
        url: 'ajax/category/update/' + _id,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: (result, status, xhr) => {
            successAnimation(result.message);
            autoCloseAlert('success');
            $(".text_default_" + _id).toggleClass("hidden");
            $(".input_edit_" + _id).toggleClass("hidden");
            hiddenBtn($(this).parent());
            search();
        },
        error: (xhr, status, error) => {
            if (xhr.status === 422) {
                var errorsArr = xhr.responseJSON.errors;
                $("#errors>.msg").html("");
                _this.find("input").removeClass("has-error")
                _this.find(".custom-file-label").removeClass("has-error");
                for (const [key, value] of Object.entries(errorsArr)) {
                    $("#errors>.msg").append("- " + value + "<br>");
                    _this.find(`input[name="${key}"]`).addClass("has-error");
                    if (key == 'image_url') {
                        _this.find(".custom-file-label").addClass("has-error");
                    }
                    console.log(`${key}: ${value}`);
                }
                console.log(_this);
                if (!$("#errors").first().is(":hidden")) {
                    $("#errors").toggleClass("hidden");
                } else {
                    $("#errors").slideDown("slow");
                }
                autoCloseAlert('errors');
            }
        },
    });

    return false;
}

function hiddenBtn(event) {
    event.find(".btn_edit").toggleClass("hidden");
    event.find(".btn_delete").toggleClass("hidden");
    event.find(".btn_update").toggleClass("hidden");
    event.find(".btn_cancel").toggleClass("hidden");
}

function cancelCate(event, id) {
    var _this = event.target;
    hiddenBtn($(".form_" + id));
    $(".text_default_" + id).toggleClass("hidden");
    $(".input_edit_" + id).toggleClass("hidden");
}

function deleteCate(id) {
    $("input[name=id_delete]").val(id);
    $("#deleteModal").modal();
}

function destroy(id) {
    setupAjax();
    $.ajax({
        url: 'ajax/category/destroy/' + id,
        type: 'DELETE',
        timeout: 600000,
        success: function(result, status, xhr) {
            if (result.status === 200) {
                $("input[name=id_delete]").val();
                $("#deleteModal").modal('hide');
                search()
            }
        },
        error: function(xhr, status, error) {
            $("input[name=id_delete]").val();
            $("#deleteModal").modal('hide');
        },
    });
    return false;
}

$(window).on('load', function() {
    $('#btn_create').on('click', function() {
        $("#box_button_create").toggleClass("mb-4")
        $("#box_button_create>#bg_box").toggleClass("card")
        $('#btn_create').toggleClass('hidden')
        $("#form_create").slideDown("slow");

    })

    $('#btn_save').on('click', function() {
        $("#form_create").submit();
    })

    $("#form_create").on('submit', function() {
        $("#btn_save>.text").text("");
        $("#loading-spinner").removeClass("hidden");
        var formData = new FormData();
        formData.append('name_cate', $('input[name="name_cate"]').val());
        formData.append('_method', 'POST');
        if ($("input[type=file]")[0].files[0] !== undefined) {
            formData.append('image_url', $(
                "input[type=file]")[0].files[0]);
        }
        setupAjax();
        $.ajax({
            url: 'ajax/category/create',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(result, status, xhr) {
                animateSave(result);
                console.log("🚀 ~ file: index.blade.php ~ line 113 ~ $ ~ status", status)
                console.log("🚀 ~ file: index.blade.php ~ line 113 ~ $ ~ xhr", xhr)
                console.log("🚀 ~ file: index.blade.php ~ line 111 ~ $ ~ data", result)
            },
            error: function(xhr, status, error) {
                animateSave({
                    status: xhr.status,
                    message: 'error'
                });
                if (xhr.status === 422) {
                    var errorsArr = xhr.responseJSON.errors;
                    $("#errors>.msg").html("");
                    $("input").removeClass("has-error")
                    $(".custom-file-label").removeClass("has-error");
                    for (const [key, value] of Object.entries(errorsArr)) {
                        $("#errors>.msg").append("- " + value + "<br>");
                        $(`input[name="${key}"]`).addClass("has-error");
                        if (key == 'image_url') {
                            $(".custom-file-label").addClass("has-error");
                        }
                        console.log(`${key}: ${value}`);
                    }
                    if (!$("#errors").first().is(":hidden")) {
                        $("#errors").toggleClass("hidden");
                    } else {
                        $("#errors").slideDown("slow");
                    }
                    autoCloseAlert('errors');
                }
            },
        });

        return false;
    });

    $("#btn_confirm_delete").on("click", function() {
        destroy($("input[name=id_delete]").val())
    })
});
</script>
@endsection