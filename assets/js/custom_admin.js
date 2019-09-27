(function ($) {
    $(document).ready(function () {
        //open wp media
		$('.choose_banner_tour').live('click', function( event ){
            event.preventDefault();
            image_caption_hover_plugin = wp.media.frames.image_caption_hover_plugin = wp.media({
                title: $( this ).data( 'title' ),
                button: {
                    text: $( this ).data( 'btntext' ),
                },
                multiple: false
            });
            var el = $(this).parent().find('.banner_tour');
            image_caption_hover_plugin.on('select', function() {
                var selection = image_caption_hover_plugin.state().get('selection');
                selection.map( function( attachment ) {
                    attachment = attachment.toJSON();
                    el.val(attachment.url);
                });
            });
            image_caption_hover_plugin.open();
        });


        var image_caption_hover_plugin;
        $('.btn_chonanh').live('click', function( event ){
            event.preventDefault();
            image_caption_hover_plugin = wp.media.frames.image_caption_hover_plugin = wp.media({
                title: $( this ).data( 'title' ),
                button: {
                    text: $( this ).data( 'btntext' ),
                },
                multiple: true
            });
            var el = $(this).parent().find('.etape_libs_img');
            image_caption_hover_plugin.on('select', function() {
                var selection = image_caption_hover_plugin.state().get('selection');
                selection.map( function( attachment ) {
                    attachment = attachment.toJSON();
                    el.append( "<span>" +
                        "<input name='wz_detail[img][]' type='hidden' value='"+attachment.url+"'>" +
                        "<img src='"+attachment.url+"'>" +
                        "<a class='del_item' href='#'>Xóa</a></span>");
                });
            });
            image_caption_hover_plugin.open();
        });
		$('.btn_chonanh_post').live('click', function( event ){
            event.preventDefault();
            image_caption_hover_plugin = wp.media.frames.image_caption_hover_plugin = wp.media({
                title: $( this ).data( 'title' ),
                button: {
                    text: $( this ).data( 'btntext' ),
                },
                multiple: true
            });
            var el = $(this).parent().find('.etape_libs_img');
            image_caption_hover_plugin.on('select', function() {
                var selection = image_caption_hover_plugin.state().get('selection');
                selection.map( function( attachment ) {
                    attachment = attachment.toJSON();
                    el.append( "<span>" +
                        "<input name='wz_post_galery_img[]' type='hidden' value='"+attachment.url+"'>" +
                        "<img src='"+attachment.url+"'>" +
                        "<a class='del_item' href='#'>Xóa</a></span>");
                });
            });
            image_caption_hover_plugin.open();
        });

        //Choose carte
        //open wp media
        $('.btn_choose_carte').live('click', function( event ){
            event.preventDefault();
            image_caption_hover_plugin = wp.media.frames.image_caption_hover_plugin = wp.media({
                title: $( this ).data( 'title' ),
                button: {
                    text: $( this ).data( 'btntext' ),
                },
                multiple: false
            });
            var el = $(this).parent().find('.wz_url_img_selected');
            var content_carte = $(this).parent().find("p");
            image_caption_hover_plugin.on( 'select', function() {
                attachment = image_caption_hover_plugin.state().get('selection').first().toJSON();
                var string_url = attachment.url;
                el.val(string_url);
                content_carte.html("<img src='"+string_url+"'>");
            });
            image_caption_hover_plugin.open();
        });
        $(".btn_del_carte").click(function (event) {
            event.preventDefault();
            var el = $(this).parent().find('.wz_url_img_selected').val("");
            var content_carte = $(this).parent().find("p").html("");
        });
        $(document).on("click",".del_item",function (event) {
            event.preventDefault();
            $(this).parent().remove();
        });
        // Chọn nhiều ảnh
        $('.btn_add_img').live('click', function( event ){
            event.preventDefault();
            image_caption_hover_plugin = wp.media.frames.image_caption_hover_plugin = wp.media({
                title: $( this ).data( 'title' ),
                button: {
                    text: $( this ).data( 'btntext' ),
                },
                multiple: true
            });
            var el = $(this).parent().find('.etape_libs_img');
            var index = $(this).data("index");
            image_caption_hover_plugin.on('select', function() {
                var selection = image_caption_hover_plugin.state().get('selection');
                selection.map( function( attachment ) {
                    attachment = attachment.toJSON();
                    el.append( "<span>" +
                        "<input name='wz_esprit_carte["+index+"][img][]' type='hidden' value='"+attachment.url+"'>" +
                        "<img src='"+attachment.url+"'>" +
                        "<a class='del_item' href='#'>Xóa</a></span>");
                });
            });
            image_caption_hover_plugin.open();
        });
        $(".btn_add_itineraire_en_bref").on('click',function (event) {
            event.preventDefault();
            var index = $(this).parent().find(".content_itineraire_en_bref .item").last().data("index");
            if(index == null){
                var string = '<div class="item" data-index="0">'
                            +'<a class="del_item">Xóa</a>'
                            +'<div class="etape"><span>Étape 1: </span><a class="add_lich" data-index="0">Thêm mô tả</a></div>'
                            +'<div class="etape_content">'
                            +'<p class="label_etape">Label: <input type="text" name="wz_esprit_carte[0][label]" value=""></p>'
                            +'</div>'
                            +'<div class="etape_libs_img">'
                            +'</div>'
                            +'<a href="#" class="btn_add_img" data-index="0">Thêm ảnh</a>'
                            +'</div>';
            }else{
                var string = '<div class="item" data-index="'+(index+1)+'">'
                    +'<a class="del_item">Xóa</a>'
                    +'<div class="etape"><span>Étape '+(index+2)+': </span><a class="add_lich" data-index="'+(index+1)+'">Thêm mô tả</a></div>'
                    +'<div class="etape_content">'
                    +'<p class="label_etape">Label: <input type="text" name="wz_esprit_carte['+(index+1)+'][label]" value=""></p>'
                    +'</div>'
                    +'<div class="etape_libs_img">'
                    +'</div>'
                    +'<a href="#" class="btn_add_img" data-index="'+(index+1)+'">Thêm ảnh</a>'
                    +'</div>';
            }
            $(this).parent().find(".content_itineraire_en_bref").append(string);
        });
        $(document).on('click','.add_lich',function (event) {
            event.preventDefault();
            var index = $(this).data("index");
            $(this).closest(".item").find(".etape_content").append('<p><input name="wz_esprit_carte['+(index)+'][lichtrinh][]" value=""><a class="del_item" href="#">Xóa</a></p>');
        });
        // Add program tour
        $(".btn_add_program").on('click',function (event) {
            event.preventDefault();
            //my_ajax_object.ajax_url+'/wp-json/wp/v2/posts?page='+page+'&per_page=6&order=asc'
            var index = $(this).parent().find(".content_program_tour .item").last().data("index");
            var data = my_object.data_hotel;
            var option = '<option value="">None</option>';
            $.each(data, function(i, item) {
                option = option+ '<option value="'+data[i].ID+'">'+data[i].post_title+'</option>';
            })
		
            if(index == null){
                var string = '<div class="item" data-index="0">'
                                +'<span class="title" data-index="0">Jour 1</span>'
                        +'<a href="#" class="del_item">Xóa</a>'
                        +'<p class="label">Label: <input type="text" name="wz_program[0][label]" style="width: 50%"></p>'
                +'<textarea name="wz_program[0][content]"></textarea>'
                +'<p>Chọn khách sạn:'
                +'<select name="wz_program[0][hotels]">'+option+'</select>'
                +'</p>'
                /*+'<p>Giới thiệu ngắn khách sạn: </p><textarea name="wz_program[0][detail_hotel]"></textarea>'*/
                +'</div>';
            }else{
                var string = '<div class="item" data-index="'+(index+1)+'">'
                    +'<span class="title" data-index="'+(index+1)+'">Jour '+(index+2)+'</span>'
                        +'<a href="#" class="del_item">Xóa</a>'
                    +'<p class="label">Label: <input type="text" name="wz_program['+(index+1)+'][label]" style="width: 50%"></p>'
                    +'<textarea name="wz_program['+(index+1)+'][content]"></textarea>'
                    +'<p>Chọn khách sạn:'
                    +'<select name="wz_program['+(index+1)+'][hotels]">'+option+'</select>'
                    +'</p>'
                    /*+'<p>Giới thiệu ngắn khách sạn: </p><textarea name="wz_program['+(index+1)+'][detail_hotel]"></textarea>'*/
                    +'</div>';
            }
            $(this).parent().find(".content_program_tour").append(string);
        })
    })
})(jQuery);