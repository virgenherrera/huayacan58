<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Fondea_db extends CI_Migration {

	protected $DDI = [
		'asociado'	=>	[
							'id_asociado'		=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
							'user_id'			=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
							'correo_asociado'	=>	['type' => 'VARCHAR', 'constraint' => '50', 'null' => TRUE],
							'token_asociado'	=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'creation_date'		=>	['type' => 'DATETIME', 'null' => TRUE],
							'fin_date'			=>	['type' => 'DATETIME', 'null' => TRUE],
						],
		'categoria'	=>	[
							'id_categoria'			=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
							'categoria'				=>	['type' => 'VARCHAR', 'constraint' => '45', 'null' => TRUE],
							'seo_title'				=>	['type' => 'VARCHAR', 'constraint' => '65', 'null' => TRUE],
							'seo_keywords'			=>	['type' => 'MEDIUMTEXT', 'null' => TRUE],
							'seo_url'				=>	['type' => 'MEDIUMTEXT', 'null' => TRUE],
							'seo_description'		=>	['type' => 'VARCHAR', 'constraint' => '150', 'null' => TRUE],
							'f_alta'				=>	['type' => 'DATE', 'null' => TRUE],
							'u_id_alta'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
							'categoria_id_categoria'=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
							'imagen'				=>	['type' => 'TEXT', 'null' => TRUE],
							'banner'				=>	['type' => 'TEXT', 'null' => TRUE],
							'status'				=>	['type' => 'INT','constraint' => '2', 'null' => TRUE],
						],
		'donaciones'	=>	[
								'id_donacion'			=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
								'proyecto_id_proyecto'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
								'id_usuario'			=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
								'id_donador'			=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
								'id_recompensa'			=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
								'donacion'				=>	[ 'type' => 'VARCHAR', 'constraint' => '255','default'=>'Incompleta', 'null' => TRUE],
								'tx'					=>	[ 'type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
								'st'					=>	[ 'type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
								'amt'					=>	[ 'type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
								'cc'					=>	[ 'type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
								'cm'					=>	[ 'type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
								'sig'					=>	[ 'type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
								'fecha'					=>	[ 'type' => 'TIMESTAMP', 'null' => TRUE],
							],
		/*		Preguntar a richard d 11 cn esta tabla
		'log_proyecto_status'	=>	[
										'id_log_proyecto_status'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
										'status_de'					=>	['type' => 'INT','constraint' => '2','unsigned' => TRUE, 'null' => TRUE],
										'status_a'					=>	['type' => 'INT','constraint' => '2','unsigned' => TRUE, 'null' => TRUE],
										'user_id'					=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
										'mensaje'					=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
										'fecha'						=>	['type' => 'INT','constraint' => '2','unsigned' => TRUE, 'null' => TRUE],
									],
		*/
		'navbar'	=>	[
							'id'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
							'order'				=>	['type' => 'SMALLINT','constraint' => '3','unsigned' => TRUE, 'null' => TRUE],
							'parent_id'			=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
							'label'				=>	['type' => 'VARCHAR', 'constraint' => '60', 'null' => TRUE],
							'route'				=>	['type' => 'VARCHAR', 'constraint' => '60', 'null' => TRUE],
							'have_childrens'	=>	['type' => 'TINYINT','constraint' => '3','unsigned' => TRUE,'default'=>'0', 'null' => TRUE],
						],
		'proyecto'	=>	[
							'id_proyecto'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
							'proyecto'					=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'descripcion'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'monto_recaudar'			=>	['type' => 'DOUBLE', 'null' => TRUE],
							'tiempo_limite'				=>	['type' => 'INT','constraint' => '100', 'null' => TRUE],
							'imagen'					=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'imagen_banner'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'uso_dinero'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'proyecto_nuevo_existente'	=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'existe_avances'			=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'video'						=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'sitio_web'					=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'facebook'					=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'twitter'					=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'pais_id'					=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
							'rol'						=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'fiscal_rfc'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'fiscal_paypal'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'fiscal_razon'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'fiscal_domicilio'			=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'fiscal_comp_deducibles'	=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'pdf'						=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'f_alta'					=>	['type' => 'DATE', 'null' => TRUE],
							'quien_eres'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'de_donde_eres'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'user_id_user'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
							'categoria_id'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
							'proyecto_status'			=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
							'terms_conditions'			=>	['type' => 'INT','constraint' => '2','unsigned' => TRUE, 'null' => TRUE],
							'manega_recompensa'			=>	['type' => 'INT','constraint' => '2','unsigned' => TRUE, 'null' => TRUE],
							'status'					=>	['type' => 'INT','constraint' => '2','unsigned' => TRUE, 'null' => TRUE],
							'asociado_id'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
						],
		'proyecto_categoria'	=>	[
										'id_proyecto_categoria'		=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
										'proyecto_id_proyecto'		=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
										'categoria_id'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
										'proyecto_categoria_id'		=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
									],
		'proyecto_fotos'	=>	[
									'id_foto'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
									'proyecto_id_proyecto'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
									'imagen'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
									'alt'					=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
									'titulo'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
									'texto'					=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
								],
		'proyecto_recompensa'	=>	[
										'id_proyecto_recompensa'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
										'proyecto_id_proyecto'		=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
										'beneficio'					=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
										'monto'						=>	['type' => 'DOUBLE', 'null' => TRUE],
										'descripcion_recompensa'	=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
									],
		/*	ESTA TABLA ESTA VACIA, PARECE SIN USO INVESTIGAR
		'proyecto_status'	=>	[
									'id_proyecto_status'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
									'status'				=>	['type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE],
								],
		*/		
		'resetpwds'	=>	[
							'id_resetpwds'			=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
							'user_id'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
							'resetPasswordToken'	=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'resetPasswordExpires'	=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						],
		/*		TABLA VACIA, QUIEN LA USA Y PARA QUE?						
		'seccion'	=>	[
							'id_seccion'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
							'seccion'		=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						],
		*/
		'seccion_textos'	=>	[
									'id_seccion_textos'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
									'seccion_id'		=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
									'etiqueta'			=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
									'texto_sp'			=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
									'texto_en'			=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
								],
		'social_tipo'	=>	[
								'id_social_tipo'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
								'tipo'				=>	['type' => 'VARCHAR', 'constraint' => '50', 'null' => TRUE],
								'status'			=>	['type' => 'INT','constraint' => '2','unsigned' => TRUE, 'null' => TRUE],
							],
		'socio'	=>	[
						'id_socio'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
						'socio'		=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
						'logo'		=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'imagen'	=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'status'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
						'url_socio'	=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
					],
		'user'	=>	[
						'id_user'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
						'usuario'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'socio_url'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'nombre'				=>	['type' => 'TEXT', 'null' => TRUE],
						'apellido'				=>	['type' => 'TEXT', 'null' => TRUE],
						'password'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'email'					=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'comentarios'			=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'pais_id_residencia'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
						'pais_id'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
						'sitio_web'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'domicilio'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'calle'					=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'numero'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'colonia'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'entidad'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'cp'					=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'celular'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'imagen_perfil'			=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'experiencia'			=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'facebook'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'twitter'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'social_id'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'social_token'			=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'social_tipo_id'		=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
						'active'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
						'activeToken'			=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'forma_501'				=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
						'user_type'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
						'usercol'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
						'asociacion'			=>	['type' => 'SMALLINT', 'constraint' => '1', 'null' => TRUE],
						'es_socio'				=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
						'asociados'				=>	['type' => 'TINYINT','constraint' => '1', 'null' => TRUE],
					],
		'users'	=>	[
						'id_user'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
						'username'	=>	['type' => 'VARCHAR', 'constraint' => '30', 'null' => TRUE],
						'email'		=>	['type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE],
						'password'	=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
					],
		/*		tambien parece una tabla vacia
		'user_permisos'	=>	[
								'id_user_permisos'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
								'user_type_id'		=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
								'navbar_id'			=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE, 'null' => TRUE],
							],
		*/
		'user_type'	=>	[
							'id_user_type'	=>	['type' => 'INT','constraint' => '11','unsigned' => TRUE,'null'=>FALSE,'auto_increment' => TRUE],
							'user_type'		=>	['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
							'u_insert'		=>	['type' => 'SMALLINT','constraint' => '2','unsigned' => TRUE, 'null' => TRUE],
							'u_delete'		=>	['type' => 'SMALLINT','constraint' => '2','unsigned' => TRUE, 'null' => TRUE],
							'u_consult'		=>	['type' => 'SMALLINT','constraint' => '2','unsigned' => TRUE, 'null' => TRUE],
							'u_update'		=>	['type' => 'SMALLINT','constraint' => '2','unsigned' => TRUE, 'null' => TRUE],
						],
		];

	public function up() {
		echo '<hr><br>';
		foreach( $this->DDI as $tabla => $campos ){
			$this->dbforge->add_field($campos);
			$this->dbforge->add_key( array_keys($campos)[0] ,TRUE);
			$this->dbforge->create_table($tabla,TRUE);
			echo 'accion crear tabla: <b>'.$tabla . '</b> completa<br>';
		}
	}

	public function down() {
		echo '<hr><br>';
		foreach( $this->DDI as $tabla => $campos ){
			$this->dbforge->drop_table($tabla,TRUE);
			echo 'accion eliminar tabla: <b>'.$tabla . '</b> completa<br>';
		}
	}

}

/* End of file 001_fondea_db.php */
/* Location: ./application/migrations/023_fondea_db.php */