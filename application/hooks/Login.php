<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login
{		
	
	function checa_login()
	{
		$CI =& get_instance();
		if (!isset($this->session->userdata['userx'])) { 
			redirect( 'iniciar' );
		}			
	}
}