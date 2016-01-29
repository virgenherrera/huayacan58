<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_api_tables extends CI_Migration {

	private $DDF = [
		'access'=>	[
							'key'	=>	[ 'type' => 'VARCHAR', 'constraint' => '40'],
					'controller'	=>	[ 'type' => 'VARCHAR', 'constraint' => '50'],
					'date_created'	=>	[ 'type' => 'DATETIME'],
					'date_modified'	=>	[ 'type' => 'TIMESTAMP'],
					],
		'keys'	=>	[
							'key'	=>	[ 'type' => 'VARCHAR', 'constraint' => '40'],
							'level'	=>	[ 'type' => 'INT', 'constraint' => '2'],
					'ignore_limits'	=>	[ 'type' => 'VARCHAR', 'constraint' => '40'],
					'is_private_key'=>	[ 'type' => 'TINYINT', 'constraint' => '1'],
					'ip_addresses'	=>	[ 'type' => 'TEXT'],
					'date_created'	=>	[ 'type' => 'INT', 'constraint' => '11'],
					],
		'logs'	=>	[
							'uri'	=>	[ 'type' => 'VARCHAR', 'constraint' => '255'],
							'method'=>	[ 'type' => 'VARCHAR', 'constraint' => '6'],
							'params'=>	[ 'type' => 'TEXT'],
						'api_key'	=>	[ 'type' => 'VARCHAR', 'constraint' => '40'],
					'ip_address'	=>	[ 'type' => 'VARCHAR', 'constraint' => '45'],
						'time'		=>	[ 'type' => 'INT', 'constraint' => '11'],
					'authorized'	=>	[ 'type' => 'TINYINT', 'constraint' => '1'],
					'response_code'	=>	[ 'type' => 'INT', 'constraint' => '11'],
					'rtime'			=>	[ 'type' => 'FLOAT', 'constraint' => '11'],

					],
		'limits'=>	[
						'uri'		=>	[ 'type' => 'VARCHAR', 'constraint' => '255'],
						'count'		=>	[ 'type' => 'INT', 'constraint' => '10'],
					'hour_started'	=>	[ 'type' => 'INT', 'constraint' => '11'],
						'api_key'	=>	[ 'type' => 'VARCHAR', 'constraint' => '40'],
					],
	];
	public function up() {
		foreach($this->DDF as $tabla=>$campos){
			$this->dbforge->add_field('id');
			$this->dbforge->add_field($campos);
			$this->dbforge->create_table('api_'.$tabla);
		}
	}

	public function down() {
		foreach($this->DDF as $tabla=>$campos){
			if(in_array('api_'.$tabla, $this->db->list_tables())){
				$this->dbforge->drop_table('api_'.$tabla);
			}
			else{ continue; }
		}
	}

}

/* End of file 021_add_api_tables.php */
/* Location: ./application/migrations/021_add_api_tables.php */