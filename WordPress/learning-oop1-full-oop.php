<?php
/*
Plugin Name: My Subscription Form
Plugin URI: http://danielpataki.com
Description: An OOP based project for WPMU DEV
Author: Daniel Pataki
Author URI: http://danielpataki.com
Version: 1.0.0
*/
$config = array(
	'api_key' => 'cd64539dd19283cdcc637f2ccddcd45-us6'
);
class MySubscriptionForm {
	var $api_key;
	function __construct( $config ) {
		$this->api_key = $config['api_key'];
		add_filter( 'the_content', array( $this, 'form' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );
		add_action( 'wp_ajax_msf_form_submit', array( $this, 'submissionHandler' ) );
		add_action( 'wp_ajax_nopriv_msf_form_submit', array( $this, 'submissionHandler' ) );
	}
	function form( $content ) {
		if( ! is_singular() ) {
			return $content;
		}
		wp_enqueue_style( 'msf-style' );
		$nonce_field = wp_nonce_field( 'msf_form_submit', 'msf_nonce', true, false );
		if( !empty( $_GET['msf_success'] ) ) {
			$msf_display = '<div class="msf-success">Thanks for subscribing</div>';
		}
		else {
			$msf_display = '
				<h4>Get Free Awesome!</h4>
			    <form method="post" class="msf-form" action="' . admin_url( 'admin-ajax.php' ) . '">
			        <input type="email" required="required" name="email">
			        <input type="submit" value="Subscribe Now">
					<input type="text" name="name">
					<input type="hidden" name="action" value="msf_form_submit">
			        ' . $nonce_field . '
			    </form>
			';
		}
		return $content . $msf_display;
	}
	function assets() {
		wp_register_style( 'msf-style', plugin_dir_url( __FILE__ ) . 'msf-styles.css' );
	}
	function submissionHandler() {
		if ( !empty( $_POST['name'] ) || !isset( $_POST['msf_nonce'] ) || ! wp_verify_nonce( $_POST['msf_nonce'], 'msf_form_submit' )
	) {
		die();
		return;
	}
	    wp_remote_post('https://us6.api.mailchimp.com/3.0/lists/bbcd6546db/members', array(
	        'headers' => array(
	            'Authorization' => 'Basic ' . base64_encode( 'mywebsite' . ':' . $this->api_key ),
	            'Content-Type' => 'application/json'
	        ),
	        'body' => json_encode( array(
	            'email_address' => $_POST['email'],
	            'status' => 'subscribed'
	        ))
	    ));
		$url = add_query_arg( 'msf_success', 'true', $_SERVER['HTTP_REFERER'] );
		wp_redirect( $url );
		die();
	}
}
new MySubscriptionForm( $config );