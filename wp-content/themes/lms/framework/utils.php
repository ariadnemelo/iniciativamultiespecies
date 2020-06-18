<?php
if( !function_exists( 'dt_theme_bbpress_title' ) ){
	function dt_theme_bbpress_title(){
		global $bp;
		$doctitle = "";
		$separator = dttheme_wp_kses(dttheme_option ( 'seo', 'title-delimiter' ));
		$id = 0;
	
		if ( !empty( $bp->displayed_user->fullname ) ) {
			
			$blog_title = preg_replace ( "~(?:\[/?)[^/\]]+/?\]~s", '', get_option ( 'blogname' ));
			$title =  bp_current_component() === "profile" ? esc_html__("Profile", 'lms') : esc_html__("Member", 'lms');
			$subtitle = strip_tags( $bp->displayed_user->fullname );
			$doctitle = $blog_title.' '.$separator.' '.$title.' '.$separator.' '.$subtitle.' '.$separator;
	
		} elseif( function_exists('bp_is_members_component') && bp_is_members_component() ) {
			$id = $bp->pages->members->id;
		}elseif( function_exists('bp_is_activity_component') && bp_is_activity_component() ){
			$id = $bp->pages->activity->id;
		}elseif( function_exists('bp_current_component') && bp_current_component() === "groups" ) {
			$id = $bp->pages->groups->id;
		}elseif( function_exists('bp_current_component') && bp_current_component() === "register" ) {
			$id = $bp->pages->register->id;
		}elseif( function_exists('bp_current_component') && bp_current_component() === "activate" ) {
			$id = $bp->pages->activate->id;
		}
		if( $id > 0 ){
			global $post;
			$args = array (
				"blog_title" => preg_replace ( "~(?:\[/?)[^/\]]+/?\]~s", '', get_option ( 'blogname' ) ),
				"blog_description" => get_bloginfo ( 'description' ),
				"post_title" => ! empty ( $post ) ? $post->post_title : NULL,
				"post_author_nicename" => ! empty ( $nickname ) ? ucwords ( $nickname ) : NULL,
				"post_author_firstname" => ! empty ( $first_name ) ? ucwords ( $first_name ) : NULL,
				"post_author_lastname" => ! empty ( $last_name ) ? ucwords ( $last_name ) : NULL,
				"post_author_dsiplay" => ! empty ( $display_name ) ? ucwords ( $display_name ) : NULL );
			$args = array_filter ( $args );
	
			$doctitle = get_post_meta ( $id, '_seo_title', true );
			if (empty ( $doctitle )) :
				$options = is_array ( dttheme_option ( 'seo', 'page-title-format' ) ) ? dttheme_option ( 'seo', 'page-title-format' ) : array ();
				foreach ( $options as $option ) :
					if (array_key_exists ( $option, $args ))
						$doctitle .= $args [$option] . ' ' . $separator . ' ';
				endforeach;
			endif;
	
		}	
		
		return $doctitle;
	}
}

/**
 * show_fblike()
 * Objective:
 * Outputs the facebook like button in post and page.
 */
if( !function_exists( 'show_fblike' ) ){
	function show_fblike($arg = 'post') {
		$fb = dttheme_option ( 'integration', "{$arg}-fb_like" );
		$output = "";
		if (! empty ( $fb )) :
			$layout = dttheme_option ( 'integration', "{$arg}-fb_like-layout" );
			$scheme = dttheme_option ( 'integration', "{$arg}-fb_like-color-scheme" );
			$output .= do_shortcode ( "[fblike layout='{$layout}' colorscheme='{$scheme}' /]" );
			echo "{$output}";
		endif;
	}
}
// # --- **** show_googleplus() *** --- ###
/**
 * show_googleplus()
 * Objective:
 * Outputs the facebook like button in post and page.
 */
if( !function_exists( 'show_googleplus' ) ){
	function show_googleplus($arg = 'post') {
		$googleplus = dttheme_option ( 'integration', "{$arg}-googleplus" );
		$output = "";
		if (! empty ( $googleplus )) :
			$layout = dttheme_option ( 'integration', "{$arg}-googleplus-layout" );
			$lang = dttheme_option ( 'integration', "{$arg}-googleplus-lang" );
			$output .= do_shortcode ( "[googleplusone size='{$layout}' lang='{$lang}' /]" );
			echo "{$output}";
		endif;
	}
}
// # --- **** show_googleplus() *** --- ###

// # --- **** show_twitter() *** --- ###
/**
 * show_twitter()
 * Objective:
 * Outputs the Twitter like button in post and page.
 */
if( !function_exists( 'show_twitter' ) ){
	function show_twitter($arg = 'post') {
		$twitter = dttheme_option ( 'integration', "{$arg}-twitter" );
		$output = "";
		if (! empty ( $twitter )) :
			$layout = dttheme_option ( 'integration', "{$arg}-twitter-layout" );
			$lang = dttheme_option ( 'integration', "{$arg}-twitter-lang" );
			$username = dttheme_wp_kses(dttheme_option ( 'integration', "{$arg}-twitter-username" ));
			$output .= do_shortcode ( "[twitter layout='{$layout}' lang='{$lang}' username='{$username}' /]" );
			echo "{$output}";
		endif;
	}
}
// # --- **** show_twitter() *** --- ###

// # --- **** show_stumbleupon() *** --- ###
/**
 * show_stumbleupon()
 * Objective:
 * Outputs the Stumbleupon like button in post and page.
 */
if( !function_exists( 'show_stumbleupon' ) ){
	function show_stumbleupon($arg = 'post') {
		$stumbleupon = dttheme_option ( 'integration', "{$arg}-stumbleupon" );
		$output = "";
		if (! empty ( $stumbleupon )) :
			$layout = dttheme_option ( 'integration', "{$arg}-stumbleupon-layout" );
			$output .= do_shortcode ( "[stumbleupon layout='{$layout}' /]" );
			echo "{$output}";
		endif;
	}
}
// # --- **** show_stumbleupon() *** --- ###

// # --- **** show_linkedin() *** --- ###
/**
 * show_linkedin()
 * Objective:
 * Outputs the LinkedIn like button in post and page.
 */
if( !function_exists( 'show_linkedin' ) ){
	function show_linkedin($arg = 'post') {
		$linkedin = dttheme_option ( 'integration', "{$arg}-linkedin" );
		$output = "";
		if (! empty ( $linkedin )) :
			$layout = dttheme_option ( 'integration', "{$arg}-linkedin-layout" );
			$output .= do_shortcode ( "[linkedin layout='{$layout}' /]" );
			echo "{$output}";
		endif;
	}
}
// # --- **** show_linkedin() *** --- ###

// # --- **** show_delicious() *** --- ###
/**
 * show_delicious()
 * Objective:
 * Outputs the Delicious like button in post and page.
 */
if( !function_exists( 'show_delicious' ) ){
	function show_delicious($arg = 'post') {
		$delicious = dttheme_option ( 'integration', "{$arg}-delicious" );
		$output = "";
		if (! empty ( $delicious )) :
			$text = dttheme_wp_kses(dttheme_option ( 'integration', "{$arg}-delicious-text" ));
			$output .= do_shortcode ( "[delicious text='{$text}' /]" );
			echo "{$output}";
		endif;
	}
}
// # --- **** show_delicious() *** --- ###

// # --- **** show_pintrest() *** --- ###
/**
 * show_pintrest()
 * Objective:
 * Outputs the Pintrest like button in post and page.
 */
if( !function_exists( 'show_pintrest' ) ){
	function show_pintrest($arg = 'post') {
		$delicious = dttheme_option ( 'integration', "{$arg}-pintrest" );
		$output = "";
		if (! empty ( $delicious )) :
			$layout = dttheme_option ( 'integration', "{$arg}-pintrest-layout" );
			$output .= do_shortcode ( "[pintrest layout='{$layout}' prompt='true' /]" );
			echo "{$output}";
		endif;
	}
}
// # --- **** show_pintrest() *** --- ###

// # --- **** show_digg() *** --- ###
/**
 * show_digg()
 * Objective:
 * Outputs the Digg like button in post and page.
 */
if( !function_exists( 'show_digg' ) ){
	function show_digg($arg = 'post') {
		$digg = dttheme_option ( 'integration', "{$arg}-digg" );
		$output = "";
		if (! empty ( $digg )) :
			$layout = dttheme_option ( 'integration', "{$arg}-digg-layout" );
			$output .= do_shortcode ( "[digg layout='{$layout}' /]" );
			echo "{$output}";
		endif;
	}
}
// # --- **** show_digg() *** --- ###

/**
 * dttheme_tweetbox_filter()
 * Objective:
 * Returns filtered tweets.
 * @args:
 * 1.text :	Tweets text to filter
 */
if( !function_exists( 'dttheme_tweetbox_filter' ) ){
	function dttheme_tweetbox_filter($text) {
		// Props to Allen Shaw & webmancers.com & Michael Voigt
		$text = preg_replace ( '/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i', "<a href=\"$1\" class=\"twitter-link\">$1</a>", $text );
		$text = preg_replace ( '/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i', "<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text );
		$text = preg_replace ( "/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i", "<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text );
		$text = preg_replace ( "/#(\w+)/", "<a class=\"twitter-link\" href=\"http://search.twitter.com/search?q=\\1\">#\\1</a>", $text );
		$text = preg_replace ( "/@(\w+)/", "<a class=\"twitter-link\" href=\"http://twitter.com/\\1\">@\\1</a>", $text );
		return $text;
	}
}
// # --- **** dttheme_tweetbox_filter() *** --- ###

/**
 * dttheme_footer_widgetarea()
 * Objective:
 * 1.
 * To Generate Footer Widget Areas
 * Args: $count = No of widget areas
 */
if( !function_exists( 'dttheme_footer_widgetarea' ) ){
	function dttheme_footer_widgetarea($count) {
		$name = esc_html__( "Footer Column", 'lms' );
		if ($count <= 4) :
			for($i = 1; $i <= $count; $i ++) :
				register_sidebar ( array (
						'name' => $name . "-{$i}",
						'id' => "footer-sidebar-{$i}",
						'description' => esc_html__("Appears in the footer section of the site.", 'lms'),
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget' => '</aside>',
						'before_title' => '<h3 class="widgettitle">',
						'after_title' => '</h3>' 
				) );
			endfor
			;
		 elseif ($count == 5 || $count == 6) :
			$a = array (
					"1-4",
					"1-4",
					"1-2" 
			);
			$a = ($count == 5) ? $a : array_reverse ( $a );
			foreach ( $a as $k => $v ) :
				register_sidebar ( array (
						'name' => $name . "-{$v}",
						'id' => "footer-sidebar-{$k}-{$v}",
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget' => '</aside>',
						'before_title' => '<h3 class="widgettitle">',
						'after_title' => '</h3>' 
				) );
			endforeach
			;
		 elseif ($count == 7 || $count == 8) :
			$a = array (
					"1-4",
					"3-4" 
			);
			$a = ($count == 7) ? $a : array_reverse ( $a );
			foreach ( $a as $k => $v ) :
				register_sidebar ( array (
						'name' => $name . "-{$v}",
						'id' => "footer-sidebar-{$k}-{$v}",
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget' => '</aside>',
						'before_title' => '<h3 class="widgettitle">',
						'after_title' => '</h3>' 
				) );
			endforeach
			;
		 elseif ($count == 9 || $count == 10) :
			$a = array (
					"1-3",
					"2-3" 
			);
			$a = ($count == 9) ? $a : array_reverse ( $a );
			foreach ( $a as $k => $v ) :
				register_sidebar ( array (
						'name' => $name . "-{$v}",
						'id' => "footer-sidebar-{$k}-{$v}",
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget' => '</aside>',
						'before_title' => '<h3 class="widgettitle">',
						'after_title' => '</h3>' 
				) );
			endforeach
			;
		endif;
	}
}
// # --- **** dttheme_footer_widgetarea() *** --- ###

// # --- **** dttheme_show_footer_widgetarea() *** --- ###
/**
 * dttheme_show_footer_widgetarea()
 * Objective:
 * Outputs the Footer section widget area.
 */
if( !function_exists( 'dttheme_show_footer_widgetarea' ) ){
	function dttheme_show_footer_widgetarea($count) {
		$classes = array (
				"1" => "dt-sc-full-width",
				"dt-sc-one-half",
				"dt-sc-one-third",
				"dt-sc-one-fourth",
				"1-2" => "dt-sc-one-half",
				"1-3" => "dt-sc-one-third",
				"1-4" => "dt-sc-one-fourth",
				"3-4" => "dt-sc-three-fourth",
				"2-3" => "dt-sc-two-third" 
		);
		if ($count <= 4) :
			for($i = 1; $i <= $count; $i ++) :
				$class = $classes [$count];
				$first = ($i == 1) ? "first" : "";
				echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$i}" )) : endif;
				echo "</div>";
			endfor;
		 elseif ($count == 5 || $count == 6) :
			$a = array (
					"1-4",
					"1-4",
					"1-2" 
			);
			$a = ($count == 5) ? $a : array_reverse ( $a );
			foreach ( $a as $k => $v ) :
				$class = $classes [$v];
				#$last = (end ( $a ) == $v) ? "last" : "";
				#echo "<div class='column {$class} {$last}'>";
	
				$first = ($k == 0 ) ? "first" : "";
				echo "<div class='column {$class} {$first}'>";
				
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) : endif;
				echo "</div>";
			endforeach;
		 
	
		elseif ($count == 7 || $count == 8) :
			$a = array (
					"1-4",
					"3-4" 
			);
			
			$a = ($count == 7) ? $a : array_reverse ( $a );
			foreach ( $a as $k => $v ) :
				$class = $classes [$v];
				#$last = (end ( $a ) == $v) ? "last" : "";
				#echo "<div class='column {$class} {$last}'>";
				$first = ($k == 0 ) ? "first" : "";
				echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) :endif;
				echo "</div>";
			endforeach;
			
		 elseif ($count == 9 || $count == 10) :
			$a = array (
					"1-3",
					"2-3" 
			);
			$a = ($count == 9) ? $a : array_reverse ( $a );
			foreach ( $a as $k => $v ) :
				$class = $classes [$v];
				#$last = (end ( $a ) == $v) ? "last" : "";
				#echo "<div class='column {$class} {$last}'>";
				$first = ($k == 0 ) ? "first" : "";
				echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) :endif;
				echo "</div>";
			endforeach;
		endif;
	}
}
// # --- **** dttheme_show_footer_widgetarea() *** --- ###

// # --- **** dttheme_check_slider_revolution_responsive_wordpress_plugin() *** --- ###
/**
 * dttheme_check_slider_revolution_responsive_wordpress_plugin()
 * Objective:
 * Check the "Revolution Responsive WordPress Plugin" is activated
 */
if( !function_exists( 'dttheme_check_slider_revolution_responsive_wordpress_plugin' ) ){
	function dttheme_check_slider_revolution_responsive_wordpress_plugin() {

		$revolutionslider = array( '' => esc_html__('Select a slider','lms') );
		if( class_exists( 'RevSlider' ) ) {
			$sld = new RevSlider();
			$sliders = $sld->getArrSliders();

			if(!empty($sliders)){
				foreach($sliders as $key => $item) {
					$revolutionslider[$item->getAlias()] = $item->getTitle();
				}
			}    
		}

		return $revolutionslider;		
	}
}

// # --- **** dttheme_social_bookmarks() *** --- ###
/**
 * dttheme_social_bookmarks()
 * Objective:
 * To show social shares
 */
if( !function_exists( 'dttheme_social_bookmarks' ) ){
	function dttheme_social_bookmarks($arg = 'sb-post') {
		global $post;
		
		$title = $post->post_title;
		$url = get_permalink ( $post->ID );
		$excerpt = $post->post_excerpt;
		$data = "";
		
		$path = IAMD_BASE_URL . "images/sociable/share";
		
		$fb = dttheme_option ( 'integration', "{$arg}-fb_like" );
		$data .= ! empty ( $fb ) ? "<li><a href='//www.facebook.com/sharer.php?u=$url&amp;t=" . urlencode ( $title ) . "'>
		<img src='{$path}/facebook.png' alt='facebook' /></a></li>" : "";
		
		$delicious = dttheme_option ( 'integration', "{$arg}-delicious" );
		$data .= ! empty ( $delicious ) ? "<li><a href='//del.icio.us/post?url=$url&amp;title=" . urlencode ( $title ) . "'>
		<img src='{$path}/delicious.png' alt='delicious' /></a></li>" : "";
		
		$digg = dttheme_option ( 'integration', "{$arg}-digg" );
		$data .= ! empty ( $digg ) ? "<li><a href='//digg.com/submit?phase=2&amp;url=$url&amp;title=" . urlencode ( $title ) . "'>
		<img src='{$path}/digg.png' alt='digg' /></a></li>" : "";
		
		$stumbleupon = dttheme_option ( 'integration', "{$arg}-stumbleupon" );
		$data .= ! empty ( $stumbleupon ) ? "<li><a href='//www.stumbleupon.com/submit?url=$url&amp;title=" . urlencode ( $title ) . "'>
		<img src='{$path}/stumbleupon.png' alt='stumbleupon' /></a></li>" : "";
		
		$twitter = dttheme_option ( 'integration', "{$arg}-twitter" );
		$t_url = ! empty ( $twitter ) ? $url : '';
		$data .= ! empty ( $twitter ) ? "<li><a href='//twitter.com/home/?status=" . urlencode ( $title ) . ":$t_url'>
		<img src='{$path}/twitter.png' alt='twitter' /></a></li>" : "";
		
		$googleplus = dttheme_option ( 'integration', "{$arg}-googleplus" );
		$data .= ! empty ( $googleplus ) ? "<li><a class=\"google\" href=\"//plus.google.com/share?url=$url\"  onclick=\"javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;\" >
		<img src='{$path}/google.png' alt='googleplus' /></a></li>" : '';
		
		$linkedin = dttheme_option ( 'integration', "{$arg}-linkedin" );
		$data .= ! empty ( $linkedin ) ? "<li><a href='//www.linkedin.com/shareArticle?mini=true&amp;title=" . urlencode ( $title ) . "&amp;url=$url' title='Share on LinkedIn'>
		<img src='{$path}/linkedin.png' alt='linkedin' /></a></li>" : "";
		
		$pintrest = dttheme_option ( 'integration', "{$arg}-pintrest" );
		$media = wp_get_attachment_url ( get_post_thumbnail_id ( $post->ID ) );
		$data .= ! empty ( $pintrest ) ? "<li><a href='//pinterest.com/pin/create/button/?url=" . urlencode ( $url ) . "&amp;media=$media'>
		<img src='{$path}/pinterest.png' alt='pintrest' /></a></li>" : "";
		
		$data = ! empty ( $data ) ? "<ul class='social-share-icons'>{$data}</ul>" : "";
		echo "{$data}";
	}
}
// # --- **** dttheme_social_bookmarks() *** --- ###

// # --- **** is_mytheme_moible_view() *** --- ###
/**
 * dttheme_is_mobile_view()
 * Objective:
 * If you eanble responsive mode in theme , this will add view port at the head
 */
if( !function_exists( 'dttheme_is_mobile_view' ) ){
	function dttheme_is_mobile_view() {
		$dttheme_options = get_option ( IAMD_THEME_SETTINGS );
		$dttheme_mobile = array_key_exists("mobile",$dttheme_options ) ?  $dttheme_options ['mobile'] : array();
		if (isset ( $dttheme_mobile ['is-theme-responsive'] ))
			echo "<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />\r";
	}
}
// # --- **** dttheme_is_mobile_view() *** --- ###

// o load basic css : default,shortcode & skin css
function dttheme_load_basic_css() {
	$dttheme_options = get_option ( IAMD_THEME_SETTINGS );
	$dttheme_general = $dttheme_options ['general'];
	
	if (isset ( $dttheme_general ['enable-favicon'] )) :
		$url = ! empty ( $dttheme_general ['favicon-url'] ) ? $dttheme_general ['favicon-url'] : IAMD_BASE_URL . "images/favicon.png";
		echo "<link href='$url' rel='shortcut icon' type='image/x-icon' />\n";

		$phone_url = ! empty ( $dttheme_general ['apple-favicon'] ) ? $dttheme_general ['apple-favicon'] : IAMD_BASE_URL . "images/apple-touch-icon.png";
		echo "<link href='$phone_url' rel='apple-touch-icon-precomposed'/>\n";

		$phone_retina_url = ! empty ( $dttheme_general ['apple-retina-favicon'] ) ? $dttheme_general ['apple-retina-favicon'] : IAMD_BASE_URL . "images/apple-touch-icon-114x114.png";
		echo "<link href='$phone_retina_url' sizes='114x114' rel='apple-touch-icon-precomposed'/>\n";

		$ipad_url = ! empty ( $dttheme_general ['apple-ipad-favicon'] ) ? $dttheme_general ['apple-ipad-favicon'] : IAMD_BASE_URL . "images/apple-touch-icon-72x72.png";
		echo "<link href='$ipad_url' sizes='72x72' rel='apple-touch-icon-precomposed'/>\n";


		$ipad_retina_url = ! empty ( $dttheme_general ['apple-ipad-retina-favicon'] ) ? $dttheme_general ['apple-ipad-retina-favicon'] : IAMD_BASE_URL . "images/apple-touch-icon-144x144.png";
		echo "<link href='$ipad_retina_url' sizes='144x144' rel='apple-touch-icon-precomposed'/>\n";
	endif;
	
	wp_enqueue_style ( 'lms-style', get_stylesheet_uri () );

	#Buddypress inline css...
	if (function_exists('bp_add_cover_image_inline_css')) {
		$inline_css = bp_add_cover_image_inline_css( true );
		wp_add_inline_style( 'bp-parent-css', strip_tags( $inline_css['css_rules'] ) );
	}
	
	wp_enqueue_style ( 'custom-font-awesome', IAMD_BASE_URL . 'css/font-awesome.min.css' );
	wp_enqueue_style ( 'stoke-gap-icons', IAMD_BASE_URL . 'css/stroke-gap-icons.min.css' );

	if( class_exists('Woothemes_Sensei') ) { wp_enqueue_style('sensei', IAMD_BASE_URL.'sensei/css/style.css'); }
	
	wp_enqueue_style ( 'lms-skin', IAMD_BASE_URL . "skins/" . $dttheme_options ['appearance'] ['skin'] . "/style.css" );

	if( ! isset( $_COOKIE['dtPrivacyGoogleWebfontsDisabled'] ) ):

		wp_enqueue_style( 'font-raleway', '//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,800,700,900' );
		wp_enqueue_style( 'font-opensans', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' );
		wp_enqueue_style( 'font-dancingscript', '//fonts.googleapis.com/css?family=Dancing+Script' );

	endif;

	$cookie_bar = dttheme_option('privacy', 'enable-cookie-msgbar');
		if( isset($cookie_bar) ) {
			wp_enqueue_style ( 'cookieconsent', IAMD_BASE_URL . 'css/cookieconsent.css' );
		}
		
	wp_enqueue_style ( 'magnific-popup', IAMD_FW_URL . 'js/public/magnific/magnific-popup.css' );

	// gutenberg css ---------------------------------------------------------------------
	wp_enqueue_style( 'lms-gutenberg', IAMD_BASE_URL.'/css/gutenberg.css', false, IAMD_THEME_VERSION, 'all' );
	
	if( is_rtl() || (isset($_REQUEST['rtl']) && $_REQUEST['rtl'] == 'yes') ) {
		wp_enqueue_style ( 'lms-rtl', IAMD_BASE_URL . "rtl.css" );
	}

	wp_enqueue_style ( 'jquery-ui', IAMD_BASE_URL . 'css/jquery-ui.css' );

}
add_action( 'wp_enqueue_scripts', 'dttheme_load_basic_css', '100' );

// # --- **** dttheme_set_layout *** --- ###
function dttheme_set_layout() {
	if (dttheme_option ( "mobile", "is-theme-responsive" )) {
		wp_enqueue_style ( 'responsive', IAMD_BASE_URL . "responsive.css" );
	}
	
	$dttheme_options = get_option ( IAMD_THEME_SETTINGS );
	$dttheme_mobile = array_key_exists("mobile",$dttheme_options ) ?  $dttheme_options ['mobile'] : array();
	
	if (isset ( $dttheme_mobile ['is-slider-disabled'] )) :
		$out = '@media only screen and (max-width:320px), (max-width: 479px), (min-width: 480px) and (max-width: 767px), (min-width: 768px) and (max-width: 959px),
		 (max-width:1200px) { div#slider { display:none !important; } 	}';
		 wp_add_inline_style( 'lms-gutenberg', $out );
	endif;
}
add_action( 'wp_enqueue_scripts', 'dttheme_set_layout', '100' );
// # --- **** dttheme_set_layout *** --- ###

if( !function_exists( 'hex2rgb' ) ){
	function hex2rgb($hex) {
		$hex = str_replace ( "#", "", $hex );
		
		if (strlen ( $hex ) == 3) :
			$r = hexdec ( substr ( $hex, 0, 1 ) . substr ( $hex, 0, 1 ) );
			$g = hexdec ( substr ( $hex, 1, 1 ) . substr ( $hex, 1, 1 ) );
			$b = hexdec ( substr ( $hex, 2, 1 ) . substr ( $hex, 2, 1 ) );
		 else :
			$r = hexdec ( substr ( $hex, 0, 2 ) );
			$g = hexdec ( substr ( $hex, 2, 2 ) );
			$b = hexdec ( substr ( $hex, 4, 2 ) );
		endif;
		$rgb = array ( $r,$g,$b);
		return $rgb;
	}
}

// ##########################################
// PAGINATION
// ##########################################
if( !function_exists( 'dttheme_pagination' ) ){
	function dttheme_pagination($class = '', $pages = '') {
		$out = NULL;
		global $paged;
		if (empty ( $paged ))
			$paged = 1;
		$prev = $paged - 1;
		$next = $paged + 1;
		$range = 10; // only edit this if you want to show more page-links
		$showitems = ($range * 2) + 1;
		if ($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if (! $pages) {
				$pages = 1;
			}
		}
		if (1 != $pages) {
			$out .= "<ul class='$class'>";
			$out .= ($paged > 2 && $paged > $range + 1 && $showitems < $pages) ? "<li> <a href='" . get_pagenum_link ( 1 ) . "'>&laquo;</a></li>" : "";
			$out .= ($paged > 1 && $showitems < $pages) ? "<li> <a href='" . get_pagenum_link ( $prev ) . "'>&lsaquo;</a></li>" : "";
			
			for($i = 1; $i <= $pages; $i ++) {
				if (1 != $pages && (! ($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
					if ($class == "ajax-load") :
						$c = ($paged == $i) ? "active-page" : "";
						$out .= "<li><a href='" . get_pagenum_link ( $i ) . "' class='" . $c . "'>" . $i . "</a></li>";
					 else :
						$out .= ($paged == $i) ? "<li class='active-page'>" . $i . "</li>" : "<li><a href='" . get_pagenum_link ( $i ) . "' class='inactive'>" . $i . "</a></li>";
					endif;
				}
			}
			
			$out .= ($paged < $pages && $showitems < $pages) ? "<li> <a href='" . get_pagenum_link ( $next ) . "'>&rsaquo;</a> </li>" : "";
			$out .= ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) ? "<li> <a href='" . get_pagenum_link ( $pages ) . "'>&raquo;</a></li>" : "";
			$out .= "</ul>";
		}
		return $out;
	}
}

//LIKE PLUGIN ACTION...
add_action('activated_plugin', 'dt_like_plugin_hook', 1);
function dt_like_plugin_hook() {
	if( function_exists('likeThis') ) {
		update_option("no_likes", "0");
		update_option("one_like", "%");
		update_option("some_likes", "%");
	}
}

function dttheme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	return $title;
}
add_filter( 'wp_title', 'dttheme_wp_title', 10, 2 );

function slt_wmode_opaque( $html, $url, $args ) {
	
	if( (strrpos($url,"youtube") !== false)  || (strrpos($url,"youtu.") !== false) ) {
		
		$patterns[] = '/src="(.*?)"/';
		$replacements[] = 'src="${1}&wmode=opaque"';
		
		$html =  preg_replace($patterns, $replacements, $html);
		$html = str_replace('</iframe>)', '</iframe>', $html);
		
	}elseif( strrpos($url, "soundcloud.com") !== false ) {
		
		$patterns[] = '/height="(.*?)"/';
		$replacements[] = 'height="166"';
		$html =  preg_replace($patterns, $replacements, $html);
		
		$patterns[] = '/width="(.*?)"/';
		$replacements[] = 'width="100%"';
		$html =  preg_replace($patterns, $replacements, $html);
		
		$patterns[] = '/visual=true&/';
		$replacements[] = '';
		$html =  preg_replace($patterns, $replacements, $html);
	}	

 return $html;          
}
add_filter( 'oembed_result', 'slt_wmode_opaque', 10, 3 );


#Sidebars
if( !function_exists( 'dttheme_show_sidebar' ) ){
	function dttheme_show_sidebar($type, $id, $sidebar = 'left'){
	
		if( $type === 'post'){
			$settings = get_post_meta($id,'_dt_post_settings',TRUE);
		}elseif( $type === 'page' ){
			$settings = get_post_meta($id,'_tpl_default_settings',TRUE);
		}elseif( $type === "dt_courses" ){
			$settings = get_post_meta($id,'_course_settings',TRUE);
		}elseif( $type === "dt_lessons" ){
			$settings = get_post_meta($id,'_lesson_settings',TRUE);
		}elseif( $type === "dt_teachers" ){
			$settings = get_post_meta($id,'_teacher_settings',TRUE);
		}
	
		$settings = is_array($settings) ? $settings  : array();
	
		if ( !array_key_exists('disable-everywhere-sidebar-'.$sidebar,$settings) ):
			if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar-'.$sidebar)) ): endif;
		endif;	
		
		if( array_key_exists('widget-area-'.$sidebar, $settings)):
			foreach ($settings['widget-area-'.$sidebar] as $widget ) {
				$id = mb_convert_case($widget, MB_CASE_LOWER, "UTF-8");
				if(function_exists('dynamic_sidebar') && dynamic_sidebar($id) ): endif;
			}
		endif;
		
	}
}

add_action("wp_ajax_dttheme_team_member", "dttheme_team_member");
add_action("wp_ajax_nopriv_dttheme_team_member", "dttheme_team_member");
function dttheme_team_member() {
	
	if ( !wp_verify_nonce( $_REQUEST['nonce'], "dt_team_member_nonce")) {
		exit();
	}
	$out = '';   

	$post_id = $_REQUEST['post_id'];
	$args = array('post_type' => 'dt_teachers', 'p' => $post_id);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		while($the_query->have_posts()): $the_query->the_post();
			
			$courses_submitted = array();
			
			$lesson_args = array('post_type' => 'dt_lessons', 'posts_per_page' => -1, 'meta_key' => 'lesson-teacher', 'meta_value' => $post_id, 'orderby' => 'post_date', 'order' => 'DESC', );
			$lesson_array = get_posts( $lesson_args );
			foreach($lesson_array as $lesson_item) {
				
				$lesson_course = get_post_meta ( $lesson_item->ID, "dt_lesson_course",true);
				$courses_submitted[] = get_the_title($lesson_course);
				
			}
			
			$courses_submitted = array_unique($courses_submitted);
			
			$out .= '<div class="dt-team-member">';
				$out .= '<div class="dt-team-entry-left">';
					$out .= '<div class="dt-sc-team">';
						$out .= '<div class="dt-sc-entry-thumb">';
							$image =  get_the_post_thumbnail( $post_id, 'medium', array('title' => ''));
							$image = !empty( $image ) ? $image : '<img src="http://placehold.it/220x220&text='.$GLOBALS['teachers-singular-label'].'"/>';
							$out .= $image;
						$out .= '</div>';
						$out .= '<div class="dt-sc-entry-title">';
							$out .= '<h2>'.get_the_title().'</h2>';
							$ts = get_post_meta($post_id, '_teacher_settings', true);
							if($ts['role'] != "")
								$out .= '<h5>'.$ts['role'].'</h5>';
						$out .= '</div>';
					$out .= '</div>';
					
					$out .= do_shortcode('[ratings id="'.$post_id.'"]');
					
					
				$out .= '</div>';
				
				$out .= '<div class="dt-team-entry-content">';
					
					$out .= '<h3>'.esc_html__('About Me', 'lms').' </h3>';
	
					$out .= '<ul class="teachers-details">';
						$out .= '<li><strong>'.esc_html__('Experience', 'lms').' :</strong>'.$ts['exp'].'</li>';
						$out .= '<li><strong>'.esc_html__('Courses Submitted', 'lms').' :</strong>'.implode(',', $courses_submitted).'</li>';
						$out .= '<li><strong>'.esc_html__('Specialist in', 'lms').' :</strong>'.$ts['special'].'</li>';
					$out .= '</ul>';
					
					$out .= '<div class="teachers-desc">';
						$out .= do_shortcode(get_the_excerpt());
					$out .= '</div>';
				
					$out .= '<a href="'.get_permalink().'" class="dt-sc-button small">'.esc_html__('Know More', 'lms').'</a>';
				$out .= '</div>';
			
			$out .= '</div>';
		
		endwhile;
	endif;
	wp_reset_postdata();
	
	echo "{$out}";
	die();
}

if( !function_exists( 'dttheme_onepage_sections' ) ){
	function dttheme_onepage_sections(){
		$sections = array();
		$locations = get_nav_menu_locations();
		if(isset($locations['landingpage_menu'])):
			$menu = wp_get_nav_menu_object( $locations['landingpage_menu'] );
			$items  = wp_get_nav_menu_items($menu->term_id);
			foreach((array) $items as $key => $menu_items){
				$classes = $menu_items->classes;
				if( $menu_items->menu_item_parent == 0 ) {
					if(('page' == $menu_items->object) && !in_array('external',$classes) ){
						$sections[$menu_items->ID] = $menu_items->object_id;
					}
				}
			}
		endif;
		return $sections;
	}
}

if( !function_exists( 'dtthemes_ajax_pagination' ) ){
	function dtthemes_ajax_pagination($per_page = 10, $page, $total, $post_id){ 
	
		$adjacents = "1";
	
		$page = ($page == 0 ? 1 : $page); 
		$start = ($page - 1) * $per_page; 
	
		$prev = $page - 1; 
		$next = $page + 1;
		$lastpage = ceil($total/$per_page);
		$lpm1 = $lastpage - 1;
	
		$pagination = "";
		if($lastpage > 1)
		{ 
			$pagination .= "<div class='pagination' data-postid='{$post_id}'>";
			if ($page >1){
				$pagination .= '<div class="prev-post"><a href="#" cpage="'.$page.'" class="dt-prev"><span class="fa fa-angle-double-left"></span> '.esc_html__('Prev', 'lms').'</a></div>';
			}
	
			$pagination .= "<ul>";
			if ($lastpage < 7 + ($adjacents * 2))
			{ 
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class='active-page'>$counter</li>";
					else
						$pagination.= "<li><a href='#'>$counter</a></li>"; 
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))
			{
				if($page < 1 + ($adjacents * 2)) 
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li class='active-page'>$counter</li>";
						else
							$pagination.= "<li><a href='#'>$counter</a></li>"; 
					}
					$pagination.= "<li class='dot'>...</li>";
					$pagination.= "<li><a href='#'>$lpm1</a></li>";
					$pagination.= "<li><a href='#'>$lastpage</a></li>"; 
				}
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<li><a href='#'>1</a></li>";
					$pagination.= "<li><a href='#'>2</a></li>";
					$pagination.= "<li class='dot'>...</li>";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li class='active-page'>$counter</li>";
						else
							$pagination.= "<li><a href='#'>$counter</a></li>"; 
					}
					$pagination.= "<li class='dot'>..</li>";
					$pagination.= "<li><a href='#'>$lpm1</a></li>";
					$pagination.= "<li><a href='#'>$lastpage</a></li>"; 
				}
				else
				{
					$pagination.= "<li><a href='#'>1</a></li>";
					$pagination.= "<li><a href='#'>2</a></li>";
					$pagination.= "<li class='dot'>..</li>";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li class='active-page'>$counter</li>";
						else
							$pagination.= "<li><a href='#'>$counter</a></li>"; 
					}
				}
			}
	
			$pagination.= "</ul>"; 
			if ($page < $counter - 1){
				$pagination .= '<div class="next-post"><a href="#" cpage="'.$page.'"  class="dt-next">'.esc_html__('Next', 'lms').' <span class="fa fa-angle-double-right"></span></a></div>';
			}
			$pagination.= "</div>\n"; 
		} 
			
		return $pagination;
		
	}
}


add_action( 'wp_ajax_get_course_subcategories', 'get_course_subcategories' );
add_action( 'wp_ajax_nopriv_get_course_subcategories', 'get_course_subcategories' );

function get_course_subcategories() {
	
	$cat_id = $_REQUEST['cat_id'];
	
	$out = '';
	
	if($cat_id > 0) {
		
		$out .= '<select name="subcoursetype" id="dt-subcoursetype">';
		$out .= '<option value="0">'.esc_html__("Sub Course Type", 'lms').'</option>';
				$sub_course_types = get_categories("taxonomy=course_category&hide_empty=1&parent={$cat_id}");
				foreach ( $sub_course_types as $sub_course_type ) {
					$id = esc_attr( $sub_course_type->term_id );
					$title = esc_html( $sub_course_type->name );
					$selected = isset($_REQUEST['subcoursetype']) ? $_REQUEST['subcoursetype'] : '';
					$out .= "<option value='{$id}' ".selected ( $selected, $id, false )." >{$title}</option>";
				}        
		$out .= '</select>';
	
	} else {
	
		$out .= '<select name="subcoursetype" id="dt-subcoursetype">';
		$out .= '<option value="0">'.esc_html__("Sub Course Type", 'lms').'</option>';
		$out .= '</select>';
		
	}
	
	echo "{$out}";
	die();
}

add_action("wp_ajax_dt_generate_certificate", "dt_generate_certificate");
add_action("wp_ajax_nopriv_dt_generate_certificate", "dt_generate_certificate");
function dt_generate_certificate() {
	
	if ( !wp_verify_nonce( $_REQUEST['nonce'], "dt_certificate_nonce")) {
		exit();
	}
	$out = '';   

	$certificate_id = $_REQUEST['certificate_id'];
	$args = array('post_type' => 'dt_certificates', 'p' => $certificate_id);
	$the_query = new WP_Query($args);
	
	if($the_query->have_posts()):
		while($the_query->have_posts()): $the_query->the_post();
		
			$post_id = get_the_ID(); 
			$background_image = get_post_meta ( $post_id, 'background-image', TRUE );
			$custom_class = dttheme_wp_kses(get_post_meta ( $post_id, 'custom-class', TRUE ));
			
			$enable_print = get_post_meta ( $post_id, 'enable-print', TRUE );
			
			if(isset($enable_print) && $enable_print != '')
				$out .= '<a href="#" class="dt_print_certificate"><span class="fa fa-print"></span>'. esc_html__('Print', 'lms').'</a>';
				
			$out .= '<div class="dt-sc-certificate-container '.$custom_class.'" style="background:url('.$background_image.')">';
			$out .= do_shortcode(get_the_content());
			$out .= '</div>';

		endwhile;
	endif;
    wp_reset_postdata();
	
	echo "{$out}";
	die();
}

add_action( 'wp_ajax_dt_dashboard_teacher_courses', 'dt_dashboard_teacher_courses' );
add_action( 'wp_ajax_nopriv_dt_dashboard_teacher_courses', 'dt_dashboard_teacher_courses' );
function dt_dashboard_teacher_courses() {
	
	$dtLMSAjaxNonce = $_REQUEST['dtLMSAjaxNonce'];
	if(isset($dtLMSAjaxNonce) && wp_verify_nonce($dtLMSAjaxNonce, 'dtLMSAjaxNonce')) {

		$curr_page = $_REQUEST['curr_page'];
		dt_get_teacher_courses(10, $curr_page);

	}

	die();
}

add_action( 'wp_ajax_dt_dashboard_user_mycourseslist', 'dt_dashboard_user_mycourseslist' );
add_action( 'wp_ajax_nopriv_dt_dashboard_user_mycourseslist', 'dt_dashboard_user_mycourseslist' );
function dt_dashboard_user_mycourseslist() {
	
	$dtLMSAjaxNonce = $_REQUEST['dtLMSAjaxNonce'];
	if(isset($dtLMSAjaxNonce) && wp_verify_nonce($dtLMSAjaxNonce, 'dtLMSAjaxNonce')) {

		$curr_page = $_REQUEST['curr_page'];
		dt_get_user_mycourses_list_overview(10, $curr_page);

	}

	die();
}

add_action( 'wp_ajax_dt_dashboard_user_allcourseslist', 'dt_dashboard_user_allcourseslist' );
add_action( 'wp_ajax_nopriv_dt_dashboard_user_allcourseslist', 'dt_dashboard_user_allcourseslist' );
function dt_dashboard_user_allcourseslist() {
	
	$dtLMSAjaxNonce = $_REQUEST['dtLMSAjaxNonce'];
	if(isset($dtLMSAjaxNonce) && wp_verify_nonce($dtLMSAjaxNonce, 'dtLMSAjaxNonce')) {

		$curr_page = $_REQUEST['curr_page'];
		dt_get_user_allcourses_list_overview(10, $curr_page);

	}

	die();
}

add_action( 'wp_ajax_dt_dashboard_user_allquizzeslist', 'dt_dashboard_user_allquizzeslist' );
add_action( 'wp_ajax_nopriv_dt_dashboard_user_allquizzeslist', 'dt_dashboard_user_allquizzeslist' );
function dt_dashboard_user_allquizzeslist() {
	
	$dtLMSAjaxNonce = $_REQUEST['dtLMSAjaxNonce'];
	if(isset($dtLMSAjaxNonce) && wp_verify_nonce($dtLMSAjaxNonce, 'dtLMSAjaxNonce')) {

		$curr_page = $_REQUEST['curr_page'];
		dt_get_user_allquizzes_list(10, $curr_page);

	}

	die();
}

add_action( 'wp_ajax_dt_user_join_group_request', 'dt_user_join_group_request' );
add_action( 'wp_ajax_nopriv_dt_user_join_group_request', 'dt_user_join_group_request' );
function dt_user_join_group_request() {
	
	$dtLMSAjaxNonce = $_REQUEST['dtLMSAjaxNonce'];
	if(isset($dtLMSAjaxNonce) && wp_verify_nonce($dtLMSAjaxNonce, 'dtLMSAjaxNonce')) {

		$studentid = $_REQUEST['studentid'];
		$groupid = $_REQUEST['groupid'];
		$result = groups_join_group( $groupid, $studentid );
		echo "{$result}";

	}
	
	die();
}

add_action( 'wp_ajax_dt_dashboard_user_courses', 'dt_dashboard_user_courses' );
add_action( 'wp_ajax_nopriv_dt_dashboard_user_courses', 'dt_dashboard_user_courses' );
function dt_dashboard_user_courses() {
	
	$dtLMSAjaxNonce = $_REQUEST['dtLMSAjaxNonce'];
	if(isset($dtLMSAjaxNonce) && wp_verify_nonce($dtLMSAjaxNonce, 'dtLMSAjaxNonce')) {

		$curr_page = $_REQUEST['curr_page'];
		dt_get_user_course_overview(5, $curr_page);

	}

	die();
}

add_action( 'wp_ajax_dt_dashboard_user_assignments', 'dt_dashboard_user_assignments' );
add_action( 'wp_ajax_nopriv_dt_dashboard_user_assignments', 'dt_dashboard_user_assignments' );
function dt_dashboard_user_assignments() {
	
	$dtLMSAjaxNonce = $_REQUEST['dtLMSAjaxNonce'];
	if(isset($dtLMSAjaxNonce) && wp_verify_nonce($dtLMSAjaxNonce, 'dtLMSAjaxNonce')) {

		$curr_page = $_REQUEST['curr_page'];
		dt_get_user_assignments(10, $curr_page);

	}

	die();
}

add_action( 'wp_ajax_dt_dashboard_teacher_assignments', 'dt_dashboard_teacher_assignments' );
add_action( 'wp_ajax_nopriv_dt_dashboard_teacher_assignments', 'dt_dashboard_teacher_assignments' );
function dt_dashboard_teacher_assignments() {
	
	$dtLMSAjaxNonce = $_REQUEST['dtLMSAjaxNonce'];
	if(isset($dtLMSAjaxNonce) && wp_verify_nonce($dtLMSAjaxNonce, 'dtLMSAjaxNonce')) {

		$curr_page = $_REQUEST['curr_page'];
		dt_get_teacher_assignments(10, $curr_page);
		die();

	}

}

function dttheme_customize_comment_fields( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
#add_filter( 'comment_form_fields', 'dttheme_customize_comment_fields' );


/* ---------------------------------------------------------------------------
 * Site SSL Compatibility
 * --------------------------------------------------------------------------- */
if(!function_exists('dttheme_ssl')) 
{
	function dttheme_ssl( $echo = false ){
		$ssl = '';
		if( is_ssl() ) $ssl = 's';
		if( $echo ){
			echo esc_html($ssl);
		}
		return $ssl;
	}
}

/* ---------------------------------------------------------------------------
 * SSL | Attachments
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'dttheme_ssl_attachments' ) )
{
	function dttheme_ssl_attachments( $url ){
		if( is_ssl() ){
			return str_replace('http://', 'https://', $url);
		}
		return $url;
	}
}
add_filter( 'wp_get_attachment_url', 'dttheme_ssl_attachments' );


/* ---------------------------------------------------------------------------
 * Get login, registration and logout url
 * --------------------------------------------------------------------------- */
if( !function_exists( 'dttheme_get_login_logout_url' ) ){
	function dttheme_get_login_logout_url(){
	
		$current_user = wp_get_current_user();
		
		$loginreg_page = dttheme_option('general','login-registration-page');
		
		if($loginreg_page == 'lms-default-profile') {
			
			$login = dttheme_get_page_permalink_by_its_template('tpl-login.php'); 
			$login = is_null($login) ? wp_login_url() : $login;
			
			$welcome = dttheme_get_page_permalink_by_its_template('tpl-welcome.php');
			$welcome = is_null($welcome) ? admin_url( 'profile.php' ) : $welcome;
			
			echo '<ul class="dt-sc-default-login">';
				if(!is_user_logged_in()) {
					echo '<li><a href="'.$login.'" title="'.esc_attr__('Login / Register Now', 'lms').'"><i class="fa fa-user"></i>'.esc_html__('Login', 'lms').'<span> | </span>'.esc_html__('Register', 'lms'),'</a></li>';
				} else {
					echo '<li><a href="'.$welcome.'">'.get_avatar( $current_user->ID, 30).'<span>'.esc_html__('Welcome, ', 'lms').'&nbsp;'.$current_user->display_name.' | </span>'.'</a></li>';
					echo '<li><a href="'.wp_logout_url($login).'" title="'.esc_attr__('Logout', 'lms').'">'.esc_html__('Logout', 'lms').'</a></li>';
				}
				dttheme_show_woo_cart();
			echo '</ul>';
			
		} else if(function_exists('bp_is_active') && $loginreg_page == 'lms-buddypress-profile') {
			
			$login = dttheme_get_page_permalink_by_its_template('tpl-login.php'); 
			$login = is_null($login) ? wp_login_url() : $login;
			
			echo '<ul class="dt-sc-default-login">';
				if(!is_user_logged_in()) {
					echo '<li><a href="'.$login.'" title="'.esc_attr__('Login / Register Now', 'lms').'"><i class="fa fa-user"></i>'.esc_html__('Login', 'lms').'<span> | </span>'.esc_html__('Register', 'lms'),'</a></li>';
				} else {
					echo '<li><a href="'.bp_loggedin_user_domain().'">'.get_avatar( $current_user->ID, 30).'<span>'.esc_html__('Welcome, ', 'lms').'&nbsp;'.$current_user->display_name.' | </span>'.'</a></li>';
					echo '<li><a href="'.wp_logout_url($login).'" title="'.esc_attr__('Logout', 'lms').'">'.esc_html__('Logout', 'lms').'</a></li>';
				}
				dttheme_show_woo_cart();
			echo '</ul>';
			
		} else if( function_exists( 'is_woocommerce' ) && $loginreg_page == 'woocommerce') {
			
			$welcome = dttheme_get_page_permalink_by_its_template('tpl-welcome.php');
			$welcome = is_null($welcome) ? admin_url( 'profile.php' ) : $welcome;
			
			echo '<ul class="dt-sc-custom-login">';
				if(!is_user_logged_in()) {
					echo '<li><a href="'.get_permalink(get_option('woocommerce_myaccount_page_id')).'" title="'.esc_attr__('Login', 'lms').'"><i class="fa fa-user"></i>'.esc_html__('Login | Register', 'lms').'</a></li>';
				} else {
					echo '<li><a href="'.$welcome.'">'.get_avatar( $current_user->ID, 30).'<span>'.esc_html__('Welcome, ', 'lms').'&nbsp;'.$current_user->display_name.' | </span>'.'</a></li>';
					echo '<li><a href="'.wp_logout_url(site_url('my-account/customer-logout/')).'" title="'.esc_attr__('Logout', 'lms').'">'.esc_html__('Logout', 'lms').'</a></li>';
				}
				dttheme_show_woo_cart();
			echo '</ul>';
			
		} else if( defined('WS_PLUGIN__S2MEMBER_VERSION') && $loginreg_page == 's2member') {
		
			echo '<ul class="dt-sc-custom-login">';
				if(!is_user_logged_in()) {
					echo '<li><a href="'.wp_login_url().'" title="'.esc_attr__('Login', 'lms').'"><i class="fa fa-user"></i>'.esc_html__('Login', 'lms').'</a></li>';
					echo '<span> | </span>';
					echo '<li><a href="'.wp_registration_url().'" title="'.esc_attr__('Register', 'lms').'"><i class="fa fa-user-plus"></i>'.esc_html__('Register', 'lms').'</a></li>';
				} else {
					
					$s2member_welcome_page = get_option('ws_plugin__s2member_cache');
					$s2member_welcome_page = $s2member_welcome_page['login_welcome_page'];
					if($s2member_welcome_page['page'] != '') {
						$page = $s2member_welcome_page['link'];
					} else if($GLOBALS["WS_PLUGIN__"]["s2member"]["o"]["login_redirection_override"] != '') {
						$page = $GLOBALS["WS_PLUGIN__"]["s2member"]["o"]["login_redirection_override"];
						$page = c_ws_plugin__s2member_login_redirects::fill_login_redirect_rc_vars($page, false, false);
					} else {
						$page = '';
					}
					$link = ($page == '') ? admin_url( 'profile.php' ) : $page;
					
					echo '<li><a href="'.$link.'">'.get_avatar( $current_user->ID, 30).'<span>'.esc_html__('Welcome, ', 'lms').'&nbsp;'.$current_user->display_name.' | </span>'.'</a></li>';
					echo '<li><a href="'.wp_logout_url().'" title="'.esc_attr__('Logout', 'lms').'">'.esc_html__('Logout', 'lms').'</a></li>';
					
				}
				dttheme_show_woo_cart();
			echo '</ul>';
			
		} else {
			
			$welcome = dttheme_get_page_permalink_by_its_template('tpl-welcome.php');
			$welcome = is_null($welcome) ? admin_url( 'profile.php' ) : $welcome;
			
			echo '<ul class="dt-sc-custom-login">';
				if(!is_user_logged_in()) {
					echo '<li><a href="'.wp_login_url().'" title="'.esc_attr__('Login', 'lms').'"><i class="fa fa-user"></i>'.esc_html__('Login', 'lms').'</a></li>';
					echo '<span> | </span>';
					echo '<li><a href="'.wp_registration_url().'" title="'.esc_attr__('Register', 'lms').'"><i class="fa fa-user-plus"></i>'.esc_html__('Register', 'lms').'</a></li>';
				} else {
					echo '<li><a href="'.$welcome.'">'.get_avatar( $current_user->ID, 30).'<span>'.esc_html__('Welcome, ', 'lms').'&nbsp;'.$current_user->display_name.' | </span>'.'</a></li>';
					echo '<li><a href="'.wp_logout_url().'" title="'.esc_attr__('Logout', 'lms').'">'.esc_html__('Logout', 'lms').'</a></li>';
				}
				dttheme_show_woo_cart();
			echo '</ul>';
			
		}
		
	}
}

if( !function_exists( 'dttheme_show_woo_cart' ) ){
	function dttheme_show_woo_cart() {
		if(class_exists('WooCommerce') && dttheme_option('appearance', 'enable-header-cart')) {
			$cart_url = wc_get_cart_url();
			echo '<li class="dt-sc-cart"><a href="'.$cart_url.'"><i class="fa fa-shopping-cart"></i></a></li>';
		}
	}
}

/* ---------------------------------------------------------------------------
 * Get all s2member roles
 * --------------------------------------------------------------------------- */
if( !function_exists( 'dttheme_get_all_s2member_roles' ) ){
	function dttheme_get_all_s2member_roles($hide_level_1 = false){
	
		$s2member_roles = array();

		if( defined('WS_PLUGIN__S2MEMBER_VERSION') ) {

			$total_levels = isset($GLOBALS["WS_PLUGIN__"]["s2member"]["c"]["levels"]) ? $GLOBALS["WS_PLUGIN__"]["s2member"]["c"]["levels"] : 4;
				
			for($i = 1; $i <= $total_levels; $i++) {
				if(!$hide_level_1 || $i != 1) {
					$s2member_roles[] = 's2member_level'.$i;	
				}
			}

		}
		
		return $s2member_roles;
		
	}
}

/* ---------------------------------------------------------------------------
 * Check is s2Member user
 * --------------------------------------------------------------------------- */
if( !function_exists( 'dttheme_check_is_s2member_level_user' ) ){
	function dttheme_check_is_s2member_level_user($hide_level_1 = false){
	
		$dt_s2_user_roles = dttheme_get_all_s2member_roles($hide_level_1);
		$user_role = IAMD_USER_ROLE;
			
		if(in_array($user_role, $dt_s2_user_roles)) {
			return true;
		}
		
		return false;
		
	}
}

function table_exists($tablename) {
	
	global $wpdb;
    $res = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $tablename",''));
	if($res) { return $res; }

}

add_action( 'wp_ajax_dttheme_update_pagebuilder_contents', 'dttheme_update_pagebuilder_contents' );
add_action( 'wp_ajax_nopriv_dttheme_update_pagebuilder_contents', 'dttheme_update_pagebuilder_contents' );
function dttheme_update_pagebuilder_contents() {
	
	// Script to update pages
	$page_args = array('post_type' => 'page' ,'post_status' => 'publish' , 'posts_per_page' =>'-1');
	
	$page_datas = new WP_Query( $page_args );
	if( $page_datas->have_posts() ):
		while( $page_datas->have_posts() ):
			$page_datas->the_post();
				
				$current_page_id = get_the_ID();
				
				$builder_layout = get_post_meta( $current_page_id, '_dt_builder_settings', true );
				$builder_layout = is_array( $builder_layout ) ? $builder_layout  : array();
				$layout_html = array_key_exists('layout_html',$builder_layout ) ? $builder_layout['layout_html'] : '';
				$layout_shortcode = array_key_exists('layout_shortcode',$builder_layout ) ? $builder_layout['layout_shortcode'] : '';
				$layout_parsed = array_key_exists('layout_parsed',$builder_layout ) ? $builder_layout['layout_parsed'] : 'false';
				
				if($layout_parsed != 'true') {
				
					$layout_html_new = str_replace('<span class="dt_add_module_column" title="Add Module" style="display:none;">A</span>', '', $layout_html);
					$layout_html_new = str_replace('<div data-option_name="content" class="content', '<div data-option_name="title_content" class="title_content', $layout_html_new);
					$layout_html_new = str_replace('dt_fullwidth_section_container', 'dt_modules_holder dt_fullwidth_section_container', $layout_html_new);
					$layout_html_new = str_replace('dt_modules_container', 'dt_modules_holder dt_modules_container', $layout_html_new);
					$layout_html_new = mb_convert_encoding($layout_html_new, 'HTML-ENTITIES', "UTF-8");
					
					$doc = new DomDocument();
					$file = $doc->loadHTML($layout_html_new);
					
					$divtag = $doc->getElementsByTagName('div');
					foreach($divtag AS $item)
					{
					
						$item_class = $item->getAttribute('class');
						$item_class_arr = explode(' ', $item_class);
						
						if(in_array('dt_m_column', $item_class_arr)) {
						
							$add_module_div = $doc->createElement('div', '');
							$add_module_div_class = $doc->createAttribute('class');
							$add_module_div_class->value = 'dt_show_modules_in_popup dt_popup_from_column';
							$add_module_div_title = $doc->createAttribute('title');
							$add_module_div_title->value = 'Add Module';
							
							$add_module_div->appendChild($add_module_div_class);
							$add_module_div->appendChild($add_module_div_title);
							
							$item->appendChild($add_module_div);
							
						}
					
						if(in_array('dt_fullwidth_section', $item_class_arr)) {
						
							$add_module_div = $doc->createElement('div', '');
							$add_module_div_class = $doc->createAttribute('class');
							$add_module_div_class->value = 'dt_show_modules_in_popup dt_popup_from_section';
							$add_module_div_title = $doc->createAttribute('title');
							$add_module_div_title->value = 'Add Module';
							
							$add_module_div->appendChild($add_module_div_class);
							$add_module_div->appendChild($add_module_div_title);
							
							$item->appendChild($add_module_div);
							
						}
					
					}
					
					$layout_html_new = $doc->saveHTML();
					
					$layout_html_new = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">', '', $layout_html_new);
					$layout_html_new = str_replace('<html><body>', '', $layout_html_new);
					$layout_html_new = str_replace('</body></html>', '', $layout_html_new);
					
					$output = array();
					$output['layout_html'] = $layout_html_new;
					$output['layout_shortcode'] = $layout_shortcode;
					$output['layout_parsed'] = 'true';
					
					update_post_meta($current_page_id, '_dt_builder_settings', $output);
				
				}
				
		endwhile;
		wp_reset_postdata();
	endif;
	
	// Script to update posts
	$post_args = array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' =>'-1');
	
	$post_datas = new WP_Query( $post_args );
	if( $post_datas->have_posts() ):
		while( $post_datas->have_posts() ):
			$post_datas->the_post();
				
				$current_page_id = get_the_ID();
				
				$builder_layout = get_post_meta( $current_page_id, '_dt_builder_settings', true );
				$builder_layout = is_array( $builder_layout ) ? $builder_layout  : array();
				$layout_html = array_key_exists('layout_html',$builder_layout ) ? $builder_layout['layout_html'] : '';
				$layout_shortcode = array_key_exists('layout_shortcode',$builder_layout ) ? $builder_layout['layout_shortcode'] : '';
				$layout_parsed = array_key_exists('layout_parsed',$builder_layout ) ? $builder_layout['layout_parsed'] : 'false';
				
				if($layout_parsed != 'true') {
				
					$layout_html_new = str_replace('<span class="dt_add_module_column" title="Add Module" style="display:none;">A</span>', '', $layout_html);
					$layout_html_new = str_replace('<div data-option_name="content" class="content', '<div data-option_name="title_content" class="title_content', $layout_html_new);
					$layout_html_new = str_replace('dt_fullwidth_section_container', 'dt_modules_holder dt_fullwidth_section_container', $layout_html_new);
					$layout_html_new = str_replace('dt_modules_container', 'dt_modules_holder dt_modules_container', $layout_html_new);
					$layout_html_new = mb_convert_encoding($layout_html_new, 'HTML-ENTITIES', "UTF-8");
					
					$doc = new DomDocument();
					$file = $doc->loadHTML($layout_html_new);
					
					$divtag = $doc->getElementsByTagName('div');
					foreach($divtag AS $item)
					{
					
						$item_class = $item->getAttribute('class');
						$item_class_arr = explode(' ', $item_class);
						
						if(in_array('dt_m_column', $item_class_arr)) {
						
							$add_module_div = $doc->createElement('div', '');
							$add_module_div_class = $doc->createAttribute('class');
							$add_module_div_class->value = 'dt_show_modules_in_popup dt_popup_from_column';
							$add_module_div_title = $doc->createAttribute('title');
							$add_module_div_title->value = 'Add Module';
							
							$add_module_div->appendChild($add_module_div_class);
							$add_module_div->appendChild($add_module_div_title);
							
							$item->appendChild($add_module_div);
							
						}
					
						if(in_array('dt_fullwidth_section', $item_class_arr)) {
						
							$add_module_div = $doc->createElement('div', '');
							$add_module_div_class = $doc->createAttribute('class');
							$add_module_div_class->value = 'dt_show_modules_in_popup dt_popup_from_section';
							$add_module_div_title = $doc->createAttribute('title');
							$add_module_div_title->value = 'Add Module';
							
							$add_module_div->appendChild($add_module_div_class);
							$add_module_div->appendChild($add_module_div_title);
							
							$item->appendChild($add_module_div);
							
						}
					
					}
					
					$layout_html_new = $doc->saveHTML();
					
					$layout_html_new = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">', '', $layout_html_new);
					$layout_html_new = str_replace('<html><body>', '', $layout_html_new);
					$layout_html_new = str_replace('</body></html>', '', $layout_html_new);
					
					$output = array();
					$output['layout_html'] = $layout_html_new;
					$output['layout_shortcode'] = $layout_shortcode;
					$output['layout_parsed'] = 'true';
					
					update_post_meta($current_page_id, '_dt_builder_settings', $output);
				
				}
				
		endwhile;
		wp_reset_postdata();
	endif;
	
	$bp_data = get_option(IAMD_THEME_SETTINGS);
	$bp_data['pagebuilder_update'] = 'done';
	update_option(IAMD_THEME_SETTINGS, $bp_data);
	
	die('1');
	
}

/* ---------------------------------------------------------------------------
 * Check global variables
 * --------------------------------------------------------------------------- */
function dt_global_variables($variable = '') {

	global $woocommerce, $product, $woocommerce_loop, $post, $wp_query, $pagenow, $infi_like_love;

	switch($variable) {
		case 'woocommerce':
			return $woocommerce;
		break;
		case 'product':
			return $product;
		break;
		case 'woocommerce_loop':
			return $woocommerce_loop;
		break;
		case 'post':
			return $post;
		break;
		case 'wp_query':
			return $wp_query;
		break;
		case 'pagenow':
			return $pagenow;
		break;
		case 'infi_like_love':
			return $infi_like_love;
		break;
	}
	return false;
}

if(!function_exists('dt_get_attachment_id_from_url')) {
	function dt_get_attachment_id_from_url( $attachment_url = '' ) {
	 
		global $wpdb;
		$attachment_id = false;
	 
		if ($attachment_url == '')
			return false;
	 
		$upload_dir_paths = wp_upload_dir();
	 
		if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
	 
			$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
			$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
	 
			$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
	 
		}
	 
		return $attachment_id;
		
	}
}

/* ---------------------------------------------------------------------------
* LMS Associate
* --------------------------------------------------------------------------- */
if ( ! function_exists( 'dttheme_array_whitelist_assoc' ) ) {
	function dttheme_array_whitelist_assoc( Array $array1, Array $array2 ) {
		if ( func_num_args() > 2 ) {
			$args = func_get_args();
			array_shift( $args );
			$array2 = call_user_func_array( 'array_merge', $args );
		}

		return array_intersect_key( $array1, array_flip( $array2 ) );
	}
}

/* ---------------------------------------------------------------------------
* Post Type Support
* --------------------------------------------------------------------------- */
add_filter( 'fw_ext_page_builder_supported_post_types', 'dttheme_limit_post_types_support', 1 );
if( ! function_exists( 'dttheme_limit_post_types_support' ) ){
	function dttheme_limit_post_types_support( $all_post_types ) {

		$white_listed_post_types = array( '' ); //allowed custom post type names
		$post_types              = dttheme_array_whitelist_assoc( $all_post_types, $white_listed_post_types );

		return $post_types;

	}
}

?>