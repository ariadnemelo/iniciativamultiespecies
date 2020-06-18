<?php require_once("../../../../wp-load.php"); ?>
<?php

	$dtLMSAjaxNonce = $_REQUEST['dtLMSAjaxNonce'];
	if(!isset($dtLMSAjaxNonce) || !wp_verify_nonce($dtLMSAjaxNonce, 'dtLMSAjaxNonce')) {
		echo '<div class="dt-sc-info-box">'.esc_html__('Ajax token missing!', 'lms').'</div>';
		exit();
	}

	$paymenttype = $_REQUEST['paymenttype'];
	$level = $_REQUEST['level'];
	$description = $_REQUEST['description'];
	$currency = $_REQUEST['currency'];
	$price = $_REQUEST['price'];
	$period = $_REQUEST['period'];
	$term = $_REQUEST['term'];
	$cbproductno = $_REQUEST['cbproductno'];
	$cbskin = $_REQUEST['cbskin'];
	$cbflowid = $_REQUEST['cbflowid'];

	$http_host = '';
	if( function_exists( 'dt_server_variable' )  ) {

		$http_host = dt_server_variable( 'HTTP_HOST' );
	}

	
	$payment_url = '';
	
	if($paymenttype == 'stripe') {
		
		$payment_url = do_shortcode('[s2Member-Pro-Stripe-Form level="'.$level.'" desc="'.$description.'" cc="'.$currency.'" custom="'.$http_host.'" ra="'.$price.'" rp="'.$period.'" rt="'.$term.'" rr="BN" /]');
		
	} else if($paymenttype == 'authnet') {
		
		$payment_url = do_shortcode('[s2Member-Pro-AuthNet-Form level="'.$level.'" desc="'.$description.'" cc="'.$currency.'" custom="'.$http_host.'" ra="'.$price.'" rp="'.$period.'" rt="'.$term.'" rr="BN" /]');
		
	} else if($paymenttype == 'clickbank') {
		
		$cb_productno = dttheme_option('dt_course','s2member-cb-productno');
		$cb_skin = dttheme_option('dt_course','s2member-cb-skin');
		$cb_flowid = dttheme_option('dt_course','s2member-cb-flowid');
		
		$payment_url = do_shortcode('[s2Member-Pro-ClickBank-Button cbp="'.$cb_productno.'" cbskin="'.$cb_skin.'" cbfid="'.$cb_flowid.'" cbur="" cbf="auto" level="'.$level.'" desc="'.$description.'" custom="'.$http_host.'" rp="'.$period.'" rt="'.$term.'" rr="0" image="default" output="anchor" /]');
		
	} else if($paymenttype == 'paypal') {
		
		$payment_url = do_shortcode('[s2Member-Pro-PayPal-Form level="'.$level.'" desc="'.$description.'" ps="paypal" lc="" cc="'.$currency.'" dg="0" ns="1" custom="'.$http_host.'" ra="'.$price.'" rp="'.$period.'" rt="'.$term.'" rr="BN" rrt="" rra="2" image="" output="url"/]');
	
	} else if($paymenttype == 'paypal-default') {
		
		$payment_url = do_shortcode('[s2Member-PayPal-Button level="'.$level.'" desc="'.$description.'" ps="paypal" lc="" cc="'.$currency.'" dg="0" ns="1" custom="'.$http_host.'" ra="'.$price.'" rp="'.$period.'" rt="'.$term.'" rr="BN" rrt="" rra="1" image="" output="url"/]');
		
	}

	if( $payment_url != '' ) {

		echo "{$payment_url}";
	}
?>