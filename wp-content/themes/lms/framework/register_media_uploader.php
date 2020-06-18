<?php
/** dttheme_image_upload_option()
  * Objective:
  *		1.To remove the unnecessary tabs
  *		2.To alter the "Insert into Post" text
  *		3.To disable flash uploader
**/
function dttheme_image_upload_option(){
	add_filter('flash_uploader', 'disable_flash_uploader');
	add_filter('media_upload_form_url', 'option_image_form_url', 10, 2);
	add_filter('media_upload_tabs', 'dttheme_disable_image_tabs');
	add_filter('attachment_fields_to_edit', 'dttheme_image_attachment_option', 10, 2);
}
### --- ****  dttheme_image_upload_option() *** --- ###


function dttheme_coursemedia_upload_option(){
	add_filter('flash_uploader', 'disable_flash_uploader');
	add_filter('media_upload_form_url', 'course_option_form_url', 10, 2);
	add_filter('media_upload_tabs', 'dttheme_disable_image_tabs');
	add_filter('attachment_fields_to_edit', 'dttheme_course_attachment_option', 10, 2);
}

/** disable_flash_uploader()
  * Objective:
  *		To disable flash uploader
**/
function disable_flash_uploader($flash){
	return false;
}

### --- ****  disable_flash_uploader() *** --- ###

function option_image_form_url($form_action_url, $type){
	$form_action_url = $form_action_url.'&mytheme_upload_button=1';
	return $form_action_url;
}

function course_option_form_url($form_action_url, $type){
	$form_action_url = $form_action_url.'&dtcourse_upload_button=1';
	return $form_action_url;
}

function dttheme_disable_image_tabs ($tabs) {
	unset($tabs['type_url'], $tabs['gallery']);
    	return $tabs;
}

function dttheme_image_attachment_option($form_fields, $post){
	unset($form_fields);
	
	$filename = basename( $post->guid );
	$attachment_id = $post->ID;
	$attachment['post_title'] = '';
	$attachment['url'] = '';
	$attachment['post_excerpt'] = '';
	
	if ( current_user_can( 'delete_post', $attachment_id ) ) {
		if ( !EMPTY_TRASH_DAYS ) {
			$delete = "<a href='" . wp_nonce_url( "post.php?action=delete&amp;post=$attachment_id", 'delete-attachment_' . $attachment_id ) . "' id='del[$attachment_id]' class='delete'>" . esc_html__( 'Delete Permanently' , 'lms') . '</a>';
		} elseif ( !MEDIA_TRASH ) {
			$delete = "<a href='#' class='del-link' onclick=\"document.getElementById('del_attachment_$attachment_id').style.display='block';return false;\">" . esc_html__( 'Delete' , 'lms' ) . "</a>
			 <div id='del_attachment_$attachment_id' class='del-attachment' style='display:none;'>" . sprintf( esc_html__( 'You are about to delete %s.' , 'lms' ), '<strong>'.$filename.'</strong>' ) . "
			 <a href='" . wp_nonce_url( "post.php?action=delete&amp;post=$attachment_id", 'delete-attachment_' . $attachment_id ) . "' id='del[$attachment_id]' class='button'>" . esc_html__( 'Continue' , 'lms' ) . "</a>
			 <a href='#' class='button' onclick=\"this.parentNode.style.display='none';return false;\">" . esc_html__( 'Cancel' , 'lms' ) . "</a>
			 </div>";
		} else {
			$delete = "<a href='" . wp_nonce_url( "post.php?action=trash&amp;post=$attachment_id", 'trash-attachment_' . $attachment_id ) . "' id='del[$attachment_id]' class='delete'>" . esc_html__( 'Move to Trash' , 'lms' ) . "</a>
			<a href='" . wp_nonce_url( "post.php?action=untrash&amp;post=$attachment_id", 'untrash-attachment_' . $attachment_id ) . "' id='undo[$attachment_id]' class='undo hidden'>" . esc_html__( 'Undo' , 'lms' ) . "</a>";
		}
	} else {
		$delete = '';
	}
	
	$send = "<input type='submit' class='button' name='send[$attachment_id]' value='" . esc_attr__( 'Insert this Image' , 'lms' ) . "' />";
	$send .= "<input type='radio' checked='checked' value='full' id='image-size-full-$attachment_id' name='attachments[$attachment_id][image-size]' style='display:none;' />";
	$send .= "<input type='hidden' value='' name='attachments[$attachment_id][post_title]' id='attachments[$attachment_id][post_title]' />";
	$send .= "<input type='hidden' value='' name='attachments[$attachment_id][url]' id='attachments[$attachment_id][url]' />";
	$send .= "<input type='hidden' value='' name='attachments[$attachment_id][post_excerpt]' id='attachments[$attachment_id][post_excerpt]' />";
	
	$form_fields['buttons'] = array( 'tr' => "\t\t<tr class='submit'><td></td><td class='savesend'>$send $delete</td></tr>\n" );
	
	return $form_fields;
}

function dttheme_course_attachment_option($form_fields, $post){

	if ( substr($post->post_mime_type, 0, 5) == 'image' ) {
		unset($form_fields['menu_order'], $form_fields['image_url'], $form_fields['align'], $form_fields['image-size']);	
	}
	
	return $form_fields;
}

?>