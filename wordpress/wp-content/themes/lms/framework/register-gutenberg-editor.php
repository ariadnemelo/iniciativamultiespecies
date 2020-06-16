<?php
/**
 * Gutenberg Editor CSS
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     LMS
 * @author      LMS
 * @copyright   Copyright (c) 2019, LMS
 * @link        http://themes-demo.com/lms/
 * @since       lms 1.0
 */

if ( ! class_exists( 'Gutenberg_Editor_CSS' ) ) :
	/**
	 * Admin Helper
	 */
	class Gutenberg_Editor_CSS {

		function __construct() {

			add_action('after_setup_theme', array( $this,  'lms_after_setup_theme' ) );

			add_action( 'current_screen', array( $this,  'lms_current_screen_hook' ), 10, 1 );
			add_action( 'enqueue_block_editor_assets', array( $this, 'lms_backend_editor_styles' ), 10 );
			if ( class_exists( 'Classic_Editor' ) ) {
				add_filter( 'tiny_mce_before_init', array( $this, 'lms_theme_editor_dynamic_styles' ) );
			}

			add_action( 'wp_enqueue_scripts', array( $this, 'lms_editor_enqueue_styles'), 110 );

		}

		public function lms_after_setup_theme() {

			# Gutenberg Compatible
			add_theme_support( 'align-wide' );
			add_theme_support( 'wp-block-styles' );
			add_theme_support( 'editor-styles' );
			
			# Add support for responsive embedded content.
			add_theme_support( 'responsive-embeds' );

			$skin = dttheme_option('appearance','skin');
			$skin = ($skin != '') ? $skin : 'orange';

			$colors          = $this->lms_skins( $skin );
			$primary_color   = $colors['primary-color'];
			$secondary_color = $colors['secondary-color'];
			$tertiary_color  = $colors['tertiary-color'];

			add_theme_support( 'editor-color-palette', array(
				array(
					'name'  => esc_html__( 'Primary Color', 'lms' ),
					'slug'  => 'primary',
					'color' => $primary_color,
				),
				array(
					'name'  => esc_html__( 'Secondary Color', 'lms' ),
					'slug'  => 'secondary',
					'color' => $secondary_color,
				),
				array(
					'name'  => esc_html__( 'Tertiary Color', 'lms' ),
					'slug'  => 'tertiary',
					'color' => $tertiary_color,
				)
			));

		}

		public function lms_skins( $skin ) {

			$skins['cyan'] = array ( 'primary-color' => '#43a898', 'secondary-color' => '#81164e', 'tertiary-color' => '#93dacd' );
			$skins['cyan-yellow'] = array ( 'primary-color' => '#e9be34', 'secondary-color' => '#56bdc2', 'tertiary-color' => '#eed481' );
			$skins['dark-pink'] = array ( 'primary-color' => '#9c5d8a', 'secondary-color' => '#f1ad26', 'tertiary-color' => '#be86b0' );
			$skins['grayish-blue'] = array ( 'primary-color' => '#7e7796', 'secondary-color' => '#fb6858', 'tertiary-color' => '#a6a0bb' );
			$skins['grayish-green'] = array ( 'primary-color' => '#a0bb8e', 'secondary-color' => '#e57988', 'tertiary-color' => '#c0d6af' );
			$skins['grayish-orange'] = array ( 'primary-color' => '#857568', 'secondary-color' => '#87342e', 'tertiary-color' => '#cab2a0' );
			$skins['light-red'] = array ( 'primary-color' => '#c6716c', 'secondary-color' => '#105268', 'tertiary-color' => '#e79c99' );
			$skins['magenta'] = array ( 'primary-color' => '#64465e', 'secondary-color' => '#ca4f6c', 'tertiary-color' => '#c28eb7' );
			$skins['orange'] = array ( 'primary-color' => '#da853d', 'secondary-color' => '#838c48', 'tertiary-color' => '#df9a62' );
			$skins['pink'] = array ( 'primary-color' => '#ff7993', 'secondary-color' => '#453827', 'tertiary-color' => '#ff98ae' );
			$skins['white-avocado'] = array ( 'primary-color' => '#72723e', 'secondary-color' => '#58582f', 'tertiary-color' => '#979749' );
			$skins['white-blue'] = array ( 'primary-color' => '#478bca', 'secondary-color' => '#3170ac', 'tertiary-color' => '#649bcf' );
			$skins['white-blueiris'] = array ( 'primary-color' => '#595ca1', 'secondary-color' => '#3d4086', 'tertiary-color' => '#595caf' );
			$skins['white-blueturquoise'] = array ( 'primary-color' => '#08bbb7', 'secondary-color' => '#09a7a4', 'tertiary-color' => '#16cfcc' );
			$skins['white-brown'] = array ( 'primary-color' => '#8f5a28', 'secondary-color' => '#75491f', 'tertiary-color' => '#9b6e45' );
			$skins['white-burntsienna'] = array ( 'primary-color' => '#d36b5e', 'secondary-color' => '#b6564a', 'tertiary-color' => '#da7f73' );
			$skins['white-chillipepper'] = array ( 'primary-color' => '#c10841', 'secondary-color' => '#aa0738', 'tertiary-color' => '#c03e65' );
			$skins['white-eggplant'] = array ( 'primary-color' => '#614051', 'secondary-color' => '#4e3140', 'tertiary-color' => '#644a57' );
			$skins['white-electricblue'] = array ( 'primary-color' => '#536878', 'secondary-color' => '#4d6170', 'tertiary-color' => '#5f7485' );
			$skins['white-graasgreen'] = array ( 'primary-color' => '#81c77f', 'secondary-color' => '#6cac6a', 'tertiary-color' => '#91cf8f' );
			$skins['white-gray'] = array ( 'primary-color' => '#7d888e', 'secondary-color' => '#757e83', 'tertiary-color' => '#89949b' );
			$skins['white-green'] = array ( 'primary-color' => '#00a988', 'secondary-color' => '#029174', 'tertiary-color' => '#08c29d' );
			$skins['white-lightred'] = array ( 'primary-color' => '#d66060', 'secondary-color' => '#c55252', 'tertiary-color' => '#d87070' );
			$skins['white-orange'] = array ( 'primary-color' => '#f67f45', 'secondary-color' => '#dd6e36', 'tertiary-color' => '#e68a5c' );
			$skins['white-palebrown'] = array ( 'primary-color' => '#987654', 'secondary-color' => '#8a6a4a', 'tertiary-color' => '#a58362' );
			$skins['white-pink'] = array ( 'primary-color' => '#e472ae', 'secondary-color' => '#d3589a', 'tertiary-color' => '#e982b9' );
			$skins['white-radiantorchid'] = array ( 'primary-color' => '#af71b0', 'secondary-color' => '#ae62af', 'tertiary-color' => '#c781c9' );
			$skins['white-red'] = array ( 'primary-color' => '#ef3a43', 'secondary-color' => '#d6373f', 'tertiary-color' => '#e2555c' );
			$skins['white-skyblue'] = array ( 'primary-color' => '#0facce', 'secondary-color' => '#0d97b6', 'tertiary-color' => '#1fb5d6' );
			$skins['white-yellow'] = array ( 'primary-color' => '#eec005', 'secondary-color' => '#d3ab0d', 'tertiary-color' => '#faca0a' );

			return $skins[ $skin ];
	
		}

		public function lms_current_screen_hook( $current_screen ) {
			
			if ( 'post' == $current_screen->base ) {

				$font = $subset = '';

				$custom_fonts = array ();

				#Body Section
				$disable_boddy_settings = dttheme_option('appearance', 'disable-boddy-settings');

				if (empty($disable_boddy_settings)) :
					$font = dttheme_option('appearance', 'body-font');
					$font = str_replace(' ', '+', $font);
					if (!empty($font)) :
						array_push($custom_fonts, $font);
					endif;
				endif;

				#Typography Section
				$disable_typo = dttheme_option('appearance', 'disable-typography-settings');
				if (empty($disable_typo)) :
					for ($i = 1; $i <= 6; $i++) :
						$font = dttheme_option('appearance', 'H'.$i.'-font');
						if (!empty($font)) :
							$font = str_replace(' ', '+', $font);
							array_push($custom_fonts, $font);
						endif;
					endfor;
				endif;

				if (!empty($custom_fonts)) :
					$custom_fonts = array_unique($custom_fonts);
					$font = implode(':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic|', $custom_fonts);
					$font .= ':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic|';
				endif;
		
				$font .= 'Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800%7CRaleway:400,100,200,300,500,600,800,700,900%7CDancing+Script';

				$protocol = is_ssl() ? 'https' : 'http';
				$query_args = array('family' => $font, 'subset' => $subset);
				$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		
				add_editor_style( $fonts_url );

				add_editor_style( 'css/editor-style.css' );

			}

		}

		public function lms_generate_editor_styles( $editor_type = 'block' ) {
			
			if($editor_type == 'tinymce') {
				$wrapper_class = 'body#tinymce.wp-editor.content';
			} else {
				$wrapper_class = '.editor-styles-wrapper';
			}
			
			$styles = '';

			$styles .= $wrapper_class.' pre { font-family:monospace; }';

			$theme_skin = dttheme_option('appearance','skin');

			if(in_array($theme_skin, array ('cyan', 'cyan-yellow', 'dark-pink', 'grayish-blue', 'grayish-green', 'grayish-orange', 'light-red', 'magenta', 'orange', 'pink'))) {

				$styles .= $wrapper_class.' {';
					$styles .= 'background-color:#fdf6ea;'; 
				$styles .= '}';

			} else {

				$styles .= $wrapper_class.' {';
					$styles .= 'background-color:#ffffff;'; 
				$styles .= '}';

				$styles .= $wrapper_class.' div pre, '.$wrapper_class.' div code, '.$wrapper_class.' table tbody tr:nth-child(2n) td, '.$wrapper_class.' table tbody tr:nth-child(2n) th {';
					$styles .= 'background-color:#f6f6f6;'; 
				$styles .= '}';

				$styles .= $wrapper_class.' div pre, '.$wrapper_class.' div code, '.$wrapper_class.' table tbody tr:nth-child(2n) td, '.$wrapper_class.' table tbody tr:nth-child(2n) th {';
					$styles .= 'border-color:#dfdfdf;'; 
				$styles .= '}';

			}

			// Body Typography
			$disable_boddy_settings = dttheme_option('appearance', 'disable-boddy-settings');
			if (empty($disable_boddy_settings)) {

				$font_type = dttheme_option('appearance', 'body-font-type');
				$style = dttheme_option('appearance','body-standard-font-style');

				if( !empty($font_type) ) {
					$body_font = dttheme_option('appearance','body-standard-font');
				} else {
					$body_font = dttheme_option('appearance', 'body-font');
				}

				$body_font_size = dttheme_option('appearance', 'body-font-size');
				$body_font_color = dttheme_option('appearance', 'body-font-color');

				$body_primary_color = dttheme_option('appearance', 'body-primary-color');
				$body_secondary_color = dttheme_option('appearance', 'body-secondary-color');

				if (!empty($body_font) || (!empty($body_font_color) and $body_font_color != '#') || !empty($body_font_size)) {

					$styles .= $wrapper_class.' > * {';
						
						if (!empty($body_font)) { 
							$styles .= 'font-family:'.$body_font.';';
						}

						if (!empty($body_font_color) && ($body_font_color != '#')) { 
							$styles .= 'color:'.$body_font_color.';'; 
						}

						if (!empty($body_font_size)) {
							$styles .= 'font-size:'.$body_font_size.'px;'; 
						}
						
						if (!empty($style)) { 
							if ($style == 'Bold Italic') {
								$styles .= 'font-weight:bold; font-style:italic;';
							} elseif ($style == 'Bold') {
								$styles .= 'font-weight:bold;';
							} elseif ($style == 'Italic') {
								$styles .= 'font-style:italic;';
							} elseif ($style == 'Normal') {
								$styles .= 'font-weight:normal; font-style:normal;';
							}				
						}

					$styles .= '}';

				}

				if (!empty($body_font_color) and $body_font_color != '#') {

					$styles .= $wrapper_class.' pre, .wp-block-pullquote {';
						$styles .= 'color:'.$body_font_color.';'; 
					$styles .= '}';

				}

				if (!empty($body_primary_color) && ($body_primary_color != '#')) {
					$styles .= $wrapper_class.' a { color:'.$body_primary_color.'; }'; 
				}

				if (!empty($body_secondary_color) && ($body_secondary_color != '#')) {
					$styles .= $wrapper_class.' a:focus, '.$wrapper_class.' a:hover { color:'.$body_secondary_color.'; }';	
				}

			} 
			// Body Typography End

			// Heading Typography
			$disable_typo = dttheme_option('appearance', 'disable-typography-settings');
			if (empty($disable_typo)) {

				for ($i = 1; $i <= 6; $i++) {

					$font_type = dttheme_option('appearance', 'H'.$i.'-font-type');
					$style = dttheme_option('appearance','H'.$i.'-standard-font-style');
					
					if( !empty($font_type) ){
						$font = dttheme_option('appearance','H'.$i.'-standard-font');
					} else {
						$font = dttheme_option('appearance', 'H'.$i.'-font');
					}
					
					$color = dttheme_option('appearance', 'H'.$i.'-font-color');
					$size = dttheme_option('appearance', 'H'.$i.'-size');

					if (!empty($font) || (!empty($color) and $color != '#') || !empty($size)) {

						if($editor_type == 'tinymce') {
							$styles .= $wrapper_class.' h'.$i.' {';
						} else {
							if($i == 1) {
								$styles .= '.editor-post-title__block .editor-post-title__input, '.$wrapper_class.' .wp-block h1 {';
							} else{
								$styles .= $wrapper_class.' .wp-block h'.$i.' {';
							}
						}

							if (!empty($font)) {
								$styles .= 'font-family:'.$font.'; ';
							}

							if( !empty($font_type) ) {
								if (!empty($style)) { 
									if ($style == 'Bold Italic') {
										$styles .= 'font-weight:bold; font-style:italic;';
									} elseif ($style == 'Bold') {
										$styles .= 'font-weight:bold;';
									} elseif ($style == 'Italic') {
										$styles .= 'font-style:italic;';
									} elseif ($style == 'Normal') {
										$styles .= 'font-weight:normal; font-style:normal;';
									}				
								}
							}

							if (!empty($color) && ($color != '#')) { 
								$styles .= 'color:'.$color.'; ';
							}
							
							if (!empty($size)) { 
								$styles .= 'font-size:'.$size.'px; '; 
							}

						$styles .= '}';

					}

				}

			}
			// Heading Typography End
			
			return $styles;

		}

		public function lms_backend_editor_styles() {
			
			wp_enqueue_style( 'lms-gutenberg', get_theme_file_uri('/css/admin-gutenberg.css'), false, IAMD_THEME_VERSION, 'all' );
			
			$styles = $this->lms_generate_editor_styles('block');
			
			wp_add_inline_style( 'lms-gutenberg', $styles );

		}
			
		public function lms_theme_editor_dynamic_styles( $mceInit ) {

			$styles = $this->lms_generate_editor_styles('tinymce');

			if ( isset( $mceInit['content_style'] ) ) {
				$mceInit['content_style'] .= ' ' . $styles . ' ';
			} else {
				$mceInit['content_style'] = $styles . ' ';
			}
			
			return $mceInit;
		}

		public function lms_editor_enqueue_styles( ) {

			$styles = '';

			$primary_color = $secondary_color = $tertiary_color = '';

			$skin = dttheme_option('appearance','skin');
			$skin = ($skin != '') ? $skin : 'orange';

			$colors          = $this->lms_skins( $skin );
			$primary_color   = $colors['primary-color'];
			$secondary_color = $colors['secondary-color'];
			$tertiary_color  = $colors['tertiary-color'];

			# Primary Color
			$styles .= '.has-primary-background-color { background-color:'.$primary_color.'; }';
			$styles .= '.has-primary-color { color:'.$primary_color.'; }';
	
			# Secondary Color
			$styles .= '.has-secondary-background-color { background-color:'.$secondary_color.'; }';
			$styles .= '.has-secondary-color { color:'.$secondary_color.'; }';
	
			# Tertiary Color
			$styles .= '.has-tertiary-background-color { background-color:'.$tertiary_color.'; }';
			$styles .= '.has-tertiary-color { color:'.$tertiary_color.'; }';

			wp_add_inline_style('lms-gutenberg', $styles );

		}

	}

	new Gutenberg_Editor_CSS();

endif;