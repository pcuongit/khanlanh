function resetForm() {
    $("input").val("");
    $(".custom-file-label").text("");
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

$(window).on('load', function() {
    $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
        $('.sidebar .collapse').collapse('hide');
        };
    });
    $("#close-alert").on('click', function(){
        if(!$(this).parent().first().is(":hidden")) {
            $(this).parent().slideUp("slow");
        }
    })
    $("input").on('keyup', function() {
        $(this).removeClass('has-error');
    })
    $("input[type='file']").on('change', function() {
        var _this =  $(this).parent().find('.custom-file-label');
        _this.text($(this)[0].files[0].name);
        _this.removeClass('has-error');
    })
    
});
