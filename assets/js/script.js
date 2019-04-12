$(function () {
    if ($(window).scrollTop() >= 700) {
        $('#navbar').addClass('hideNav');
    }

    $(window).scroll(function () {
        if ($(window).scrollTop() >= 700) {
            $('#navbar').addClass('hideNav');
        } else if ($(window).scrollTop() <= 600) {
            $('#navbar').removeClass('hideNav');
        }

    });
});
