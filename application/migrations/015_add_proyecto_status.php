<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_proyecto_status extends CI_Migration {
	var $tabla = "proyecto_status";
	public function up()
	{
		$this->dbforge->add_field(array(
			'id_'.$this->tabla => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'status' => array(
				'type' => 'varchar',
				'constraint' => '100',
				'null'=>true
			),
		));
		$this->dbforge->add_key('id_'.$this->tabla, TRUE);
		$this->dbforge->create_table($this->tabla);		
		
	}

	public function down()
	{
		$this->dbforge->drop_table($this->tabla);
	}
}	