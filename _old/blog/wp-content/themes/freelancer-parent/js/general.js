var $ = jQuery;
jQuery(document).ready(function () {
    $('.post-category').carousel({
        interval: false
    });
    var screenRes = jQuery(window).width();
    if (screenRes <= 1024){
        $('.services-carousel').carousel({
            interval: false
        });
        $('.myWork').carousel({
            interval: false
        });
        $('.post-category').carousel({
            interval: false
        });
    }

    // initial href
    var ajax_url = tf_script.ajaxurl;
    var initial_href = ajax_url.replace('wp-admin/admin-ajax.php','');
    $("body").on('click' , ".topmenu a,.footer_nav a,.carousel-footer a" ,function(event){
        var linkTo = $(this).attr('href');
        if(screenRes>1024){
            event.stopPropagation();
            $('body').scrollTo(linkTo,800,{offset:-135});
        }
        // for show link
        window.history.pushState('', '', initial_href+linkTo);
        if(screenRes>1024){
            return false;
        }
    });

    // swipe support with jQuery Mobile
    $(".myWork,.services-carousel,.post-category").swiperight(function() {
        $(this).carousel('prev');
    });
    $(".myWork,.services-carousel,.post-category").swipeleft(function() {
        $(this).carousel('next');
    });
});

jQuery(window).load(function () {
    jQuery(".body_wrap .section:first").addClass("first");
    jQuery(".body_wrap .section:last").addClass("last");

    // style Select, Radio, Checkbox
    if (jQuery("select").hasClass("select_styled")) {
        var deviceAgent = navigator.userAgent.toLowerCase();
        var agentID = deviceAgent.match(/(iphone|ipod|ipad)/);
        if (agentID) {
            cuSel({changedEl: ".select_styled", visRows: 10, scrollArrows: true});   // Add arrows Up/Down for iPad/iPhone
        } else {
            cuSel({changedEl: ".select_styled", visRows: 10});
        }
    }

    // Remove links outline in IE 7
    jQuery("a").attr("hideFocus", "true").css("outline", "none");

    // buttons
    jQuery(".button, .post-share a, .btn-submit , .btn").hover(function () {
        jQuery(this).stop().animate({"opacity": 0.80});
    }, function () {
        jQuery(this).stop().animate({"opacity": 1});
    });

    /* work carousel */
    function animateSlide() {
        jQuery(".myWork").find(".item").find('*[data-animate]').each(function () {
            var $this = jQuery(this);
            var animateClass = $this.data('animate');
            $this.removeClass("animate " + animateClass);
            setTimeout(function () {
                $this.addClass("animate " + animateClass);
            }, 1);
        });
    }
    animateSlide();

    jQuery(".myWork").on('slide.bs.carousel', function () {
        animateSlide();
    });

    /* Read More */
    $(".post-item").each(function () {
        var $this = $(this);
        $this.find(".post-inner").css({
            'height': 260,
            'overflow': 'hidden'
        });

        $this.on('click', '.read-more', function () {
            $this.find(".post-inner").css({
                'height':'auto'
            });
            $this.find(".meta-bot").hide();
        });

    });

    $("#title-post").text($(".post-category.active").find(".post-item.active .post-title").text());

    // for posts links
    var ajax_url = tf_script.ajaxurl;
    var toRemove = 'wp-admin/admin-ajax.php';
    var initial_href = ajax_url.replace(toRemove,'');

    $('.post-category').on('slid.bs.carousel', function () {
        id_post = $(this).find('.post-item.active').attr('id');
        window.location.href = initial_href+'#post='+id_post;
        $("#title-post").fadeOut(10, function () {
            $(this).text($(".post-category.active").find(".post-item.active .post-title").text()).fadeIn(500);
        });
    });

    // Category select
    $(".post-category").each(function(index){
        var $this = $(this);
        $this.attr("id","post-category-"+(index+1));
        $this.append( '<a class="left carousel-control" href="#post-category-'+(index+1)+'" data-slide="prev"><span class="icon-prev"></span></a><a class="right carousel-control" href="#post-category-'+(index+1)+'" data-slide="next"><span class="icon-next"></span></a>' );
    });

    var active_category = $(".post-category.active").data("index");
    $(".widget-category li[data-index="+active_category+"]").addClass("active");

    var activeReady = true;
    $('.widget-category').on('click', '.category-item:not(.active)', function() {
        var data_index = $(this).attr('data-index');
        if($(".post-category[data-index="+data_index+"]").find('.post-item.active').length==0){
            $(".post-category[data-index="+data_index+"]").find('.post-item:first').addClass('active');
        }

        $("#title-post").fadeOut(10, function () {
            $(this).text($(".post-category[data-index="+data_index+"]").find(".post-item.active .post-title").text()).fadeIn(500);
        });
        if (!activeReady) {
            return;
        }
        activeReady = false;
        var $this = $(this);

        $('.category-item.active').removeClass('active');
        $this.addClass('active');
        $('.post-category.active').fadeOut(300, function() {
            $(this).removeClass('active');
            $('.post-category[data-index="' + $this.data('index') + '"]')
                .addClass('active')
                .fadeIn(500, function() {
                    activeReady = true;
                });
        });
        // change post id onclick .widget-category
        id_post = $(".post-category[data-index="+data_index+"]").find('.post-item.active').attr('id');
        window.location.href = initial_href+'#post='+id_post;
    });

    // if exist posts links
    var post_url = window.location.href.split('#post=')[1];
    if(post_url!=undefined){
        jQuery('.post-category .post-item.active, .post-category.active, .widget-category .category-item.active').removeClass('active'); //
        post_id = '#'+post_url;
        curent_post = jQuery('.post-category '+post_id).addClass('active');
        curent_category = curent_post.parent().parent().addClass('active').attr('data-index');
        jQuery('.widget-category [data-index="'+curent_category+'"]').addClass('active');
        // show curent post title
        $("#title-post").fadeOut(10, function () {
            $(this).text($(".post-category.active").find(".post-item.active .post-title").text()).fadeIn(500);
        });
        // scroll to curent post
        $('body').scrollTo(post_id,800,{offset:-190});
    }

    /* reset comment form */
    jQuery(".comment-form .reset_form").bind("click", function() {
        jQuery(".comment-form input[type=text],.comment-form textarea").val("");
        return false;
    });

    /* reset cusel select for CF */
    jQuery(".contactForm .reset_form").bind("click", function() {
        jQuery('.contactForm .cusel').each(function(){
            curent = jQuery(this).find('.cusel-scroll-wrap');
            curent.find('.cuselActive').removeClass('cuselActive');
            curent.find('.cuselItem:first').addClass('cuselActive');
            var first_item = curent.find('.cuselItem:first label').html();
            jQuery(this).find('.cuselText label').html(first_item);
            jQuery(this).find('input[type="hidden"]').val(first_item);
        });
    });

    /* reset cusel select for RF */
    jQuery(".reservationForm .reset_form").bind("click", function() {
        jQuery('.reservationForm .cusel').each(function(){
            curent = jQuery(this).find('.cusel-scroll-wrap');
            curent.find('.cuselActive').removeClass('cuselActive');
            curent.find('.cuselItem:first').addClass('cuselActive');
            var first_item = curent.find('.cuselItem:first label').html();
            jQuery(this).find('.cuselText label').html(first_item);
            jQuery(this).find('input[type="hidden"]').val(first_item);
        });
    });

    var screenRes = jQuery(window).width();
    // prettyPhoto lightbox, check if <a> has atrr data-rel and hide for Mobiles
    if(jQuery('a').is('[data-rel]') && screenRes > 600) {
        jQuery('a[data-rel]').each(function() {
            jQuery(this).attr('rel', jQuery(this).data('rel'));
        });
        jQuery("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false});
    }

    jQuery('.myWork').carousel({
        interval: 5000
    });

    jQuery(".footer_nav a , .author-socials a").tooltip();

    jQuery('#contact_email').blur(function () {
        var t_directory = tfuse_template_dir.template_directory;
        if (jQuery(this).val() != '') {
            var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
            if (pattern.test(jQuery(this).val())) {
                jQuery('#symbol').css({
                    'background': 'url('+t_directory+'/images/icons/ok.png) no-repeat center center'
                });
            } else {
                jQuery('#symbol').css({
                    'background': 'url('+t_directory+'/images/icons/x.png) no-repeat center center'
                });
            }
        } else {
            jQuery('#symbol').css({
                'background': 'url('+t_directory+'/images/icons/x.png) no-repeat center center'
            });
        }
    });

    // make reply to comments, save id of the replied comment
    jQuery('.comment-reply-link').on('click',function(){
        var comment_id = jQuery(this).parent().parent('.comment_body').attr('id');
        var s_length = comment_id.length;
        var result = comment_id.substring(11,s_length);
        jQuery('.comment-form:visible').find('#comment_parent').val(result);
    });

    // add select box left and top
    jQuery('.select_styled').click(function(){
        var offset = jQuery(this).offset();
        var top = offset.top;
        var left = offset.left;
        jQuery('#cuselBox').css({ "top": top+34, "left": left });
    });

    // Scroll to top Icon
    $.fn.UItoTop = function(options) {
        var defaults = {
            text: 'To Top',
            min: 200,
            inDelay:400,
            outDelay:300,
            containerID: 'toTop',
            containerHoverID: 'toTopHover',
            scrollSpeed: 700,
            easingType: 'linear'
        };

        var settings = $.extend(defaults, options);
        var containerIDhash = '#' + settings.containerID;
        var containerHoverIDHash = '#'+settings.containerHoverID;

        $('body').append('<span id="'+settings.containerID+'">'+settings.text+'</span>');
        $(containerIDhash).hide().click(function(){
            $('html,body,document').animate({scrollTop:0}, settings.scrollSpeed, settings.easingType);
            $('#'+settings.containerHoverID, this).stop().animate({'opacity': 0 }, settings.inDelay, settings.easingType);
            return false;
        })
            .prepend('<span id="'+settings.containerHoverID+'"></span>')
            .hover(function() {
                $(containerHoverIDHash, this).stop().animate({
                    'opacity': 1
                }, 500, 'linear');
            }, function() {
                $(containerHoverIDHash, this).stop().animate({
                    'opacity': 0.7
                }, 600, 'linear');
            });

        $(window).scroll(function() {
            var sd = $(window).scrollTop();
            if(typeof document.body.style.maxHeight === "undefined") {
                $(containerIDhash).css({
                    'position': 'absolute',
                    'top': $(window).scrollTop() + $(window).height() - 50
                });
            }
            if ( sd > settings.min )
                $(containerIDhash).fadeIn(settings.inDelay);
            else
                $(containerIDhash).fadeOut(settings.Outdelay);
        });
    };
    if (screenRes > 990) {
        $().UItoTop();
    }

});