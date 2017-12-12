function custom_generator_services_examples(type,options) {
    shortcode='[services_examples title="'+options['title']+'"]';
    for(i in options.array) {
        shortcode+='[se_tab url="'+options.array[i]['url']+'"]'+options.array[i]['name']+'[/se_tab]';
    }
    shortcode+='[/services_examples]';
    return shortcode;
}

function custom_obtainer_services_examples(data) {
    cont=jQuery('.tf_shortcode_option:visible');
    sh_options={};
    sh_options['array']=[];
    sh_options['title']= opt_get('tf_shc_services_examples_title',cont);
    cont.find('[name="tf_shc_services_examples_name"]').each(function(i) {
        div=jQuery(this).parents('.option');
        name=opt_get(jQuery(this).attr('name'),div);
        div1=jQuery(this).parents('.option').nextAll('.option').find('[name="tf_shc_services_examples_url"]').first().parents('.option');
        url=opt_get(jQuery(this).parents('.option').nextAll('.option').find('[name="tf_shc_services_examples_url"]').first().attr('name'),div1);
        tmp={};
        tmp['name']=name;
        tmp['url']=url;
        sh_options['array'].push(tmp);
    });
    return sh_options;
}

jQuery(document).ready(function($) {
    var $=jQuery;

    $('#tf_shc_prettyPhoto_type').live('change',function () {
        val = $(this).val();
        if(val !='image')
            $('.tf_shc_prettyPhoto_thumb').hide();
        else
            $('.tf_shc_prettyPhoto_thumb').show();
    });

    $('#tf_shc_text_styles_type').live('change',function () {
        val = $(this).val();
        if(val !='link')
            $('.tf_shc_text_styles_link,.tf_shc_text_styles_target').hide();
        else
            $('.tf_shc_text_styles_link,.tf_shc_text_styles_target').show();
    });
});
