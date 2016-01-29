<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_categoria extends CI_Migration {
	var $tabla = "categoria"; 
	public function up()
	{
		
		$this->dbforge->add_field(array(
			'id_'.$this->tabla => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'categoria' => array(
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => TRUE,
			),
			'seo_title' => array(
				'type' => 'VARCHAR',
				'constraint' => '65',
				'null' => TRUE,
			),
			'seo_keywords' => array(
				'type' => 'MEDIUMTEXT',
				'null' => TRUE,
			),
			'seo_url' => array(
				'type' => 'MEDIUMTEXT',
				'null' => TRUE,
			),
			'seo_description' => array(
				'type' => 'VARCHAR',
				'constraint' => '150',
				'null' => TRUE,	
			),
			'f_alta' => array(
				'type' => 'DATE',
				'null' => TRUE,
			),
			'u_id_alta' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'categoria_id_categoria' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'imagen' => array(
				'type' => 'TEXT',
				'null' => TRUE,
			),
			'banner' => array(
				'type' => 'TEXT',
				'null' => TRUE,
			),
			'status' => array(
				'type' => 'INT',
				'constraint' => '2',
				'null' => FALSE,
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