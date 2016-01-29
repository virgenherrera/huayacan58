<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Rename_old_tables extends CI_Migration {

	protected $excepciones = ['migrations'];

	protected $eliminar = ['api_access','api_keys','api_logs','api_limits'];

	public function up() {
		echo '<hr><br>';
		//tirar tablas api
		foreach($this->eliminar as $tabla){
			$this->dbforge->drop_table( $tabla );
			echo 'accion eliminar tabla: '.$tabla . ' completa<br>';
		}

		//trabajar todo menos migrations
		foreach($this->db->list_tables() as $tabla){
			if($tabla !== 'migrations'){
				$this->dbforge->rename_table($tabla,'vieja_'.$tabla);
				echo 'operacion renombrar tabla: <b>'.$tabla.'</b> a <b>"vieja_'.$tabla.'</b> exitosamente<br>';
			}
			else{ continue; }
		}
	}

	public function down() {
		echo '<hr><br>';
		foreach($this->db->list_tables() as $tabla){
			if(!in_array($tabla, $this->excepciones)){
				$this->dbforge->rename_table($tabla,substr($tabla, 6));
				echo 'operacion restaurar nombre de tabla: <b>'.$tabla.'</b> a <b>'.substr($tabla, 6).'</b> exitosamente<br>';
			}
			else{ continue; }
		}
	}

}

/* End of file 022_rename_old_tables.php */
/* Location: ./application/migrations/022_rename_old_tables.php */