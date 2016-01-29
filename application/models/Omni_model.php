<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Omni_model extends CI_Model{

	public function __contstruct(){
		parent::__construct();
		//$this->load->database(); <=== nota para evitar error cargar esto desde autoload
	}//Fin __construct

  protected function valid_get($nombre_buscado=FALSE,$busqueda=FALSE){
    if( $nombre_buscado===FALSE ){
      $msg = 'Error: imposible ejecutar sin parametros';
    }
    elseif( is_string($nombre_buscado) ){
      $nombres =  [
              ['select',      's',    'sel',      'campos'],
              ['select_max',    'smx',    'tabla_max'],
              ['select_min',    'smn',    'tabla_min'],
              ['select_avg',    'svg',    'tabla_pro'],
              ['select_sum',    'sum',    'tabla_sum'],
              ['distinct',    'dis',    'distinto'],
              ['from',      'f',    'de',     'tabla'],
              ['join',      'j',    'union',    'juntar'],
              ['where',     'w',    'donde', ],
              ['or_where',    'wo',   'donde_o'],
              ['where_in',    'wi',   'donde_en'],
              ['or_where_in',   'owi',    'o_donde_en'],
              ['where_not_in',  'wni',    'donde_no_en'],
              ['or_where_not_in', 'owni',   'o_donde_no_en'],
              ['like',      'l',    'como',     'parecido'],
              ['or_like',     'ol',   'o_como',   'o_parecido'],
              ['not_like',    'no',   'no_como',    'no_parecido'],
              ['or_not_like',   'onl',    'o_no_como',  'o_no_parecido'],
              ['group_by',    'gb',   'agrupar',    'grupo_por'],
              ['distinct',    'd',    'distinto',   'diferente'],
              ['having',      'h',    'teniendo'],
              ['or_having',   'oh',   'o_teniendo'],
              ['order_by',    'ob',   'oby',      'ordenado_por'],
              ['limit',     'li',   'lim',      'limite'],
              ['offset',     'of',   'off',      'rebase']
            ];
      foreach ($nombres as $keyy => $y) {
        foreach ($y as $keyx => $x) {
          if( $nombre_buscado === $x ){
            //ya lo encontre!
            $busqueda = TRUE;
            break 2;
          }
          else{
            //no lo encontre -> seguir
            $busqueda = $busqueda;
            continue;
          }
        }//buscax
      }//buscay
      $msg = ($busqueda===TRUE)?['existe'=>$busqueda,'y'=>$keyy,'x'=>$keyx, 'parse'=>$nombres[$keyy][0]]:$busqueda;
    }//fin es cadena
    else{
      $msg = 'Error: esta funcion solo acepta String como tipo de dato';
    }//fin else
    return $msg;
  }//fin valid_get

  public function _gett($query=FALSE,$tipo_entrega=FALSE){
    $resultado = FALSE;
    if(is_array($query)){
      //definir cual sera el tipo default de entrega, x Default: 'array'
      if( isset( $query['result'] ) AND $tipo_entrega===FALSE){
        $tipo_entrega = $query['result'];
        unset( $query['result'] );
      }
      elseif( !isset($query['result']) AND is_string($tipo_entrega) ){
        $tipo_entrega = $tipo_entrega;
      }

      //aplicar analisis de  alias a la query
      $new_query = FALSE;
      foreach ($query as $key => $value) {
        $temp_var = $this->valid_get( $key );
        if( $temp_var['existe'] ){
          $new_query[ $temp_var['parse'] ] = $value;
        }
      }
      $query = $new_query;
      unset($new_query);

      //siempre debe haber algo que seleccionar; * x default
      $query['select'] = (isset($query['select']))?$query['select']:'*';

      //construir consulta
      if( isset( $query['select'] )  && isset( $query['from'] ) ){
        foreach ($query as $queryMod => $mod) {
          if( method_exists($this->db, $queryMod) ){
            $this->db->{$queryMod}($mod);
          }
        }
      }//fin constructor de consulta
    }//fin es array
    elseif( is_string($query) ){ //<=== OJO esta seccion ya jala no le muevas
      //si la query fue explicita no es necesario otro proceso
      $resultado = $this->db->query($query); 
    }

    //resolver el tipo de resultado esperado
    switch ($tipo_entrega) {
      case 'array':
        $resultado = (is_string($query))?$resultado:$this->db->get();
        $resultado = ($resultado===FALSE)?FALSE:$resultado->result_array();
      break;

      case 'object':
        $resultado = (is_string($query))?$resultado:$this->db->get();
        $resultado = ($resultado===FALSE)?FALSE:$resultado->result();
      break;

      case 'row_object':
        $resultado = (is_string($query))?$resultado:$this->db->get();
        $resultado = ($resultado===FALSE)?FALSE:$resultado->row();
      break;

      case 'row_array':
        $resultado = (is_string($query))?$resultado:$this->db->get();
        $resultado = ($resultado===FALSE)?FALSE:$resultado->row_array();
      break;

      case 'compiled':
        $resultado = $this->db->get_compiled_select();
      break;

      default:
        $resultado = (is_string($query))?$resultado:$this->db->get();
        $resultado = ($resultado===FALSE)?FALSE:$resultado->result_array();
      break;
    }//fin switch tipo_entrega
    //limpiar el constructor de consultas :)
    $this->db->reset_query()->flush_cache();
    return $resultado;
  }//fin _gett()

  public function _insertt($insertSet=NULL,$compiled=FALSE){
    if(!is_null($insertSet)){
      $entrega = ($compiled===TRUE)?'get_compiled_insert':'insert';
        if(isset($insertSet['set'][0])){
          $msg = FALSE;
          foreach ($insertSet['set'] as $set) {
            $ciclo = FALSE;
            $ciclo = $this->db->set( $set )->{$entrega}($insertSet['tabla']);
            if( $compiled === TRUE ){
              $msg[] = $ciclo;
            }
            elseif($this->db->affected_rows()===1){ $msg[] =  $this->db->insert_id(); }
            else{ $msg[] =  FALSE; }
          }//finforeach
          return $msg;
        }//fin multiupdate
        elseif(!isset($insertSet['set'][0])){
          $msg = FALSE;
          $msg = $this->db->set( $insertSet['set'] )->{$entrega}( $insertSet['tabla'] );
          if( $compiled === TRUE ){ return $msg; }
          elseif( $this->db->affected_rows() === 1 ){ return $this->db->insert_id(); }
          else{ return FALSE; }
        }//fin update simple
        else{ return FALSE; }
    }//fin no es nulo
    else{ return FALSE; }
  }//fin _insertt

  public function _updatee($updateSet=NULL,$compiled=FALSE){
    if(!is_null($updateSet)){
      $entrega = ($compiled===TRUE)?'get_compiled_update':'update';
        if(isset($updateSet['set'][0])&&is_array($updateSet['set'][0]['id'])){
          $msg = FALSE;
          foreach ($updateSet['set'] as $set) {
            $ciclo = FALSE;
            $id = $set['id'];
            unset($set['id']);
            $ciclo = $this->db->set( $set )->where( $id )->{$entrega}($updateSet['tabla']);
            if( $compiled === TRUE ){
              $msg[] = $ciclo;
            }
            elseif($this->db->affected_rows()===1){ $msg[] =  TRUE; }
            else{ $msg[] =  FALSE; }
          }//finforeach
          return $msg;
        }//fin multiupdate
        elseif(!isset($updateSet['set'][0]) && is_array($updateSet['set']['id'])){
          $msg = FALSE;
          $id = $updateSet['set']['id'];
          unset($updateSet['set']['id']);
          $msg = $this->db->set( $updateSet['set'] )->where( $id )->{$entrega}( $updateSet['tabla'] );
          if( $compiled === TRUE ){ return $msg; }
          elseif( $this->db->affected_rows() === 1 ){ return TRUE; }
          else{ return FALSE; }
        }//fin update simple
        else{ return FALSE; }
    }//fin no es nulo
    else{ return FALSE; }
  }//fin updatee

  public function _deletee($deleteSet=NULL,$compiled=FALSE){
    if(!is_null($deleteSet)){
      $entrega = ($compiled===TRUE)?'get_compiled_delete':'delete';
        if(isset($deleteSet['where'][0]['id'])){
          $msg = FALSE;
          foreach ($deleteSet['where'] as $where) {
            $ciclo = FALSE;
            $ciclo = $this->db->where( $where['id'] )->{$entrega}($deleteSet['tabla']);
            if( $compiled === TRUE ){
              $msg[] = $ciclo;
            }
            elseif($this->db->affected_rows()===1){ $msg[] =  TRUE; }
            else{ $msg[] =  FALSE; }
          }//finforeach
          return $msg;
        }//fin multidelete
        elseif(!isset($deleteSet['where'][0]['id'])){
          $msg = FALSE;
          $msg = $this->db->where( $deleteSet['where'] )->{$entrega}( $deleteSet['tabla'] );
          if( $compiled === TRUE ){ return $msg; }
          elseif( $this->db->affected_rows() === 1 ){ return TRUE; }
          else{ return FALSE; }
        }//fin delete simple
        else{ return FALSE; }
    }//fin no es nulo
    else{ return FALSE; }
  }//fin deletee

	public function _get($query=FALSE,$tipo_esperado=FALSE){
     
    if($query===FALSE){
      $resultado = 'sin suficientes parametros para la ejecucion';
    }//validacion
    elseif(isset($query['tabla'])){
	  //construir la query
      $this->db->from($query['tabla']);
      if(isset($query['campos'])){
        $this->db->select($query['campos']);//recibe los campos de la consulta
      }
      if( isset($query['queryMods']) && is_array($query['queryMods'])){
        foreach($query['queryMods'] as $queryMod => $mod){
          switch ($queryMod) {
            case 'where':
              if($mod != ""){
           	$this->db->where($mod); //acepta array asociativo('name !=' => $name, 'id <' => $id, 'date >' => $date) o custom string (name='Joe' AND status='boss' OR status='active')
              }
              break;
            case 'distinct':
              $this->db->distinct(); //solo se pasa como un array vacio si se necesita un distinct
              break;
            case 'join':
              if(isset($mod['lado'])){
                $this->db->join($mod['tabla_join'],$mod['on'],$mod['lado']); //recibe un array que indica al join mod['tabla'=>'nombre_tabla','on'=>'sentencia_on',lado=>'el_lado']
              }
              else{
                $this->db->join($mod['tabla_join'],$mod['on']);
              }
              break;
            case 'order_by':
              $this->db->order_by($mod['campo'],$mod['orden']); //recibe un array de esta forma $mod=['campo'=>'nombre-campo','orden'=>'tipo_orden']
            break;
            case 'limit':
              $this->db->limit($mod['num'],$mod['ini']); //recibe un array de esta forma $mod=['campo'=>'nombre-campo','orden'=>'tipo_orden']
            break;
            case 'group':
            	if($mod != ""){
					$this->db->group_by($mod); //recibe un array de esta forma $mod=['campo'=>'nombre-campo','orden'=>'tipo_orden']
				}	
              break;      
            default:
              continue;
              break;
          }
          
        }
        
      }
     
      $consulta = $this->db->get();
      if($tipo_esperado===FALSE){
        $resultado = $consulta->result_array();
      }
      elseif($tipo_esperado===TRUE){
        $resultado = $consulta->result();
      }
    }//elseif
    //print $this->db->last_query().";";
    return $resultado;
  }//FIN _get

  public function array_by_id($array,$id){
    if (is_array($array)) {
      foreach ($array as $campo => $data){
        $array2[$data[$id]] = $data;
      }
    }
    return($array2);
  }

  public function _insert($insert=FALSE){
    if($insert===FALSE){
      $resultado = 'Sin suficientes parametros para realizar la insecion';
    }
    elseif(isset($insert['tabla'])){
      //decidir si insert o insert_batch
      if( count( $insert['data']) == 1){
        $this->db->insert($insert['tabla'],$insert['data'][0]);
        $resultado = $this->db->insert_id(); 
      }
      elseif( count( $insert['data'] >= 2 ) ){
        $resultado = $this->db->insert_batch($insert['tabla'],$insert['data']);
      }
      else{

        $resultado = 'no se recibio informacion que insertar';
      }
    }
    return $resultado;
  }//Fin _insert

  public function _update($update=FALSE){
    if($update === FALSE){
      $resultado = 'Sin suficientes parametros para la actualizacion';
    }
    elseif( isset( $update['tabla'] ) ){
      //decidir si update o update batch <===ahora probando con switch
      //var_dump($update['modo_batch']);
      switch ( $update['modo_batch'] ) {
        case FALSE:
          $this->db->where($update['id_key'],$update['id_value']);
          $resultado = $this->db->update($update['tabla'],$update['data'][0]);
        break;
        case TRUE:
          $resultado = $this->db->update_batch($update['tabla'],$update['data'],$update['where_batch']);
        break;
        default:
          $resultado = 'Imposible actualizar con la informacion proporcionada, verifiquer formato parametros';
        break;
      }
    }
    return $resultado;
  }//FIN _update
 public function _deveritas_eliminar($proyecto_id=FALSE,$database=FALSE)
 {
   if ($proyecto_id === FALSE)
   {
     $resultado = 'No estas autorizado para borrar estos elementos';
   }
   else
   {   if( $database === 'proyecto' )
       {
       $this->db->where('id_proyecto', $proyecto_id);
       $this->db->delete($database); 
       }
       else
       {
       $this->db->where('proyecto_id_proyecto', $proyecto_id);
       $this->db->delete($database); 
       }
   }

 }
 
 	function get_datatable($params){
		$this->load->model('ssp_model');
		extract($params);
		
		$this->ssp_model->sql_details = '';
		$this->ssp_model->f_id = $f_id;
		$this->ssp_model->table_tit = $table_tit;
		$this->ssp_model->fields = $fields;
		$this->ssp_model->table = $table;
		$this->ssp_model->where = $where;
		$this->ssp_model->order = $order;
		$this->ssp_model->get_json_datatable();
	}  
}//fin de la clase Onmi_model

// <==============================D O C U M E N T A C I O N==============================>

/*
<======================ejemplo select * from tabla
$query = [  'tabla'=>'Tabla1' ];


<======================ejemplo select * from tabla where
$query = [     'tabla'=>'Tabla1',
     		   'queryMods'=>
     		 	    ['where'=>'condicion_WHERE']
         ];


<======================ejemplo de join simple
$query = [  'tabla'=>'Tabla1',
      'campos'=>'Tabla1.campo alias,Tabla2.campo2 alias2, ... , Tablan.campon aliasn,',
      'queryMods'=>[  'join'=>['tabla_join'=>'country','on'=>'condicion_ON'],
              'where'=>'condicion_WHERE']
                                  ];


<======================ejemplo de join con where y order by
$query = [  'tabla'=>'Tabla1',
          'campos'=>'Tabla1.campo alias,Tabla2.campo2 alias2, ... , Tablan.campon aliasn,',
          'queryMods'=>[  'join'=>['tabla_join'=>'country','on'=>'condicion_ON'],
                  'where'=>'condicion_WHERE'],
                  'order_by'=>['campo'=>'campo o alias','orden'=>'DESC']
                                              ];


<======================formato de array para la insercion
$insert = [ 'tabla'=>'insert_pruebas',
          'data'  =>  [ [ 'campo1'  => 'informacion1',
                    'campo2'  => 'segunfo insert',
                    'campo3'  => 'informacion3' ] ] ];


<======================formato de array para la insercion batch
$insert = [ 'tabla'=>'insert_pruebas',
          'data'  =>  [ [ 'campo1'  => 'info',
                    'campo2'  => 'info2',
                    'campo3'  => 'inform3',
                                    ],
                  [ 'campo1'  => 'info',
                    'campo2'  => 'info2',
                    'campo3'  => 'inform3',
                                    ],
                          .
                          .
                          . 

                  [ 'campo1'  => 'info',
                    'campo2'  => 'info2',
                    'campo3'  => 'inform3',
                                    ],  ] ];


<======================formado de array para actualizacion simple================>
$update= [  'tabla'   =>  'nombre_tabla',
          'id_key'  =>  'key_campo_id',                 <=== necesarios para actualizacion
          'id_value'  =>  'valor_campo_id',             <=== necesarios para actualizacion
          'where_batch'=> 'campo_unico_where_batch',    <==== se usa solo para update_batch
          'data'    =>  [ 
                    [ 'campo1'  => '1_1info ',
                      'campo2'  => '1_info2',
                      'campo3'  => '1_inform3'  ]
                                                  ]
                                                    ];

<======================formato de array para actualizacion batch
$update= [  'tabla'   =>  'nombre_tabla',
          'id_key'  =>  'key_campo_id',
          'id_value'  =>  'valor_campo_id',
          'where_batch'=> 'campo_unico_where_batch',  ;mandatorio para update_batch
          'data'    =>  [ 
                    [ 'campo1'  => '1_1info ',
                      'campo2'  => '1_info2',
                      'campo3'  => '1_inform3'  ],
                    [ 'campo1'  => '2_info  ',
                      'campo2'  => '2_info2',
                      'campo3'  => '2_inform3'  ],
                    [ 'campo1'  => '3_info  ',
                      'campo2'  => '3_info2',
                      'campo3'  => '3_inform3'  ]
                                                    ]
                                                      ];
*/