<?php
  require 'libs/classes/bitacora.class.php';
  require 'source/bitacora/CRUD.php';

  class BitacoraModel extends Model {

    public $bitacora;
  
    function __construct() {
        parent::__construct();
        $this->bitacora = new bitacoraCRUD();
  
    }
    public function insert($usuario, $tabla, $operacion, $fecha){
      $query = $this->db->connect()->prepare('INSERT INTO bitacora (usuario, operacion, fecha, tabla, status) VALUES(:usuario, :operacion, :fecha, :tabla, :status)');
      $query->execute(['usuario'=>$usuario, 'operacion'=> $operacion, 'fecha'=>$fecha,'tabla'=>$tabla, 'status'=>'1']);
    }



      
 }



?>