<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_type extends CI_Migration {
	var $tabla = "user_type";
	public function up()
	{
		$this->dbforge->add_field(array(
			'id_'.$this->tabla => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'user_type' => array(
				'type' => 'VARCHAR',
				'constraint' => '30',
				'null' => TRUE,
			),
			'u_insert' => array(
				'type' => 'INT',
				'constraint' => '2',
				'null' => TRUE,
			),
			'u_delete' => array(
				'type' => 'INT',
				'constraint' => '2',
				'null' => TRUE,
			),
			'u_consult' => array(
				'type' => 'INT',
				'constraint' => '2',
				'null' => TRUE,
			),
			'u_update' => array(
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