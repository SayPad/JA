<?php  
class Login extends Controller {
    public function __construct() {
        parent::__construct();

        if ( isset( $_POST['usuario'] ) && $_POST['usuario'] !== ""){

          $usuario = ($_POST['usuario'] !== "") ? $_POST['usuario'] : NULL;
          $contrasena = ($_POST['contrasena'] !== "") ? $_POST['contrasena'] : NULL;

          $this->loadModel('login');

          if($this->verificacion( $usuario, $contrasena )) {
            $this->bitacora($_SESSION['usuario'], 'Sistema', 'Inició sesion');
            header('location:'. constant('URL'));
          }
        }

    }

    public function render () {
        $this->view->render('login/index');
    }

    //Chequear si existe el usuario;
    public function verificacion( $usuario, $contrasena ) {
      if ( $this->model->usuarioExiste($usuario, $contrasena) ) {
        $this->setUsuarioActual($_POST['usuario'] );
        return true;
      } else {
         $this->view->mensaje = 'Datos incorrectos, intentelo de nuevo';
        return false;
      }
    }

    //asignar valores a la variable de sesion;
    public function setUsuarioActual($usuario) {
        $_SESSION['usuario'] = $usuario;
      }
      public function load ($metodo, $param = null) {
        $usuarioBitacora = $_SESSION['usuario'];
    if ($this->model->cerrarSession() ) {
         $this->bitacora($usuarioBitacora, 'Sistema', 'Cerró sesion');
    header('location:'. constant('URL'));
    }else{
         $controller = new Errores();
    }
  }
}

?>