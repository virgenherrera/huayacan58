<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dom{
								//======================================================================================//
	//class properties 			//		Value types
	protected $ci;				//	Codeigniter superobject
	protected $Inaccesibles = [
		'ci'
	];
	protected $domConfig;		//	info from cfg/dom.php
	protected $Layout;			//	info of the selected layout to render

	//head 								valores recibidos
	protected $title;			//	string
	protected $meta;			//	path,string,array
	protected $headLink;		//	path,string,array
	protected $headScript;		//	path,string,array
	protected $NoScript;		//	path,string,array

	//body
	protected $navbar;			//	function,path,string 		//autocargada __construct>navbarDefault()
	protected $content;			//	path,string,array
	protected $modal;			//	path,string,array
	protected $postStylesheet;	//	path,string,array
	protected $postScript;		//	path,string,array
								//======================================================================================//

	protected $integratedDom;

	// Metodos magicos --------------------------------------------------------------------------------------------------//
	public function __construct(){
		//ir por una instancia de CI
		$this->ci =& get_instance();

		//get/set class cfg
		$this->ci->config->load('dom');
		$this->domConfig = $this->ci->config->item('dom');

		//load default first layout's config
		self::loadDefaults( array_keys($this->domConfig)[0] );
	}

	//getter magico
	public function __get($propiedad){
		if( property_exists($this, $propiedad) AND !in_array($propiedad, $this->Inaccesibles) ){
			return $this->{$propiedad};
		}
	}

	//setter magico
	public function __set( $propiedad, $valor ){
		self::contentManager( $propiedad, $valor );
	}

	// -------------------------------------------------------------------------------------------------- Metodos magicos//

	// class Methods ----------------------------------------------------------------------------------------------------//
	public function loadDefaults($layout=NULL){
		if( !is_null($layout) ){
			//cargar valores x default
			foreach($this->domConfig[$layout] as $key => $value) {
				self::__set( $key , $value );
			}
			//indicar el layout que será usado
			self::__set( 'Layout' , $layout );
		}
	}

	protected function contentManager( $propiedad=NULL, $params=NULL ){
		// PRIMERO: prevenir ejecucion x default
		if( !is_null($propiedad) AND !is_null($params) ){
			//SEGUNDO: existe la propiedad y es accesible?
			if( property_exists($this, $propiedad) AND !in_array($propiedad, $this->Inaccesibles) ){
				//TERCERO: es string O...?
				if( is_string($params) ){
					$this->{$propiedad} .= $params;
				}
				//CUARTO: ...es array?
				elseif( is_array($params) ){
					//QUINTO: que clase de arreglo es?
					if( in_array(array_keys($params)[0], ['view','v','vista']) ){
						//SEXTO-A una view
						$this->{$propiedad} .= self::loadGetView( $params[array_keys($params)[0]] );
					}
					elseif( in_array(array_keys($params)[0], ['library','lib','l']) ){
						//SEXTO-B una libreria
						$this->{$propiedad} .= self::loadGetLibrary( $params[array_keys($params)[0]] );
					}
					elseif( in_array(array_keys($params)[0], ['string','cadena','str','s']) ){
						//SEXTO-C //varias cadenas
						$this->{$propiedad} .= implode(' ', $params[array_keys($params)[0]]);
					}
				}
			}
		}
	} //fin contentManager

	protected function loadGetLibrary($params){
		//contar params y asignar valor
		if( count( $params ) === 3 ){
			//asignar valores
			$libreria	=	$params[0];
			$metodo		=	$params[1];
			$metParams	=	$params[2];
			//existe la lib?
			if( deveritas_archivo( APPPATH.'libraries/'.ucfirst($libreria).'.php' ) ){
				//cargar libreria
				$this->ci->load->library($libreria);
				//existe el metodo?
				if( method_exists($this->ci->{$libreria}, $metodo) ){
					//si existe el metodo ejecutalo llamando parametros
					return $this->ci->{$libreria}->{$metodo}($metParams);
				}
			}
		}
		//si solo son 2 params
		elseif( count( $params ) === 2 ){
			//asignar valores
			$libreria	=	$params[0];
			$metodo		=	$params[1];
			//existe la lib?
			if( deveritas_archivo( APPPATH.'libraries/'.ucfirst($libreria).'.php' ) ){
				//cargar libreria
				$this->ci->load->library($libreria);
				//existe el metodo?
				if( method_exists($this->ci->{$libreria}, $metodo) ){
					//si existe el metodo ejecutalo llamando parametros
					return $this->ci->{$libreria}->{$metodo}();
				}
			}
		}
	} //Fin loadGetLibrary

	protected function loadGetView($params){
		//contar params
		if( count( $params ) === 2 ){
			//asignar vars
			$path 		= 	$params[0];
			$viewParams =	$params[1];
			//existe la view?
			if(  deveritas_archivo( VIEWPATH . $path . '.php' ) ){
				//llamar-pasarparams-retornar
				return $this->ci->load->view($path,$viewParams,TRUE);
			}
		}
		elseif( count( $params ) === 1 ){
			//asignar vars
			$path 		= 	$params[0];
			//existe la view?
			if(  deveritas_archivo( VIEWPATH . $path . '.php' ) ){
				//llamar-pasarparams-retornar
				return $this->ci->load->view($path,[],TRUE);
			}
		}
	} //Fin LoadGetView

	public function render(){
		//validar que exista la view seleccionada
		if( deveritas_archivo(VIEWPATH . 'dom/'. $this->Layout.'/'.$this->Layout .'.php') ){
			$this->ci->load->view('dom/'. $this->Layout.'/'.$this->Layout,[
				'public'		=> '/public/',

				'title'			=>	$this->title,
				'meta'			=>	$this->meta . "\n",
				'headLink'		=>	$this->headLink . "\n",
				'headScript'	=>	$this->headScript . "\n",
				'NoScript'		=>	$this->NoScript . "\n",
				'navbar'		=>	$this->navbar . "\n",
				'content'		=>	$this->content . "\n",
				'modal'			=>	$this->modal . "\n",
				'postStylesheet'=>	$this->postStylesheet . "\n",
				'postScript'	=>	$this->postScript . "\n",
			]);
		}
		else{
			//sino tirar error fatal :/
			echo '<h1>ERROR fatal, no se encuentra el layout: '. $this->Layout .'</h1>';
			echo '<h2>reconfigura para que se encuentre en:</h2>';
			echo '<h3>VIEWPATH/dom/{nombreLayout}/{nombreLayout}.php</h3>';
			die();
		}
	}
	//------------------------------------------------------------------------------------------------- End class Methods//
}

/* End of file Dom.php */
/* Location: ./application/libraries/Dom.php */
/*
//simple string
title
meta

//ligas externas a archivos
headLink
headScript
NoScript
postStylesheet
postScript

//str/lib/view
navbar
content
modal
*/