<?php
require 'libs/classes/usuarioSession.class.php';
  class LoginModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function usuarioExiste ( $usuario, $contrasena ) {
      $contrasena = md5($contrasena);
      try {
        $query = $this->db->connect()->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena AND status = 1');
        $query->execute(['usuario' => $usuario, 'contrasena' => $contrasena]);
        while($row = $query->fetch()){
          $usuario = new usuarioSession();
          $usuario->setUsuarioActual($row['usuario']);
        }

        return $query->rowCount();
      } catch(PDOException $e) {
        return false;
      }

    } 
    function cerrarSession () {
          $usuario = new usuarioSession();
          $usuario->cerrarSession(); 
          return true;
    } 

}
?>