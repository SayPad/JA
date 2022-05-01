<?php 
class BonosClass  {
      private $id_bono;
      private $nombre_bono;
      private $valor;
      private $dias;
      private $nombre_cargo;
      private $moneda;
      private $status;

      public function getId() {return $this->id_bono;}
      public function getNombre_bono() {return $this->nombre_bono;}
      public function getValor() {return $this->valor;}
      public function getDias() {return $this->dias;}
      public function getNombre_cargo() {return $this->nombre_cargo;}
      public function getMoneda() {return $this->moneda;}
      public function getStatus() {return $this->status;}

      //SETTERS-------------------------------------------------------
      public function setId($id) {$this->id_bono = $id;}
      public function setNombre_bono($nombre_bono) {$this->nombre_bono = $nombre_bono;}
      public function setValor($valor) {$this->valor = $valor;}
      public function setDias($dias) {$this->dias = $dias;}
      public function setNombre_cargo($nombre_cargo) {$this->nombre_cargo = $nombre_cargo;}
      public function setMoneda($moneda) {$this->moneda = $moneda;}
      public function setStatus($status) {$this->status = $status;}
  }

?>