<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {
               
	function __construct(){
 		parent::__construct();

 		
 	/*	print_array([
 			'Controlador'	=>	$this->router->class,
 			'Metodo'		=>	$this->router->method,
 			'ruriString'	=>	$this->uri->ruri_string(),
 			'session'		=>	$this->session,
 			],1);*/
 		

 		//Manejar ACL ===========================================================================================//
 		//cargar la configuracion y guardarla en $aclConfig
 		//definir mensajes de error
 		$noDefinido =  'No existen permisos declarados en la seccion a la que intentabas ir'; // Para permisos sin definir
 		$noPermisos = 'No posees permiso para ver a la seccion que intentabas acceder'; //Para acceso prohibido
 		
 		$error404 = (is_string( strstr($this->uri->ruri_string(), 'Oops') ))?TRUE:FALSE;
 		$permalinksIgnore = (EXISTE_PROYECTO===TRUE OR EXISTE_SOCIO===TRUE)?TRUE:FALSE;
 		$this->config->load('acl');
 		$aclConfig = $this->config->item('acl');
 		$perfiles =	[
 						'Admin'		=>	'e3afed0047b08059d0fada10f400c1e5',
 						'Socio'		=>	'0ff0a8d2c754fcbc2ec438e13fb43486',
 						'Usuario'	=>	'a5ae0861febff1aeefb6d5b759d904a6',
 						'Publico'	=>	'9b673ccad572aef72c8055bb261b3e25',
 					];
 		$revPerfiles = FALSE;
 		foreach($perfiles as $key => $value){ $revPerfiles[$value] = $key; }

 		$permisos = (isset($aclConfig[$this->router->class][$this->router->method]))?
 						$aclConfig[$this->router->class][$this->router->method]:
 							NULL;
 		$datos = (!is_null($this->session->fondeA))?explode('-fondea', $this->session->fondeA):FALSE;
 		//print_array($this->session,1);
 		//al llegar no hay datos sobre sesion entonces... setear el rol a Publico
 		if( $datos !== FALSE ){
 			if($datos[1] === $perfiles['Publico'] AND $this->session->has_userdata('Loggeado')){
 				if( $this->session->Loggeado['profile'] === 'admin' ){
 					//si hay sesion y su´perfil es admin
 					$this->session->set_userdata('fondeA', 'ChuckNorris-fondea'. $perfiles['Admin']);
 				}
 				elseif( $this->session->Loggeado['es_socio'] == '2' ){
 					//si es socio asignarle rol de socio
 					$this->session->set_userdata('fondeA', $this->session->Loggeado['id_user']. '-fondea'. $perfiles['Socio']);
 				}
 				elseif( $this->session->Loggeado['es_socio'] != '2' ){
 					//si hay sesion y no es socio entonces debe ser Usuario
 					$this->session->set_userdata('fondeA', $this->session->Loggeado['id_user']. '-fondea'. $perfiles['Usuario']);
 				}
 			}
 		}
 		else{
 			$this->session->set_userdata('fondeA', '0-fondea'.$perfiles['Publico']);
 		}

 		if(!$error404 OR !$permalinksIgnore){
 			//una vez agignados los roles procesar el acl
 			if( is_null( $permisos ) ){
 				//si no han sido declarados los permisos para esa seccion
 				/*
 				$this->session->set_flashdata('acl',
 					'<div class="alert alert-danger fade in">
 					<a id="menu_item_4" href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 					<small>
 						<strong>' . $noDefinido . '</strong>
 					</small>
 				</div>');
 				*/
 				redirect(base_url(),'refresh');
 			}
 			elseif(is_null($revPerfiles[$datos[1]])){
 				redirect( base_url() ,'refresh');
 			}
 			elseif( !in_array($revPerfiles[$datos[1]] , $permisos) ){
 				//si no tiene permiso de ver esa seccion
 				/*
 				$this->session->set_flashdata('acl',
 					'<div class="alert alert-danger fade in">
 					<a id="menu_item_4" href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 					<small>
 						<strong>' . $noPermisos . '</strong>
 					</small>
 				</div>');
 				*/ 				
 				redirect(base_url(),'refresh');
 			}
 		}
 		//=========================================================================================== Manejar ACL//
	}	
}
?>