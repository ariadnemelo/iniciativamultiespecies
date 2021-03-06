<?php
global $post;

if( function_exists('bp_is_active') ):

	$page_id = '';

	$current_component = bp_current_component();

	global $bp;
	if( $current_component === "members" ){
		$page_id = $bp->pages->members->id;
	}elseif( $current_component === "activity"){
		$page_id = $bp->pages->activity->id;
	}elseif( $current_component === "groups" ){
		$page_id = $bp->pages->groups->id;
	}elseif( $current_component === "register" ){
		$page_id = $bp->pages->register->id;
	}elseif( $current_component === "activate" ){
		$page_id = $bp->pages->activate->id;
	}

	dttheme_show_sidebar('page',$page_id, 'right');

	if(function_exists('dynamic_sidebar') && dynamic_sidebar(('page-'.$page_id.'-sidebar')) ):  endif;

elseif( is_page() ):

	dttheme_show_sidebar('page',$post->ID, 'right');

elseif( is_singular('post') ):

	dttheme_show_sidebar('post',$post->ID, 'right');
		
elseif( is_singular('dt_courses')):

	dttheme_show_sidebar('dt_courses',$post->ID, 'right');

elseif( is_singular('dt_lessons')):

	dttheme_show_sidebar('dt_lessons',$post->ID, 'right');

elseif( is_singular('dt_teachers')):

	dttheme_show_sidebar('dt_teachers',$post->ID, 'right');

elseif( is_singular('course') ):

	$disable = dttheme_option('sensei',"disable-senseicourse-everywhere-right-sidebar-for-course-layout");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('senseicourse-everywhere-sidebar-right')) ): endif;
	endif;
	
elseif( is_singular('lesson') ):

	$disable = dttheme_option('sensei',"disable-senseicourse-everywhere-right-sidebar-for-lesson-layout");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('senseicourse-everywhere-sidebar-right')) ): endif;
	endif;

elseif( is_singular('quiz') ):

	$disable = dttheme_option('sensei',"disable-senseicourse-everywhere-right-sidebar-for-quiz-layout");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('senseicourse-everywhere-sidebar-right')) ): endif;
	endif;

elseif( is_singular('product') ):

	$disable = dttheme_option('woo',"disable-shop-everywhere-right-sidebar-for-product-layout");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar('shop-everywhere-sidebar-right') ): endif;
	endif;
	
elseif( is_post_type_archive('dt_portfolios') ):
	
	if(function_exists('dynamic_sidebar') && dynamic_sidebar('custom-post-portfolio-archives-sidebar-right') ): endif;

	$disable = dttheme_option('specialty',"disable-everywhere-right-sidebar-for-portfolio-archives");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar-right')) ): endif;
	endif;
	
elseif( is_post_type_archive('dt_teachers') ):

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('custom-post-teacher-archives-sidebar-right') ): endif;

	$disable = dttheme_option('specialty',"disable-everywhere-right-sidebar-for-teacher-archives");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar-right')) ): endif;
	endif;

elseif( is_post_type_archive('dt_classes')):

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('custom-post-class-archives-sidebar-right') ): endif;
 
	$disable = dttheme_option('dt_class',"disable-everywhere-right-sidebar-for-class-archive");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar-right')) ): endif;
	endif;
 	
elseif( is_post_type_archive('dt_courses') || is_post_type_archive('dt_lessons') || is_tax('course_category') || is_tax('lesson_complexity')):

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('custom-post-course-archives-sidebar-right') ): endif;
 
	$disable = dttheme_option('dt_course',"disable-everywhere-right-sidebar-for-course-archive");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar-right')) ): endif;
	endif;
 	
elseif( is_post_type_archive('lesson') || is_post_type_archive('course') || is_tax('course-category') || is_tax('lesson-tag')):

	$disable = dttheme_option('sensei',"disable-senseicourse-everywhere-right-sidebar-for-course-category-layout");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('senseicourse-everywhere-sidebar-right')) ): endif;
	endif;
	
elseif( is_post_type_archive('product') ):

	dttheme_show_sidebar('page',get_option('woocommerce_shop_page_id'), 'right');
	
elseif( class_exists('woocommerce') && is_product_category() ):

	$disable = dttheme_option('woo',"disable-shop-everywhere-right-sidebar-for-product-category-layout");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar('shop-everywhere-sidebar-right') ): endif;
	endif;

elseif( class_exists('woocommerce') && is_product_tag() ):

	$disable = dttheme_option('woo',"disable-shop-everywhere-right-sidebar-for-product-tag-layout");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar('shop-everywhere-sidebar-right') ): endif;
	endif;
	
elseif( is_post_type_archive('tribe_events') ):
	
	$disable = dttheme_option('events',"disable-event-everywhere-right-sidebar-for-event-archive-layout");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar('events-everywhere-sidebar-right') ): endif;
	endif;

elseif( in_array('tribe-filter-live', get_body_class()) ):
	
	$disable = dttheme_option('events',"disable-event-everywhere-right-sidebar-for-event-category-layout");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar('events-everywhere-sidebar-right') ): endif;
	endif;
	
elseif(is_singular('tribe_events') || is_singular('tribe_venue') || is_singular('tribe_organizer')):

	$disable = dttheme_option('events',"disable-event-everywhere-right-sidebar-for-event-detail-layout");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar('events-everywhere-sidebar-right') ): endif;
	endif;		
		
elseif( is_archive() || is_home() ):

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('post-archives-sidebar-right') ): endif;

	$disable = dttheme_option('specialty',"disable-everywhere-right-sidebar-for-post-archives");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar-right')) ): endif;
	endif;

elseif( is_search() ):

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('search-sidebar-right') ): endif;

	$disable = dttheme_option('specialty',"disable-everywhere-right-sidebar-for-search");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar-right')) ): endif;
	endif;
	
elseif( is_404() ):

	if(function_exists('dynamic_sidebar') && dynamic_sidebar('not-found-404-sidebar-right') ): endif;

	$disable = dttheme_option('specialty',"disable-everywhere-right-sidebar-for-not-found-404");
	if( is_null($disable) ):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar-right')) ): endif;
	endif;

else:
	if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar-right')) ): endif;
endif;

?>