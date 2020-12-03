function resetForm(id) {
    $("#"+id).find("input").val("");
    $("#"+id).find("textarea").val("");
    $("#"+id).find("select").val("");
    $("#"+id).find(".custom-file-label").text("");
    $("#"+id).find("img").removeAttr("src"); 
}
function autoCloseAlert(id) {
    if (!$('#' + id).first().is(":hidden")) {
        setTimeout(() => {
            $('#' + id).slideUp("slow");
        }, 2000)
    }
}

function setupAjax() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function loadFile(event, id) {
    var _this =  $(event.target).parent().find('.custom-file-label');
    _this.text(event.target.files[0].name);
    _this.removeClass('is-invalid');
    if(id) {
        var output = _this.closest(".form-group").find("#" + id);
        output.attr("src", URL.createObjectURL(event.target.files[0]));
        output.on('load', function() {
            URL.revokeObjectURL(output.attr("src")); // free memory
        })
    }
}
function closeAlert(event) {
    var _this = $(event.target).closest(".alert");
    if (!_this.first().is(":hidden")) {
        _this.slideUp("slow");
    }    
}
$(window).on('load', function() {
    $("input").on('keyup', function() {
        $(this).removeClass('is-invalid');
    })
    var img = $("img");
    img.on('load', function(e){
        
    }).on('error', function(e) {
        console.log("🚀 ~ file: custom.js ~ line 50 ~ img.on ~ e", e)
        $(this).attr('src', '/assets_common/images/no-image.png');
    });
});

