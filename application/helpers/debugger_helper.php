<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('deveritas_archivo')){
	function deveritas_archivo($file_path=FALSE,$writable=FALSE){
		if(is_string($file_path)&&$writable===FALSE){
			$msg = (file_exists($file_path)&&is_file($file_path)&&!is_dir($file_path))?TRUE:FALSE;
		}
		elseif(is_string($file_path)&&$writable!==FALSE){
			$msg = (file_exists($file_path)&&is_writable($file_path)&&is_file($file_path)&&!is_dir($file_path))?TRUE:FALSE;
		}
		else{
			$msg = FALSE;
		}
		return $msg;
	}
}

if(!function_exists('deveritas_carpeta')){
	function deveritas_carpeta($folder_path=NULL){
		if(!is_null($folder_path)){
			return  (
						is_dir(str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']).$folder_path) AND 
						!is_file(str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']).$folder_path)
					)
					?TRUE:FALSE;
		}
		else FALSE;
	}
}

if(!function_exists('print_array')){
	function print_array($data,$die=false){
		echo "<pre>";
		var_dump($data);
		echo "</pre><br>";
		if($die){
			die();
		}
	}
}

if (!function_exists('no_acentos')) {
	function no_acentos($String){
		$String = str_replace(array('á','à','â','ã','ª','ä'),"a",$String);
		$String = str_replace(array('Á','À','Â','Ã','Ä'),"A",$String);
		$String = str_replace(array('Í','Ì','Î','Ï'),"I",$String);
		$String = str_replace(array('í','ì','î','ï'),"i",$String);
		$String = str_replace(array('é','è','ê','ë'),"e",$String);
		$String = str_replace(array('É','È','Ê','Ë'),"E",$String);
		$String = str_replace(array('ó','ò','ô','õ','ö','º'),"o",$String);
		$String = str_replace(array('Ó','Ò','Ô','Õ','Ö'),"O",$String);
		$String = str_replace(array('ú','ù','û','ü'),"u",$String);
		$String = str_replace(array('Ú','Ù','Û','Ü'),"U",$String);
		$String = str_replace(array('[','^','´','`','¨','~',']'),"",$String);
		$String = str_replace("ç","c",$String);
		$String = str_replace("Ç","C",$String);
		$String = str_replace("ñ","n",$String);
		$String = str_replace("Ñ","N",$String);
		$String = str_replace("Ý","Y",$String);
		$String = str_replace("ý","y",$String);
		 
		$String = str_replace("&aacute;","a",$String);
		$String = str_replace("&Aacute;","A",$String);
		$String = str_replace("&eacute;","e",$String);
		$String = str_replace("&Eacute;","E",$String);
		$String = str_replace("&iacute;","i",$String);
		$String = str_replace("&Iacute;","I",$String);
		$String = str_replace("&oacute;","o",$String);
		$String = str_replace("&Oacute;","O",$String);
		$String = str_replace("&uacute;","u",$String);
		$String = str_replace("&Uacute;","U",$String);
		return $String;
	}
}

/* End of file debugger_helper.php */
/* Location: ./application/helpers/debugger_helper.php */