<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_proyecto_fotos extends CI_Migration {
	var $tabla = "proyecto_fotos";
	public function up()
	{
		$this->dbforge->add_field(array(
			'id_foto' => array(
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
			'imagen' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'alt' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'titulo' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'texto' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			)		
		));
		$this->dbforge->add_key('id_foto', TRUE);
		$this->dbforge->create_table($this->tabla);		
		
	}

	public function down()
	{
		$this->dbforge->drop_table($this->tabla);
	}
}	