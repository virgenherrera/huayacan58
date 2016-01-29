<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------
if(base_url() !== 'http://localhost/fondea/'){
	$face_id   = '902448513158429';
	$face_secret  = '97c98b9b9069c574f7a471957bfcbe82';

}else{
	$face_id   = '1608366466096582';
	$face_secret  = '42c5ef75934929a2f5792800bfbaeda8';
}
$config =
	array(
		// set on "base_url" the relative url that point to HybridAuth Endpoint
		'base_url' => '/hauth/endpoint',

		"providers" => array (
			// openid providers
			"OpenID" => array (
				"enabled" => false
			),

			"Yahoo" => array (
				"enabled" => false,
				"keys"    => array ( "id" => "", "secret" => "" ),
			),

			"AOL"  => array (
				"enabled" => true
			),

			"Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "692276029568-gvjo5l9t4hep13r2sa8j75n7nn81trju.apps.googleusercontent.com", "secret" => "BZS-C-NTTVWoEhkhk5yo6vUn" ),
			),

			"Facebook" => array (
				"enabled" => true,
				"keys"    => array ( "id" => $face_id, "secret" => $face_secret ),
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "08Iichhvx7fGoepqvGo2xgXpp", "secret" => "bbddkMSmpUdBGdjc9a3AvaCAKn4D4qLrlDNL1oIr6bxooC8Jrg" )
			),

			// windows live
			"Live" => array (
				"enabled" => false,
				"keys"    => array ( "id" => "", "secret" => "" )
			),

			"MySpace" => array (
				"enabled" => false,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			"LinkedIn" => array (
				"enabled" => false,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			"Foursquare" => array (
				"enabled" => false,
				"keys"    => array ( "id" => "", "secret" => "" )
			),
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => (ENVIRONMENT == 'development'),

		"debug_file" => APPPATH.'/logs/hybridauth.log',
	);


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */