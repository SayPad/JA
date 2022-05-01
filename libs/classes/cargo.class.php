<?php 
  class CargoClass  {
      private $id_cargo;
      private $nombre_cargo;
      private $sueldo_semanal;
      private $prima_por_hogar;
      private $status;
      

      public function getId() {
        return $this->id_cargo;
      }
      public function getNombre_cargo() {
        return $this->nombre_cargo;
      }
      public function getSueldo() {
        return $this->sueldo_semanal;
      }
      public function getPrima() {
        return $this->prima_por_hogar;
      }

      public function getStatus() {
        return $this->status;
      }

      //SETTERS
      public function setId($id) {
        $this->id_cargo = $id;
      }
      public function setNombre_cargo($nombre_cargo) {
        $this->nombre_cargo = $nombre_cargo;
      }
      public function setSueldo($sueldo_semanal) {
        $this->sueldo_semanal = $sueldo_semanal;
      }
      public function setPrima($prima_por_hogar) {
        $this->prima_por_hogar = $prima_por_hogar;
      }

      public function setStatus($status) {
        $this->status = $status;
      }

  }

?>