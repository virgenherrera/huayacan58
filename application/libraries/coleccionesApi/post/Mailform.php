<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailform{
	protected $ci;

	public function __construct(){
        $this->ci =& get_instance();
	}

	public function index($postParams){
		return [$postParams];
	}

	

}

/* End of file Mailform.php */
/* Location: ./application/libraries/coleccionesApi/post/Mailform.php */
