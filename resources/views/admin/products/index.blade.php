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
function calculatePriceAfterDiscount() {
    var discount = $("input[name='discount']").val() ?? 0;
    var price = $("input[name='price']").val() ?? 0;
    var final_amount = price - Math.round((discount * price) / 100);
    $("#final_amount").val(final_amount);
}

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
        url: 'ajax/product/render',
        type: 'GET',
        timeout: 600000,
        success: function(result, status, xhr) {
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

// function updateCate(event, id) {
//     var _this = $(".form_" + id).closest("tr");
//     var formData = new FormData();
//     var _id = _this.find("input[name=id]").val();
//     formData.append('name_cate', _this.find('input[name="name_cate"]').val());
//     formData.append('_method', 'PATCH');
//     if (_this.find("input[type=file]")[0].files[0] !== undefined) {
//         formData.append('image_url', _this.find(
//             "input[type=file]")[0].files[0]);
//     }
//     setupAjax();
//     $.ajax({
//         url: 'ajax/category/update/' + _id,
//         type: 'POST',
//         data: formData,
//         processData: false,
//         contentType: false,
//         cache: false,
//         timeout: 600000,
//         success: (result, status, xhr) => {
//             successAnimation(result.message);
//             autoCloseAlert('success');
//             $(".text_default_" + _id).toggleClass("hidden");
//             $(".input_edit_" + _id).toggleClass("hidden");
//             hiddenBtn($(this).parent());
//             search();
//         },
//         error: (xhr, status, error) => {
//             if (xhr.status === 422) {
//                 var errorsArr = xhr.responseJSON.errors;
//                 $("#errors>.msg").html("");
//                 _this.find("input").removeClass("has-error")
//                 _this.find(".custom-file-label").removeClass("has-error");
//                 for (const [key, value] of Object.entries(errorsArr)) {
//                     $("#errors>.msg").append("- " + value + "<br>");
//                     _this.find(`input[name="${key}"]`).addClass("has-error");
//                     if (key == 'image_url') {
//                         _this.find(".custom-file-label").addClass("has-error");
//                     }
//                     console.log(`${key}: ${value}`);
//                 }
//                 console.log(_this);
//                 if (!$("#errors").first().is(":hidden")) {
//                     $("#errors").toggleClass("hidden");
//                 } else {
//                     $("#errors").slideDown("slow");
//                 }
//                 autoCloseAlert('errors');
//             }
//         },
//     });

//     return false;
// }

// function hiddenBtn(event) {
//     event.find(".btn_edit").toggleClass("hidden");
//     event.find(".btn_delete").toggleClass("hidden");
//     event.find(".btn_update").toggleClass("hidden");
//     event.find(".btn_cancel").toggleClass("hidden");
// }

// function cancelCate(event, id) {
//     var _this = event.target;
//     hiddenBtn($(".form_" + id));
//     $(".text_default_" + id).toggleClass("hidden");
//     $(".input_edit_" + id).toggleClass("hidden");
// }

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
    });
    $("input[name='discount']").on("keyup", function() {
        calculatePriceAfterDiscount();
    })
    $("input[name='discount']").on("keyup", function() {
        calculatePriceAfterDiscount();
    })

    $("#btn_confirm_delete").on("click", function() {
        destroy($("input[name=id_delete]").val())
    })
});
</script>
@endsection