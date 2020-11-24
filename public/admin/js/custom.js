$(window).on('load', function() {
    $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
        console.log(e);
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
        $('.sidebar .collapse').collapse('hide');
        };
    });
});