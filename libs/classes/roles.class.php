<?php 
class RolesClass  {
      private $id_rol;
      private $nombre_rol;
      private $status;

      

      public function getId() {
        return $this->id_rol;
      }
      public function getNombre_rol() {
        return $this->nombre_rol;
      }
      public function getStatus() {
        return $this->status;
      }

      //SETTERS
      public function setId($id_rol) {
        $this->id_rol = $id_rol;
      }
     public function setNombre_rol($nombre_rol) {
        $this->nombre_rol = $nombre_rol;
      }
      public function setStatus($status) {
        $this->status = $status;
      }

  }

?>