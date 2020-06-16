<?php
function dttheme_blog_title() {
	$the_content = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', get_option('blogname'));
	return $the_content;
}

#Remove rel attribute from the category list ( Validation purpose)
function remove_category_list_rel($output) {
	return str_replace(' rel="category tag"', '', $output);
}
add_filter('wp_list_categories', 'remove_category_list_rel');
add_filter('the_category', 'remove_category_list_rel');
#To remove rel attribute from the category list

add_filter('widget_text', 'do_shortcode');

#FILTER TO MODIFY THE DEFAULT CATEGORY WIDGET
add_filter('wp_list_categories', 'my_wp_list_categories');
function my_wp_list_categories($output) {
	if (strpos($output, "</span>") <= 0) {
		$output = str_replace('</a> (', ' <span>(', $output);
		$output = str_replace(')', ')</span></a> ', $output);
	}
	return $output;
}

add_filter('get_archives_link', 'my_wp_list_archive');
function my_wp_list_archive($output) {
	$output = str_replace('</a>&nbsp;(', '<span> ', $output);
	$output = str_replace(')', '</span></a> ', $output);
	return $output;
}

/** dttheme_default_navigation()
 * Objective:
 *		To setup default navigation  when no menu is selected
 **/
function dttheme_default_navigation() {
	echo '<ul class="menu">';
	$args = array('depth' => 1, 'title_li' => '', 'echo' => 0, 'post_type' => 'page', 'post_status' => 'publish');
	$pages = wp_list_pages($args);
	if ($pages)
		echo "{$pages}";
	echo '</ul>';
}
### --- ****  dttheme_default_navigation() *** --- ###

add_action('wp_enqueue_scripts', 'plugin_head_styles_scripts');
function plugin_head_styles_scripts() {

	#Theme urls for Style Picker
	global $dt_google_fonts;
	$scroll = dttheme_option('general', 'disable-custom-scroll') ? "disable" : "enable";
	$stickynav = ( dttheme_option("general","enable-sticky-nav") ) ? "enable" : "disable";
	$landingpagestickynav = ( dttheme_option("general","enable-landingpage-sticky-nav") ) ? "enable" : "disable";
	$isResponsive = dttheme_option ( "mobile", "is-theme-responsive" ) ? "enable" : "disable";
	$retina_support = ( dttheme_option("general","enable-retina") ) ? "enable" : "disable";
	$theme_folder_name = ( IAMD_THEME_FOLDER_NAME != '') ? IAMD_THEME_FOLDER_NAME : '';
	
	if(is_rtl()) $rtl = true; else $rtl = false;
	
	$pluginURL =  plugin_dir_url ( 'designthemes-core-features' );
	
	if( is_page_template('tpl-landingpage.php') ) $landingpage = true; else $landingpage = false;

	$load_isotope = true;
	if(class_exists('Tribe__Events__Pro__Main') && tribe_is_photo()) {
		$load_isotope = false;
	}

	#Theme urls for Style Picker End
	wp_enqueue_script('modernizr-script', IAMD_FW_URL.'js/public/modernizr.min.js');
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui', IAMD_FW_URL.'js/public/jquery-ui.js');
	
	wp_enqueue_script( 'html5shiv', IAMD_FW_URL . '/js/public/html5shiv.min.js', array(), false, true );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
		
	if($retina_support == 'enable'){
		wp_enqueue_script('retina', IAMD_FW_URL.'js/public/retina.js',array(),false,true);
	}
	wp_enqueue_script('jquery-uitotop', IAMD_FW_URL.'js/public/jquery.uitotop.js',array(),false,true);
	wp_enqueue_script('jquery-easing', IAMD_FW_URL.'js/public/jquery.easing.js',array(),false,true);
	wp_enqueue_script('jquery-smart-resize', IAMD_FW_URL.'js/public/jquery.smart-resize.js',array(),false,true);
	wp_enqueue_script('jquery-prettyphoto', IAMD_FW_URL.'js/public/jquery.prettyphoto.js', array(), false, true);
	wp_enqueue_script('jquery-nicescroll', IAMD_FW_URL.'js/public/jquery.nicescroll.min.js', array(), false, true);
	wp_enqueue_script('jquery-sticky', IAMD_FW_URL.'js/public/jquery.sticky.nav.js', array(), false, true);
	if($load_isotope) {
		wp_enqueue_script('isotope', IAMD_FW_URL.'js/public/isotope.pkgd.min.js', array(), false, true);
	}
	wp_enqueue_script('jquery-fitvids', IAMD_FW_URL.'js/public/jquery.fitvids.js', array(), false, true);
	wp_enqueue_script('jquery-bxslider', IAMD_FW_URL.'js/public/jquery.bxslider.js', array(), false, true);
	wp_enqueue_script('jquery-toucheffects', IAMD_FW_URL.'js/public/jquery.toucheffects.js', array(), false, true);
	wp_enqueue_script('jquery-tablesorter', IAMD_FW_URL.'js/public/jquery.table.sorter.js', array(), false, true);
	if($landingpage){
		wp_enqueue_script('jquery-scrollto', IAMD_FW_URL.'js/public/jquery.scrollto.js', array(), false, true);
	}

	
	if(defined('ICL_LANGUAGE_CODE')) {
		wp_localize_script('jquery-nicescroll', 'mytheme_urls', array(
			'theme_base_url' => esc_js(IAMD_BASE_URL),
			'framework_base_url' => esc_js(IAMD_FW_URL),
			'ajaxurl' => esc_url( admin_url('admin-ajax.php') ),
			'url' => esc_url( get_site_url() ),
			'scroll' => $scroll,
			'loadisotope' => $load_isotope,
			'stickynav' => $stickynav,
			'landingpage' => $landingpage,
			'landingpagestickynav' => $landingpagestickynav,
			'is_admin' => current_user_can('level_10'),		
			'skin' => dttheme_option('appearance','skin'),
			'layout' => dttheme_option('appearance','layout'),
			'isLandingPage' => $landingpage,
			'isRTL' => $rtl,
			'pluginURL' => $pluginURL,
			'retinaSupport' => $retina_support,
			'lang' => ICL_LANGUAGE_CODE,
			'isResponsive' => $isResponsive,
			'layout_pattern' => dttheme_option('appearance','boxed-layout-pattern'),
			'themeName' => $theme_folder_name,
			'dtLMSAjaxNonce' => wp_create_nonce('dtLMSAjaxNonce')
		));

	} else {

		wp_localize_script('jquery-nicescroll', 'mytheme_urls', array(
			'theme_base_url' => esc_js(IAMD_BASE_URL),
			'framework_base_url' => esc_js(IAMD_FW_URL),
			'ajaxurl' => esc_url( admin_url('admin-ajax.php') ),
			'url' => esc_url( get_site_url() ),
			'scroll' => $scroll,
			'loadisotope' => $load_isotope,
			'stickynav' => $stickynav,
			'landingpage' => $landingpage,
			'landingpagestickynav' => $landingpagestickynav,
			'is_admin' => current_user_can('level_10'),		
			'skin' => dttheme_option('appearance','skin'),
			'layout' => dttheme_option('appearance','layout'),
			'isLandingPage' => $landingpage,
			'isRTL' => $rtl,
			'pluginURL' => $pluginURL,
			'retinaSupport' => $retina_support,
			'isResponsive' => $isResponsive,
			'layout_pattern' => dttheme_option('appearance','boxed-layout-pattern'),
			'themeName' => $theme_folder_name,
			'dtLMSAjaxNonce' => wp_create_nonce('dtLMSAjaxNonce')
		));
	}
	
	

	
	#Theme Picker 		
	if( dttheme_option("general","disable-picker") === NULL  && !is_user_logged_in() ):
		wp_enqueue_script('theme-cookies', IAMD_FW_URL.'js/public/jquery.cookie.js',array(),false,true);
		wp_enqueue_script('theme-picker', IAMD_FW_URL.'js/public/picker.js',array(),false,true);
	endif;
	
	wp_enqueue_script('ajaxcourses-script', IAMD_FW_URL.'js/public/ajax-courses.js',array(),false,true);
	wp_enqueue_script('ajaxclasses-script', IAMD_FW_URL.'js/public/ajax-classes.js',array(),false,true);
	wp_enqueue_script('dashboard-script', IAMD_FW_URL.'js/public/dashboard.js',array(),false,true);
   	wp_enqueue_script('custom-script', IAMD_FW_URL.'js/public/custom.js',array(),false,true);
	wp_localize_script('custom-script', 'DtCustomObject', array (
		'joinedGroup' => esc_html__('Joined Group Successfully', 'lms'),
	));

	$cookiebar = dttheme_option('privacy', 'enable-cookie-msgbar');
		if( isset($cookiebar) ) {
			wp_enqueue_script('jq-cookie-js', IAMD_FW_URL.'js/public/cookieconsent.js', array(), false, true);
		}

		wp_enqueue_script('jq-popup-js', IAMD_FW_URL.'js/public/magnific/jquery.magnific-popup.min.js', array(), false, true);
	
}

add_action('wp_head', 'dttheme_appearance_load_fonts', 7);
/** dttheme_appearance_load_fonts()
 * Objective:
 *		To load google fonts based on appearance settings in admin panel.
 **/
function dttheme_appearance_load_fonts() {

	if( ! isset( $_COOKIE['dtPrivacyGoogleWebfontsDisabled'] ) ):

		$custom_fonts = array();
		$output = "";

		$subset = dttheme_wp_kses(dttheme_option('general', 'google-font-subset'));
		if ($subset) {
			$subset = strtolower(str_replace(' ', '', $subset));
		}

		#Menu Section
		$disable_menu = dttheme_option("appearance", "disable-menu-settings");
		if (empty($disable_menu)) :
			$font = dttheme_option("appearance", "menu-font");
			if (!empty($font)) :
				$font = str_replace(" ", "+", $font);
				array_push($custom_fonts, $font);
			endif;
		endif; #Menu Secion End

		#Body Section
		$disable_boddy_settings = dttheme_option("appearance", "disable-boddy-settings");

		if (empty($disable_boddy_settings)) :
			$font = dttheme_option("appearance", "body-font");
			$font = str_replace(" ", "+", $font);
			if (!empty($font)) :
				array_push($custom_fonts, $font);
			endif;
		endif;

		#Footer Section
		$disable_footer = dttheme_option("appearance", "disable-footer-settings");
		if (empty($disable_footer)) :
			$footer_title_font = dttheme_option("appearance", "footer-title-font");
			$footer_title_font = !empty($footer_title_font) ? str_replace(" ", "+", $footer_title_font) : NULL;
			if (!empty($footer_title_font)) :
				array_push($custom_fonts, $footer_title_font);
			endif;

			$footer_content_font = dttheme_option("appearance", "footer-content-font");
			$footer_content_font = !empty($footer_content_font) ? str_replace(" ", "+", $footer_content_font) : NULL;
			if (!empty($footer_content_font)) :
				array_push($custom_fonts, $footer_content_font);
			endif;

		endif; #Footer Section End

		#Typography Section
		$disable_typo = dttheme_option("appearance", "disable-typography-settings");
		if (empty($disable_typo)) :
			for ($i = 1; $i <= 6; $i++) :
				$font = dttheme_option("appearance", "H{$i}-font");
				if (!empty($font)) :
					$font = str_replace(" ", "+", $font);
					array_push($custom_fonts, $font);
				endif;
			endfor;
		endif; #Typography Section End

		#404 Section
		$disable_404_settings = dttheme_option("specialty", "disable-404-font-settings");
		if (empty($disable_404_settings)) :
			$font = dttheme_option("specialty", "message-font");
			if (!empty($font)) :
				$font = str_replace(" ", "+", $font);
				array_push($custom_fonts, $font);
			endif;
		endif;


		if (!empty($custom_fonts)) :
			$custom_fonts = array_unique($custom_fonts);
			$font = implode(":300,400,400italic,700|", $custom_fonts);
			$font .= ":300,400,400italic,700|";
		endif;
		
		if (!empty($font)) :
			$protocol = is_ssl() ? 'https' : 'http';
			$query_args = array('family' => $font, 'subset' => $subset);
			wp_enqueue_style('mytheme-google-fonts', add_query_arg($query_args, "$protocol://fonts.googleapis.com/css" ), array(), null);
		endif;

	endif;

}
### --- ****  dttheme_appearance_load_fonts() *** --- ###

add_action('wp_enqueue_scripts', 'dttheme_appearance_css', 101);
/** dttheme_appearance_css()
 * Objective:
 *		To generate in-line style based on appearance settings in admin panel.
 **/
function dttheme_appearance_css() {
	$output = NULL;
	
	#Layout Section
	if(dttheme_option("appearance","layout") == "boxed"):
		if(dttheme_option("appearance","bg-type") == "bg-patterns"):
			$pattern = dttheme_option("appearance","boxed-layout-pattern");
			$pattern_repeat = dttheme_option("appearance","boxed-layout-pattern-repeat");
			$pattern_opacity = dttheme_option("appearance","boxed-layout-pattern-opacity");
			$disable_color = dttheme_option("appearance","disable-boxed-layout-pattern-color");
			$pattern_color =  dttheme_option("appearance","boxed-layout-pattern-color");
			$output .= "body { ";
				if(!empty($pattern))
					$output .= "background-image:url('".IAMD_FW_URL."theme_options/images/patterns/{$pattern}');"; 
						
				$output .= "background-repeat:$pattern_repeat;";
				if(empty($disable_color)){
					if(!empty($pattern_opacity)){
						$color = hex2rgb($pattern_color);
						$output .= "background-color:rgba($color[0],$color[1],$color[2],$pattern_opacity); ";
					}else{
						$output .= "background-color:$pattern_color;";
					}
				}
			$output .= "}\r\t";
		
		elseif(dttheme_option("appearance","bg-type") == "bg-custom"):
			$bg = dttheme_option("appearance","boxed-layout-bg");
			$bg_repeat = dttheme_option("appearance","boxed-layout-bg-repeat");
			$bg_opacity = dttheme_option("appearance","boxed-layout-bg-opacity");
			$bg_color =  dttheme_option("appearance","boxed-layout-bg-color");
			$disable_color = dttheme_option("appearance","disable-boxed-layout-bg-color");
			$bg_position =  dttheme_option("appearance","boxed-layout-bg-position");
			$output .= "body { ";
			if(!empty($bg)) {
				$output .= "background-image:url($bg);";
				$output .= "background-repeat:$bg_repeat;";
				$output .= "background-position:$bg_position;";
			}
			
			if(empty($disable_color)){
				if(!empty($bg_opacity)){	
					$color = hex2rgb($bg_color);
					$output .= "background-color:rgba($color[0],$color[1],$color[2],$bg_opacity);";
				}else{
					$output .= "background-color:$bg_color;";
				}
			}
			$output .= "}\r\t";
		endif;
	endif;
	#Layout Section

		
	#Site Title Color	
	$site_title_color = dttheme_option("appearance", "site-title-color");
	
	$output .= "#logo h2 a { color: $site_title_color; }";

	#Menu Section
	$disable_menu = dttheme_option("appearance", "disable-menu-settings");
	if (empty($disable_menu)) :
		$font_type = dttheme_option("appearance", "menu-font-type");
		$style = dttheme_option("appearance","menu-standard-font-style");
		
		if( !empty($font_type) ){
		#Menu Font: Standard
			$font = dttheme_option("appearance","menu-standard-font");
		} else {
		#Menu Font: Google
			$font = dttheme_option("appearance", "menu-font");
		}

		$size = dttheme_option("appearance", "menu-font-size");
		$primary_color = dttheme_option("appearance", "menu-primary-color");
		$secondary_color = dttheme_option("appearance", "menu-secondary-color");
		
		if (!empty($font) || (!empty($primary_color) and $primary_color != "#") || !empty($size)) :
		
			$output .= "#main-menu ul.menu li a, #main-menu ul li.menu-item-simple-parent ul li a { ";
				if (!empty($font)) { $output .= "font-family:{$font},sans-serif; ";	}
				
				if (!empty($primary_color) && ($primary_color != '#')) { $output .= "color:{$primary_color}; "; }
				
				if (!empty($size) and ($size > 0)) { $output .= "font-size:{$size}px; "; }

				if (!empty($style)) { 
					if ($style == 'Bold Italic') {
						$output .= "font-weight:bold; font-style:italic;";
					} elseif ($style == 'Bold') {
						$output .= "font-weight:bold;";
					} elseif ($style == 'Italic') {
						$output .= "font-style:italic;";
					} elseif ($style == 'Normal') {
						$output .= "font-weight:normal; font-style:normal;";
					}				
				}

			$output .= "}\r\t";

			if (!empty($size) and ($size > 0)) {  $size = $size-2 ;$output .= " #main-menu ul.sub-menu li a, #main-menu ul li.menu-item-simple-parent ul li a { font-size:{$size}px; }\r\t"; }

		endif;

		if (!empty($secondary_color) and $secondary_color != "#") :
		  $output .= "#main-menu ul li.menu-item-simple-parent ul li a:hover, #main-menu > ul > li > a:hover, #main-menu ul.menu li a:hover { ";
	  	  $output .= "color:{$secondary_color} !important; ";
		  $output .= "}\r\t";
		  $output .= "#main-menu > ul > li.current_page_item, #main-menu > ul > li.current_page_ancestor, #main-menu > ul > li.current-menu-item, #main-menu > ul > li.current-menu-ancestor, ul.dt-sc-tabs-frame li a.current, #main-menu ul li.menu-item-simple-parent ul, .megamenu-child-container{ border-top-color:{$secondary_color}}\r\t";
		endif;
		
		$menu_border_color = dttheme_option("appearance", "menu-border-color");
		
		if (!empty($menu_border_color) and $menu_border_color != "#") :
			$output .= "#main-menu > ul > li.current_page_item > a, #main-menu > ul > li.current_page_ancestor > a, #main-menu > ul > li.current-menu-item > a, #main-menu > ul > li.current-menu-ancestor > a, #main-menu > ul > li.current_page_item > a:hover, #main-menu > ul > li.current_page_ancestor > a:hover, #main-menu > ul > li.current-menu-item > a:hover, #main-menu > ul > li.current-menu-ancestor > a:hover, #main-menu > ul > li.current_page_item:hover > a, #main-menu > ul > li.current_page_ancestor:hover > a, #main-menu > ul > li.current-menu-item:hover > a, #main-menu > ul > li.current-menu-ancestor:hover > a { border: 2px solid $menu_border_color; }";
		else:
			$output .= "#main-menu > ul > li.current_page_item > a, #main-menu > ul > li.current_page_ancestor > a, #main-menu > ul > li.current-menu-item > a, #main-menu > ul > li.current-menu-ancestor > a, #main-menu > ul > li.current_page_item > a:hover, #main-menu > ul > li.current_page_ancestor > a:hover, #main-menu > ul > li.current-menu-item > a:hover, #main-menu > ul > li.current-menu-ancestor > a:hover, #main-menu > ul > li.current_page_item:hover > a, #main-menu > ul > li.current_page_ancestor:hover > a, #main-menu > ul > li.current-menu-item:hover > a, #main-menu > ul > li.current-menu-ancestor:hover > a { border: 2px solid; }";
		endif;
		
	endif; #Menu Section End

	#Body Section
	$disable_boddy_settings = dttheme_option("appearance", "disable-boddy-settings");
	if (empty($disable_boddy_settings)) :
		$font_type = dttheme_option("appearance", "body-font-type");
		$style = dttheme_option("appearance","body-standard-font-style");

		if( !empty($font_type) ){
		#Body Font: Standard
			$body_font = dttheme_option("appearance","body-standard-font");
			
		} else {
		#Body Font: Google
			$body_font = dttheme_option("appearance", "body-font");
		}

		$body_font_size = dttheme_option("appearance", "body-font-size");
		$body_font_color = dttheme_option("appearance", "body-font-color");

		$body_primary_color = dttheme_option("appearance", "body-primary-color");
		$body_secondary_color = dttheme_option("appearance", "body-secondary-color");


		if (!empty($body_font) || (!empty($body_font_color) and $body_font_color != "#") || !empty($body_font_size)) :
			$output .= "body, .dt-sc-course-price {";
			if (!empty($body_font)) {	$output .= "font-family:{$body_font} , sans-serif; ";  }

			if (!empty($body_font_color) && ($body_font_color != '#')) { $output .= "color:{$body_font_color}; "; }

			if (!empty($body_font_size)) {	$output .= "font-size:{$body_font_size}px; "; }
			
			if (!empty($style)) { 
				if ($style == 'Bold Italic') {
					$output .= "font-weight:bold; font-style:italic;";
				} elseif ($style == 'Bold') {
					$output .= "font-weight:bold;";
				} elseif ($style == 'Italic') {
					$output .= "font-style:italic;";
				} elseif ($style == 'Normal') {
					$output .= "font-weight:normal; font-style:normal;";
				}				
			}

			$output .= "}\r\t";
		endif;

    	if (!empty($body_font_color) and $body_font_color != "#") :
			$output .= ".wp-block-pullquote {";
				$output .= "color:{$body_font_color}; ";
			$output .= "}\r\t";
		endif;


		if ((!empty($body_primary_color) and $body_primary_color != "#") || (!empty($body_secondary_color) and $body_secondary_color != "#")) :
			if (!empty($body_primary_color) && ($body_primary_color != '#')) { 	$output .= "a, .entry-details .entry-metadata p a { color:{$body_primary_color}; }"; }

			if (!empty($body_secondary_color) && ($body_secondary_color != '#')) {	$output .= "a:hover, .entry-details .entry-metadata p a:hover { color:{$body_secondary_color}; }";	}
		endif;
	endif; #Body Section End

	#Footer Section
	$disable_footer = dttheme_option("appearance", "disable-footer-settings");
	if (empty($disable_footer)) :

		#Footer Title
		$font_type = dttheme_option("appearance", "footer-title-font-type");
		$style = dttheme_option("appearance","footer-title-standard-font-style");
		
		if( !empty($font_type) ){
			#Footer Title Font : Standard Font
			$footer_title_font = dttheme_option("appearance","footer-title-standard-font");
		} else {
			#Footer Title Font : Google Font	
			$footer_title_font = dttheme_option("appearance", "footer-title-font");		
		}
		
		$footer_title_font_color = dttheme_option("appearance", "footer-title-font-color");
		$footer_title_font_size = dttheme_option("appearance", "footer-font-size");
		$footer_primary_color = dttheme_option("appearance", "footer-primary-color");
		$footer_secondary_color = dttheme_option("appearance", "footer-secondary-color");
		$footer_bg_color = dttheme_option("appearance", "footer-bg-color");
		$copyright_bg_color = dttheme_option("appearance", "copyright-bg-color");

		if (!empty($footer_title_font) || (!empty($footer_title_font_color) and $footer_title_font_color != "#") || !empty($footer_title_font_size)) :
			$output .= "#footer .widget h1.widgettitle, #footer .widget h2.widgettitle, #footer .widget h3.widgettitle, #footer .widget h4.widgettitle, #footer .widget h5.widgettitle, #footer .widget h6.widgettitle, #footer .tweetbox h3.widgettitle a {";
			if (!empty($footer_title_font)) {	$output .= "font-family:{$footer_title_font}; ";	}

			if (!empty($footer_title_font_color) && ($footer_title_font_color != '#')) {	$output .= "color:{$footer_title_font_color}; ";	}

			if (!empty($footer_title_font_size)) {	$output .= "font-size:{$footer_title_font_size}px; ";	}
			
			if (!empty($style)) { 
				if ($style == 'Bold Italic') {
					$output .= "font-weight:bold; font-style:italic;";
				} elseif ($style == 'Bold') {
					$output .= "font-weight:bold;";
				} elseif ($style == 'Italic') {
					$output .= "font-style:italic;";
				} elseif ($style == 'Normal') {
					$output .= "font-weight:normal; font-style:normal;";
				}				
			}

			$output .= "}\r\t";
		endif;

		if ((!empty($footer_primary_color) and $footer_primary_color != "#") || (!empty($footer_secondary_color) and $footer_secondary_color != "#")) :
			if (!empty($footer_primary_color) && ($footer_primary_color != '#')) {
				$output .= "#footer .widget ul li a, #footer .entry-details .entry-metadata p a span, #footer .widget ul li a, #footer .widget_categories ul li a, #footer .widget.widget_recent_entries .entry-metadata .tags a, #footer .categories a, .copyright a, #footer .widget a, #footer .widget ul.tweet_list a, #footer .copyright .copyright-info a, #footer .footer-links a { color:{$footer_primary_color}; }";
			}

			if (!empty($footer_secondary_color) && ($footer_secondary_color != '#')) {
				$output .= "#footer h1 a:hover, #footer h2 a:hover, #footer h3 a:hover, #footer h4 a:hover, #footer h5 a:hover, #footer h6 a:hover, #footer .widget ul li a:hover, #footer .widget.widget_recent_entries .entry-metadata .tags a:hover, #footer .categories a:hover, #footer .copyright .copyright-info a:hover, #footer .widget a:hover { color:{$footer_secondary_color}; }";
			}
		endif;
		
		#Footer Content
		$font_type = dttheme_option("appearance","footer-content-font-type");
		$style = dttheme_option("appearance","footer-content-standard-font-style");
		if( !empty($font_type) ){
			#Footer Title Font : Standard Font
			$footer_content_font = dttheme_option("appearance","footer-content-standard-font");
		} else {
			#Footer Title Font : Google Font	
			$footer_content_font = dttheme_option("appearance", "footer-content-font");		
		}
		
		$footer_content_font_color = dttheme_option("appearance", "footer-content-font-color");
		$footer_content_font_size = dttheme_option("appearance", "footer-content-font-size");
		
		if (!empty($footer_content_font) || (!empty($footer_content_font_color) and $footer_content_font_color != "#") || !empty($footer_content_font_size)) :
			$output .= "#footer .widget.widget_recent_entries .entry-metadata .author, #footer .widget.widget_recent_entries .entry-meta .date, #footer label, #footer .widget ul li, #footer .widget ul li:hover, .copyright, #footer .widget.widget_recent_entries .entry-metadata .tags, #footer .categories, #footer .widget p {";
			
			if (!empty($footer_content_font)) {	$output .= "font-family:{$footer_content_font} !important; ";	}

			if (!empty($footer_content_font_color) && ($footer_content_font_color != '#')) {	$output .= "color:{$footer_content_font_color} !important; ";	}

			if (!empty($footer_content_font_size)) {	$output .= "font-size:{$footer_content_font_size}px !important; ";	}
			
			if (!empty($style)) { 
				if ($style == 'Bold Italic') {
					$output .= "font-weight:bold; font-style:italic;";
				} elseif ($style == 'Bold') {
					$output .= "font-weight:bold;";
				} elseif ($style == 'Italic') {
					$output .= "font-style:italic;";
				} elseif ($style == 'Normal') {
					$output .= "font-weight:normal; font-style:normal;";
				}				
			}

			$output .= "}\r\t";
		
		endif;
		
		if (!empty($footer_bg_color) and $footer_bg_color != "#") {		$output .= "#footer .footer-widgets-wrapper { background: $footer_bg_color; }";	}

		if (!empty($copyright_bg_color) and $copyright_bg_color != "#") {	$output .= "#footer .copyright { background: $copyright_bg_color; }"; }
	
	endif; #Footer Section End

	#Typography Settings
	$disable_typo = dttheme_option("appearance", "disable-typography-settings");
	if (empty($disable_typo)) :
		for ($i = 1; $i <= 6; $i++) :
			$font_type = dttheme_option("appearance", "H{$i}-font-type");
			$style = dttheme_option("appearance","H{$i}-standard-font-style");
			
			if( !empty($font_type) ){
			#Menu Font: Standard
				$font = dttheme_option("appearance","H{$i}-standard-font");
			} else {
			#Menu Font: Google
				$font = dttheme_option("appearance", "H{$i}-font");
			}
			
			$color = dttheme_option("appearance", "H{$i}-font-color");
			$size = dttheme_option("appearance", "H{$i}-size");

			if (!empty($font) || (!empty($color) and $color != "#") || !empty($size)) :
				if($i == 6) {
					$output .= '.widget.widget_popular_entries .recent-course-widget ul li h6, ';
				}
				$output .= "H$i {";
				if (!empty($font)) {	$output .= "font-family:{$font}; ";	}

				if (!empty($color) && ($color != '#')) {	$output .= "color:{$color}; ";	}
				
				if (!empty($size)) { $output .= "font-size:{$size}px; "; }

				if (!empty($style)) { 
					if ($style == 'Bold Italic') {
						$output .= "font-weight:bold; font-style:italic;";
					} elseif ($style == 'Bold') {
						$output .= "font-weight:bold;";
					} elseif ($style == 'Italic') {
						$output .= "font-style:italic;";
					} elseif ($style == 'Normal') {
						$output .= "font-weight:normal; font-style:normal;";
					}				
				}

				$output .= "}\r\t";
			endif;
		endfor;
	endif; #Typography Settings end

	#404 Settings
	$disable_404_settings = dttheme_option("specialty", "disable-404-font-settings");
	if (empty($disable_404_settings)) :
		$font = dttheme_option("specialty", "message-font");
		$color = dttheme_option("specialty", "message-font-color");
		$size = dttheme_option("specialty", "message-font-size");

		if (!empty($font) || (!empty($color) and $color != "#") || !empty($size)) :
			$output .= "div.error-info { ";
			if (!empty($font)) {
				$output .= "font-family:{$font}; ";
			}

			if (!empty($color) && ($color != '#')) {
				$output .= "color:{$color}; ";
			}

			if (!empty($size)) {
				$output .= "font-size:{$size}px; ";
			}
			$output .= "}\r\t";

			$output .= "div.error-info h1, div.error-info h2, div.error-info h3,div.error-info h4,div.error-info h5,div.error-info h6 { ";
			if (!empty($font)) {
				$output .= "font-family:{$font}; ";
			}

			if (!empty($color) && ($color != '#')) {
				$output .= "color:{$color}; ";
			}
			$output .= "}\r\t";

		endif;
	endif; #404 Settings end


	#custom CSS
	if (dttheme_option('integration', 'enable-custom-css')) :
		$css = dttheme_option('integration', 'custom-css');
		$output .= stripcslashes($css);
	endif; #custom CSS eND

	if (!empty($output)) :
		wp_add_inline_style( 'lms-skin', $output );
	endif;

}

if( !function_exists( 'dttheme_slider_section' ) ){
	function dttheme_slider_section($post_id) {
		$tpl_default_settings = get_post_meta($post_id, '_tpl_default_settings', TRUE);
		$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings : array();
	
		if (array_key_exists('show_slider', $tpl_default_settings) && array_key_exists('slider_type', $tpl_default_settings)) :
	
			echo '<!-- **Slider Section** -->';
			echo '<div id="slider">';
			if ($tpl_default_settings['slider_type'] === "layerslider") :
				$id = isset( $tpl_default_settings['layerslider_id'])? $tpl_default_settings['layerslider_id'] : "";
				$slider = !empty($id) ? do_shortcode("[layerslider id='{$id}']") : "";
				echo "{$slider}";
				
			elseif ($tpl_default_settings['slider_type'] === "revolutionslider") :
				$id = isset($tpl_default_settings['revolutionslider_id']) ? $tpl_default_settings['revolutionslider_id'] : "";
				$slider = !empty($id) ? do_shortcode("[rev_slider $id]") : "";
				echo "{$slider}";
				
			elseif( $tpl_default_settings['slider_type'] === "imageonly" ):
				$img = '';
				$img = isset($tpl_default_settings['slider-image']) ? '<div id="slider-container"><img src="'.$tpl_default_settings['slider-image'].'"/></div>' : '';
				
				if(isset($tpl_default_settings['slider-shortcode'])) {
					$img .= '<div id="slider-search-container">';
					$img .= do_shortcode($tpl_default_settings['slider-shortcode']);
					$img .= '</div>';
				}
				echo "{$img}";
	
			endif;
	
			echo '</div><!-- **Slider Section - End** -->';
		endif;
	}
}

if( !function_exists( 'dttheme_subtitle_section' ) ){
	function dttheme_subtitle_section($id=0,$type,$settings = array() ){
		
		if( $id > 0 ){
	
			$title = get_the_title($id);
	
			if( $type === "post" )
				$settings = '_dt_post_settings';
			elseif( $type === "page")
				$settings = '_tpl_default_settings';
			elseif( $type === "dt_portfolios" )
				$settings = '_portfolio_settings';
			elseif( $type === "dt_teachers" )
				$settings = '_teacher_settings';
			elseif( $type === "dt_courses" )
				$settings = '_course_settings';
			elseif( $type === "dt_lessons" )
				$settings = '_lesson_settings';
	
			$settings = get_post_meta( $id, $settings, TRUE );
			$settings = is_array($settings) ? $settings : array();
		}
	
		$disable_breadcrumb_section = dttheme_option('general','disable-breadcrumb-section-globally');

		if(!isset($disable_breadcrumb_section)) :

			$disable_breadcrumb = dttheme_option('general','disable-breadcrumb-globally');
			$disable_breadcrumb_searchbox = dttheme_option('general','disable-breadcrumb-searchbox');
				
			if ( !array_key_exists('disable_breadcrumb_section', $settings) ) :		
			
				echo '<!-- ** Breadcrumb Section ** -->';
				echo '<section class="main-title-section-wrapper">';
				echo '	<div class="container">';
				echo '		<div class="main-title-section">';
								if ( is_front_page() && is_home() ) {
				echo "				<h1>".get_bloginfo('description')."</h1>";
								} elseif( is_post_type_archive('tribe_events') || is_tax('tribe_events_cat') || in_array('events-single', get_body_class()) || in_array('events-list', get_body_class()) || in_array('tribe-filter-live', get_body_class()) || in_array('tribe-events-week', get_body_class()) || in_array('tribe-events-day', get_body_class()) || in_array('tribe-events-map', get_body_class()) || in_array('tribe-events-photo', get_body_class()) || in_array('tribe-events-venue', get_body_class()) || in_array('single-tribe_organizer', get_body_class()) ) {
				echo  				get_events_title();
									if(!isset($disable_breadcrumb)) { new dttheme_events_breadcrumb; }
								} elseif($type == 'dt_lessons') {
									$dt_lesson_course = get_post_meta (get_the_ID(), "dt_lesson_course",true);
									if(isset($dt_lesson_course) && $dt_lesson_course != '') {
										$course_data = get_post($dt_lesson_course);
										echo '<h1>'.$course_data->post_title.'</h1>';	
									}
									if(!isset($disable_breadcrumb)) { new dttheme_breadcrumb; }
								} else {
				echo "				<h1>{$title}</h1>";
									if(!isset($disable_breadcrumb)) { new dttheme_breadcrumb; }
								}
				echo '		</div>';
				if(!isset($disable_breadcrumb_searchbox)) {
					echo '		<div class="header-search">';
					echo 			get_search_form();
					echo '		</div>';
				}
				echo '	</div>';
				echo '</section><!-- ** Breadcrumb Section End ** -->';
			
			endif;	

		endif;	

	}
}

if( !function_exists( 'dttheme_custom_subtitle_section' ) ){
	function dttheme_custom_subtitle_section( $title, $class){

		$disable_breadcrumb_section = dttheme_option('general','disable-breadcrumb-section-globally');

		if(!isset($disable_breadcrumb_section)) :
			
			$disable_breadcrumb = dttheme_option('general','disable-breadcrumb-globally');
			$disable_breadcrumb_searchbox = dttheme_option('general','disable-breadcrumb-searchbox');
			
			echo '<section class="main-title-section-wrapper">';
			echo '	<div class="container">';
			echo '		<div class="main-title-section">';	
							if ( is_front_page() && is_home() ) {
			echo "				<h1>".get_bloginfo('description')."</h1>";
							} elseif( is_post_type_archive('tribe_events') || is_tax('tribe_events_cat') || in_array('events-single', get_body_class()) || in_array('events-list', get_body_class()) || in_array('tribe-filter-live', get_body_class()) || in_array('tribe-events-week', get_body_class()) || in_array('tribe-events-day', get_body_class()) || in_array('tribe-events-map', get_body_class()) || in_array('tribe-events-photo', get_body_class()) || in_array('tribe-events-venue', get_body_class()) || in_array('single-tribe_organizer', get_body_class()) ) {
			echo  				get_events_title();
								if(!isset($disable_breadcrumb)) { new dttheme_events_breadcrumb; }
							} else {
			echo "				<h1>{$title}</h1>";
								if(!isset($disable_breadcrumb)) { new dttheme_breadcrumb; }
							}
			echo '			</div>';
			if(!isset($disable_breadcrumb_searchbox)) {
				echo '		<div class="header-search">';
				echo 			get_search_form();
				echo '		</div>';
			}
			echo '		</div>';
			echo "</section>";

		endif;
	
	}
}

if( !function_exists( 'dttheme_bpress_subtitle' ) ){
	function dttheme_bpress_subtitle(){
		global $bp;
		
		if ( !empty( $bp->displayed_user->fullname ) ) { // looking at a user or self
			$title =  bp_current_component() === "profile" ? esc_html__("Profile", 'lms') : esc_html__("Member", 'lms');
			$subtitle = strip_tags( $bp->displayed_user->userdata->display_name );
			$icon = "fa-user";
			$class = "dark-bg dt-bp-member-page";
			dttheme_custom_subtitle_section($title,$class);
	
		}elseif( function_exists('bp_is_members_component') && bp_is_members_component() ) {
			dttheme_subtitle_section( $bp->pages->members->id , 'page' );
		}elseif( function_exists('bp_is_members_component') && bp_is_activity_component() ){
			dttheme_subtitle_section( $bp->pages->activity->id , 'page' );
		}elseif( function_exists('bp_is_members_component') && bp_current_component() === "groups" ) {
			dttheme_subtitle_section( $bp->pages->groups->id , 'page' );
		}elseif( function_exists('bp_is_members_component') && bp_current_component() === "register" ) {
			dttheme_subtitle_section( $bp->pages->register->id , 'page' );
		}elseif( function_exists('bp_is_members_component') && bp_current_component() === "activate" ) {
			dttheme_subtitle_section( $bp->pages->activate->id , 'page' );
		}elseif( function_exists('bp_is_members_component') ){
			bp_current_component();
		}	
	}
}

/** dttheme_excerpt()
 * Objective:
 *		To produce the excerpt for the posts.
 **/
if( !function_exists( 'dttheme_excerpt' ) ){
	function dttheme_excerpt($limit = NULL) {
		$limit = !empty($limit) ? $limit : 10;
	
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		$excerpt = array_filter($excerpt);
		
		if (!empty($excerpt)) {
			if (count($excerpt) >= $limit) {
				array_pop($excerpt);
				$excerpt = implode(" ", $excerpt).'...';
			} else {
				$excerpt = implode(" ", $excerpt);
			}
			$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
			return "<p>{$excerpt}</p>";
		}
	}
}
### --- ****  dttheme_excerpt() *** --- ###

/** dttheme_custom_comments()
 * Objective:
 *		To customize the post/page comments view.
 **/
if( !function_exists( 'dttheme_custom_comments' ) ){
	function dttheme_custom_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type ) :
		case 'pingback':
		case 'trackback':
			echo '<li class="post pingback">';
			echo "<p>";
			esc_html_e('Pingback:', 'lms');
			comment_author_link();
			edit_comment_link(esc_html__('Edit', 'lms'), ' ', '');
			echo "</p>";
			break;
	
		default:
		case '':
			echo "<li ";
			comment_class();
			echo ' id="li-comment-';
			comment_ID();
			echo '">';
			echo '<article class="comment" id="comment-';
			comment_ID();
			echo '">';
	
			echo '<header class="comment-author">'.get_avatar($comment, 81).'</header>';
	
			echo '<section class="comment-details">';
			echo '	<div class="author-name">'.ucfirst(get_comment_author_link()).'</div>';
			echo '	<div class="commentmetadata">'.get_comment_date('d M Y').'</div>';
			echo '  <div class="comment-body">';
			echo '		<div class="comment-content">';
			comment_text();
			if ($comment->comment_approved == '0') :
				esc_html_e('Your comment is awaiting moderation.', 'lms');
			endif;
			edit_comment_link(esc_html__('Edit', 'lms'));
			echo '		</div>';
			echo '	</div>';
			echo '	<div class="reply">';
			echo comment_reply_link(array_merge($args, array('reply_text' => esc_html__('Reply', 'lms'),
				'depth' => $depth, 'max_depth' => $args['max_depth'])));
	
			echo '	</div>';
			echo '</section>';
			echo '</article><!-- .comment-ID -->';
			break;
		endswitch;
	}
}
### --- ****  dttheme_custom_comments() *** --- ###

#BREADCRUMB
class dttheme_breadcrumb {
	var $options;

	function __construct(){
		
		$delimiter =  'fa '.dttheme_option('general', 'breadcrumb-delimiter');
		$this->options = array( 'before' => "<span class='${delimiter}' > ",'after' => ' </span>');
		$markup = $this->options['before'].$this->options['after'];
		
		global $post;
		
		echo '<div class="breadcrumb">				
				<a href="'.esc_url(home_url('/')).'">'.esc_html__('Home', 'lms').'</a>';
			
				echo "{$markup}";
			
				$output = $this->simple_breadcrumb_case($post);

		if ( is_page() || is_single() ) {
			echo "<span class='current'>";
					the_title();
			echo "</span>";
			
		}elseif( $output !== NULL ){
			echo "<span class='current'>".$output."</span>";
		}else {
			$title =  (get_option( 'page_for_posts' ) > 0) ? get_the_title( get_option( 'page_for_posts' ))  :NULL;
			echo "{$markup}";
			echo "<span class='current'>".$title."</span>";
		}
		echo "</div><!-- ** breadcrumb - End -->";
	}
	
	function simple_breadcrumb_case($der_post){
		$markup = $this->options['before'].$this->options['after'];
		if (is_page()){
			 if($der_post->post_parent) {
				 $my_query = get_post($der_post->post_parent);			 
				 $this->simple_breadcrumb_case($my_query);
				 $link = '<a href="'.get_permalink($my_query->ID).'">';
				 $link .= ''. get_the_title($my_query->ID) . '</a>'. $markup;
				 echo "{$link}";
			 }
		return;	 	
		} 

		if(is_single()){
			$category = get_the_category();
			if (is_attachment()){
				$my_query = get_post($der_post->post_parent);			 
				$category = get_the_category($my_query->ID);
				if( isset($category[0])) {
					$ID = $category[0]->cat_ID;
					echo get_category_parents($ID, TRUE, $markup, FALSE );
					previous_post_link("%link $markup");
				}
				
				
			}else{
				$postType = get_post_type();

				if($postType == 'post')	{
					
					$ID = $category[0]->cat_ID;
					echo get_category_parents($ID, TRUE,$markup, FALSE );
					
				} else if($postType == 'dt_portfolios') {
					
					global $post;
					$terms = get_the_term_list( $post->ID, 'portfolio_entries', '', '$$$', '' );
					$terms =  array_filter(explode('$$$',$terms));
					if( !empty($terms)):
						echo "{$terms[0]}".$markup;
				    endif;
					
				} else if($postType == 'product') {
					
					global $post;
					$terms = get_the_term_list( $post->ID, 'product_cat', '', '$$$', '' );
					$terms =  array_filter(explode('$$$',$terms));
					if( !empty($terms)):
						echo "{$terms[0]}".$markup;
				    endif;
					
				} else if($postType == 'dt_lessons') {
					
					global $post;
					$op_text = '';
					$dt_lesson_course = get_post_meta ($post->ID, "dt_lesson_course",true);
					if(isset($dt_lesson_course) && $dt_lesson_course != '') {
						$course_data = get_post($dt_lesson_course);
						$op_text .= '<a href="'.get_permalink($course_data->ID).'">'.$course_data->post_title.'</a>';
						$op_text .= $markup;
					}
					
					echo "{$op_text}";
					
				} else if($postType == 'dt_quizes') {
					
					$lesson_id = isset($_REQUEST['lesson_id']) ? $_REQUEST['lesson_id'] : '';
					
					$op_text = '';
					if($lesson_id != '') {
						$op_text .= '<a href="'.get_permalink($lesson_id).'">'.get_the_title($lesson_id).'</a>';
						$op_text .= $markup;
					}
					
					echo "{$op_text}";
										
				} else if($postType == 'dt_assignments') {
					
					global $post;
					$op_text = '';
					$dt_assignment_course = get_post_meta ($post->ID, "dt-assignment-course",true);
					if(isset($dt_assignment_course) && $dt_assignment_course != '') {
						$course_data = get_post($dt_assignment_course);
						$op_text .= '<a href="'.get_permalink($course_data->ID).'">'.$course_data->post_title.'</a>';
						$op_text .= $markup;
					}
					
					echo "{$op_text}";
					
					
				} 
			}
			return;
		}

		if(is_tax()){
			  $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			  return esc_html__("Archive for Category: ", 'lms').$term->name;
		}

		if(is_category()){
			$category = get_the_category(); 
			$i = $category[0]->cat_ID;
			$parent = $category[0]-> category_parent;
			if($parent > 0 && $category[0]->cat_name == single_cat_title("", false)){
				echo get_category_parents($parent, TRUE, $markup, FALSE);
			}
			return esc_html__("Archive for Category: ", 'lms').single_cat_title('',FALSE);
		}

		if(is_author()){
			$curauth = get_user_by('slug',get_query_var('author_name')) ;
			return esc_html__("Archive for Author: ", 'lms').$curauth->nickname;
		}

		if(is_tag()){ return esc_html__("Archive for Tag: ", 'lms').single_tag_title('',FALSE); }

		if(is_404()){ return esc_html__("LOST", 'lms'); }

		if(is_search()){ return esc_html__("Search", 'lms'); }	

		if(is_year()){ return get_the_time('Y'); }

		if(is_month()){
			$k_year = get_the_time('Y');
			echo "<a href='".get_year_link($k_year)."'>".$k_year."</a>".$markup;
			return get_the_time('F'); 
		}

		if(is_day() || is_time()){ 
			$k_year = get_the_time('Y');
			$k_month = get_the_time('m');
			$k_month_display = get_the_time('F');
			echo "<a href='".get_year_link($k_year)."'>".$k_year."</a>".$markup;
			echo "<a href='".get_month_link($k_year, $k_month)."'>".$k_month_display."</a>".$markup;

			return get_the_time('jS (l)');
		}
		
		if(is_post_type_archive('product')){
			return esc_html__('Products', 'lms');
		}
		
		if(is_post_type_archive('lesson')){
			return esc_html__('Lessons', 'lms');
		}
		
		if(is_post_type_archive('course')){
			return esc_html__('Courses', 'lms');
		}

		if(is_post_type_archive('sensei_message')){
			return esc_html__('Messages', 'lms');
		}

		if(is_post_type_archive('dt_courses')){
			return esc_html__('Courses', 'lms');
		}

		if(is_post_type_archive('dt_classes')){
			return esc_html__('Classes', 'lms');
		}

		if(is_post_type_archive('dt_lessons')){
			return esc_html__('Lessons', 'lms');
		}
		
		if(is_post_type_archive('dt_quizes')){
			return esc_html__('Quizes', 'lms');
		}

		if(is_post_type_archive('dt_questions')){
			return esc_html__('Questions', 'lms');
		}

		if(is_post_type_archive('dt_assignments')){
			return esc_html__('Assignments', 'lms');
		}

		if(is_post_type_archive('dt_gradings')){
			return esc_html__('Gradings', 'lms');
		}

		if(is_post_type_archive('dt_teachers')){
			return $GLOBALS['teachers-plural-label'];
		}

		if(is_post_type_archive('dt_portfolios')){
			return esc_html__('Portfolio', 'lms');
		}
		
		if(is_post_type_archive('dt_certificates')){
			return esc_html__('Certificates', 'lms');
		}
		
		if(in_array('learner-profile', get_body_class())) {
			return esc_html__('Profile', 'lms');
		}

		if(in_array('course-results', get_body_class())) {
			return esc_html__('Results', 'lms');
		}
	}
}

class dttheme_events_breadcrumb {
	
	var $options;

	function __construct() {


		global $post, $wp_query;

		$delimiter = ' class = "fa '.dttheme_option('general', 'breadcrumb-delimiter').'"';
		$this->options = array('before' => "<span $delimiter > ", 'after' => ' </span>');
		$markup = $this->options['before'].$this->options['after'];


		echo '<div class="breadcrumb">
				<a href="'.esc_url(home_url('/')).'">'.esc_html__('Home', 'lms').'</a>';
		echo "{$markup}";
		echo '<a href="'.tribe_get_events_link().'">'.esc_html__('Events', 'lms').'</a>';


		if( tribe_is_month() && !is_tax() ) {
			
			echo "{$markup}";
			echo '<span class="current">'.esc_html__('Events This Month', 'lms').'</span>';
			
		} elseif( class_exists('Tribe__Events__Pro__Main') && tribe_is_week() ) {
			
			echo "{$markup}";
			echo '<span class="current">'.esc_html__('Events This Week', 'lms').'</span>';
			
		} elseif( class_exists('Tribe__Events__Pro__Main') && tribe_is_day() ) {
			
			echo "{$markup}";
			echo '<span class="current">'.esc_html__('Events Today', 'lms').'</span>';
			
		} elseif( class_exists('Tribe__Events__Pro__Main') && tribe_is_map() ) {
			
			echo "{$markup}";
			echo '<span class="current">'.esc_html__('Upcoming Events', 'lms').'</span>';
	
		} elseif( class_exists('Tribe__Events__Pro__Main') && tribe_is_photo() ) {
			
			echo "{$markup}";
			echo '<span class="current">'.esc_html__('Upcoming Events', 'lms').'</span>';
	
		} elseif( tribe_is_list_view() ) {
			
			echo "{$markup}";
			echo '<span class="current">'.esc_html__('Upcoming Events', 'lms').'</span>';
			
		} elseif (is_single()) {
	
			echo "{$markup}";
			$post_title = $wp_query->post->post_title;
			echo '<span class="current">'.$post_title.'</span>';
					
		} elseif( tribe_is_month() && is_tax() ) { 
		
			$term_slug = $wp_query->query_vars['tribe_events_cat'];
			$term = get_term_by('slug', $term_slug, 'tribe_events_cat');
			$name = $term->name;
		
			echo "{$markup}";
			echo '<span class="current">'.$name.'</span>';
	
		} elseif( is_tag() ) { 

			echo "{$markup}";
			echo '<span class="current">'.single_tag_title('',FALSE).'</span>';
			
		}
		
		echo '</div>';
	}

}

if( !function_exists( 'get_events_title' ) ){
	function get_events_title() {
	
			global $wp_query;
	
			$title = '';
			$date_format = apply_filters( 'tribe_events_pro_page_title_date_format', 'l, F jS Y' );
	
	
			if( tribe_is_month() && !is_tax() ) {
				
				$title = sprintf( esc_html__( 'Events for %s', 'lms' ), date_i18n( 'F Y', strtotime( tribe_get_month_view_date() ) ) );
				
			} elseif( class_exists('Tribe__Events__Pro__Main') && tribe_is_week() ) {
				
				$title = sprintf( esc_html__('Events for week of %s', 'lms'), date_i18n( $date_format, strtotime( tribe_get_first_week_day($wp_query->get('start_date') ) ) ) );
				
			} elseif( class_exists('Tribe__Events__Pro__Main') && tribe_is_day() ) {
				
				$title = esc_html__( 'Events for', 'lms' ) . ' ' . date_i18n( $date_format, strtotime( $wp_query->get('start_date') ) );
				
			} elseif( class_exists('Tribe__Events__Pro__Main') && (tribe_is_map() || tribe_is_photo()) ) {
			
				if( tribe_is_past() ) {
					$title = esc_html__( 'Past Events', 'lms' );
				} else {
					$title = esc_html__( 'Upcoming Events', 'lms' );
				}
		
			} elseif( tribe_is_list_view() ) {
				
				$title = esc_html__('Upcoming Events', 'lms');
				
			} elseif (is_single()) {
				
				$title = $wp_query->post->post_title;
						
			} elseif( tribe_is_month() && is_tax() ) { 
		
				$term_slug = $wp_query->query_vars['tribe_events_cat'];
				$term = get_term_by('slug', $term_slug, 'tribe_events_cat');
				$name = $term->name;
			
				$title = $name;
		
			} elseif( is_tag() ) { 
		
				$name = 'Tag Archives';
				$title = $name;
	
			}
			
			echo '<h1>'.$title.'</h1>';		
	}
}

#END OF BREADCRUMB
####################################

#MyTheme Color Picker
if( !function_exists( 'dttheme_color_picker' ) ){
	function dttheme_color_picker(){
	
		$patterns_url = IAMD_FW_URL."theme_options/images/pattern/";
		$skins_url = IAMD_BASE_URL."images/style-picker/";
		
		$patterns = "";
		$patterns_array =  dttheme_listImage(TEMPLATEPATH."/images/style-picker/patterns/");
		
		foreach($patterns_array as $k => $v){
			$img = 	IAMD_BASE_URL."images/style-picker/patterns/".$k;
			$patterns .= '<li>';
			$patterns .= '<a data-image="'.$k.'" href="#">';
			$patterns .= '<img src="'.$img.'" alt="'.$v.'" title="'.$v.'" width="30" height="30" />';
			$patterns .= '</a>';
			$patterns .= '</li>'; 
		}
		
		$colors = "";
		foreach(getFolders(IAMD_TD."/skins") as $skin ):
			$img = 	$skins_url.$skin.".jpg";
			$colors .= '<li>';
			$colors .= '<a id="'.$skin.'" href="#">';
			$colors .= '<img src="'.$img.'" alt="color-'.$skin.'" title="'.$skin.'" width="30" height="30" />';
			$colors .= '</a>';
			$colors .= '</li>';
		endforeach;
		
		$str = '<!-- **DesignThemes Style Picker Wrapper** -->';
		$str .= '<div class="dt-style-picker-wrapper">';
		$str .= '	<a href="#" class="style-picker-ico"> <img src="'.IAMD_BASE_URL.'images/style-picker/picker-icon.png" width="50" height="50" /> </a>';
		$str .= '	<div id="dt-style-picker">';
		$str .= '   	<h2>'.esc_html__('Select Your Style', 'lms').'</h2>';
		
		$str .= '       <h3>'.esc_html__('Choose your layout', 'lms').'</h3>';
		$str .= '		<ul class="layout-picker">';
		$str .= '       	<li> <a id="fullwidth" href="#" class="selected"> <img src="'.IAMD_BASE_URL.'images/style-picker/fullwidth.jpg" width="71" height="49" /> </a> </li>';
		$str .= '       	<li> <a id="boxed" href="#"><img src="'.IAMD_BASE_URL.'images/style-picker/boxed.jpg" width="71" height="49" /> </a> </li>';
		$str .= '		</ul>';
		$str .= '		<div class="hr"> </div>';
		$str .= '		<div id="pattern-holder" style="display:none;">';
		$str .='			<h3>'.esc_html__('Patterns for Boxed Layout', 'lms').'</h3>';
		$str .= '			<ul class="pattern-picker">';
		$str .= 				$patterns;
		$str .= '			</ul>';
		$str .= '			<div class="hr"> </div>';
		$str .= '		</div>';
		
		$str .= '		<h3>'.esc_html__('Color scheme', 'lms').'</h3>';
		$str .= '		<ul class="color-picker">';
		$str .= 		$colors;
		$str .= '		</ul>';
		
		$str .= '	</div>';
		$str .= '</div><!-- **DesignThemes Style Picker Wrapper - End** -->';
		
	echo "{$str}";
	}
}

if( !function_exists( 'dttheme_get_lesson_details' ) ){
	function dttheme_get_lesson_details( $lessons_hierarchy_array,  $lesson_id, $s2_level ) {
			
		$result = '';
		$j = 1;
		if(isset($lessons_hierarchy_array[$lesson_id])) {
			$result .= '<ol class="dt-sc-lessons-list">';
			foreach($lessons_hierarchy_array[$lesson_id] as $lesson) {
				$lesson_meta_data = get_post_meta($lesson->ID, '_lesson_settings');
				$lesson_teacher = $lesson_duration = '';
				$private_lesson = !empty($lesson_meta_data[0]['private-lesson']) ? $lesson_meta_data[0]['private-lesson'] : '';
				
				$lesson_teacher = get_post_meta ( $lesson->ID, "lesson-teacher",true);
				$course_id = get_post_meta ($lesson_id, "dt_lesson_course", true);
				
				if($lesson_teacher != '') {
					$teacher_data = get_post($lesson_teacher);
					if($private_lesson != '') {
						$lesson_teacher = '<p> <i class="fa fa-user"> </i>'.$teacher_data->post_title.'</p>';
					} else {
						$lesson_teacher = '<p> <i class="fa fa-user"> </i><a href="'.get_permalink($teacher_data->ID).'">'.$teacher_data->post_title.'</a></p>';
					}
				}
				if(isset($lesson_meta_data[0]['lesson-duration']) && $lesson_meta_data[0]['lesson-duration'] != '') {
					$lesson_duration .= '<p> <i class="fa fa-clock-o"> </i>'.$lesson_meta_data[0]['lesson-duration']. esc_html__(' mins ', 'lms').'</p>';
				}
				if(isset($lesson_meta_data[0]['private-lesson']) && $lesson_meta_data[0]['private-lesson'] != '') {
					if ( dttheme_check_if_user_authorized_to_view_course($course_id) ){
						$private_lesson = '';
					} else {
						$private_lesson = 'dt-hidden-lesson';
					}
				} else {
					$private_lesson = '';
				}
				
				$terms = get_the_terms($lesson->ID,'lesson_complexity');
				$lesson_terms = '';
				if(isset($terms) && !empty($terms)) {
					$lesson_terms = array();
					foreach ( $terms as $term ) {
						if($private_lesson != '') {
							$lesson_terms[] = $term->name;
						} else {
							$lesson_terms[] = '<a href="'.get_term_link( $term->slug, 'lesson_complexity' ).'">'.$term->name.'</a>';
						}
					}
					$lesson_terms = join( ", ", $lesson_terms );
				}
	
				$grade_chk = $grade_cls = '';
				if(is_user_logged_in() && $private_lesson != 'dt-hidden-lesson') {
					$user_id = get_current_user_id();
					$lesson_id = $lesson->ID;
					$course_id = get_post_meta ($lesson_id, "dt_lesson_course", true);
					$quiz_id = get_post_meta ($lesson_id, "lesson-quiz", true);
					if(!isset($quiz_id) || $quiz_id == '') $quiz_id = -1;
	
					$dt_gradings = dt_get_user_gradings_array($course_id, $lesson_id, $quiz_id, $user_id);
					$dt_grade_post = get_posts( $dt_gradings );
					
					$dt_grade_post_id = isset($dt_grade_post[0]->ID) ? $dt_grade_post[0]->ID : 0;
					
					$graded = get_post_meta ( $dt_grade_post_id, "graded",true);
					if(isset($graded) && $graded != '') {
						$grade_chk = '<div class="dt-sc-lesson-completed"> <span class="fa fa-check-circle"> </span> '.esc_html__('Completed', 'lms').'</div>';
						$grade_cls = ' dt-lesson-complete';
					}
				}
	
				$result .= '<li class="'.$private_lesson.$grade_cls.'">';
							if($private_lesson != '') {
								$result .= '<div class="hidden-lesson-overlay"> </div>';
							}
					$result .= '<article class="dt_lessons">
								<div class="lesson-title">';
									if($private_lesson != '') {
										$result .= '<h2>'.$lesson->post_title.'</h2>';
									} else {
										$result .= '<h2> <a href="'.get_permalink($lesson->ID).'" title="'.$lesson->post_title.'">'.$lesson->post_title.'</a> </h2>';
									}
									$result .= $grade_chk;
									
							$result .= '<div class="lesson-metadata">';
									if($lesson_terms != '') { 
										 $result .= '<p> <i class="fa fa-tags"> </i> '.$lesson_terms.' </p>';
									}
									$result .= $lesson_duration.$lesson_teacher.'
								   </div>
								</div>
								
								<div class="dt-sc-clear"></div>
								<div class="dt-sc-hr-invisible-small"></div>
								
								<section class="lesson-details">
									'.$lesson->post_excerpt.'
								</section>
							</article>';
					$result .= dttheme_get_lesson_details( $lessons_hierarchy_array,  $lesson->ID, $s2_level );
				$result .= '</li>';
				
				$j++;
			}
			$result .= '</ol>';	
		}
	
		return $result;
	}
}

if( !function_exists( 'dttheme_get_course_curriculum_lesson_details' ) ){
	function dttheme_get_course_curriculum_lesson_details( $lessons_hierarchy_array,  $lesson_id, $s2_level, $current_lesson_id ) {
		
		$result = '';
		if(isset($lessons_hierarchy_array[$lesson_id])) {
			$result .= '<ul class="dt-sc-curriculum-lessons-list">';
			foreach($lessons_hierarchy_array[$lesson_id] as $lesson_item) {			
				
				if($current_lesson_id == $lesson_item->ID) { $current_cls = ' current'; } else { $current_cls = ''; }
				$user_id = get_current_user_id();
				$dt_lesson_course = get_post_meta ($lesson_item->ID, "dt_lesson_course",true);
				
				$dt_lesson_quiz = get_post_meta ($lesson_item->ID, "lesson-quiz", true);
				if(isset($dt_lesson_quiz) && $dt_lesson_quiz > 0) {
					$dt_gradings = dt_get_user_gradings_array($dt_lesson_course, $lesson_item->ID, $dt_lesson_quiz, $user_id);
				} else {
					$dt_gradings = dt_get_user_gradings_array($dt_lesson_course, $lesson_item->ID, -1, $user_id);
				}
				
				$dt_grade_post = get_posts( $dt_gradings );
				$dt_grade_post_id = isset($dt_grade_post[0]) ? $dt_grade_post[0]->ID : '';
				$graded = get_post_meta ($dt_grade_post_id, "graded", true);
				
				if(isset($dt_grade_post[0]) && isset($graded) && $graded != '') {
					$dt_tooltip_dir = ' dt-sc-tooltip-right';
					$dt_tooltip_title = 'title="'.esc_attr__('Completed', 'lms').'"';
					$dt_lesson_status = 'dt-lesson-complete'; 
				} else {
					$dt_tooltip_dir = '';
					$dt_tooltip_title = '';
					$dt_lesson_status = '';
				}
				
				$result .= '<li class="'.$dt_lesson_status.$current_cls.'"><a href="'.get_permalink($lesson_item->ID).'" class="dt-sc-lesson-menu-name '.$dt_tooltip_dir.'" '.$dt_tooltip_title.'>'.$lesson_item->post_title.'</a>';
				
					$lesson_datas = get_post_meta($lesson_item->ID, '_lesson_settings', true);
					$duration = isset($lesson_datas['lesson-duration']) ? dttheme_wp_kses($lesson_datas['lesson-duration']) : 0; 
					if($duration > 0) {
						$hours = floor($duration/60); 
						$mins = $duration % 60; 
						if($hours == 0) {
							$duration = $mins . esc_html__(' mins ', 'lms'); 				
						} elseif($hours == 1) {
							$duration = $hours .  esc_html__(' hour ', 'lms') . $mins . esc_html__(' mins ', 'lms'); 				
						} else {
							$duration = $hours . esc_html__(' hours ', 'lms') . $mins . esc_html__(' mins ', 'lms'); 				
						}
						$result .= '<div class="dt-sc-lesson-menu-duration"> <i class="fa fa-clock-o"> </i>'.$duration.'</a></div>';
					}
					
					$result .= dttheme_get_course_curriculum_lesson_details( $lessons_hierarchy_array,  $lesson_item->ID, $s2_level, $current_lesson_id );
				
				$result .= '</li>';
				
			}
			$result .= '</ul>';	
		}
	
		return $result;
	}
}

if( !function_exists( 'dttheme_get_page_permalink_by_its_template' ) ){
	function dttheme_get_page_permalink_by_its_template( $temlplate ) {
		$permalink = null;
	
		$pages = get_posts( array(
				'post_type' => 'page',
				'meta_key' => '_wp_page_template',
				'meta_value' => $temlplate,
				'suppress_filters' => 0  ) );
	
		if ( is_array( $pages ) && count( $pages ) > 0 ) {
			$login_page = $pages[0];
			$permalink = get_permalink( $login_page->ID );
		}
		return $permalink;
	}
}

global $dt_allowed_html_tags;
$dt_allowed_html_tags = array(
	'a' => array('class' => array(), 'href' => array(), 'title' => array(), 'target' => array()),
	'abbr' => array('title' => array()),
	'address' => array(),
	'area' => array('shape' => array(), 'coords' => array(), 'href' => array(), 'alt' => array()),
	'article' => array(),
	'aside' => array(),
	'audio' => array('autoplay' => array(), 'controls' => array(), 'loop' => array(), 'muted' => array(), 'preload' => array(), 'src' => array()),
	'b' => array(),
	'base' => array('href' => array(), 'target' => array()),
	'bdi' => array(),
	'bdo' => array('dir' => array()), 
	'blockquote' => array('cite' => array()), 
	'br' => array(),
	'button' => array('autofocus' => array(), 'disabled' => array(), 'form' => array(), 'formaction' => array(), 'formenctype' => array(), 'formmethod' => array(), 'formnovalidate' => array(), 'formtarget' => array(), 'name' => array(), 'type' => array(), 'value' => array()),
	'canvas' => array('height' => array(), 'width' => array()),
	'caption' => array('align' => array()),
	'cite' => array(),
	'code' => array(),
	'col' => array(),
	'colgroup' => array(),
	'datalist' => array('id' => array()),
	'dd' => array(),
	'del' => array('cite' => array(), 'datetime' => array()),
	'details' => array('open' => array()),
	'dfn' => array(),
	'dialog' => array('open' => array()),
	'div' => array('class' => array(), 'id' => array(), 'align' => array()),
	'dl' => array(),
	'dt' => array(),
	'em' => array(),
	'embed' => array('height' => array(), 'src' => array(), 'type' => array(), 'width' => array()),
	'fieldset' => array('disabled' => array(), 'form' => array(), 'name' => array()),
	'figcaption' => array(),
	'figure' => array(),
	'form' => array('accept' => array(), 'accept-charset' => array(), 'action' => array(), 'autocomplete' => array(), 'enctype' => array(), 'method' => array(), 'name' => array(), 'novalidate' => array(), 'target' => array(), 'id' => array(), 'class' => array()),
	'h1' => array('class' => array()), 'h2' => array('class' => array()), 'h3' => array('class' => array()), 'h4' => array('class' => array()), 'h5' => array('class' => array()), 'h6' => array('class' => array()),
	'hr' => array(), 
	'i' => array('class' => array()), 
	'iframe' => array('name' => array(), 'seamless' => array(), 'src' => array(), 'srcdoc' => array(), 'width' => array()),
	'img' => array('alt' => array(), 'crossorigin' => array(), 'height' => array(), 'ismap' => array(), 'src' => array(), 'usemap' => array(), 'width' => array()),
	'input' => array('align' => array(), 'alt' => array(), 'autocomplete' => array(), 'autofocus' => array(), 'checked' => array(), 'disabled' => array(), 'form' => array(), 'formaction' => array(), 'formenctype' => array(), 'formmethod' => array(), 'formnovalidate' => array(), 'formtarget' => array(), 'height' => array(), 'list' => array(), 'max' => array(), 'maxlength' => array(), 'min' => array(), 'multiple' => array(), 'name' => array(), 'pattern' => array(), 'placeholder' => array(), 'readonly' => array(), 'required' => array(), 'size' => array(), 'src' => array(), 'step' => array(), 'type' => array(), 'value' => array(), 'width' => array(), 'id' => array(), 'class' => array()),
	'ins' => array('cite' => array(), 'datetime' => array()),
	'label' => array('for' => array(), 'form' => array()),
	'legend' => array('align' => array()), 
	'li' => array('type' => array(), 'value' => array(), 'class' => array()),
	'link' => array('crossorigin' => array(), 'href' => array(), 'hreflang' => array(), 'media' => array(), 'rel' => array(), 'sizes' => array(), 'type' => array()),
	'main' => array(), 
	'map' => array('name' => array()), 
	'mark' => array(), 
	'menu' => array('label' => array(), 'type' => array()),
	'menuitem' => array('checked' => array(), 'command' => array(), 'default' => array(), 'disabled' => array(), 'icon' => array(), 'label' => array(), 'radiogroup' => array(), 'type' => array()),
	'meta' => array('charset' => array(), 'content' => array(), 'http-equiv' => array(), 'name' => array()),
	'object' => array('form' => array(), 'height' => array(), 'name' => array(), 'type' => array(), 'usemap' => array(), 'width' => array()),
	'ol' => array('class' => array(), 'reversed' => array(), 'start' => array(), 'type' => array()),
	'p' => array('class' => array()), 
	'q' => array('cite' => array()), 
	'section' => array(), 
	'select' => array('autofocus' => array(), 'disabled' => array(), 'form' => array(), 'multiple' => array(), 'name' => array(), 'required' => array(), 'size' => array()),
	'small' => array(), 
	'source' => array('media' => array(), 'src' => array(), 'type' => array()),
	'span' => array('class' => array()), 
	'strong' => array(),
	'style' => array('media' => array(), 'scoped' => array(), 'type' => array()),
	'sub' => array(),
	'sup' => array(),
	'table' => array('sortable' => array()), 
	'tbody' => array(), 
	'td' => array('colspan' => array(), 'headers' => array()),
	'textarea' => array('autofocus' => array(), 'cols' => array(), 'disabled' => array(), 'form' => array(), 'maxlength' => array(), 'name' => array(), 'placeholder' => array(), 'readonly' => array(), 'required' => array(), 'rows' => array(), 'wrap' => array()),
	'tfoot' => array(),
	'th' => array('abbr' => array(), 'colspan' => array(), 'headers' => array(), 'rowspan' => array(), 'scope' => array(), 'sorted' => array()),
	'thead' => array(), 
	'time' => array('datetime' => array()), 
	'title' => array(), 
	'tr' => array(), 
	'track' => array('default' => array(), 'kind' => array(), 'label' => array(), 'src' => array(), 'srclang' => array()), 
	'u' => array(), 
	'ul' => array('class' => array()), 
	'var' => array(), 
	'video' => array('autoplay' => array(), 'controls' => array(), 'height' => array(), 'loop' => array(), 'muted' => array(), 'muted' => array(), 'poster' => array(), 'preload' => array(), 'src' => array(), 'width' => array()), 
	'wbr' => array(), 
);

function dttheme_wp_kses($content) {
	global $dt_allowed_html_tags;
	$data = wp_kses($content, $dt_allowed_html_tags);
	return $data;
}

// Ajax Payments
add_action( 'wp_ajax_dt_ajax_payaments', 'dt_ajax_payaments' );
add_action( 'wp_ajax_nopriv_dt_ajax_payaments', 'dt_ajax_payaments' );
function dt_ajax_payaments() {
	
	$paymenttype = $_REQUEST['paymenttype'];
	$level = $_REQUEST['level'];
	$description = $_REQUEST['description'];
	$currency = $_REQUEST['currency'];
	$price = $_REQUEST['price'];
	$period = $_REQUEST['period'];
	$term = $_REQUEST['term'];
	$cbproductno = $_REQUEST['cbproductno'];
	$cbskin = $_REQUEST['cbskin'];
	$cbflowid = $_REQUEST['cbflowid'];

	$http_host = '';
	if( function_exists( 'dt_server_variable' )  ) {

		$http_host = dt_server_variable( 'HTTP_HOST' );
	}
	
	$payment_url = '';
	
	if($paymenttype == 'stripe') {
		
		$payment_url = do_shortcode('[s2Member-Pro-Stripe-Form level="'.$level.'" desc="'.$description.'" cc="'.$currency.'" custom="'.$http_host.'" ra="'.$price.'" rp="'.$period.'" rt="'.$term.'" rr="BN" /]');
		
	} else if($paymenttype == 'authnet') {
		
		$payment_url = do_shortcode('[s2Member-Pro-AuthNet-Form level="'.$level.'" desc="'.$description.'" cc="'.$currency.'" custom="'.$http_host.'" ra="'.$price.'" rp="'.$period.'" rt="'.$term.'" rr="BN" /]');
		
	} else if($paymenttype == 'clickbank') {
		
		$cb_productno = dttheme_option('dt_course','s2member-cb-productno');
		$cb_skin = dttheme_option('dt_course','s2member-cb-skin');
		$cb_flowid = dttheme_option('dt_course','s2member-cb-flowid');
		
		$payment_url = do_shortcode('[s2Member-Pro-ClickBank-Button cbp="'.$cb_productno.'" cbskin="'.$cb_skin.'" cbfid="'.$cb_flowid.'" cbur="" cbf="auto" level="'.$level.'" desc="'.$description.'" custom="'.$http_host.'" rp="'.$period.'" rt="'.$term.'" rr="0" image="default" output="anchor" /]');
		
	} else if($paymenttype == 'paypal') {
		
		$payment_url = do_shortcode('[s2Member-Pro-PayPal-Form level="'.$level.'" desc="'.$description.'" ps="paypal" lc="" cc="'.$currency.'" dg="0" ns="1" custom="'.$http_host.'" ra="'.$price.'" rp="'.$period.'" rt="'.$term.'" rr="BN" rrt="" rra="2" image="" output="url"/]');
	
	} else if($paymenttype == 'paypal-default') {
		
		$payment_url = do_shortcode('[s2Member-PayPal-Button level="'.$level.'" desc="'.$description.'" ps="paypal" lc="" cc="'.$currency.'" dg="0" ns="1" custom="'.$http_host.'" ra="'.$price.'" rp="'.$period.'" rt="'.$term.'" rr="BN" rrt="" rra="1" image="" output="url"/]');
		
	}

	if( $payment_url != '' ) {

		echo "{$payment_url}";
	}

	die();	
}

/* ---------------------------------------------------------------------------
 * Body Class Filter for layout changes
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'lms_body_classes' ) ) {
	function lms_body_classes( $classes ) {
		
		# Gutenberg Class
		if ( is_singular() && function_exists('has_blocks') && has_blocks()) {
			$classes[] = 'has-gutenberg-blocks';
		}
	
		return $classes;
	}
}
add_filter( 'body_class', 'lms_body_classes' );