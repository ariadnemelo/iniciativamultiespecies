jQuery(document).ready(function($){

    if(dtthemes_gutenberg_options.guten_comp_enable) {

		jQuery.each(dtthemes_gutenberg_options.guten_comp_posttype, function(index, item) {
            if(jQuery('body').hasClass('post-type-'+item)) {
                jQuery('body.post-type-'+item+' .wrap h1').append('<a href="'+dtthemes_gutenberg_options.guten_comp_adminurl+'post-new.php?post_type='+item+'&classic-editor" class="page-title-action">'+dtthemes_gutenberg_options.guten_comp_addnew_label+'</a>');
            }
        });
        
    }

    if(dtthemes_gutenberg_options.guten_comp_gutenberg_active == 'true') {
        $('#dtthemes-metabox').addClass('hidden');
    }

});