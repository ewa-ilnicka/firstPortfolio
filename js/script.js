$(document).ready(function () {
    // $(".project-description").hide();
    $(".project").hover(function () {
        $(this).find(".project-description").addClass("animated fadeIn");
        $(this).find(".project-type").addClass("animated fadeInUp");
        $(this).find(".project-name").addClass("animated fadeInUp");
        $(this).find(".project-url").addClass("animated slideInUp");
    }, function () {
        $(this).find(".project-description").removeClass("animated fadeIn");
        $(this).find(".project-type").removeClass("animated fadeInUp");
        $(this).find(".project-name").removeClass("animated fadeInUp");
        $(this).find(".project-url").removeClass("animated slideInUp");
    })
})