<?php
/**
 * Disables BuddyPress' registration process and fallsback to WordPress' one.
 */
function dttheme_disable_bp_registration() {
  remove_action( 'bp_init',    'bp_core_wpsignup_redirect' );
  remove_action( 'bp_screens', 'bp_core_screen_signup' );
}
add_action( 'bp_loaded', 'dttheme_disable_bp_registration' );

function firmasite_redirect_bp_signup_page($page ){
	return bp_get_root_domain() . '/wp-login.php?action=register'; 
}
add_filter( 'bp_get_signup_page', "firmasite_redirect_bp_signup_page");

$GLOBALS['teachers-singular-label'] = (dttheme_option('general', 'teachers-singular-label') != '') ? dttheme_option('general', 'teachers-singular-label') : 'Teacher';
$GLOBALS['teachers-plural-label'] = (dttheme_option('general', 'teachers-plural-label') != '') ? dttheme_option('general', 'teachers-plural-label') : 'Teachers';

// Creating new role as 'teacher' and configuring capabilities
$result = add_role(
    'teacher',
    $GLOBALS['teachers-singular-label'],
    array(
		'read' => true,
		'edit_posts' => true,
		'publish_posts' => true,
		'edit_published_posts' => true,
		'delete_posts' => true,
		'delete_published_posts' => true,
		'upload_files' => true,	
    )
);

  $role = get_role( 'administrator' );
  $role->add_cap( 'read' );
  $role->add_cap( 'edit_posts' );
  $role->add_cap( 'publish_posts' );
  $role->add_cap( 'edit_published_posts' );
  $role->add_cap( 'delete_posts' );
  $role->add_cap( 'delete_published_posts' );
  $role->add_cap( 'upload_files' );


//1. Add a new form element...
add_action( 'register_form', 'dt_custom_registration_form' );
function dt_custom_registration_form() {

	$role = ( isset( $_POST['role'] ) ) ? trim( $_POST['role'] ) : 'subscriber';
	?>
	<p>
		<label for="role"><?php _e( 'Role', 'dt_themes' ) ?><br />
            <select name="role" id="role">
                <option value="subscriber" <?php selected( $role, 'subscriber' ); ?>><?php echo __('Subscriber', 'dt_themes'); ?></option>
                <option value="teacher" <?php selected( $role, 'teacher' ); ?>><?php echo $GLOBALS['teachers-singular-label']; ?></option>
				<?php 
				$payment_method = dttheme_option('general','payment-method');
				
				if($payment_method == 'woocommerce') {
					$status = function_exists( 'is_woocommerce' );
					if($status) {
						?>
						<option value="customer"><?php echo __('Student', 'dt_themes'); ?></option>
						<?php
					}
				} else {
					$status = defined('WS_PLUGIN__S2MEMBER_VERSION');
					if($status) {
						?>
						<option value="s2member_level1"><?php echo __('Student', 'dt_themes'); ?></option>
						<?php
					}
				}
                ?>
            </select>
        </label>
	</p>
	<?php
	
}

//2. Add validation. In this case, we make sure first_name is required.
add_filter( 'registration_errors', 'dt_registration_errors', 10, 3 );
function dt_registration_errors( $errors, $sanitized_user_login, $user_email ) {

	if ( ! isset( $_POST['role'] ) ) {
		$errors->add( 'role_error', __( '<strong>ERROR</strong>: You must select role.', 'dt_themes' ) );
	}
	
	if ( $_POST['role'] != 'subscriber' && $_POST['role'] != 'teacher' && $_POST['role'] != 's2member_level1' && $_POST['role'] != 'customer' ) {
		$errors->add( 'role_error', __( '<strong>ERROR</strong>: Invalid role.', 'dt_themes' ) );
	}

	return $errors;
	
}

//After successfull regsitration
add_action('user_register','dt_after_user_registers');
function dt_after_user_registers($user_id){
	
	if (!$user_id > 0) {
		return;
	}
	
	// Updating user details
	if ( isset( $_POST['role'] ) ) {
		 wp_update_user( array ('ID' => $user_id, 'role' => $_POST['role']) );
	}
	
	
	// Create teachers profile in teacher custom post
	$user = get_user_by('id', $user_id);
	
	if($user->roles[0] == 'teacher') {
	
		$teacher_post = array(
			'post_title' => $user->data->display_name,
			'post_content' => '',
			'post_status' => 'publish',
			'post_type' => 'dt_teachers',
			'post_author' => $user_id
		);
		
		$post_id = wp_insert_post( $teacher_post );
		
		update_post_meta ( $post_id, "_teacher_user_id",  $user_id );
	
	}

}

function dt_server_variable( $variable ) {

	$return = '';

	switch ( $variable ) {
		case 'HTTP_HOST':
			$return = $_SERVER['HTTP_HOST'];
		break;
	}


	return $return;
}