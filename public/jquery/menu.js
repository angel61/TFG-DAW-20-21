$(document).ready(function () {
    $('.menu-toggle').click(function () {
        $(this).toggleClass('open');
        $('.menu').toggleClass('is-active');
    });
});