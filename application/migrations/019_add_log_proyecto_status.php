<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_log_proyecto_status extends CI_Migration {
	var $tabla = "log_proyecto_status";
	public function up()
	{
		$this->dbforge->add_field(array(
			'id_'.$this->tabla => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'status_de' => array(
				'type' => 'INT',
				'constraint' => '2',
				'null' => TRUE,
			),
			'status_a' => array(
				'type' => 'INT',
				'constraint' => '2',
				'null' => TRUE,
			),
			'user_id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'mensaje' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
			),
			'fecha' => array(
				'type' => 'INT',
				'constraint' => '2',
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