@extends('layouts.admin.master')
@section('title', 'test')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sản phẩm</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">sản phẩm</li>
        </ol>
    </div>
    @include('layouts.admin.alert')
    @include('admin.products.form_create')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">sản phẩm</h6>
                </div>
                <div class="table-responsive">
                    @include('admin.products.render', ['data' => $data])
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
                    <a href="javascript:void(0)" class="btn btn-primary" id="btn_update" data-product_id="">Cập Nhật</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
function calculatePriceAfterDiscount(event) {
    var _this = event.target;
    var _form = _this.closest("form");
    $(_this).removeClass('is-invalid');
    var discount = $(_form).find("input[name='discount']").val() ?? 0;
    var price = $(_form).find("input[name='price']").val() ?? 0;
    var final_amount = price - Math.round((discount * price) / 100);
    $(_form).find("#final_amount").val(final_amount);
}

function successAnimation(message) {
    $("#success>.msg").text(message);
    $("#success").slideDown("slow");
}

function animateSave(object) {
    console.log("🚀 ~ file: index.blade.php ~ line 68 ~ animateSave ~ object", object)
    $("#btn_save>.text").text("Lưu");
    $("#loading-spinner").addClass("hidden");
    if (object.status === 200) {
        successAnimation(object.message);
        $('#btn_create').toggleClass('hidden');
        $("#form_create").slideUp("slow");
        $("#box_button_create").toggleClass("mb-4")
        $("#box_button_create>#bg_box").toggleClass("card")
        resetForm("form_create");
        autoCloseAlert('success');
        search();
    }
}

function search(text) {
    setupAjax();
    $.ajax({
        // url: 'ajax/category/render?search=' + (text) ? text : '',
        url: 'ajax/product/render',
        type: 'GET',
        timeout: 600000,
        success: function(result, status, xhr) {
            console.log("🚀 ~ file: index.blade.php ~ line 91 ~ search ~ result", result)
            $(".table-responsive").html(result);
        },
        error: function(xhr, status, error) {},
    });
    return false;
}

function editProduct(event, id) {
    $("#btn_update").data("product_id", id);
    setupAjax();
    $.ajax({
        url: 'ajax/product/render_edit/' + id,
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


function deleteProduct(id) {
    $("input[name=id_delete]").val(id);
    $("#deleteModal").modal();
}

function destroy(id) {
    setupAjax();
    $.ajax({
        url: 'ajax/product/destroy/' + id,
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
        $('#btn_create').toggleClass('hidden');
        $('#btn_cancel_form').toggleClass('hidden');
        $('#btn_save').toggleClass('hidden');
        $("#form_create").slideDown("slow");
    })

    $('#btn_save').on('click', function() {
        $("#btn_save>.text").text("");
        $("#loading-spinner").removeClass("hidden");
        var formData = new FormData();
        formData.append('name', $('input[name="name"]').val());
        formData.append('price', $('input[name="price"]').val());
        formData.append('discount', $('input[name="discount"]').val());
        formData.append('id_category', $('select[name="id_category"]').val());
        formData.append('description', $('textarea[name="description"]').val());
        formData.append('_method', 'POST');
        if ($("input[type=file]")[0].files[0] !== undefined) {
            formData.append('image_url', $(
                "input[type=file]")[0].files[0]);
        }
        setupAjax();
        $.ajax({
            url: 'ajax/product/create',
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
                    $("#errors>.msg").html("")
                    $("input").removeClass("is-invalid")
                    $("textarea").removeClass("is-invalid").addClass("is-valid")
                    $("input:not([readonly])").addClass("is-valid")
                    $(".custom-file-label").removeClass("is-invalid")
                    for (const [key, value] of Object.entries(errorsArr)) {
                        $("#errors>.msg").append("- " + value + "<br>");
                        $(`[name="${key}"]`).addClass("is-invalid");
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
    })

    $("#btn_confirm_delete").on("click", function() {
        destroy($("input[name=id_delete]").val())
    })

    $("#btn_cancel_form").on("click", function() {
        $('#btn_create').toggleClass('hidden');
        $('#btn_cancel_form').toggleClass('hidden');
        $('#btn_save').toggleClass('hidden');
        $("#form_create").slideUp("slow");
        $("#box_button_create").toggleClass("mb-4")
        $("#box_button_create>#bg_box").toggleClass("card")
        resetForm("form_create");
    })

    $("#btn_update").on("click", function() {
        var product_id = $(this).data("product_id");
        var _form = $("#form_edit");
        var _this = _form;
        var formData = new FormData();
        formData.append('name', $(_form).find('input[name="name"]').val());
        formData.append('price', $(_form).find('input[name="price"]').val());
        formData.append('discount', $(_form).find('input[name="discount"]').val());
        formData.append('id_category', $(_form).find('select[name="id_category"]').val());
        formData.append('description', $(_form).find('textarea[name="description"]').val());
        formData.append('_method', 'PATCH');
        if ($(_form).find("input[type=file]")[0].files[0] !== undefined) {
            formData.append('image_url', $(_form).find(
                "input[type=file]")[0].files[0]);
        }
        setupAjax();
        $.ajax({
            url: 'ajax/product/update/' + product_id,
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
                // autoCloseAlert('success');
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
});
</script>
@endsection