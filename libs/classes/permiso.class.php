<?php 
class PermisoClass  {
      private $id_permiso;
      private $id_trabajador;
      private $desde;
      private $hasta;
      private $nombre;
      private $apellido;
      private $cedula;
      private $descripcion;

      public function getId() {
        return $this->id_permiso;
      }
      public function getTrabajador() {
        return $this->id_trabajador;
      }
      public function getDesde() {
        return $this->desde;
      }
      public function getHasta() {
        return $this->hasta;
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
       public function getDescripcion() {
        return $this->descripcion;
      }
  
      //SETTERS
      public function setId($id) {
        $this->id_permiso = $id;
      }
      public function setTrabajador($id_trabajador) {
        $this->id_trabajador = $id_trabajador;
      }
      public function setDesde($desde) {
        $this->desde = $desde;
      }
        public function setHasta($hasta) {
        $this->hasta = $hasta;
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
       public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
      }
  }

?>