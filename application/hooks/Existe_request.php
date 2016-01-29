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
			$uri_string = filter_var($uri_string,FILTER_SANITIZE_URL);
			$reqSocio = explode('/', $uri_string);
			$reqProyecto = explode('/', str_replace('_', ' ', str_replace('-', ' ', $uri_string)));
			if( $this->existe_proyecto($reqProyecto[0])===1 ){
				define("EXISTE_PROYECTO", TRUE);
				define("EXISTE_SOCIO", FALSE);
			}
			elseif( $this->existe_socio($reqSocio[0])===1 ){
				define("EXISTE_PROYECTO", FALSE);
				define("EXISTE_SOCIO", TRUE);
			}
			else{
				define("EXISTE_PROYECTO", FALSE);
				define("EXISTE_SOCIO", FALSE);
			}
		}else{
			define("EXISTE_PROYECTO", FALSE);
			define("EXISTE_SOCIO", FALSE);
		}
		$this->__destruct();
	}//fin proy_exists

	public function existe_proyecto($Proyecto){
		$conn = new PDO($this->db['dsn'],$this->db['username'],$this->db['password']);
		if(!is_null($conn->errorCode())){
			$this->msg = 'no conn';
		}
		$consulta = $conn->prepare('SELECT "proyecto" FROM proyecto WHERE proyecto = ? and proyecto_status = 1',[PDO::ATTR_PERSISTENT => FALSE]);
		$consulta->execute([$Proyecto]);
		return $consulta->rowCount();
	}//fin existe proy

	public function existe_socio($Socio){
		$conn = new PDO($this->db['dsn'],$this->db['username'],$this->db['password']);
		if(!is_null($conn->errorCode())){
			$this->msg = 'no conn';
		}
		$consulta = $conn->prepare('SELECT "socio_url" FROM user WHERE socio_url = ? AND es_socio = 2',[PDO::ATTR_PERSISTENT => FALSE]);
		$consulta->execute([$Socio]);
		return $consulta->rowCount();
	}//fin existe proy

	public function __destruct(){
		$this->msg = NULL;
		$this->db = NULL;
	}
}