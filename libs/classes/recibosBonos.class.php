<?php 
class ReciboBonosClass  {
      private $id_recibo_bono;
      private $periodo_desde;
      private $periodo_hasta;
      private $fecha_pago;
      private $tipo_pago;
      private $total_pagar;
      private $inasistencias;

      private $nombre_bono;
      private $valor;
      private $dias;
      private $moneda;
      private $nombre;
      private $apellido;
      private $cedula;
      private $nombre_cargo;
      private $status;

      public function getId() {return $this->id_recibo_bono;}
      public function getPeriodo_desde() {return $this->periodo_desde;}
      public function getPeriodo_hasta() {return $this->periodo_hasta;}
      public function getFecha_pago() {return $this->fecha_pago;}
      public function getTipo_pago() {return $this->tipo_pago;}
      public function getTotal_pagar() {return $this->total_pagar;}
      public function getInasistencias() {return $this->inasistencias;}

      public function getNombre_bono() {return $this->nombre_bono;}
      public function getValor() {return $this->valor;}
      public function getDias() {return $this->dias;}
      public function getMoneda() {return $this->moneda;}
      public function getNombre() {return $this->nombre;}
      public function getApellido() {return $this->apellido;}
      public function getCedula() {return $this->cedula;}
      public function getNombre_cargo() {return $this->nombre_cargo;}
      public function getStatus() {return $this->status;}
      //SETTERS-------------------------------------------------------
      public function setId($id) {$this->id_recibo_bono = $id;}
      public function setPeriodo_desde($periodo_desde) {$this->periodo_desde = $periodo_desde;}
      public function setPeriodo_hasta($periodo_hasta) {$this->periodo_hasta = $periodo_hasta;}
      public function setFecha_pago($fecha_pago) {$this->fecha_pago = $fecha_pago;}
      public function setTipo_pago($tipo_pago) {$this->tipo_pago = $tipo_pago;}
      public function setTotal_pagar($total_pagar) {$this->total_pagar = $total_pagar;}
      public function setInasistencias($inasistencias) {$this->inasistencias = $inasistencias;}

      public function setNombre_bono($nombre_bono) {$this->nombre_bono = $nombre_bono;}
      public function setValor($valor) {$this->valor = $valor;}
      public function setDias($dias) {$this->dias = $dias;}
      public function setMoneda($moneda) {$this->moneda = $moneda;}
      public function setNombre($nombre) {$this->nombre = $nombre;}
      public function setApellido($apellido) {$this->apellido = $apellido;}
      public function setCedula($cedula) {$this->cedula = $cedula;}
      public function setNombre_cargo($nombre_cargo) {$this->nombre_cargo = $nombre_cargo;}
      public function setStatus($status) {$this->status = $status;}
  }

?>