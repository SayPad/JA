<?php 
class NominasClass  {
      private $id_nomina;
      private $nombre;
      private $apellido;
      private $cedula;
      private $nombre_cargo;
      private $periodo_desde;
      private $periodo_hasta;
      private $fecha_pago;
      private $tipo_pago;
      private $horas_extras;
      private $ivss;
      private $rpe;
      private $faov;
      private $inces;
      private $total_pagar_nomina;
      private $inasistencias;
      private $sueldo_semanal;
      private $prima_por_hogar;

      public function getId() {return $this->id_nomina;}
      public function getNombre() {return $this->nombre;}
      public function getApellido() {return $this->apellido;}
      public function getCedula() {return $this->cedula;}
      public function getCargo() {return $this->nombre_cargo;}
      public function getPeriodo_desde() {return $this->periodo_desde;}
      public function getPeriodo_hasta() {return $this->periodo_hasta;}
      public function getFecha_pago() {return $this->fecha_pago;}
      public function getTipo_pago() {return $this->tipo_pago;}
      public function getHoras_extras() { return $this->horas_extras;}
      public function getIvss() {return $this->ivss;}
      public function getRpe() {return $this->rpe;}
      public function getFaov() {return $this->faov;}
      public function getInces() {return $this->inces;}
      public function getTotal_nomina() {return $this->total_pagar_nomina;}
      public function getInasistencias() {return $this->inasistencias;}
      public function getSueldo_semanal() {return $this->sueldo_semanal;}
      public function getPrima() {return $this->prima_por_hogar;}


      //SETTERS-------------------------------------------------------
      public function setId($id) {$this->id_nomina = $id;}
      public function setNombre($nombre) {$this->nombre = $nombre;}
      public function setApellido($apellido) {$this->apellido = $apellido;}
      public function setCedula($cedula) {$this->cedula = $cedula;}
      public function setCargo($nombre_cargo) {$this->nombre_cargo = $nombre_cargo;}
      public function setPeriodo_desde($periodo_desde) {$this->periodo_desde = $periodo_desde;}
      public function setPeriodo_hasta($periodo_hasta) {$this->periodo_hasta = $periodo_hasta;}
      public function setFecha_pago($fecha_pago) {$this->fecha_pago = $fecha_pago;}
      public function setTipo_pago($tipo_pago) {$this->tipo_pago = $tipo_pago;}
      public function setHoras_extras($horas_extras) {$this->horas_extras = $horas_extras;}
      public function setIvss($ivss) {$this->ivss = $ivss;}
      public function setRpe($rpe) {$this->rpe = $rpe;}
      public function setFaov($faov) {$this->faov = $faov;}
      public function setInces($inces) {$this->inces = $inces;}
      public function setTotal_nomina($total_pagar_nomina) {$this->total_pagar_nomina = $total_pagar_nomina;}
      public function setInasistencias($inasistencias) {$this->inasistencias = $inasistencias;}
      public function setSueldo_semanal($sueldo_semanal) {$this->sueldo_semanal = $sueldo_semanal;}
      public function setPrima($prima_por_hogar) {$this->prima_por_hogar = $prima_por_hogar;}

  }

?>