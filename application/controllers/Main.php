<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index($enviado=NULL){

		$this->load->library('dom');

		$this->load->helper('file');

		$aboutGal	=	get_filenames('./public/fotos');
		
		$elementos = $this->setCaracteristicas()['carElems'];
		shuffle( $elementos );
		
		$contactD = [	'slider'		=> $aboutGal,
						'ImagenP' 		=>	'/public/IMG_4489.jpg',
						'headertitulo'		=>	'Huayacan 58',
						'headersubtitulo'	=>	'una oportunidad <span class="text-primary">de hacer negocios</span>',
						'abouttitle'		=>	'Requisitos para Arrendar',
						'aboutp'			=>	$this->setAboutp(),
						'aboutp2'	=>	'Al llenar la forma, un agente se comunicará con usted para agendar una cita dentro de las siguientes 8 horas hábiles.',
						'aboutGal'	=>	$aboutGal,
						'titulo'=>'¿Tienes preguntas?',
						'parrafo'=>self::parrafo(),
						'nombre'=>'Huayacan58',
						'carTitle' 	=>	$this->setCaracteristicas()['carTitle'],
						'carP' 		=>	$this->setCaracteristicas()['carP'],
						'carFiltros'=>	$this->setCaracteristicas()['carFiltros'],
						'carElems'	=>	$elementos,
						'enviado'	=>	(!is_null($enviado))?TRUE:FALSE,
					];

		$this->dom->title = base_url();

		$this->dom->navbar = [ 'v' => ['huayacan/navbar'] ];

		$this->dom->content = [ 'v' => ['huayacan/header',$contactD] ];

		$this->dom->content = [ 'v' => ['huayacan/description'] ];

		$this->dom->content = [ 'v' => ['huayacan/mapa'] ];

		$this->dom->content = [ 'v' => ['huayacan/contacto'] ];

		$this->dom->content = [ 'v' => ['huayacan/caracteristicas'] ];

		$this->dom->render();
	}

	public function mail(){
		if( count($this->input->post()) > 0){
			$post = $this->input->post();

			$post['propio'] 	=	(isset($post['propio']))?$this->unRadio($post['propio']):'NO';
			$post['franquicia'] =	(isset($post['franquicia']))?$this->unRadio($post['franquicia']):'NO';
			$post['sucursales'] =	(isset($post['sucursales']))?$this->unRadio($post['sucursales']):'NO';

			$post['nombreAgente']	= (isset($post['nombreAgente']))?$post['nombreAgente']:'No aplica';
			$post['telAgente']		= (isset($post['telAgente']))?$post['telAgente']:'No aplica';
			$post['emailAgente']	= (isset($post['emailAgente']))?$post['emailAgente']:'No aplica';

			$data = [
				'intro'	=> ucfirst('huayacan58').' Email enviado desde: '.base_url(),
				'h1'	=> ucfirst('huayacan58'),
				'p'	=> 'Email enviado desde: '.base_url(),

				'negocioTitle'	=>	'Datos del negocio',
				'negocioP'		=>	'Nombre: '.$post['nombreNegocio'].'<br>'.
									'Giro: '.$post['giroNegocio'].'<br>'.
									'Interesado en: <br>' . $this->parseLocales( $post['locales'] ).'<br>'.
									'es Propio: '.$post['propio'].'<br>'.
									'es Franquicia: '.$post['franquicia'].'<br>'.
									'tiene Sucursales: '.$post['sucursales'].'<br>',

				'agenteTitle'=>	'Datos del Agente',
				'agenteP'	=>	'nombre: '.$post['nombreAgente'].'<br>'.
								'tel: '.$post['telAgente'].'<br>'.
								'email: <a target="_blank" href="mailto:'.$post['emailAgente'].'">'.$post['emailAgente'].'</a><br>',
				'interesadoTitle'	=>	'Datos del interesado',

				'interesadoP'	=>	'nombre: '.$post['interesado'].'<br>'.
									'telefono: '.$post['telefono'].'<br>'.
									'email : <a target="_blank" href="mailto:'.$post['email'].'">'.$post['email'].'</a><br>',
			];

			$mensaje = $this->load->view('email/mensaje', $data, TRUE);

			if( $this->mailer('info@huayacan58.com','Huayacan58.com',$mensaje) ){
				redirect(base_url('enviado#contacto'),'refresh');
			}
			else{
				print_array( $this->mailer('info@huayacan58.com','Huayacan58.com',$mensaje) ,1 ); // <Ojo no dejar en produccion
			}
		}
		else {
			redirect(base_url(),'refresh');
		}
	}

	protected function setCaracteristicas(){
		return	[
			'carTitle'		=>	'Ventajas de Huayacan58',
			'carP'			=>	'En la zona de mayor crecimiento y plusvalía de Cancún, rodeada de los siguientes desarrollos habitacionales, En un perímetro de 3 kilómetros a la redonda se encuentra la concentración de los Colegios Particulares mas importantes de la zona',
			'carFiltros'	=>	['residenciales','colegios','ciclopista','vialidades'],
			'carElems'		=>	[
				[
					'class'		=>	'residenciales',
					'img'		=>	'cumbres.png',
					'name'		=>	'CUMBRES',
					'p'			=>	'cuenta con 986 lotes unifamiliares, 5 lotes condominiales, se calcula una densidad de población aproximadamente de 4600 habitantes. Actualmente hay un 75% de esta población.',
				],
				[
					'class'		=>	'residenciales',
					'img'		=>	'palmaris.jpg',
					'name'		=>	'PALMARIS',
					'p'			=>	'cuenta con 330 lotes unifamiliares y 5 lotes condominales, se calcula una densidad de 2,300 habitantes (actualmente hay un 80% de esta población)',
				],
				[
					'class'		=>	'residenciales',
					'img'		=>	'aqua.jpg',
					'name'		=>	'AQUA',
					'p'			=>	'cuenta con 1700 lotes unifamiliares y 11 lotes condominales en su interior, espera recibir una densidad de 7,900 habitantes.',
				],
				[
					'class'		=>	'residenciales',
					'img'		=>	'aqua.jpg',
					'name'		=>	'AQUA',
					'p'			=>	'cuenta con 1000 lotes unifamiliares y 25 lotes condominales espera recibir 5,200 habitantes, actualmente hay un 30% habitado.',
				],
				[
					'class'		=>	'colegios',
					'img'		=>	'colegio.jpg',
					'name'		=>	'Colegio Cumbres',
					'p'			=>	'',
				],
				[
					'class'		=>	'colegios',
					'img'		=>	'colegio.jpg',
					'name'		=>	'Colegio Diuni',
					'p'			=>	'',
				],
				[
					'class'		=>	'colegios',
					'img'		=>	'colegio.jpg',
					'name'		=>	'Colegio Alamos',
					'p'			=>	'',
				],
				[
					'class'		=>	'colegios',
					'img'		=>	'colegio.jpg',
					'name'		=>	'Colegio Blum',
					'p'			=>	'',
				],
				[
					'class'		=>	'colegios',
					'img'		=>	'colegio.jpg',
					'name'		=>	'Colegio Alexandre',
					'p'			=>	'',
				],
				[
					'class'		=>	'colegios',
					'img'		=>	'colegio.jpg',
					'name'		=>	'Colegio Mérida',
					'p'			=>	'',
				],
				[
					'class'		=>	'colegios',
					'img'		=>	'colegio.jpg',
					'name'		=>	'Colegio CES e IAS',
					'p'			=>	'',
				],
				[
					'class'		=>	'ciclopista',
					'img'		=>	'ciclopista.jpg',
					'name'		=>	'ciclopista Huayacan',
					'p'			=>	'Actualmente en la Av. Huayacan se construye la ciclopista con mayor cobertura dentro de la ciudad de Cancún.',
				],
				[
					'class'		=>	'vialidades',
					'img'		=>	'huayacan.jpg',
					'name'		=>	'Avenida Huayacan',
					'p'			=>	'Esta avenida comunica el Centro de Cancún con la salida a la Carretera de Cancún a Mérida, es una avenida alterna para salir de Cancún hacia Playa del Carmen y la Riviera Maya.',
				],
			],
		];
	}

	protected function setAboutp(){
		$aboutp	=	
		'
		<dl>
		<dt>Persona física:</dt>
		<dd>Comprobante de ingresos.</dd>
		<dd>Buró de crédito sin deudas.</dd>
		<dd>Fiador o fianza.</dd>
		<dd>Comprobante de domicilio vigente.</dd>
		<dd>Identificación</dd>
		<dd>3 Referencias personales.</dd>
		</dl>
		';

		$aboutp .=
		'
		<dl>
		<dt>Persona moral:</dt>
		<dd>Acta constitutiva</dd>
		<dd>Identificación de Representante Legal.</dd>
		<dd>Comprobante de domicilio de la empresa y del representante legal.</dd>
		<dd>Ultima declaración anual.</dd>
		<dd>Ultimo estado de cuenta.</dd>
		<dd>Fiador o fianza.</dd>
		<dd>3 referencias comerciales.</dd>
		</dl>
		';
		return $aboutp;
	}

	protected function unRadio($radio){
		if($radio==='1'){
			return 'Sí';
		}
		elseif($radio==='2'){
			return 'No';
		}
		else{
			return 'N/A';
		}
	}

	protected function parseLocales($locales=NULL){
		if(!is_null($locales)){
			$msg = '';
			foreach($locales as $local){
				$texto	=	( (substr($local, -1)==1) || (substr($local, -1)==4) )?
								substr($local, -1).'</strong>, '.' 90m&sup2; + terraza 24m&sup2;, <br>':
									substr($local, -1).'</strong>, '.' 90m&sup2;, <br>';
				$msg .= '*' . ucfirst(substr($local, 0, -1)) . ' <strong>' . $texto;
			}
			return $msg;
		}
		else{ return ''; }
	}

	protected function mailer($to,$asunto,$msg){
		$this->load->library('email');

		$config['protocol']		=	'smtp';
		$config['smtp_host']	=	'ssl://smtp.gmail.com';
		$config['smtp_port']	=	'465';
		$config['smtp_timeout']	=	'7';
		$config['smtp_user']	=	'virgenherrera@ramsal.com';
		$config['smtp_pass']	=	'HugoEnrique86';
		$config['charset']		=	'utf-8';
		$config['newline']		=	"\r\n";
		$config['mailtype']		=	'html'; // or text
		$config['validation']	=	TRUE; // bool whether to validate email or not
		$config['priority']		=	1;

		$this->email->initialize($config);

		$this->email->from('virgenherrera@ramsal.com', 'Huayacan58');
		$this->email->to($to);

		$this->email->subject($asunto);
		$this->email->message($msg);

		if( !$this->email->send() ){
			return $this->email->print_debugger();
		}
		else{
			return TRUE;
		}
	}

	private function parrafo(){
		return
		'
		Nosotros  tenemos las respuestas. <br>
		Sólo tienes que enviar un mensaje y nuestro personal estará en contacto con usted dentro de las proximas 8 horas hábiles.
		';
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */