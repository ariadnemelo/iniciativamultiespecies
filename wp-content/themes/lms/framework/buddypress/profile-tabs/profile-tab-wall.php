<?php

/**
 * Wall Profile Tab ( Certificates & Badges )
 */

function profile_tab_wall() {
	
      global $bp;
 
      bp_core_new_nav_item(array( 
            'name' 					=> 'Wall', 
            'slug' 					=> 'wall', 
            'screen_function' 		=> 'wall_screen', 
            'position' 				=> 10,
			'parent_url'      		=> bp_displayed_user_domain()  . '/wall/',
			'parent_slug'     		=> $bp->profile->slug,
			'default_subnav_slug'	=> 'wall'
      ));
	  
}
add_action( 'bp_setup_nav', 'profile_tab_wall' );
 
 
function wall_screen() {
    add_action( 'bp_template_title', 'wall_title' );
    add_action( 'bp_template_content', 'wall_content' );
    bp_core_load_template( 'buddypress/members/single/plugins' );
}

function wall_title() {
    echo esc_html__('Certificates & Badges', 'lms');
}

function wall_content() { 

	$user_id = get_current_user_id();
	$user_info = get_userdata($user_id);
	$user_role = IAMD_USER_ROLE;

	$ccaps = array();
	
	$payment_method = dttheme_option('general','payment-method');
		
	if($payment_method == 'woocommerce') {
	
		$ccaps = dttheme_get_user_purchased_courses($user_id);
	
	} else {
	
		if($user_role == 's2member_level1') {
			foreach ($user_info->allcaps as $cap => $cap_enabled) {
				if (preg_match ("/^access_s2member_ccap_cid_/", $cap)) {
					$ccaps[] = preg_replace ("/^access_s2member_ccap_cid_/", "", $cap);
				}
			}
		} else if(dttheme_check_is_s2member_level_user(true)) {
			$ccaps = dt_get_all_paid_courses();
		}
		
	}
	
	$course_ids_arr = dt_get_user_graded_course();
	$free_course = array_diff($course_ids_arr, $ccaps);
	$ccaps = array_merge($ccaps, $free_course);
	?>
	<div class="dashboard-content">
	
        <div class="column dt-sc-one-column">
            <h4 class="border-title"><?php echo esc_html__('Certificates', 'lms'); ?><span></span></h4>
            <?php
            if(isset($ccaps) && is_array($ccaps)) {
            
				echo '<table border="0" cellpadding="0" cellspacing="10" style="width:100%;">
						<thead>
							<tr>
								<th scope="col">'.esc_html__('#', 'lms').'</th>
								<th scope="col">'.esc_html__('Course', 'lms').'</th>
								<th scope="col">'.esc_html__('Percentage', 'lms').'</th>
								<th scope="col">'.esc_html__('Certificate', 'lms').'</th>
							</tr>
						</thead>
						<tbody>';
				
				$i = 1;
				foreach($ccaps as $course_id) {
				
					$course_args = array( 'post_type' => 'dt_courses', 'p' => $course_id );
					$course = get_posts( $course_args );
					
					$enable_certificate = get_post_meta($course_id, 'enable-certificate', true);
					
					if(isset($enable_certificate) && $enable_certificate != '') {
					
						$certificate_percentage = dttheme_wp_kses(get_post_meta($course_id, 'certificate-percentage', true));
						$course_percent = dt_get_course_percentage($course_id, '', false);
						
						if($course_percent > 0 && $course_percent >= $certificate_percentage) {
							
							$certificate_template = get_post_meta($course_id, 'certificate-template', true);
							$certificates_args = array( 'post_type' => 'dt_certificates', 'p' => $certificate_template );
							$certificate = get_posts( $certificates_args );

							$custom_css = dttheme_wp_kses(get_post_meta ( $certificate[0]->ID, 'custom-css', TRUE ));
							
							$nonce = wp_create_nonce("dt_certificate_nonce");
							$link = admin_url('admin-ajax.php?ajax=true&amp;action=dt_generate_certificate&amp;certificate_id='.$certificate[0]->ID.'&amp;course_id='.$course_id.'&amp;nonce='.$nonce);
							
							echo '<tr>
									<td>'.$i.'</td>
									<td><a href="'.get_permalink($course_id).'">'.$course[0]->post_title.'</a></td>
									<td>'.$course_percent.'%'.'</td>
									<td><a href="'.$link.'"  data-gal="prettyPhoto[certificate]">'.$certificate[0]->post_title.'</a><input type="hidden" value="'.$custom_css.'" name="certificate_css" class="certificate_css" /></td>
								</tr>';
							
							$i++;
						
						}
					
					}
				
				}
				
				if($i == 1) {
					echo '<tr>
							<td colspan="4">'.esc_html__('No certificates found!', 'lms').'</td>
						</tr>';
				}
				
				echo '</tbody></table>';
            
            }
            ?>
        </div>
        
        <div class="dt-sc-hr-invisible-small"></div>
        
        <div class="column dt-sc-one-column">
            <h4 class="border-title"><?php echo esc_html__('Badges', 'lms'); ?><span></span></h4>
            <?php
            if(isset($ccaps) && is_array($ccaps)) {
            
				echo '<ul class="dt-sc-course-badges">';
				
				$i = 0;
				foreach($ccaps as $course_id) {
				
					$total_percent = 0;
					$course_args = array( 'post_type' => 'dt_courses', 'p' => $course_id );
					$course = get_posts( $course_args );
					
					$enable_badge = get_post_meta($course_id, 'enable-badge', true);
					
					if(isset($enable_badge) && $enable_badge != '') {
					
						$badge_percentage = get_post_meta($course_id, 'badge-percentage', true);
						$course_percent = dt_get_course_percentage($course_id, '', false);
						
						if($course_percent > 0 && $course_percent >= $badge_percentage) {
							$badge_title = get_post_meta($course_id, 'badge-title', true);
							if(isset($badge_title) && $badge_title != '') {
								$badge_title = ' <label>'.$badge_title.'</label'; 
							} else {
								$badge_title = '';
							}
							$badge_image = get_post_meta($course_id, 'badge-image', true);
							if(isset($badge_image) && $badge_image != '') {
								echo '<li><img src="'.$badge_image.'" alt="'.$course[0]->post_title.esc_attr__(' badge', 'lms').'" title="'.$course[0]->post_title.esc_attr__(' badge', 'lms').'" />'.$badge_title.'</li>';
								$i++;
							}
						}
					
					}
				
				}
				
				if($i == 0) {
					echo '<li><p class="dt-sc-warning-box"> '.esc_html__('No Badges found!', 'lms').'</p></li>';
				}
				
				echo '</ul>';
            
            }
            ?>
        </div>
        
	</div>
	<?php
                               
}
?>