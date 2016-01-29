<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_donaciones extends CI_Migration {
	var $tabla = "donaciones";
	public function up()
	{
		$this->dbforge->add_field(array(
			'id_donacion' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'proyecto_id_proyecto' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'id_usuario' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'id_donador' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'id_recompensa' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'donacion' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'tx' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'st' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'amt' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'cc' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'cm' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'sig' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			)	
		));
		
		
		$this->dbforge->add_key('id_donacion', TRUE);
		$this->dbforge->create_table($this->tabla);		
		
	}

	public function down()
	{
		$this->dbforge->drop_table($this->tabla);
	}
}	