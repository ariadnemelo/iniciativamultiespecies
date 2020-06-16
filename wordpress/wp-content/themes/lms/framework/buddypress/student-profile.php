<?php

/**
 * To add additional student profile tabs
 */
require_once(IAMD_TD.'/framework/buddypress/profile-tabs/profile-tab-wall.php');
require_once(IAMD_TD.'/framework/buddypress/profile-tabs/profile-tab-classes.php');
require_once(IAMD_TD.'/framework/buddypress/profile-tabs/profile-tab-mycourses.php');
require_once(IAMD_TD.'/framework/buddypress/profile-tabs/profile-tab-allcourses.php');
require_once(IAMD_TD.'/framework/buddypress/profile-tabs/profile-tab-allquizzes.php');
require_once(IAMD_TD.'/framework/buddypress/profile-tabs/profile-tab-gradings.php');
require_once(IAMD_TD.'/framework/buddypress/profile-tabs/profile-tab-assignments.php');



/**
 * Change students default landing tab.
 */
define('BP_DEFAULT_COMPONENT', 'wall' );


/**
 * BuddyPress profile tabs order.
 */
function dttheme_profile_tab_order() {
    buddypress()->members->nav->edit_nav( array( 'position' => 10, ), 'wall' );
    buddypress()->members->nav->edit_nav( array( 'position' => 20, ), 'classes' );
    buddypress()->members->nav->edit_nav( array( 'position' => 30, ), 'mycourses' );
    buddypress()->members->nav->edit_nav( array( 'position' => 40, ), 'allcourses' );
    buddypress()->members->nav->edit_nav( array( 'position' => 50, ), 'allquizzes' );
    buddypress()->members->nav->edit_nav( array( 'position' => 60, ), 'gradings' );
    buddypress()->members->nav->edit_nav( array( 'position' => 70, ), 'assignments' );
    buddypress()->members->nav->edit_nav( array( 'position' => 80, ), 'profile' );
    buddypress()->members->nav->edit_nav( array( 'position' => 90, ), 'activity' );
    buddypress()->members->nav->edit_nav( array( 'position' => 100, ), 'friends' );
    buddypress()->members->nav->edit_nav( array( 'position' => 110, ), 'groups' );
    buddypress()->members->nav->edit_nav( array( 'position' => 120, ), 'messages' );
    buddypress()->members->nav->edit_nav( array( 'position' => 130, ), 'notifications' );
    buddypress()->members->nav->edit_nav( array( 'position' => 140, ), 'settings' );
}
add_action( 'bp_setup_nav', 'dttheme_profile_tab_order', 999 );

function bpfr_custom_setup_nav() {
	if(bp_is_active('xprofile')) {
		?>
		<li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_attr_e('WooCommerce', 'lms'); ?>"><?php esc_html_e('WooCommerce', 'lms'); ?></a></li>
		<?php
	}
}
add_action( 'bp_member_options_nav', 'bpfr_custom_setup_nav' );


?>