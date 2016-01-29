<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_permisos extends CI_Migration {
	var $tabla = "user_permisos";
	public function up()
	{
		$this->dbforge->add_field(array(
			'id_'.$this->tabla => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'user_type_id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'navbar_id' => array(
				'type' => 'INT',
				'constraint' => '11',
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