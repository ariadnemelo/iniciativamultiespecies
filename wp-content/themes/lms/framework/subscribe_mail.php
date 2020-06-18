<?php
	$url = dirname( __FILE__ );
	$strpos = strpos( $url, 'wp-content' );
	$base = substr( $url, 0, $strpos );
	
	require_once( $base .'wp-load.php' );
	
	if(!$_POST) exit;
	
	$to 	  = $_POST['hid_adminemail']; #Replace your email id...
	$dtfullname	  = utf8_decode(urldecode($_POST['dtfullname']));
	$dtemail    = $_POST['dtemail'];
	$dtcourse    = utf8_decode(urldecode($_POST['dtcourse']));
	$subject  = $_POST['hid_subject'];
	$dtdatetimepicker  = isset($_POST['dtdatetimepicker']) ? $_POST['dtdatetimepicker'] : '';
	
	if($dtfullname == '' || $dtemail == '') : 	
		echo "<span class='error-msg'>".esc_html__('Please fill the required fields', 'lms')."</span>";
		exit;
	endif;
	
	$e_subject = $subject;
	
	$msg  = $dtfullname. ' has been subscribed for '.$dtcourse.'\r\n\n';
	if($dtdatetimepicker != '')
		$msg  .= 'He/She planned to visit in person on '.$dtdatetimepicker.'\r\n\n';
	$msg .= "You can contact $dtfullname via email, $dtemail.\r\n\n";
	$msg .= "-------------------------------------------------------------------------------------------\r\n";

	$return = call_user_func( 'wp_mail', $to, $subject, $msg, "From: $dtemail\r\nReturn-Path: $dtemail\r\n" );

							
	if( $return ) {
		echo "<span class='success-msg'>".$_POST['hid_successmsg']."</span>";
	} else {
		echo "<span class='error-msg'>".$_POST['hid_errormsg']."</span>";
	}?>