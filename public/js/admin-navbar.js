$(".menu > ul > li").click(function (e) {
    $(this).siblings().removeClass("active");
    $(this).toggleClass("active");
    $(this).find("ul").slideToggle();
    $(this).siblings().find("ul").slideUp();
    $(this).siblins().find("ul").find("li").removeClass("active");
});

$(".menu-btn").click(function (){
    $(".sidebar").toggleClass("active");
});