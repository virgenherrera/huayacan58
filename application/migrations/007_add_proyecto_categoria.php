<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_proyecto_categoria extends CI_Migration {
	var $tabla = "proyecto_categoria";
	public function up()
	{
		$this->dbforge->add_field(array(
			'id_'.$this->tabla => array(
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
			'categoria_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'proyecto_categoria_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			)	
		));
		$this->dbforge->add_key('id_'.$this->tabla, TRUE);
		$this->dbforge->create_table($this->tabla);		
		
	}

	public function down()
	{
		$this->dbforge->drop_table($this->tabla);
	}
}	