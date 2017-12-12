jQuery(document).ready(function($) {
    // hide line option for works
    jQuery('.tfuse-meta-radio-img-box').bind('click', function(){
        window.setTimeout(function(){
            var sel = jQuery('.tfuse-meta-radio-img-selected').next('.tfuse-meta-radio-img-img').attr('optval');
            if(sel == 'img1'){
                jQuery('.freelancer_show_line').show();
            }
            else{
                jQuery('.freelancer_show_line').hide();
            }
        },12);
    });
    var sel = jQuery('.tfuse-meta-radio-img-selected').next('.tfuse-meta-radio-img-img').attr('optval');
    if(sel == 'img1'){
        jQuery('.freelancer_show_line').show();
    }
    else{
        jQuery('.freelancer_show_line').hide();
    }

    // custom preview for works
    $(".freelancer_content_position .tfuse-meta-radio-img-box:nth-child(1)").append('<div class="hover1">')
    $(".freelancer_content_position .tfuse-meta-radio-img-box:nth-child(1)").hover(function() {
        $('.hover1').css({'background':'url(../wp-content/themes/freelancer-parent/images/preview_work1.jpg) no-repeat 0 0 ','position':'relative','z-index':'2','cursor':'pointer','width':'320px','height':'166px'});
    }, function() {
        $('.hover1').removeAttr( 'style' );
    });

    $(".freelancer_content_position .tfuse-meta-radio-img-box:nth-child(2)").append('<div class="hover2">')
    $(".freelancer_content_position .tfuse-meta-radio-img-box:nth-child(2)").hover(function() {
        $('.hover2').css({'background':'url(../wp-content/themes/freelancer-parent/images/preview_work2.jpg) no-repeat 0 0 ','position':'relative','z-index':'2','cursor':'pointer','width':'320px','height':'166px'});
    }, function() {
        $('.hover2').removeAttr( 'style' );
    });

    $(".freelancer_content_position .tfuse-meta-radio-img-box:nth-child(3)").append('<div class="hover3">')
    $(".freelancer_content_position .tfuse-meta-radio-img-box:nth-child(3)").hover(function() {
        $('.hover3').css({'background':'url(../wp-content/themes/freelancer-parent/images/preview_work3.jpg) no-repeat 0 0 ','position':'relative','z-index':'2','cursor':'pointer','width':'320px','height':'166px'});
    }, function() {
        $('.hover3').removeAttr( 'style' );
    });

    var options = new Array();

    options['page_template'] = jQuery('#page_template').val();
    jQuery('#page_template').bind('change', function() {
        options['page_template'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });
    options['freelancer_page_title'] = jQuery('#freelancer_page_title').val();
    jQuery('#freelancer_page_title').bind('change', function() {
        options['freelancer_page_title'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });
    options['freelancer_work_type'] = jQuery('#freelancer_work_type').val();
    jQuery('#freelancer_work_type').bind('change', function() {
        options['freelancer_work_type'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });
    options['freelancer_service_type'] = jQuery('#freelancer_service_type').val();
    jQuery('#freelancer_service_type').bind('change', function() {
        options['freelancer_service_type'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });

    tfuse_toggle_options(options);

    function tfuse_toggle_options(options)
    {
        if(options['page_template']=='template-about.php'){
            jQuery('.freelancer_about_image,.freelancer_image_alignment,.freelancer_resume,.freelancer_page_social,.freelancer_image_line').show();
            jQuery('.freelancer_icon_title').next('.divider').show();
        }
        else{
            jQuery('.freelancer_about_image,.freelancer_image_alignment,.freelancer_resume,.freelancer_page_social,.freelancer_image_line').hide();
            jQuery('.freelancer_icon_title').next('.divider').hide();
        }

        if(options['freelancer_page_title']=='custom_title'){
            jQuery('.freelancer_custom_title,.freelancer_custom_subtitle').show();
        }
        else{
            jQuery('.freelancer_custom_title,.freelancer_custom_subtitle').hide();
        }

        // for categories and taxonomies
        if(options['freelancer_page_title']=='custom_title'){
            jQuery('#freelancer_custom_title,#freelancer_custom_subtitle').parent().parent('.form-field').show();
        }
        else{
            jQuery('#freelancer_custom_title,#freelancer_custom_subtitle').parent().parent('.form-field').hide();
        }

        if(options['freelancer_work_type']=='video' || options['freelancer_service_type']=='video'){
            jQuery('.freelancer_video_link,.freelancer_video_dimensions,.freelancer_video_position').show();
            jQuery('.freelancer_single_image,.freelancer_single_img_dimensions,.freelancer_single_img_position').hide();
        }
        else if(options['freelancer_work_type']=='image' || options['freelancer_service_type']=='image'){
            jQuery('.freelancer_video_link,.freelancer_video_dimensions,.freelancer_video_position').hide();
            jQuery('.freelancer_single_image,.freelancer_single_img_dimensions,.freelancer_single_img_position').show();
        }


    }
});