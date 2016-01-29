<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Migrate_data_old_new extends CI_Migration {

	public function up() {
		echo '<hr><br>';
		///listar tablas
		$tablas = $this->db->list_tables();

		//para cada tabla...
		foreach($tablas as $tabla){
			//validar que su nombre inice con vieja_ ...
			if( substr($tabla, 0,6)==='vieja_' ){
				//despues validar que tenga una hermana que no inicie con vieja_
				if( in_array(substr($tabla, 6), $tablas) ){
					//consultar la tabla vieja_
					$consulta = $this->modelo->_gett(['f'=>$tabla],'array');
					//si la tabla no estaba vacia...
					if(count($consulta) > 0){
						//insertar en la la tabla hermana
						$this->modelo->_insertt(['tabla'=>substr($tabla, 6),'set'=>$consulta]);

						echo 'accion respaldar INFO de: <b>'.$tabla . '</b> en <b>'.substr($tabla, 6).'</b> completa<br>';
					}
					else{ continue; }
				}
				else{ continue; }
			}
			else{ continue; }
		}
	}

	public function down() {
		echo '<hr><br>';
		echo 'sorry , <b>NO</b> se puede deshacer el respaldo de datos<br>';
	}

}

/* End of file 024_migrate_data_old_new.php */
/* Location: ./application/migrations/024_migrate_data_old_new.php */