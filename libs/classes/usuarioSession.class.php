<?php  
class usuarioSession  {
    public function __construct() {

       if(!isset($_SESSION)) { 
          session_start(); 
      }else{
        session_destroy();
        session_start(); 
      }
    }

    public function setUsuarioActual($usuario) {
      $_SESSION['usuario'] = $usuario;
    }

    public function getUsuarioActual($usuario) {
      return $_SESSION['usuario'];
    }
    
    public function cerrarSession() {
      session_unset();
      session_destroy();
    }
  }

?>