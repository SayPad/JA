<?php 
class Trabajos_extrasClass  {
      private $id_trabajosExtras;
      private $fecha_trabajo;
      private $descripcion_trabajo;
      private $tipo_pago;
      private $fecha_pago;
      private $descripcion;
      private $cantidad;
      private $total_unidad;
      private $total_pagar;
      private $nombre;
      private $apellido;
      private $cedula;
      private $nombre_cargo;

      public function getId() {return $this->id_nomina;}
      public function getFecha_trabajo() {return $this->nombre;}
      public function getDescripcion_trabajo() {return $this->apellido;}
      public function getTipo_pago() {return $this->cedula;}
      public function getFecha_pago() {return $this->nombre_cargo;}
      public function getDescripcion() {return $this->id_dolar;}
      public function getCantidad() {return $this->periodo_desde;}
      public function getTotal_unidad() {return $this->periodo_hasta;}
      public function getTotal_pagar() {return $this->fecha_pago;}
      public function getNombre() {return $this->tipo_pago;}
      public function getApellido() { return $this->horas_extras;}
      public function getCedula() {return $this->ivss;}
      public function getNombre_cargo() {return $this->rpe;}

      //SETTERS-------------------------------------------------------
      public function setId($id) {$this->id_nomina = $id;}
      public function setFecha_trabajo($nombre) {$this->nombre = $nombre;}
      public function setDescripcion_trabajo($apellido) {$this->apellido = $apellido;}
      public function setTipo_pago($cedula) {$this->cedula = $cedula;}
      public function setFecha_pago($nombre_cargo) {$this->nombre_cargo = $nombre_cargo;}
      public function setDescripcion($id_dolar) {$this->id_dolar = $id_dolar;}
      public function setCantidad($periodo_desde) {$this->periodo_desde = $periodo_desde;}
      public function setTotal_unidad($periodo_hasta) {$this->periodo_hasta = $periodo_hasta;}
      public function setTotal_pagar($fecha_pago) {$this->fecha_pago = $fecha_pago;}
      public function setNombre($tipo_pago) {$this->tipo_pago = $tipo_pago;}
      public function setApellido($horas_extras) {$this->horas_extras = $horas_extras;}
      public function setCedula($ivss) {$this->ivss = $ivss;}
      public function setNombre_cargo($rpe) {$this->rpe = $rpe;}
      
  }

?>