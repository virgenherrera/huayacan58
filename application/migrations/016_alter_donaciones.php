<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Donaciones extends CI_Migration {
	
	private $tabla = 'donaciones';
	private $new_campos =	[
							'fecha' => [ 'type'=>'TEXT', 'type'=>'TIMESTAMP' ]
						];

	public function up(){
		$this->dbforge->add_column($this->tabla, $this->new_campos);
	}

	public function down(){
		$this->dbforge->drop_column( $this->tabla , array_keys($this->new_campos) );
	}
}	