(function ($) {
    if($('.sliderItem').length){
        $('.sliderItem').each(function (index) {
            let elSlider = $(this);
            let item = elSlider.data('item');
            elSlider.slick({
                infinite: true,
                slidesToShow: item ? item : 1,
                slidesToScroll: item ? item : 1,
                //autoplay: true,
                //autoplaySpeed: 5000,
                speed: 500,
                dots: elSlider.data('dots-enable') ? true : false,
                arrows: elSlider.data('arrow-disable') ? false : true,
                prevArrow: '<img src="//asia-soleil-travel.com/wp-content/themes/enfold-child/dist/images/icon_pre.png" alt="prev" class="prevIcon">',
                nextArrow: '<img src="//asia-soleil-travel.com/wp-content/themes/enfold-child/dist/images/icon_next.png" alt="next" class="nextIcon">',
                responsive: [
                    {
                        breakpoint: 990,
                        settings: {
                            slidesToShow: item && item > 1 ? 2 : 1,
                            slidesToScroll: item && item > 1 ? 2 : 1,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: item && item > 1 ? 1 : 1,
                            slidesToScroll: item && item > 1 ? 1 : 1,
                        }
                    },
                ]
            });
        })
    }
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        centerMode: false,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 990,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    $(document).on('click','.list_guide .page-numbers',function (e) {
        e.preventDefault();
        let page = parseInt($(this).html());
        if($(this).hasClass('next')){
            page = parseInt($('.list_guide .current').html()) + 1;
        }else if($(this).hasClass('prev')){
            page = parseInt($('.list_guide .current').html()) - 1;
        }
        var el = $('.list_guide');
        if(page >= 1){
            ajaxAction(ajax_url.ajax_url+'?action=getGuide',{page:page},function (data) {
                el.html(data);
            },el)
        }
    });
    $('.add_like_post').on('click',function (e) {
        e.preventDefault();
        ajaxAction(ajax_url.ajax_url+'?action=set_cookies',{id:$(this).data('id')},function (data) {
            console.log(data);
        })
    });

    function ajaxAction(url,data,access = null,appent = null,method = "POST",error = null) {
        $.ajax({
            url: url,
            data: data,
            beforeSend:function () {
                if(appent){
                    $("html, body").animate({ scrollTop: appent.offset().top - 100 }, 500);
                    appent.html('<div class="loading"><div class="loader"></div></div>');
                }
            },
            success:function (e) {
                access(e);
            }
        })
    }
    $('#back a').on('click',function (e) {
        e.preventDefault();
        window.history.back();
    });

    $(document).ready(function () {
        $('.lightBox').fancybox();
        $('.seeMoreContentPage').on('click',function (e) {
            e.preventDefault();
            $('.hidePart').css('height','auto');
            $(this).hide();
        });
        $('.tabControl .item').on('click',function (e) {
            e.preventDefault();
            let el = $(this).data('el');
            if($(el).length > 0){
                $('.tabControl .item,.tabContent').removeClass('active');
                $(this).addClass('active');
                $(el).addClass('active');
            }
        });
        $('a').click(function (e){
            if($($(this).attr("href")).length != 0){
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $($(this).attr("href")).offset().top - 150
                }, 500)
            }
        });
        $(".navtitle").on('click',function (e) {
            if(!$(this).hasClass('show')){
                $(this).closest('.navContentPage').find('.contentNav').stop().slideDown();
                $(this).addClass('show');
            }else{
                $(this).closest('.navContentPage').find('.contentNav').stop().slideUp();
                $(this).removeClass('show');
            }

        })
    });

    document.addEventListener( 'wpcf7mailsent', function( event ) {
        let location = 'https://asia-soleil-travel.com/devis/';
        window.location.href = location;
    }, false );

}(jQuery));

(function($) {
    $.fn.countTo = function(options) {
        options = $.extend({}, $.fn.countTo.defaults, options || {});
        var loops = Math.ceil(options.speed / options.refreshInterval),
            increment = (options.to - options.from) / loops;
        return $(this).each(function() {
            var _this = this,
                loopCount = 0,
                value = options.from,
                interval = setInterval(updateTimer, options.refreshInterval);
            function updateTimer() {
                value += increment;
                loopCount++;
                $(_this).html(value.toFixed(options.decimals));
                if (typeof(options.onUpdate) == 'function') {
                    options.onUpdate.call(_this, value);
                }
                if (loopCount >= loops) {
                    clearInterval(interval);
                    value = options.to;

                    if (typeof(options.onComplete) == 'function') {
                        options.onComplete.call(_this, value);
                    }
                }
            }
        });
    };

    $.fn.countTo.defaults = {
        from: 0,  // the number the element should start at
        to: 100,  // the number the element should end at
        speed: 1000,  // how long it should take to count between the target numbers
        refreshInterval: 1000,  // how often the element should be updated
        decimals: 0,  // the number of decimal places to show
        onUpdate: null,  // callback method for every time the element is updated,
        onComplete: null,  // callback method for when the element finishes updating
    };
    $(window).on('scroll', function() {
        if ($('.countSection').length > 0 && $(window).scrollTop() >= $('.countSection').offset().top - 200) {
            $('.counter').each(function (index) {
                if(!$(this).hasClass('complete')){
                    $('.counter'+index).countTo({
                        from: 0,
                        to: $(this).data('count'),
                        speed: 4000,
                        refreshInterval: 50,
                        onComplete: function(value) {
                            $(this).addClass('complete')
                        }
                    });
                }
            });
        }
    });
})(jQuery);