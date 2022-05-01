<?php
  class BitacoraClass extends Model {

    public $id_bitacora;
    public $usuario; 
    public $fecha;
    public $operacion;
    public $tabla;
    public $status;

    function __construct() {
        parent::__construct();
  
    }
      public function getIdBitacora() {
        return $this->id_bitacora;
      }
      public function getUsuario() {
        return $this->usuario;
      }
      public function getFecha() {
        return $this->fecha;
      }
      public function getOperacion() {
        return $this->operacion;
      }
      public function getTabla() {
        return $this->tabla;
      }
      public function getStatus() {
        return $this->status;
      }
     //SETTERS
      public function setIdBitacora($id_bitacora) {
        $this->id_bitacora = $id_bitacora;
      }

      public function setUsuario($usuario) {
        $this->usuario = $usuario;
      } 
 
      public function setFecha($fecha) {
        $this->fecha = $fecha;
      }
      public function setOperacion($operacion) {
        $this->operacion = $operacion;
      }
     
      public function setTabla($tabla) {
        $this->tabla = $tabla;
      }
       public function setStatus($status) {
        $this->status = $status;
      }
 }
?>