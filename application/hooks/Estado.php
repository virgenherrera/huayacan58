<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estado
{		
	
	function idiomas()
	{	
		$CI =& get_instance();
		if($CI->uri->segment(1)!='api'){
			$lang = $CI->session->userdata('idiom');
			
			$page = uri_string();
			if(empty($lang))
			{
				$lang = "spanish";
				$CI->session->set_userdata(array('idiom'=>$lang));
			}
			
			$CI->lang->load('home', $lang);
			
			$langs = ['quienes_somos','nuestros_favoritos','ver_proyectos','descubrir','comenzar','como_funciona','quienes_somos_text1','quienes','somos','galeria','socios'];
			foreach($langs as $lang){
				$CI->lang_system[$lang] = $CI->lang->line($lang);
			}
			if(!isset($_POST)){
				if('home/lang/spanish' != $page && 'home/lang/english' != $page){
					$CI->session->userdata['page'] = uri_string();
					
				}
			}
			if (!isset($CI->session->userdata['userx'])) { 
				if($page != "iniciar" && $page != "iniciar/login" && $page != "login/logout"){
					redirect( 'iniciar' );
				}
			}
		}		
	}
}