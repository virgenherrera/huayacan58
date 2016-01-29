<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_seccion_textos extends CI_Migration {
	var $tabla = "seccion_textos";
	public function up()
	{
		$this->dbforge->add_field(array(
			'id_'.$this->tabla => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'seccion_id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'etiqueta' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'texto_sp' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'texto_en' => array(
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