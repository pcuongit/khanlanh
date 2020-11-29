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