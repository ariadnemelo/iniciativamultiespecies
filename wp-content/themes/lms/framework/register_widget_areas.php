<?php 
	#Display Everywhere Left
	register_sidebar(array(
		'name' 			=>	'Display Everywhere Left',
		'id'			=>	'display-everywhere-sidebar-left',
		'description'	=>	esc_html__("Common sidebar that appears on the left.", 'lms'),
		'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> 	'</aside>',
		'before_title' 	=> 	'<h3 class="widgettitle">',
		'after_title' 	=> 	'<span></span></h3>'));

	#Display Everywhere Right
	register_sidebar(array(
		'name' 			=>	'Display Everywhere Right',
		'id'			=>	'display-everywhere-sidebar-right',
		'description'	=>	esc_html__("Common sidebar that appears on the right.", 'lms'),
		'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> 	'</aside>',
		'before_title' 	=> 	'<h3 class="widgettitle">',
		'after_title' 	=> 	'<span></span></h3>'));


	#Custom Widgets for Sidebars
	$widgets_sidebars = dttheme_option('widgetarea','sidebars');
	$widgets_sidebars = is_array($widgets_sidebars) ? array_unique($widgets_sidebars) : array();
    $widgets_sidebars = array_filter($widgets_sidebars);
    foreach ($widgets_sidebars as $key => $value) {
    	$id = mb_convert_case($value, MB_CASE_LOWER, "UTF-8");
    	$id = str_replace(" ", "-", $id);

    	register_sidebar(array(
		'name' 			=>	$value,
		'id'			=>	$id,
		'description'   =>  esc_html__("A unique sidebar that is created in Admin panel for left, right and both sidebars", 'lms'),
		'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> 	'</aside>',
		'before_title' 	=> 	'<h3 class="widgettitle">',
		'after_title' 	=> 	'<span></span></h3>'));
    }

	
	#Events Everywhere Sidebar
	if( class_exists('Tribe__Events__Main')	):
		#Left Sidebar
		register_sidebar(array(
			'name' 			=>	'Events Everywhere Left',
			'id'			=>	'events-everywhere-sidebar-left',
			'description'   =>  esc_html__("Events page unique sidebar that appears on the left.", 'lms'),
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'<span></span></h3>'));
			
		#Right Sidebar
		register_sidebar(array(
			'name' 			=>	'Events Everywhere Right',
			'id'			=>	'events-everywhere-sidebar-right',
			'description'   =>  esc_html__("Events page unique sidebar that appears on the right.", 'lms'),
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'<span></span></h3>'));
	endif;
	
	
	#Shop Everywhere Sidebar
	if( class_exists('woocommerce')	):
		#Left Sidebar
		register_sidebar(array(
			'name' 			=>	'Shop Everywhere Left',
			'id'			=>	'shop-everywhere-sidebar-left',
			'description'   =>  esc_html__("Shop page unique sidebar that appears on the left.", 'lms'),
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'<span></span></h3>'));
			
		#Right Sidebar
		register_sidebar(array(
			'name' 			=>	'Shop Everywhere Right',
			'id'			=>	'shop-everywhere-sidebar-right',
			'description'   =>  esc_html__("Shop page unique sidebar that appears on the right.", 'lms'),
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'<span></span></h3>'));
	endif;
	
	
	#Post Archives Sidebar
	$post_archives_layout = dttheme_option('specialty','post-archives-layout');
	$post_archives_layout = !empty($post_archives_layout) ? $post_archives_layout : "content-full-width";
	if( $post_archives_layout != "content-full-width" ){
		if( $post_archives_layout == "with-left-sidebar" || $post_archives_layout == "both-sidebar" ){
			register_sidebar(array(
				'name' 			=>	esc_html__("Post Archives Sidebar Left", 'lms'),
				'id'			=>	'post-archives-sidebar-left',
				'description'   =>  esc_html__("Tag archives sidebar that appears on the left.", 'lms'),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'<span></span></h3>'));
		}
		if( $post_archives_layout == "with-right-sidebar" || $post_archives_layout == "both-sidebar"){
			register_sidebar(array(
				'name' 			=>	esc_html__("Post Archives Sidebar Right", 'lms'),
				'id'			=>	'post-archives-sidebar-right',
				'description'   =>  esc_html__("Tag archives sidebar that appears on the right.", 'lms'),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'<span></span></h3>'));
		}
	}
	
	
	#Portfolio Archives Sidebar
	if( class_exists ( 'DTCorePlugin' ) ):
		$portfolio_archives_layout = dttheme_option('specialty','portfolio-archives-layout');
		$portfolio_archives_layout = !empty($portfolio_archives_layout) ? $portfolio_archives_layout : "content-full-width";
		if( $portfolio_archives_layout != "content-full-width" ){
			if( $portfolio_archives_layout == "with-left-sidebar" || $portfolio_archives_layout == "both-sidebar" ){
				register_sidebar(array(
					'name' 			=>	esc_html__("Portfolio Archives Sidebar Left", 'lms'),
					'id'			=>	'custom-post-portfolio-archives-sidebar-left',
					'description'   =>  esc_html__("Portfolio archives sidebar that appears on the left.", 'lms'),
					'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> 	'</aside>',
					'before_title' 	=> 	'<h3 class="widgettitle">',
					'after_title' 	=> 	'<span></span></h3>'));
			}
			if( $portfolio_archives_layout == "with-right-sidebar" || $portfolio_archives_layout == "both-sidebar"){
				register_sidebar(array(
					'name' 			=>	esc_html__("Portfolio Archives Sidebar Right", 'lms'),
					'id'			=>	'custom-post-portfolio-archives-sidebar-right',
					'description'   =>  esc_html__("Portfolio archives sidebar that appears on the right.", 'lms'),
					'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> 	'</aside>',
					'before_title' 	=> 	'<h3 class="widgettitle">',
					'after_title' 	=> 	'<span></span></h3>'));
			}			
		}
	endif;	
	
	#Teacher Archives Sidebar
	$teacher_archives_layout = dttheme_option('specialty','teacher-archives-layout');
	$teacher_archives_layout = !empty($teacher_archives_layout) ? $teacher_archives_layout : "content-full-width";
	if( $teacher_archives_layout != "content-full-width" ){
		if( $teacher_archives_layout == "with-left-sidebar" || $teacher_archives_layout == "both-sidebar" ){
			register_sidebar(array(
				'name' 			=>	sprintf(esc_html__('%s Archives Sidebar Left', 'lms'), $GLOBALS['teachers-singular-label']),
				'id'			=>	'custom-post-teacher-archives-sidebar-left',
				'description'   =>  sprintf(esc_html__('%s archives sidebar that appears on the left.', 'lms'), $GLOBALS['teachers-singular-label']),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'<span></span></h3>'));
		}
		if( $teacher_archives_layout == "with-right-sidebar" || $teacher_archives_layout == "both-sidebar"){
			register_sidebar(array(
				'name' 			=>	sprintf(esc_html__('%s Archives Sidebar Right', 'lms'), $GLOBALS['teachers-singular-label']),
				'id'			=>	'custom-post-teacher-archives-sidebar-right',
				'description'   =>  sprintf(esc_html__('%s archives sidebar that appears on the right.', 'lms'), $GLOBALS['teachers-singular-label']),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'<span></span></h3>'));
		}
	}
	
	#Course Archives Sidebar
	if( class_exists ( 'DTCorePlugin' ) ):
		$class_archives_layout = dttheme_option('dt_class','archives-layout');
		$class_archives_layout = !empty($class_archives_layout) ? $class_archives_layout : "content-full-width";
		if( $class_archives_layout != "content-full-width" ){
			if( $class_archives_layout == "with-left-sidebar" || $class_archives_layout == "both-sidebar" ){
				register_sidebar(array(
					'name' 			=>	esc_html__("Class Archives Sidebar Left", 'lms'),
					'id'			=>	'custom-post-class-archives-sidebar-left',
					'description'   =>  esc_html__("Class archives sidebar that appears on the left.", 'lms'),
					'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> 	'</aside>',
					'before_title' 	=> 	'<h3 class="widgettitle">',
					'after_title' 	=> 	'<span></span></h3>'));
			}
			if( $class_archives_layout == "with-right-sidebar" || $class_archives_layout == "both-sidebar"){
				register_sidebar(array(
					'name' 			=>	esc_html__("Class Archives Sidebar Right", 'lms'),
					'id'			=>	'custom-post-class-archives-sidebar-right',
					'description'   =>  esc_html__("Class archives sidebar that appears on the right.", 'lms'),
					'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> 	'</aside>',
					'before_title' 	=> 	'<h3 class="widgettitle">',
					'after_title' 	=> 	'<span></span></h3>'));
			}
		}
	
		$course_archives_layout = dttheme_option('dt_course','archives-layout');
		$course_archives_layout = !empty($course_archives_layout) ? $course_archives_layout : "content-full-width";
		if( $course_archives_layout != "content-full-width" ){
			if( $course_archives_layout == "with-left-sidebar" || $course_archives_layout == "both-sidebar" ){
				register_sidebar(array(
					'name' 			=>	esc_html__("Course Archives Sidebar Left", 'lms'),
					'id'			=>	'custom-post-course-archives-sidebar-left',
					'description'   =>  esc_html__("Course archives sidebar that appears on the left.", 'lms'),
					'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> 	'</aside>',
					'before_title' 	=> 	'<h3 class="widgettitle">',
					'after_title' 	=> 	'<span></span></h3>'));
			}
			if( $course_archives_layout == "with-right-sidebar" || $course_archives_layout == "both-sidebar"){
				register_sidebar(array(
					'name' 			=>	esc_html__("Course Archives Sidebar Right", 'lms'),
					'id'			=>	'custom-post-course-archives-sidebar-right',
					'description'   =>  esc_html__("Course archives sidebar that appears on the right.", 'lms'),
					'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> 	'</aside>',
					'before_title' 	=> 	'<h3 class="widgettitle">',
					'after_title' 	=> 	'<span></span></h3>'));
			}
		}
	endif;
	
	
	#Sensei Course Everywhere Sidebar
	if( class_exists('WooThemes_Sensei') ) {
	
		#Left Sidebar
		register_sidebar(array(
			'name' 			=>	'Sensei Course Everywhere Left',
			'id'			=>	'senseicourse-everywhere-sidebar-left',
			'description'	=>	esc_html__("Common sensei course sidebar that appears on the left.", 'lms'),
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'<span></span></h3>'));
	
		#Right Sidebar
		register_sidebar(array(
			'name' 			=>	'Sensei Course Everywhere Right',
			'id'			=>	'senseicourse-everywhere-sidebar-right',
			'description'	=>	esc_html__("Common sensei course sidebar that appears on the right.", 'lms'),
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'<span></span></h3>'));
		
	}
	
	#Search Page Layout
	$search_layout = dttheme_option('specialty','search-layout');
	$search_layout = !empty($search_layout) ? $search_layout : "content-full-width";
	if( $search_layout != "content-full-width" ){
		if( $search_layout == "with-left-sidebar" || $search_layout == "both-sidebar" ){
			register_sidebar(array(
				'name' 			=>	esc_html__("Search Sidebar Left", 'lms'),
				'id'			=>	'search-sidebar-left',
				'description'   =>  esc_html__("Search page sidebar that appears on the left.", 'lms'),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'<span></span></h3>'));
        }
		if( $search_layout == "with-right-sidebar" || $search_layout == "both-sidebar"){
			register_sidebar(array(
				'name' 			=>	esc_html__("Search Sidebar Right", 'lms'),
				'id'			=>	'search-sidebar-right',
				'description'   =>  esc_html__("Search page sidebar that appears on the right.", 'lms'),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'<span></span></h3>'));
		}		
	}
	
	
	#404 Page Layout
	$layout_404 = dttheme_option('specialty','not-found-404-layout');
	$layout_404 = !empty($layout_404) ? $layout_404 : "content-full-width";
	if( $layout_404 != "content-full-width" ){
		if( $layout_404 == "with-left-sidebar" || $layout_404 == "both-sidebar" ){
			register_sidebar(array(
				'name' 			=>	esc_html__('Not Found ( 404 ) Sidebar Left', 'lms'),
				'id'			=>	'not-found-404-sidebar-left',
				'description'   =>  esc_html__("404 page sidebar that appears on the left.", 'lms'),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'<span></span></h3>'));
        }
		if( $layout_404 == "with-right-sidebar" || $layout_404 == "both-sidebar"){
			register_sidebar(array(
				'name' 			=>	esc_html__('Not Found ( 404 ) Sidebar Right', 'lms'),
				'id'			=>	'not-found-404-sidebar-right',
				'description'   =>  esc_html__("404 page sidebar that appears on the right.", 'lms'),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'<span></span></h3>'));
		}
		
	}


	#Custom Mega Menu Sidebars
	$widgets = dttheme_option('widgetarea','megamenu');
	$widgets = is_array($widgets) ? array_unique($widgets) : array();
    $widgets = array_filter($widgets);
    foreach ($widgets as $key => $value) {
    	$id = mb_convert_case($value, MB_CASE_LOWER, "UTF-8");
    	$id = str_replace(" ", "-", $id);

    	register_sidebar(array(
		'name' 			=>	$value,
		'id'			=>	$id,
		'description'   =>  esc_html__("A unique mega menu sidebar that is created in Admin panel", 'lms'),
		'before_widget' => 	'<li id="%1$s" class="widget %2$s">',
		'after_widget' 	=> 	'</li>',
		'before_title' 	=> 	'<h3 class="widgettitle">',
		'after_title' 	=> 	'<span></span></h3>'));
    }


	#Footer Columnns		
	$footer_columns =  dttheme_option('general','footer-columns');
	dttheme_footer_widgetarea($footer_columns);
	


if( class_exists('woocommerce')	):

	#Custom Left Sidebars for Product
	$products = dttheme_option("widgetarea","left-products");
	$products = !empty($products) ? $products : array();
	$widget_areas_for_products = array_filter(array_unique($products));
	foreach($widget_areas_for_products as $id):
		$title = get_the_title($id);
		register_sidebar(array(
			'name' 			=>	"Product: {$title} - Left",
			'id'			=>	"left-product-{$id}-sidebar",
			'description'	=> esc_html__("Individual product sidebar that appears on the left.", 'lms'),
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'<span></span></h3>'));
	endforeach;

	#Custom Right Sidebars for Product
	$products = dttheme_option("widgetarea","right-products");
	$products = !empty($products) ? $products : array();
	$widget_areas_for_products = array_filter(array_unique($products));
	foreach($widget_areas_for_products as $id):
		$title = get_the_title($id);
		register_sidebar(array(
			'name' 			=>	"Product: {$title} - Right",
			'id'			=>	"right-product-{$id}-sidebar",
			'description'	=> esc_html__("Individual product sidebar that appears on the right.", 'lms'),
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'<span></span></h3>'));
	endforeach;


	#Custom Left Sidebars for Product Category
	$product_categories = dttheme_option("widgetarea","left-product-category");
	$product_categories = !empty($product_categories) ? $product_categories : array();
	$widget_areas_for_product_categories = array_filter(array_unique($product_categories));
	
	foreach($widget_areas_for_product_categories as $id):
	
		$title = $wpdb->get_var( $wpdb->prepare("SELECT name FROM $wpdb->terms  WHERE term_id = %s",$id));
		$slug  = $wpdb->get_var( $wpdb->prepare("SELECT slug FROM $wpdb->terms  WHERE term_id = %s",$id));	
		
		register_sidebar(array(
			'name' 			=>	"Product Category: {$title} - Left ",
			'id'			=>	"left-product-category-{$slug}-sidebar",
			'description'	=> esc_html__("Individual product category sidebar that appears on the left.", 'lms'),
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'<span></span></h3>'));
	endforeach;
	
	#Custom Right Sidebars for Product Category
	$product_categories = dttheme_option("widgetarea","right-product-category");
	$product_categories = !empty($product_categories) ? $product_categories : array();
	$widget_areas_for_product_categories = array_filter(array_unique($product_categories));
	
	foreach($widget_areas_for_product_categories as $id):
	
		$title = $wpdb->get_var( $wpdb->prepare("SELECT name FROM $wpdb->terms  WHERE term_id = %s",$id));
		$slug  = $wpdb->get_var( $wpdb->prepare("SELECT slug FROM $wpdb->terms  WHERE term_id = %s",$id));	
		
		register_sidebar(array(
			'name' 			=>	"Product Category: {$title} - Right ",
			'id'			=>	"right-product-category-{$slug}-sidebar",
			'description'	=> esc_html__("Individual product category sidebar that appears on the right.", 'lms'),
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'<span></span></h3>'));
	endforeach;

	#Custom Left Sidebars for Product Tag
	$product_tags = dttheme_option("widgetarea","left-product-tag");
	$product_tags = !empty($product_tags) ? $product_tags : array();
	$widget_areas_for_product_tags = array_filter(array_unique($product_tags));
	foreach($widget_areas_for_product_tags as $id):
		$title = $wpdb->get_var( $wpdb->prepare("SELECT name FROM $wpdb->terms  WHERE term_id = %s",$id));
		$slug  = $wpdb->get_var( $wpdb->prepare("SELECT slug FROM $wpdb->terms  WHERE term_id = %s",$id));	
		register_sidebar(array(
			'name' 			=>	"Product Tag: {$title} - Left",
			'id'			=>	"left-product-tag-{$slug}-sidebar",
			'description'	=> esc_html__("Individual product tag sidebar that appears on the left.", 'lms'),
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'<span></span></h3>'));
	endforeach;

	#Custom Right Sidebars for Product Tag
	$product_tags = dttheme_option("widgetarea","right-product-tag");
	$product_tags = !empty($product_tags) ? $product_tags : array();
	$widget_areas_for_product_tags = array_filter(array_unique($product_tags));
	foreach($widget_areas_for_product_tags as $id):
		$title = $wpdb->get_var( $wpdb->prepare("SELECT name FROM $wpdb->terms  WHERE term_id = %s",$id));
		$slug  = $wpdb->get_var( $wpdb->prepare("SELECT slug FROM $wpdb->terms  WHERE term_id = %s",$id));	
		register_sidebar(array(
			'name' 			=>	"Product Tag: {$title} - Right",
			'id'			=>	"right-product-tag-{$slug}-sidebar",
			'description'	=> esc_html__("Individual product tag sidebar that appears on the right.", 'lms'),
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'<span></span></h3>'));
	endforeach;

endif;?>