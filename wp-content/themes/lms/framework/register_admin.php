<?php
add_action('admin_init', 'dttheme_admin_options_init', 1);
add_action('admin_enqueue_scripts', 'dttheme_admin_panel_scripts');

##Admin panel media uploader hooks( to alter the media uploder used to upload logo , favicon ... )
if (isset($_GET['mytheme_upload_button']) || isset($_POST['mytheme_upload_button']) && (isset($_GET['page']) && $_GET['page'] == 'parent')) :
	add_action('admin_init', 'dttheme_image_upload_option');
endif;
if (isset($_GET['dtcourse_upload_button']) || isset($_POST['dtcourse_upload_button']) && (isset($_GET['page']) && $_GET['page'] == 'parent')) :
	add_action('admin_init', 'dttheme_coursemedia_upload_option');
endif;
## End hook

function dttheme_admin_panel_scripts() {
	global $wp_version;

	wp_enqueue_style('thickbox');

	wp_enqueue_style('dttheme-adminpanel', IAMD_FW_URL.'theme_options/style.css');	

	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-slider');
	
	if (version_compare($wp_version, '3.5', '>=')) :
		wp_enqueue_script('wp-color-picker'); #New Color Picker
		wp_enqueue_style('wp-color-picker'); #New Color Picker
	else :
		wp_enqueue_script('farbtastic'); #Color picker
		wp_enqueue_style('farbtastic'); #Color Picker
	endif;

	wp_enqueue_script('dttheme-tooltip', IAMD_FW_URL.'js/admin/jquery.tools.min.js');
	wp_enqueue_script('dtthemes', IAMD_FW_URL.'js/admin/mytheme.admin.js', array( 'wp-blocks' ));
	
	wp_localize_script('dtthemes', 'objectL10n', array(
		'saveall' => esc_html__('Save All', 'lms'),
		'saving' => esc_html__('Saving ...', 'lms'),
		'resetConfirm' => esc_html__('This will restore all of your options to default. Are you sure?', 'lms'),
		'importConfirm' => esc_html__('You are going to import the dummy data provided with the theme, kindly confirm?', 'lms'),
		'disableImportMsg' => esc_html__('Importing is disabled.. :), Please set Disable Import to NO in Buddha Panel General Settings', 'lms'),
		'backupMsg' => esc_html__('Click OK to backup your current saved options.', 'lms'),
		'backupSuccess' => esc_html__('Your options are backuped successfully', 'lms'),
		'backupFailure' => esc_html__('Backup Process not working', 'lms'),
		'restoreMsg' => esc_html__('Warning: All of your current options will be replaced with the data from your last backup! Proceed?', 'lms'),
		'restoreSuccess' => esc_html__('Your options are restored from previous backup successfully', 'lms'),
		'restoreFailure' => esc_html__('Restore Process not working', 'lms'),
		'importMsg' => esc_html__('Click ok import options from the above textarea', 'lms'),
		'importSuccess' => esc_html__('Your options are imported successfully', 'lms'),
		'importFailure' => esc_html__('Import Process not working', 'lms'),
		'resetGrade' => esc_html__('Are you sure to reset this grading ?', 'lms'),
		'pageBuilderUpdate' => esc_html__('Your page and post contents are updated successfully for page builder latest version!', 'lms'),
		'pageBuilderUpdateAlready' => esc_html__('Page builder updates are implemented already to your page and post contents!', 'lms'),
		'ratingUpdate' => esc_html__('Your old rating datas are updated to latest plugin!', 'lms'),
		'ratingUpdateAlready' => esc_html__('The rating datas are already updated to the new plugin', 'lms'),
		'mysiteWpVersion' => $wp_version
		)); 
}

function dttheme_admin_options_init() {
	register_setting(IAMD_THEME_SETTINGS, IAMD_THEME_SETTINGS);
	add_option(IAMD_THEME_SETTINGS, dttheme_default_option());
	if (isset($_POST['mytheme-option-save'])) :
		dttheme_ajax_option_save();
	endif;
	
	if (isset($_POST['mytheme']['reset'])) :
		delete_option(IAMD_THEME_SETTINGS);
		update_option(IAMD_THEME_SETTINGS, dttheme_default_option()); # To set Default options
		wp_redirect(admin_url('admin.php?page=parent&reset=true'));
		exit;
	endif;
}

function dttheme_ajax_option_save() {

	$ajax_ref_check = check_ajax_referer(IAMD_THEME_SETTINGS.'_wpnonce', 'mytheme_admin_wpnonce');
			
	if($ajax_ref_check === false) {
		return false;
	} else {

		$data = $_POST;
		unset($data['_wp_http_referer'], $data['_wpnonce'], $data['action']);
		unset($data['mytheme_admin_wpnonce'], $data['mytheme-option-save'], $data['option_page']);

		$msg = array('success' => false, 'message' => esc_html__('Error: Options not saved, please try again.', 'lms'));

		$data = array_filter($data[IAMD_THEME_SETTINGS]);
		
		if (get_option(IAMD_THEME_SETTINGS) != $data) {
			if (update_option(IAMD_THEME_SETTINGS, $data))
				$msg = array('success' => 'options_saved', 'message' => esc_html__('Options Saved.', 'lms'));
		} else {
			$msg = array('success' => true, 'message' => esc_html__('Options Saved.', 'lms'));
		}

		$echo = json_encode($msg);
		@header('Content-Type: application/json; charset='.get_option('blog_charset'));
		echo "{$echo}";
		exit;

	}

}

######### SAMPLE FONT PREVIEW ##########
add_action('wp_ajax_dttheme_font_url', 'dttheme_font_url');
function dttheme_font_url() {
	$recieve_font = $_POST['font'];
	$font_url = array('url' => 'http'.dttheme_ssl().'://fonts.googleapis.com/css?family='.str_replace(' ', '+', $recieve_font));
	die(json_encode($font_url));
}

/* ---------------------------------------------------------------------------
 * Getting privacy button action selection box
 * --------------------------------------------------------------------------- */
if ( ! function_exists( 'dt_theme_privacy_btnaction_selection' ) ) {
	function dt_theme_privacy_btnaction_selection($name = '', $selected = "") {
		$actions = array( '' => esc_html__('Dismiss the notification', 'lms'), 'link' => esc_html__('Link to another page', 'lms'), 'info_modal' => esc_html__('Open info modal on privacy and cookies', 'lms') );
	
		$name = ! empty ( $name ) ? "name='mytheme[privacy-bar][{$name}][action]'" : '';
		$out = "<select class='button-select' {$name}>"; // name attribute will be added to this by jQuery menuAdd()
		foreach ( $actions as $key => $value ) :
			$s = selected ( $key, $selected, false );
			$v = $value;
			$out .= "<option value='{$key}' {$s} >{$v}</option>";
		endforeach;
		$out .= "</select>";
	
		return $out;
	}
}

#### BACKUP OPTION #####
add_action('wp_ajax_dttheme_backup_and_restore_action', 'dttheme_backup_and_restore_action');
function dttheme_backup_and_restore_action() {

	$save_type = $_POST['type'];

	if ($save_type == 'backup_options') :
		$data = array("general" => dttheme_option('general'),
			"appearance" => dttheme_option('appearance'),
			"integration" => dttheme_option('integration'),
			"mobile" => dttheme_option('mobile'),
			"social" => dttheme_option('social'),
			"seo" => dttheme_option('seo'),
			'widgetarea' => dttheme_option("widgetarea"),
			"specialty" => dttheme_option('specialty'),
			"dt_course" => dttheme_option('dt_course'),
			"pagebuilder" => dttheme_option('pagebuilder'),
			"woo" => dttheme_option('woo'),
			
			'backup' => date('r'));
		update_option("mytheme_backup", $data);
		die('1');
	elseif ($save_type == 'restore_options') :
		$data = get_option("mytheme_backup");
		update_option(IAMD_THEME_SETTINGS, $data);
		die('1');
	elseif( $save_type == "reset_options") :
		delete_option(IAMD_THEME_SETTINGS);
		update_option(IAMD_THEME_SETTINGS, dttheme_default_option()); # To set Default options
		die('1');
	endif;
}?>