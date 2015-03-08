$(document).ready(function () {


    $(".quote-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayHovePause: true
    });

    $('.article-carousel').owlCarousel({
        items: 5,
        margin: 10
    });

    $('.event-carousel').owlCarousel({
        items: 5,
        margin: 10
    });

    $('#articles').masonry({
        columnWidth: '.article-item',
        itemSelector: '.article-item'
    });

});