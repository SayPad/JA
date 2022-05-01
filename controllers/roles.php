<?php 
class Roles extends Controller{

  function __construct () {
    parent::__construct();
  }  

  function render () {
    $modulo = "seguridad";
    $operacion = "ver";
    $usuario = $_SESSION['usuario'];
    if ($this->model->roles->verificar($modulo, $operacion, $usuario)) {

    $this->view->mensaje = 'Esta pagina controla los roles ';
    $roles = $this->model->roles->get();
    $this->view->roles = $roles;
    $this->view->render('roles/index');

    }else{
    $this->view->render('errores/bloquear');
  }
  }

  public function load ($metodo, $param = null) {

    $roles = 'source/roles/'.$metodo.'.php';
    $ruta = 'controllers/'.$roles;
    if(file_exists($ruta)){
    require_once $roles;
    }else{
      $controller = new Errores();
    }


  }

}
?>