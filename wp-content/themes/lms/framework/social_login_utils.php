<?php

/* ---------------------------------------------------------------------------
 * Facebook login utils
 * --------------------------------------------------------------------------- */
 
function dttheme_facebook_login_url() {
	
  return site_url('wp-login.php') . '?dtLMSFacebookLogin=1';
  
}
 
function dttheme_facebook_login() {
	
  if (isset($_REQUEST['dtLMSFacebookLogin']) && $_REQUEST['dtLMSFacebookLogin'] == '1') {
	dttheme_facebook_login_action();
  }
  
}
add_action('login_init', 'dttheme_facebook_login');
 
 	 
function dttheme_facebook_login_action() {

	if(!session_id()) {
	    session_start();
	}

	require_once  WP_PLUGIN_DIR.'/designthemes-core-features/apis/facebook/Facebook/autoload.php';

	$appId = dttheme_option('general','facebook-app-id'); //Facebook App ID
	$appSecret = dttheme_option('general','facebook-app-secret'); // Facebook App Secret

	$fb = new \Facebook\Facebook([
	  'app_id' => $appId,
	  'app_secret' => $appSecret,
	  'default_graph_version' => 'v2.10',
	]);

	$helper = $fb->getRedirectLoginHelper();

	try {
		$accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo esc_html__('Graph returned an error: ', 'lms') . $e->getMessage();
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo esc_html__('Facebook SDK returned an error: ', 'lms') . $e->getMessage();
		exit;
	}

	if (! isset($accessToken)) {
		if ($helper->getError()) {
			header('HTTP/1.0 401 Unauthorized');
			echo esc_html__('Error: ', 'lms') . $helper->getError() . "\n";
			echo esc_html__('Error Code: ', 'lms') . $helper->getErrorCode() . "\n";
			echo esc_html__('Error Reason: ', 'lms') . $helper->getErrorReason() . "\n";
			echo esc_html__('Error Description: ', 'lms') . $helper->getErrorDescription() . "\n";
		} else {
			header('HTTP/1.0 400 Bad Request');
			echo esc_html__('Bad request', 'lms');
		}
		exit;
	}


	// Getting long lived access token
	$oAuth2Client = $fb->getOAuth2Client();
	$tokenMetadata = $oAuth2Client->debugToken($accessToken);
	$tokenMetadata->validateAppId($appId);
	$tokenMetadata->validateExpiration();

	if (! $accessToken->isLongLived()) {
	  try {
	    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
	  } catch (Facebook\Exceptions\FacebookSDKException $e) {
	    echo esc_html__('Error getting long-lived access token: ', 'lms') . $helper->getMessage() . "</p>\n\n";
	    exit;
	  }
	}

	$_SESSION['fb_access_token'] = (string) $accessToken;


	// Retrieve user profile
	try {
	  $response = $fb->get('/me?fields=id,name,email,first_name,last_name', $accessToken);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  echo esc_html__('Graph returned an error: ', 'lms') . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  echo esc_html__('Facebook SDK returned an error: ', 'lms') . $e->getMessage();
	  exit;
	}

	$user_profile = $response->getGraphUser();


	$args = array (
		'meta_key'     => 'facebook_id',
		'meta_value'   => $user_profile['id'],
		'meta_compare' => '=',
	 ); 
	$users = get_users( $args );		
	
	if(is_array($users) && !empty($users)) {
		$ID = $users[0]->data->ID;
	} else {
		$ID = NULL;
	}

	if ($ID == NULL) {
		
		if (!isset($user_profile['email'])) {
			$user_profile['email'] = $user_profile['id'] . '@facebook.com';
		}
		
		$random_password = wp_generate_password($length = 12, $include_standard_special_chars = false);
		
		$username = strtolower($user_profile['name']);
		$username = trim(str_replace(' ', '', $username));
		
		$sanitized_user_login = sanitize_user('facebook-'.$username);
		
		if (!validate_username($sanitized_user_login)) {
			$sanitized_user_login = sanitize_user('facebook-' . $user_profile['id']);
		}
		
		$defaul_user_name = $sanitized_user_login;
		$i = 1;
		while (username_exists($sanitized_user_login)) {
		  $sanitized_user_login = $defaul_user_name . $i;
		  $i++;
		}

		$ID = wp_create_user($sanitized_user_login, $random_password, $user_profile['email']);

		if (!is_wp_error($ID)) {
							
			wp_new_user_notification($ID, $random_password);
			$user_info = get_userdata($ID);
			wp_update_user(array(
				'ID' => $ID,
				'display_name' => $user_profile['name'],
				'first_name' => $user_profile['first_name'],
				'last_name' => $user_profile['last_name'],
			));
			
			update_user_meta($ID, 'facebook_id', $user_profile['id']);

		}
		
	}
	
	// Login
	if ($ID) { 

		$secure_cookie = is_ssl();
		$secure_cookie = apply_filters('secure_signon_cookie', $secure_cookie, array());
		global $auth_secure_cookie;

		$auth_secure_cookie = $secure_cookie;
		wp_set_auth_cookie($ID, false, $secure_cookie);
		$user_info = get_userdata($ID);
		update_user_meta($ID, 'fb_profile_picture', 'https://graph.facebook.com/' . $user_profile['id'] . '/picture?type=large');
		do_action('wp_login', $user_info->user_login, $user_info, 10, 2);
		update_user_meta($ID, 'fb_user_access_token', $accessToken);

		wp_redirect(esc_url(home_url('/')));


	}
	
	
}


/* ---------------------------------------------------------------------------
 * Google Plus login utils
 * --------------------------------------------------------------------------- */

function dttheme_google_login_url() {
	
  return site_url('wp-login.php') . '?dtLMSGoogleLogin=1';
  
}

function dttheme_google_login() {
	
  if (isset($_REQUEST['dtLMSGoogleLogin']) && $_REQUEST['dtLMSGoogleLogin'] == '1') {
	dttheme_google_login_action();
  }
  
}
add_action('login_init', 'dttheme_google_login');

function dttheme_google_login_action() {

	require_once WP_PLUGIN_DIR.'/designthemes-core-features/apis/google/Google_Client.php';
	require_once WP_PLUGIN_DIR.'/designthemes-core-features/apis/google/contrib/Google_Oauth2Service.php';

	$clientId = dttheme_option('general','google-client-id'); //Google CLIENT ID
	$clientSecret = dttheme_option('general','google-client-secret'); //Google CLIENT SECRET	
	$redirectUrl = dttheme_google_login_url();  //return url (url to script)
		
	$gClient = new Google_Client();
	$gClient->setApplicationName(esc_html__('Login To ', 'lms').' '.IAMD_THEME_NAME);
	$gClient->setClientId($clientId);
	$gClient->setClientSecret($clientSecret);
	$gClient->setRedirectUri($redirectUrl);
	
	$google_oauthV2 = new Google_Oauth2Service($gClient);
	
	if(isset($google_oauthV2)){
		
		$gClient->authenticate();
		$_SESSION['token'] = $gClient->getAccessToken();

		if (isset($_SESSION['token'])) {
			$gClient->setAccessToken($_SESSION['token']);
		}
		
		$user_profile = $google_oauthV2->userinfo->get();
	
		$args = array(
			'meta_key'     => 'google_id',
			'meta_value'   => $user_profile['id'],
			'meta_compare' => '=',
		 ); 
		$users = get_users( $args );		
		
		if(is_array($users) && !empty($users)) {
			$ID = $users[0]->data->ID;
		} else {
			$ID = NULL;
		}

		if ($ID == NULL) {
						
			if (!isset($user_profile['email'])) {
				$user_profile['email'] = $user_profile['id'] . '@gmail.com';
			}
					
			$random_password = wp_generate_password($length = 12, $include_standard_special_chars = false);
			
			$username = strtolower($user_profile['name']);
			$username = trim(str_replace(' ', '', $username));
			
			$sanitized_user_login = sanitize_user('google-'.$username);
			
			if (!validate_username($sanitized_user_login)) {
				$sanitized_user_login = sanitize_user('google-' . $user_profile['id']);
			}
			
			$defaul_user_name = $sanitized_user_login;
			$i = 1;
			while (username_exists($sanitized_user_login)) {
			  $sanitized_user_login = $defaul_user_name . $i;
			  $i++;
			}
			
			$ID = wp_create_user($sanitized_user_login, $random_password, $user_profile['email']);

			if (!is_wp_error($ID)) {
				
				wp_new_user_notification($ID, $random_password);
				$user_info = get_userdata($ID);
				wp_update_user(array(
					'ID' => $ID,
					'display_name' => $user_profile['name'],
					'first_name' => $user_profile['name'],
				));
				
				update_user_meta($ID, 'google_id', $user_profile['id']);
			
			}
			
		}
		
		// Login
		if ($ID) { 

		  $secure_cookie = is_ssl();
		  $secure_cookie = apply_filters('secure_signon_cookie', $secure_cookie, array());
		  global $auth_secure_cookie;

		  $auth_secure_cookie = $secure_cookie;
		  wp_set_auth_cookie($ID, false, $secure_cookie);
		  $user_info = get_userdata($ID);
		  update_user_meta($ID, 'google_profile_picture', $user_profile['picture']);
		  do_action('wp_login', $user_info->user_login, $user_info, 10, 2);
		  update_user_meta($ID, 'google_user_access_token', $_SESSION['token']);
		  
		  wp_redirect(esc_url(home_url('/')));

		}
		
	} else {
		
		$authUrl = $gClient->createAuthUrl();
		header('Location: ' . $authUrl);
		exit;
		
	}
	
}

?>