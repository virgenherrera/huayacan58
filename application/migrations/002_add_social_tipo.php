<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_social_tipo extends CI_Migration {
	var $tabla = "social_tipo";
	public function up()
	{
		
		$this->dbforge->add_field(array(
			'id_'.$this->tabla => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'tipo' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
			),
			'status' => array(
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