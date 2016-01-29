<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration {
	var $tabla = "users";
	public function up()
	{
		$this->dbforge->add_field(array(
			'id_user' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '30',
				'null' => TRUE,
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			)
		));
		$this->dbforge->add_key('id_user', TRUE);
		$this->dbforge->create_table($this->tabla);		
		
	}

	public function down()
	{
		$this->dbforge->drop_table($this->tabla);
	}
}	