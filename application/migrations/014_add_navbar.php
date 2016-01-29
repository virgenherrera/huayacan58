<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_navbar extends CI_Migration {
	var $tabla = "navbar";
	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'order' => array(
				'type' => 'smallint',
				'constraint' => '3',
				'null'=>true
			),
			'parent_id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null'=>TRUE
			),
			'label' => array(
				'type' => 'VARCHAR',
				'constraint' => '60',
				'null'=>TRUE
			),
			'route' => array(
				'type' => 'VARCHAR',
				'constraint' => '60',
				'null'=>TRUE
			),
			'have_childrens' => array(
				'type' => 'tinyint',
				'constraint' => '4',
				'null'=>TRUE,
				'default' => 0,
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->tabla);		
		
	}

	public function down()
	{
		$this->dbforge->drop_table($this->tabla);
	}
}	