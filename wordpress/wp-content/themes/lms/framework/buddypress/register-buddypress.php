<?php
/**
 * To load student and tacher profile tab
 */
global $current_user;
$custom_user_roles = $current_user->roles;

$user_role = IAMD_USER_ROLE;
if(dttheme_check_is_s2member_level_user(false) || $user_role == 'customer' || in_array('customer', $custom_user_roles)) {
	require_once(IAMD_TD.'/framework/buddypress/student-profile.php');
} else if($user_role == 'teacher') {
	require_once(IAMD_TD.'/framework/buddypress/teacher-profile.php');
} else {
	require_once(IAMD_TD.'/framework/buddypress/default-profile.php');	
}

/**
 * To load all functions
 */
require_once(IAMD_TD.'/framework/buddypress/functions.php');