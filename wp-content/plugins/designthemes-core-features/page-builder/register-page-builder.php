<?php

if (! class_exists ( 'DTCorePageBuilder' )) {

	/**
	 * To active page builder in selected post types
	 *
	 * @author iamdesigning11
	 */
	class DTCorePageBuilder {
		
		/**
		 * Constructor for DTCorePageBuilder
		 */
		function __construct() {
			
			define( 'DESIGNTHEMES_PB_URI', plugins_url('', __FILE__) );
			define( 'DESIGNTHEMES_PB_DIR', plugin_dir_path ( __FILE__ ) );
			define( 'DESIGNTHEMES_PB_DIRURL', plugin_dir_url ( __FILE__ ) );
			
			// Add Hook into the 'init()' action
			add_action ( 'init', array (
					$this,
					'dt_init' 
			) );

			// Add Hook into the 'admin_enqueue_scripts()' action
			add_action ( 'admin_enqueue_scripts', array (
					$this,
					'dt_admin_enqueue_scripts' 
			) );

			add_action ( 'admin_enqueue_scripts', array (
				$this,
				'dt_gutenberg_compatability_scripts' 
			) );

			add_filter ( 'use_block_editor_for_post_type', array (
				$this,
				'dt_check_gutenberg_active'
			) );
			
			
			require_once DESIGNTHEMES_PB_DIR . 'pagebuilder.php';
			if (class_exists ( 'DTPageBuilder' )) {
				new DTPageBuilder ();
			}
			
		}

		// Gutenberg Compatability Scripts

		function dt_gutenberg_compatability_scripts() {

			wp_enqueue_script( 'dt-blockeditor', DESIGNTHEMES_PB_URI . '/js/blockeditor.js', array('jquery'), false, true );


			$pboptions = get_option('mytheme');
			if ( isset($pboptions['pagebuilder']) ) {
				$dtthemes_active_posttypes = isset($pboptions['pagebuilder']['post-types']) ? $pboptions['pagebuilder']['post-types'] : $pboptions['pagebuilder'];
			} else {
				$dtthemes_active_posttypes = $default_posttypes;
			}
			
			$post_types = isset( $dtthemes_active_posttypes ) ? (array) $dtthemes_active_posttypes : array();

			/* For Add New Button */
			if ( class_exists( 'Classic_Editor' ) ) {
				$text_config['guten_comp_enable'] = true;
			} else {
				$text_config['guten_comp_enable'] = false;
			}
			$text_config['guten_comp_posttype'] = $post_types;
			$text_config['guten_comp_adminurl'] = admin_url();
			$text_config['guten_comp_addnew_label'] = esc_html__('Add New - DesignThemes Page Builder', 'dt_themes');

			/* Too Keep Builder Active */
			$text_config['guten_comp_gutenberg_active'] = ($this->dt_check_gutenberg_active()) ? 'true' : 'false';

			wp_localize_script( 'dt-blockeditor', 'dtthemes_gutenberg_options', $text_config );


		}

		function dt_check_gutenberg_active() {

			$dt_builder_enable = get_post_meta( get_the_ID(), '_dt_enable_builder', true );

			if(isset($_GET['classic-editor'])) {
			
				if($dt_builder_enable == '') {

					$pboptions = get_option('mytheme');
					$pboption = $pboptions['pagebuilder'];
					if(isset($pboption['enable-pagebuilder']) && $pboption['enable-pagebuilder'] == true || $pboption != false) {
						return false;
					} else {
						return true;
					}
				} else if($dt_builder_enable) {
					return false;
				}

				return false;

			}

			return true;

		}			

		/**
		 * A function hook that the WordPress core launches at 'init' points
		 */
		function dt_init() {

			require_once DESIGNTHEMES_PB_DIR . 'modules.php';
			require_once DESIGNTHEMES_PB_DIR . 'config.php';
	
			if (! current_user_can ( 'edit_posts' ) && ! current_user_can ( 'edit_pages' )) {
				return;
			}

			if ( class_exists( 'Classic_Editor' ) ) {

				// Gutenberg Compatability Scripts

				$pboptions = get_option('mytheme');
				if ( isset($pboptions['pagebuilder']) ) {
					$dtthemes_active_posttypes = isset($pboptions['pagebuilder']['post-types']) ? $pboptions['pagebuilder']['post-types'] : $pboptions['pagebuilder'];
				} else {
					$dtthemes_active_posttypes = $default_posttypes;
				}
					
				$post_types = isset( $dtthemes_active_posttypes ) ? (array) $dtthemes_active_posttypes : array();

				if(is_array($post_types) && !empty($post_types)) {
					foreach($post_types as $post_type) {
						add_filter( $post_type.'_row_actions', array(
							$this,
							'renderRowAction',
						), 10, 2 );
					}
				}

			}

		}

		function renderRowAction($actions, $post) {

			$actions['edit_dt'] = '<a
			href="' . admin_url() . 'post.php?post=' .  $post->ID . '&action=edit&classic-editor">' . __( 'Edit with DT Page Builder', 'js_composer' ) . '</a>';

			return $actions;

		}

		
		/**
		 * A function hook that the WordPress core launches at 'admin_enqueue_scripts' points
		 */
		function dt_admin_enqueue_scripts($hook) {
			
			global $typenow, $default_posttypes, $enable_pb_default;
			
			if ( ! in_array( $hook, array( 'post-new.php', 'post.php' ) ) ) return;
			
			$pboptions = get_option(IAMD_THEME_SETTINGS);
			if ( isset($pboptions['pagebuilder']['post-types']) ) {
				$dtthemes_active_posttypes = $pboptions['pagebuilder']['post-types'];
			} else {
				$dtthemes_active_posttypes = $default_posttypes;
			}
				
			$post_types = isset( $dtthemes_active_posttypes ) ? (array) $dtthemes_active_posttypes : array();
	
			if ( class_exists( 'Classic_Editor' ) ) {

				$dt_builder_enable = get_post_meta( get_the_ID(), '_dt_enable_builder', true );
				
				if($dt_builder_enable == '') {
					$pboption = $pboptions['pagebuilder'];
					if(isset($pboption['enable-pagebuilder']) && $pboption['enable-pagebuilder'] == true) {
						update_post_meta( get_the_ID(), '_dt_enable_builder', 1 );
					} else {
						update_post_meta( get_the_ID(), '_dt_enable_builder', $enable_pb_default );
					}
				}

			}
	
	
			/*
			 * To load the js and css files for selected post types
			*/
			if ( isset( $typenow ) && in_array( $typenow, array_keys($post_types) ) ){
				$this->dtthemes_pb_js();
				$this->dtthemes_pb_css();
			}

		}
		
		function dtthemes_pb_css(){
			wp_enqueue_style( 'dt-adminstyle', DESIGNTHEMES_PB_URI . '/style.css', array() );
			wp_enqueue_style( 'wp-jquery-ui-dialog' );
		}
	
		function dtthemes_pb_js(){
			
			global $text_config, $enable_widget, $theme_name, $dt_wp_editor;
			
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'jquery-ui-draggable' );
			wp_enqueue_script( 'jquery-ui-droppable' );
			wp_enqueue_script( 'jquery-ui-resizable' );
	
			wp_enqueue_script( 'dt-adminjs', DESIGNTHEMES_PB_URI . '/js/admin.js', array('jquery'), false, true );
			wp_enqueue_script( 'dt-tooltip', DESIGNTHEMES_PB_URI . '/js/jquery.tipTip.minified.js', array('jquery'), false, true );
			wp_enqueue_script( 'dt-custom', DESIGNTHEMES_PB_URI . '/js/custom.js', array('jquery'), false, true );
			
			$builder_enable = get_post_meta( get_the_ID(), '_dt_enable_builder', true );
			
			$rich_editing = get_user_option( 'rich_editing' );
			$rich_editing_enable = 0;
			if($rich_editing == 'false') {
				$rich_editing_enable = 1;
			}

			$text_config['builder_enable'] = $builder_enable;
			$text_config['theme_name'] = $theme_name.esc_html__(' Page Builder', 'dt_plugins');
			$text_config['dt_wp_editor'] = $dt_wp_editor;
			$text_config['ajaxurl'] = admin_url( 'admin-ajax.php' );
			$text_config['dt_load_nonce'] = wp_create_nonce( 'dt_load_nonce' );
			$text_config['enable_widget'] = $enable_widget;
			$text_config['rich_editing'] = $rich_editing_enable;
			
			wp_localize_script( 'dt-adminjs', 'dtthemes_options', $text_config );
			
		}


	}
}
?>