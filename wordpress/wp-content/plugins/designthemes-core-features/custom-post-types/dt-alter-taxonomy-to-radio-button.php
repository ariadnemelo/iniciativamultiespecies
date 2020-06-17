<?php

if ( ! class_exists( 'DT_Radio_Buttons_for_Taxonomies' ) ) :

	class DT_Radio_Buttons_for_Taxonomies {

		protected static $_instance = null;

		public $options = array('taxonomies' => array('lesson_complexity'));

		public $taxonomies = array('lesson_complexity');

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function __construct(){

			include_once( plugin_dir_path ( __FILE__ ) . '/class/class.WordPress_Radio_Taxonomy.php' );
			
			if( ! $this->is_version('4.4.0') ){
				include_once( plugin_dir_path ( __FILE__ ) . '/class/class.Walker_Category_Radio.php' );
			} else {
				include_once( plugin_dir_path ( __FILE__ ) . '/class/class.Walker_Category_Radio_old.php' );
			}

			add_action( 'registered_taxonomy', array( $this, 'launch' ) );

			add_action( 'admin_enqueue_scripts', array( $this, 'admin_script' ) );

			add_filter( 'mlp_mutually_exclusive_taxonomies', array( $this, 'multilingualpress_support' ) );

		}

		public function launch( $taxonomy ){
			if( isset( $this->options['taxonomies'] ) && in_array( $taxonomy, (array) $this->options['taxonomies'] ) ) {
				$this->taxonomies[$taxonomy] = new DT_WordPress_Radio_Taxonomy( $taxonomy );
			}
		}

		public function admin_script( $hook ){
			if( in_array( $hook, array( 'edit.php', 'post.php', 'post-new.php' ) ) ){
				wp_enqueue_script( 'radiotax', plugins_url( 'js/dt.radiotax.min.js', __FILE__ ), array( 'jquery', 'inline-edit-post' ), false, true );
			}
		}

		public function multilingualpress_support( Array $taxonomies ) {

			$remote_options = $this->options;

			if ( empty ( $remote_options['taxonomies'] ) )
				return $taxonomies;

			$all_taxonomies = array_merge( (array) $remote_options['taxonomies'], $taxonomies );

			return array_unique( $all_taxonomies );

		}

		public function is_version( $version = '4.4.0' ) {
			global $wp_version;
			if ( version_compare( $wp_version, $version, '>=' ) ) {
				return false;
			}
			return true;
		}

	} 

endif;

function DT_Radio_Buttons_for_Taxonomies() {
	return DT_Radio_Buttons_for_Taxonomies::instance();
}

DT_Radio_Buttons_for_Taxonomies ();