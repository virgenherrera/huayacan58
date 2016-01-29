<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_User extends CI_Migration {
	
	private $tabla = 'user';
	private $new_campos =	[
							'socio_url' => 
							    [ 'type'=>'VARCHAR', 
						   'constraint' => '255',
						        'after' => 'usuario' ]
						    ];

	public function up(){
		$this->dbforge->add_column($this->tabla, $this->new_campos);
	}

	public function down(){
		$this->dbforge->drop_column( $this->tabla , array_keys($this->new_campos) );
	}
}	