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

    var articlesContainer = $('#articles');

    articlesContainer.imagesLoaded( function() {
        articlesContainer.masonry({
            columnWidth: '.article-item',
            itemSelector: '.article-item'
        });
    });

    // Rádió

    var mp = $('.audio-player');

    mp.mediaelementplayer({
        audioWidth: '100%',
        audioHeight: 30,
        alwaysShowHours: true,
        features: ['playpause', 'current', 'volume']
    });

    $('.radio-select').on('change', this, function () {
        var audioSrc = $(this).val();
        mp.each(function () {
            this.player.pause();
            this.player.setSrc(audioSrc);
            this.player.play();
        });
    });

});