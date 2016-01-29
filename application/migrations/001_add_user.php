<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id_user' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'usuario' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'nombre' => array(
				'type' => 'TEXT',
				'null' => TRUE,
			),
			'apellido' => array(
				'type' => 'TEXT',
				'null' => TRUE,
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
				
			),
			'comentarios' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
				
			),
			'pais_id_residencia' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'pais_id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			)
			,
			'sitio_web' => array(
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => TRUE,
			),
			'domicilio' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'calle' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
			),
			'numero' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
			),
			'colonia' => array(
				'type' => 'VARCHAR',
				'constraint' => '150',
				'null' => TRUE,
			),
			'entidad' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
			),
			'cp' => array(
				'type' => 'VARCHAR',
				'constraint' => '5',
				'null' => TRUE,
			),
			'celular' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
				'null' => TRUE,
			),
			'imagen_perfil' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
			),
			'experiencia' => array(
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => TRUE,
			),
			'facebook' => array(
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => TRUE,
			),
			'twitter' => array(
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => TRUE,
			),
			'social_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'social_token' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'social_tipo_id' => array(
				'type' => 'INT',
				'constraint' => '10',
				'null' => TRUE,
			),
			'active' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'activeToken' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'forma_501' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'user_type' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
		    'usercol' => array(
		    	'type' => 'INT',
		    	'constraint' => '11',
		    ),
		    'asociacion' => array(
                             'type' => 'VARCHAR',
				              'constraint' => '2',
				              'null' => TRUE,
			),
		    'es_socio' => array(
                             'type' => 'int',
				              'constraint' => '2',
				              'default' => '0',
			)	             
					
		));
		$this->dbforge->add_key('id_user', TRUE);
		$this->dbforge->create_table('user');
		
		
	}

	public function down()
	{
		$this->dbforge->drop_table('user');
	}
}	