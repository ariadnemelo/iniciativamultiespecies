<?php ob_start();
/** create_admin_menu()
  * Objective:
  *		Hook to create thme option page at back end.
**/
function create_admin_menu() {
	
	add_theme_page(IAMD_THEME_NAME.' - '.esc_html__('settings', 'lms'), IAMD_THEME_NAME . esc_html__(' Options', 'lms'), 'manage_options', 'parent', 'dttheme_options_page'	);	 			

}
### --- ****  create_admin_menu() *** --- ###
add_action('admin_menu', 'create_admin_menu');
require_once(TEMPLATEPATH.'/framework/theme_options/settings.php');
#ob_flush();?>