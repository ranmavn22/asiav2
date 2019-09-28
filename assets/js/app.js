(function ($) {
    if($('.sliderItem').length){
        $('.sliderItem').each(function (index) {
            let elSlider = $(this);
            let item = elSlider.data('item');
            elSlider.slick({
                infinite: true,
                slidesToShow: item ? item : 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                speed: 500,
            });
        })
    }
}(jQuery));