<?php

/**
 * To add additional teacher profile tabs
 */
require_once(IAMD_TD.'/framework/buddypress/profile-tabs/profile-tab-coursessubmitted.php');
require_once(IAMD_TD.'/framework/buddypress/profile-tabs/profile-tab-assignmentssubmitted.php');



/**
 * Change teachers default landing tab.
 */
define('BP_DEFAULT_COMPONENT', 'profile' );


/**
 * BuddyPress profile tabs order.
 */
function dttheme_profile_tab_order() {
    buddypress()->members->nav->edit_nav( array( 'position' => 10, ), 'profile' );
    buddypress()->members->nav->edit_nav( array( 'position' => 20, ), 'coursessubmitted' );
    buddypress()->members->nav->edit_nav( array( 'position' => 30, ), 'assignmentssubmitted' );
    buddypress()->members->nav->edit_nav( array( 'position' => 40, ), 'activity' );
    buddypress()->members->nav->edit_nav( array( 'position' => 50, ), 'friends' );
    buddypress()->members->nav->edit_nav( array( 'position' => 60, ), 'groups' );
    buddypress()->members->nav->edit_nav( array( 'position' => 70, ), 'messages' );
    buddypress()->members->nav->edit_nav( array( 'position' => 80, ), 'notifications' );
    buddypress()->members->nav->edit_nav( array( 'position' => 90, ), 'settings' );
}
add_action( 'bp_setup_nav', 'dttheme_profile_tab_order', 999 );
?>