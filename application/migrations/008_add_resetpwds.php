<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_resetpwds extends CI_Migration {
	var $tabla = "resetpwds";
	public function up()
	{	$this->dbforge->add_field(array(
			'id_'.$this->tabla => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'user_id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'resetPasswordToken' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'resetPasswordExpires' => array(
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