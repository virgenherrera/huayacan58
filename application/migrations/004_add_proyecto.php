<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_proyecto extends CI_Migration {
	var $tabla = "proyecto";
	public function up()
	{
		$this->dbforge->add_field(array(
			'id_'.$this->tabla => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'proyecto' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'descripcion' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'monto_recaudar' => array(
				'type' => 'DOUBLE',
				'null' => TRUE,
			),
			'tiempo_limite' => array(
				'type' => 'INT',
				'constraint' => '100',
				'null' => TRUE,
			),
			'imagen' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'imagen_banner' => array(
				'type' => 'TEXT',
				'null' => TRUE,
			),
			'uso_dinero' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'proyecto_nuevo_existente' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'existe_avances' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'video' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'sitio_web' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'facebook' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'twitter' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'pais_id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'rol' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'fiscal_rfc' => array(
				'type' => 'VARCHAR',
				'constraint' => '13',
				'null' => TRUE,
			),
			'fiscal_paypal' => array(
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => TRUE,
			),
			'fiscal_razon' => array(
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => TRUE,
			),
			'fiscal_domicilio' => array(
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => TRUE,
			),
			'fiscal_comp_deducibles' => array(
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => TRUE,
			),
			'pdf' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'f_alta' => array(
				'type' => 'DATE',
				'null' => TRUE,
			),
			'quien_eres' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'de_donde_eres' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'user_id_user' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'categoria_id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'proyecto_status' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			),
			'terms_conditions' => array(
				'type' => 'INT',
				'constraint' => '2',
				'null' => TRUE,
			),	
			'manega_recompensa' => array(
				'type' => 'INT',
				'constraint' => '2',
				'null' => TRUE,
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