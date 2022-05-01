<?php 
class UsuariosClass  {
      private $id_usuario;
      private $cedula;
      private $nombre;
      private $apellido;
      private $usuario;
      private $contrasena;
      private $rolusuario;
      private $correo;
      

      public function getId() {
        return $this->id_usuario;
      }
      public function getCedula() {
        return $this->cedula;
      }
      public function getNombre() {
        return $this->nombre;
      }
      public function getApellido() {
        return $this->apellido;
      }
      public function getUsuario() {
        return $this->usuario;
      }
      public function getContrasena() {
        return $this->contrasena;
      }
      public function getRol() {
        return $this->rol;
      }
      public function getCorreo() {
        return $this->correo;
      }
      //SETTERS
      public function setId($id) {
        $this->id_usuario = $id;
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
      public function setUsuario($usuario) {
        $this->usuario = $usuario;
      }
      public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
      }
      public function setRol($rol) {
        $this->rol = $rol;
      }
       public function setCorreo($correo) {
        $this->correo = $correo;
      }
  }

?>