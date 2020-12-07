$('nav li').hover(
    function() {
        $('ul', this).stop().slideDown(200);
    },
    function() {
        $('ul', this).stop().slideUp(200);
    }
);

$(function () {
    // $('.school_select li').bind('click',function () {
    //     console.log(1);//打印日志
    //     console.log($(this).attr("value"));//打印日志
    //     //取当前选中 li 的value值
    //     var orderColumn = $(this).attr("value");
    //     //赋到input标签 选择器id="orderColumn"
    //     $("#school_name").val($(this).attr("value"));
    // });
    $(document).pjax('a', 'body');
    $(document).on('pjax:start', function() {
        NProgress.start();
    });
    $(document).on('pjax:end', function() {
        NProgress.done();
        self.siteBootUp();
    });

});

