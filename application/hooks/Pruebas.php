<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Existe_request{		
	private $msg;
	private $db;

	public function __construct(){
		if(file_exists(APPPATH.'config/database.php')){
			include_once APPPATH."config/database.php";
			$this->db = $db[$active_group];
		}
		else{
			$this->db = FALSE;
		}
	}

	public function proy_exists(){
		$uri_string = substr($_SERVER['QUERY_STRING'], 1);
		if( is_string($uri_string) ){
			$uri_string = str_replace('-', ' ', filter_var($uri_string,FILTER_SANITIZE_URL));
			$uri_string = str_replace('_',' ',$uri_string);
			$segmentos_uri = explode('/', $uri_string);
			if( $this->existe_proyecto($segmentos_uri[0])===1 ){
				$this->msg = TRUE;
			}
			else{
				$this->msg = FALSE;
			}
		}else{
			$this->msg = 'no query';
		}
		define("EXISTE_PROYECTO", $this->msg);
	}//fin proy_exists

	public function existe_proyecto($proyecto){
		$conn = new mysqli($this->db['hostname'],$this->db['username'],$this->db['password'],$this->db['database']);
		if($conn->connect_errno){
			$this->msg = 'no conn';
		}
		$consulta = mysqli_query($conn, 'SELECT "proyecto" FROM proyecto WHERE proyecto="'.$proyecto.'"');
		return $consulta->num_rows;
	}
}