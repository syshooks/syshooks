<?php

class WooCommerceHook{

	private $_api_id = "2_20152_HT57ms0E7";
	private $_api_key = "gI1CIAJi25FBAlr";

	public function __construct(){

	}
}

		// Include the client library
		require_once 'resources/rest-api/class-wc-api-client.php';
		 
		$consumer_key = 'ck_03f48e6b6c339087abba496bdd2408e4'; // Add your own Consumer Key here
		$consumer_secret = 'cs_ccdd979344604bddf97c296d554aaebc'; // Add your own Consumer Secret here
		$store_url = 'http://syshooks.affcntr.com/'; // Add the home URL to the store you want to connect to here
		 
		// Initialize the class
		$wc_api = new WC_API_Client( $consumer_key, $consumer_secret, $store_url );

		$index = $wc_api->get_index();


		// Output the order object retrieved from the API
		print_r( $wc_api->get_orders( array() ) );