<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'dttheme_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function dttheme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'     				=> esc_html__('DesignThemes Core Shortcode Plugins', 'lms'),
			'slug'     				=> 'designthemes-core-features',
			'source'   				=> get_template_directory() . '/framework/plugins/designthemes-core-features.zip',
			'required' 				=> true,
			'version' 				=> '3.5',
			'external_url' 			=> '',
		),

		array(
			'name'     				=> esc_html__('Responsive Google Maps', 'lms'),
			'slug'     				=> 'responsive-maps-plugin',
			'source'   				=> get_template_directory() . '/framework/plugins/responsive-maps-plugin.zip',
			'version'				=> '4.7'
		),

		array(
			'name'     				=> esc_html__('Events Schedule WP Plugin', 'lms'),
			'slug'     				=> 'weekly-class',
			'source'   				=> get_template_directory() . '/framework/plugins/weekly-class.zip',
			'version' 				=> '2.5.15',
		),
				
		array(
			'name'     				=> esc_html__('WP-PostRatings', 'lms'),
			'slug'     				=> 'wp-postratings',
			'required' 				=> false,
		),

		array(
			'name' 					=> esc_html__('Contact Form 7', 'lms'),
			'slug' 					=> 'contact-form-7',
			'required' 				=> false,
		),

		array(
			'name'					=>	esc_html__('WooCommerce - excelling eCommerce', 'lms'),
			'slug'					=>	'woocommerce',
			'required'				=>	false
		),

		array(
			'name' 					=> esc_html__('The Events Calendar', 'lms'),
			'slug' 					=> 'the-events-calendar',
			'required' 				=> false,
		),

		array(
			'name' 					=> esc_html__('s2Member Framework', 'lms'),
			'slug' 					=> 's2member',
			'required' 				=> false,
		),

		array(
			'name'					=>	esc_html__('BuddyPress', 'lms'),
			'slug'					=>	'buddypress',
			'required'				=>	false
		),

		array(
			'name'					=>	esc_html__('YITH WooCommerce Wishlist', 'lms'),
			'slug'					=>	'yith-woocommerce-wishlist',
			'required'				=>	false
		),

		array(
			'name'					=>	esc_html__('YITH WooCommerce Zoom Magnifier', 'lms'),
			'slug'					=>	'yith-woocommerce-zoom-magnifier',
			'required'				=>	false
		),
		
		array(
			'name'     				=> esc_html__('Unyson', 'lms'),
			'slug'     				=> 'unyson',
			'required' 				=> false,
		),
	);

	$args = array(
		'user-agent' => 'WordPress/' . get_bloginfo( 'version' ) . '; ' . network_site_url(),
		'timeout'    => 30,
	);

	$response = wp_remote_get( 'http://wedesignthemes.com/plugins/designthemes/version-new.php', $args );
	$data = json_decode( wp_remote_retrieve_body( $response ), true );

	if ( is_array( $data ) && ! empty( $data ) ) {
		$updated_plugin_list = array_merge( $data, $plugins );
	} else {
		$updated_plugin_list = $plugins;
	}

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'lms',                   // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $updated_plugin_list, $config );
}