window.onload=function(){
    $('#course-manage').addClass('active');
    $('#collapseTwo').addClass('show');
    $('#course').addClass('active');
    $('#course-manage .nav-link').removeClass('collapsed');

    $('#sidebarToggle').on('click',function () {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        }else {
            $('#course-manage').addClass('active');
            $('#collapseTwo').addClass('show');
            $('#course').addClass('active');
            $('#course-manage .nav-link').removeClass('collapsed');
        };
    });
};
