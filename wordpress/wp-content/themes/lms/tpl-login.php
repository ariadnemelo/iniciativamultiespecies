<?php
/*Template Name: Login Template */
get_header();

	$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
	$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();

	if($GLOBALS['force_enable'] == true)
		$page_layout = $GLOBALS['page_layout'];
	else
		$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
	
	$show_sidebar = $show_left_sidebar = $show_right_sidebar =  false;
	$sidebar_class = "";

	switch ( $page_layout ) {
		case 'with-left-sidebar':
			$page_layout = "page-with-sidebar with-left-sidebar";
			$show_sidebar = $show_left_sidebar = true;
			$sidebar_class = "secondary-has-left-sidebar";
		break;

		case 'with-right-sidebar':
			$page_layout = "page-with-sidebar with-right-sidebar";
			$show_sidebar = $show_right_sidebar	= true;
			$sidebar_class = "secondary-has-right-sidebar";
		break;

		case 'both-sidebar':
			$page_layout = "page-with-sidebar page-with-both-sidebar";
			$show_sidebar = $show_right_sidebar	= $show_left_sidebar = true;
			$sidebar_class = "secondary-has-both-sidebar";
		break;

		case 'content-full-width':
		default:
			$page_layout = "content-full-width";
		break;
	}

	if ( $show_sidebar ):
		if ( $show_left_sidebar ): ?>
			<!-- Secondary Left -->
			<section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar( 'left' );?></section><?php
		endif;
	endif;
	
	?>

	<!-- ** Primary Section ** -->
	<section id="primary" class="<?php echo esc_attr( $page_layout );?>">
		<!-- Login Module -->
                
			<?php 
			
			if( is_user_logged_in() ) {
				
				$loginreg_page = dttheme_option('general','login-registration-page');
				if($loginreg_page == 'lms-buddypress-profile') {
					$link = bp_loggedin_user_domain();
				} else {
					$link = dttheme_get_page_permalink_by_its_template('tpl-welcome.php');
				}
				
				if ( !empty( $link )) {
					return wp_redirect( $link );
				}
				
			} else { 			
			?>

				<!-- Login Form -->
				<div class="column dt-sc-one-half first">

					<div class="dt-sc-border-title"> <h2><span><?php esc_html_e('Login Form', 'lms');?></span> </h2></div>
                    
                    <p> <strong><?php esc_html_e('Already a Member? Log in here.', 'lms');?></strong> </p>
                    <?php
					
					$loginreg_page = dttheme_option('general','login-registration-page');
					if($loginreg_page == 'lms-buddypress-profile') {
						$link = esc_url(home_url('/'));
					} else {
						$link = dttheme_get_page_permalink_by_its_template('tpl-welcome.php');
						$link = is_null($link) ? admin_url( 'profile.php' ) : $link;
					}
							  					
					$args = array(
						'redirect' => $link,
					);
					wp_login_form($args);
					?>
                    <p class="tpl-forget-pwd"><a href="<?php echo wp_lostpassword_url( home_url('/') ); ?>"><?php esc_html_e('Lost your password ?', 'lms');?></a></p>

				</div><!-- Login Form End -->

				<!-- Registration Form -->
				<div class="column dt-sc-one-half">
                    <div class="dt-sc-border-title"> <h2><span><?php esc_html_e('Register Form', 'lms');?></span> </h2></div>
                    
					<p> <strong><?php esc_html_e('Do not have an account? Register here', 'lms');?></strong> </p>

					<form name="loginform" id="loginform" action="<?php echo wp_registration_url(); ?>" method="post">
						<p>	
							<label><?php esc_html_e('Username', 'lms');?><span class="required"> * </span> </label> 
							<input type="text" name="user_login"  class="input" value="" size="20" required="required" />
						</p>
						<p>
							<label><?php esc_html_e('Email Id', 'lms');?><span class="required"> * </span> </label> 
							<input type="email" name="user_email"  class="input" value="" size="20" required="required" />
						</p>
						<p><?php
								$options = get_option(IAMD_THEME_SETTINGS);
								$teacher_singular_label = (isset($options['general']['teachers-singular-label']) && !empty($options['general']['teachers-singular-label'])) ? $options['general']['teachers-singular-label'] : esc_html__('Teacher', 'lms' );

						?>
							<label><?php esc_html_e('Role', 'lms');?><span class="required"> * </span> </label> 
                            <select name="role" id="role">
                                <option value="subscriber"><?php echo esc_html__('Subscriber', 'lms'); ?></option>
                                <option value="teacher"><?php echo esc_html( $teacher_singular_label ); ?></option>
                                <?php 
								$payment_method = dttheme_option('general','payment-method');
								
								if($payment_method == 'woocommerce') {
									$status = function_exists( 'is_woocommerce' );
									if($status) {
										?>
										<option value="customer"><?php echo esc_html__('Student', 'lms'); ?></option>
										<?php
									}
								} else {
								
									$status = defined('WS_PLUGIN__S2MEMBER_VERSION');
									if($status) {
										?>
										<option value="s2member_level1"><?php echo esc_html__('Student', 'lms'); ?></option>
										<?php
									}
									
								}
								
								?>
                            </select>
						</p>
						<p> <?php  echo apply_filters('dt_sc_reg_form_elements', '', array () ); ?> </p>
						<p class="submit alignleft"><input type="submit" class="button-primary" value="<?php esc_attr_e('Register', 'lms');?>" /></p>
					</form>
				</div><!-- Registration Form End -->
				<div class="clear"></div>
		<?php }?>
		
        <?php
		if(dttheme_option('general','enable-social-logins') == 'true') {
			
			echo '<div class="dt-sc-social-logins-container">';
			
				echo '<div class="dt-sc-hr-invisible"></div>';
				echo '<div class="dt-sc-social-logins-divider">'.esc_html__('Or', 'lms').'</div>';
				echo '<div class="dt-sc-hr-invisible"></div>';
				
				if(dttheme_option('general','enable-facebook-login') == 'true') {

					if(!session_id()) {
					    session_start();
					}

					require_once  WP_PLUGIN_DIR.'/designthemes-core-features/apis/facebook/Facebook/autoload.php';

					$appId = dttheme_option('general','facebook-app-id'); //Facebook App ID
					$appSecret = dttheme_option('general','facebook-app-secret'); // Facebook App Secret

					$fb = new Facebook\Facebook([
						'app_id' => $appId,
						'app_secret' => $appSecret,
						'default_graph_version' => 'v2.10',
					]);

					$helper = $fb->getRedirectLoginHelper();
					$permissions = ['email'];
					$loginUrl = $helper->getLoginUrl( site_url('wp-login.php') . '?dtLMSFacebookLogin=1', $permissions);

					echo '<a href="'.htmlspecialchars($loginUrl).'" class="dt-sc-social-facebook-connect"><i class="fa fa-facebook"></i>'.esc_html__('Connect With Facebook', 'lms').'</a>';
					echo '<div class="dt-sc-hr-invisible"></div>';
				}
				
				if(dttheme_option('general','enable-googleplus-login') == 'true') {
					echo '<a href="'.dttheme_google_login_url().'" class="dt-sc-social-googleplus-connect"><i class="fa fa-google-plus"></i>'.esc_html__('Connect With Google +', 'lms').'</a>';
					echo '<div class="dt-sc-hr-invisible"></div>';
				}
			
			echo '</div>';
			
		}
		?>
		
		<!-- Login Module End-->

		<?php
		if( have_posts() ):
			while( have_posts() ):
				the_post();
				get_template_part( 'framework/loops/content', 'page' );
			endwhile;
		endif;?>
	</section><!-- ** Primary Section End ** --><?php

	if ( $show_sidebar ):
		if ( $show_right_sidebar ): ?>
			<!-- Secondary Right -->
			<section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar( 'right' );?></section><?php
		endif;
	endif;?>
    
<?php get_footer(); ?>