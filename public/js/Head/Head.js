
$(document).ready(function(){
    $('#school-manage').addClass('active');
    $('#sidebarToggle').on('click',function () {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };
    });
})
