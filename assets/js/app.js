(function ($) {
    if($('.sliderItem').length){
        $('.sliderItem').each(function (index) {
            let elSlider = $(this);
            let item = elSlider.data('item');
            elSlider.slick({
                infinite: true,
                slidesToShow: item ? item : 1,
                slidesToScroll: 1,
                //autoplay: true,
                //autoplaySpeed: 5000,
                speed: 500,
                prevArrow: '<img src="//asia-soleil-travel.com/wp-content/themes/enfold-child/dist/images/icon_pre.png" alt="prev" class="prevIcon">',
                nextArrow: '<img src="//asia-soleil-travel.com/wp-content/themes/enfold-child/dist/images/icon_next.png" alt="next" class="nextIcon">',
            });
        })
    }

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
}(jQuery));