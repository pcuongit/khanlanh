@extends('layouts.admin.master')
@section('title', 'test')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Banner</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">banner</li>
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
                        @include('admin.banners.form_create')
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
                    <h6 class="m-0 font-weight-bold text-primary">banner</h6>
                </div>
                <div class="table-responsive">
                    @include('admin.banners.list', ['data' => $data])
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->
    <!-- Modal Edit -->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog mw-90" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">chỉnh sửa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Hủy</button>
                    <a href="javascript:void(0)" class="btn btn-primary" id="btn_update" data-banner_id="">Cập Nhật</a>
                </div>
            </div>
        </div>
    </div>
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
        closeFormCreate();
        resetForm("form_create");
        autoCloseAlert('success');
        search();
    }
}

function closeFormCreate() {
    $('#btn_create').toggleClass('hidden');
    $('#btn_cancel_form').toggleClass('hidden');
    $('#btn_save').toggleClass('hidden');
    $("#form_create").slideUp("slow");
    $("#box_button_create").toggleClass("mb-4")
    $("#box_button_create>#bg_box").toggleClass("card")
    resetForm();
}

function search(text) {
    setupAjax();
    $.ajax({
        // url: 'ajax/category/render?search=' + (text) ? text : '',
        url: 'ajax/banner/render',
        type: 'GET',
        timeout: 600000,
        success: function(result, status, xhr) {
            $(".table-responsive").html(result);
        },
        error: function(xhr, status, error) {},
    });
    return false;
}

function editBanner(event, id) {
    $("#btn_update").data("banner_id", id);
    setupAjax();
    $.ajax({
        url: 'ajax/banner/render_edit/' + id,
        type: 'GET',
        timeout: 600000,
        success: function(result, status, xhr) {
            $("#EditModal .modal-body").html(result);
            $("#EditModal").modal("show");
        },
        error: function(xhr, status, error) {},
    });
    return false;
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
        url: 'ajax/banner/update/' + _id,
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
                _this.find("input").removeClass("is-invalid")
                _this.find("input:not([readonly])").addClass("is-valid")
                _this.find(".custom-file-label").removeClass("is-invalid");
                for (const [key, value] of Object.entries(errorsArr)) {
                    $("#errors>.msg").append("- " + value + "<br>");
                    _this.find(`input[name="${key}"]`).addClass("is-invalid");
                    if (key == 'image_url') {
                        _this.find(".custom-file-label").addClass("is-invalid");
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

function deleteBanner(id) {
    $("input[name=id_delete]").val(id);
    $("#deleteModal").modal();
}

function destroy(id) {
    setupAjax();
    $.ajax({
        url: 'ajax/banner/destroy/' + id,
        type: 'DELETE',
        timeout: 600000,
        success: function(result, status, xhr) {
            if (result.status === 200) {
                $("input[name=id_delete]").val();
                $("#deleteModal").modal('hide');
                successAnimation(result.message);
                search()
                autoCloseAlert('success')
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
        $('#btn_create').toggleClass('hidden');
        $('#btn_cancel_form').toggleClass('hidden');
        $('#btn_save').toggleClass('hidden');
        $("#form_create").slideDown("slow");

    })

    $('#btn_save').on('click', function() {
        $("#form_create").submit();
    })

    $("#form_create").on('submit', function() {
        $("#btn_save>.text").text("");
        $("#loading-spinner").removeClass("hidden");
        var formData = new FormData();
        formData.append('priorty', $('input[name="priorty"]').val());
        formData.append('_method', 'POST');
        if ($("input[type=file]")[0].files[0] !== undefined) {
            formData.append('image_url', $(
                "input[type=file]")[0].files[0]);
        }
        setupAjax();
        $.ajax({
            url: 'ajax/banner/create',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(result, status, xhr) {
                animateSave(result);
            },
            error: function(xhr, status, error) {
                animateSave({
                    status: xhr.status,
                    message: 'error'
                });
                if (xhr.status === 422) {
                    var errorsArr = xhr.responseJSON.errors;
                    $("#errors>.msg").html("");
                    $(".custom-file-label").removeClass("is-invalid");
                    $(`input`).addClass("is-valid");
                    $("input").removeClass("is-invalid")
                    for (const [key, value] of Object.entries(errorsArr)) {
                        $("#errors>.msg").append("- " + value + "<br>");
                        $(`input[name="${key}"]`).addClass("is-invalid");
                        if (key == 'image_url') {
                            $(".custom-file-label").addClass("is-invalid");
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
    $("#btn_update").on("click", function() {
        var banner_id = $(this).data("banner_id");
        var _form = $("#form_edit");
        var _this = _form;
        var formData = new FormData();
        formData.append('priorty', $(_form).find('input[name="priorty"]').val());
        formData.append('_method', 'POST');
        if ($(_form).find("input[type=file]")[0].files[0] !== undefined) {
            formData.append('image_url', $(_form).find(
                "input[type=file]")[0].files[0]);
        }
        formData.append('_method', 'PATCH');
        setupAjax();
        $.ajax({
            url: 'ajax/banner/update/' + banner_id,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: (result, status, xhr) => {
                $("#EditModal").modal('hide');
                $("#success>.msg").text(result.message);
                $("#success").slideDown("slow");
                search();
                autoCloseAlert('success');
            },
            error: (xhr, status, error) => {
                if (xhr.status === 422) {
                    var errorsArr = xhr.responseJSON.errors;
                    $("#errors_edit>.msg").html("");
                    $(_this).find("input").removeClass("is-invalid")
                    $(_this).find("textarea").removeClass("is-invalid").addClass("is-valid")
                    $(_this).find("input:not([readonly])").addClass("is-valid")
                    $(_this).find(".custom-file-label").removeClass("is-invalid")
                    for (const [key, value] of Object.entries(errorsArr)) {
                        $("#errors_edit>.msg").append("- " + value + "<br>");
                        $(_this).find(`[name=${key}]`).addClass("is-invalid");
                        if (key == 'image_url') {
                            $(_this).find(".custom-file-label").addClass("is-invalid");
                        }
                        console.log(`${key}: ${value}`);
                    }
                    if (!$("#errors_edit").first().is(":hidden")) {
                        $("#errors_edit").toggleClass("hidden");
                    } else {
                        $("#errors_edit").slideDown("slow");
                    }
                    autoCloseAlert('errors_edit');
                }
            },
        });

        return false;
    })
    $("#btn_confirm_delete").on("click", function() {
        destroy($("input[name=id_delete]").val())
    })

    $("#btn_cancel_form").on("click", function() {
        closeFormCreate();
    })
});
</script>
@endsection