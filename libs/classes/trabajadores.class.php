<?php 
class TrabajadoresClass  {
      private $id_trabajador;
      private $nombre;
      private $apellido;
      private $cedula;
      private $cargo;
      private $fecha_ingreso;
      private $sueldo_semanal;
      private $prima_por_hogar;
      private $status;
      private $correo;
      

      public function getId() {
        return $this->id_trabajador;
      }
      public function getNombre() {
        return $this->nombre;
      }
      public function getApellido() {
        return $this->apellido;
      }
      public function getCedula() {
        return $this->cedula;
      }
      public function getCargo() {
        return $this->cargo;
      }
      public function getFecha_ingreso() {
        return $this->fecha_ingreso;
      }
      public function getSueldo_semanal() {
        return $this->sueldo_semanal;
      }
 
       public function getPrima_por_hogar() {
        return $this->prima_por_hogar;
      }

      public function getStatus() {
        return $this->status;
      }
      public function getCorreo() {
        return $this->correo;
      }

      //SETTERS
      public function setId($id) {
        $this->id_trabajador = $id;
      }
      public function setNombre($nombre) {
        $this->nombre = $nombre;
      }
      public function setApellido($apellido) {
        $this->apellido = $apellido;
      }
      public function setCedula($cedula) {
        $this->cedula = $cedula;
      }
      public function setCargo($cargo) {
        $this->cargo = $cargo;
      }
      public function setFecha_ingreso($fecha_ingreso) {
        $this->fecha_ingreso = $fecha_ingreso;
      }
      public function setSueldo_semanal($sueldo_semanal) {
        $this->sueldo_semanal = $sueldo_semanal;
      }

      public function setPrima_por_hogar($prima_por_hogar) {
        $this->prima_por_hogar = $prima_por_hogar;
      }

      public function setStatus($status) {
        $this->status = $status;
      }
      public function setCorreo($correo) {
        $this->correo = $correo;
      }

  }

?>