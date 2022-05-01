<?php 

class Usuarios extends Controller{

  function __construct () {
    parent::__construct();
  }

  function render () {
    $modulo = "usuarios";
    $operacion = "ver";
    $usuario = $_SESSION['usuario'];
    if ($this->model->usuarios->verificar($modulo, $operacion, $usuario)) {

      $this->view->mensaje = 'Esta pagina controla los usuarios';
      $usuarios = $this->model->usuarios->get();
      $roles = $this->model->usuarios->getRoles();
    $this->view->roles = $roles;
    $trabajadores = $this->model->usuarios->getTrabajadores();
    $this->view->trabajadores = $trabajadores;
      $this->view->usuarios = $usuarios;

      $this->view->render('usuarios/index');
  }else{
    $this->view->render('errores/bloquear');
  }
  
  
  
}
  public function load ($metodo, $param = null) {
    $usuarios = 'source/usuarios/'.$metodo.'.php';
    $ruta = 'controllers/'.$usuarios;
    if(file_exists($ruta)){
    require_once $usuarios;
    }else{
      $controller = new Errores();
    }

  }

}

?>