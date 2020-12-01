function setupAjax() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}
function hideSpinner() {
    $('#spinner').hide();
}
function showSpinner() {
    $('#spinner').show();
}
$(window).on('load', function() {
    var img = $("img");
    img.on('load', function(e){
        
    }).on('error', function(e) {
        $(this).attr('src', '/image_common/no-image.png');
    });
})