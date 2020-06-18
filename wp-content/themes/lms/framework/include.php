<?php
require_once IAMD_TD.'/framework/social_media.php';
require_once IAMD_TD.'/framework/google_fonts.php';
require_once IAMD_TD.'/framework/theme_features.php';
require_once IAMD_TD.'/framework/admin_utils.php';
require_once IAMD_TD.'/framework/register_admin.php';
require_once IAMD_TD.'/framework/register_public.php';
require_once IAMD_TD.'/framework/register_media_uploader.php';
require_once IAMD_TD.'/framework/utils.php';

#TGM Plugins
require_once IAMD_TD.'/framework/class-tgm-plugin-activation.php';
require_once IAMD_TD.'/framework/register_plugins.php';

##Register Widget Areas
add_action( 'widgets_init', 'lms_widgets_init' );
function lms_widgets_init() {
	require_once IAMD_TD.'/framework/register_widget_areas.php';
}

##Include Theme options
require_once IAMD_TD.'/framework/theme_options/menu.php';

##MegaMenu
require_once IAMD_TD.'/framework/register_custom_attributes_in_menu.php';

##Include Sensei
if( class_exists('Woothemes_Sensei')  ) {
	require_once IAMD_TD.'/sensei/index.php';
}

#Woocommerce
if(function_exists( 'is_woocommerce' ) ) {
	require_once(IAMD_TD.'/framework/woocommerce/index.php');
}

#BuddyPress
if(function_exists('bp_is_active')) {
	require_once(IAMD_TD.'/framework/buddypress/register-buddypress.php');
}

##Class Utils
require_once IAMD_TD.'/framework/classes_utils.php';

##Dashboard Utils
require_once IAMD_TD.'/framework/dashboard_utils.php';

##Social Login Utils
if(dttheme_option('general','enable-social-logins') == 'true') {
	require_once IAMD_TD.'/framework/social_login_utils.php';	
}

?>