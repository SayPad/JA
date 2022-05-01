<?php 

class Permiso extends Controller{

  function __construct () {
    parent::__construct();
  }

  function render () {
    $modulo = "inasistencias";
    $operacion = "ver";
    $usuario = $_SESSION['usuario'];
    if ($this->model->permiso->verificar($modulo, $operacion, $usuario)) {

    $this->view->mensaje = 'Esta pagina controla los permisos';
    
    $permiso = $this->model->permiso->get();
    $this->view->permiso = $permiso;
    $trabajadores = $this->model->permiso->getTrabajadores();
    $this->view->trabajadores = $trabajadores;

    $this->view->render('permiso/index');
    }else{
    $this->view->render('errores/bloquear');
  }

  }

  public function load ($metodo, $param = null) {

    $permiso = 'source/permiso/'.$metodo.'.php';
    $ruta = 'controllers/'.$permiso;
    if(file_exists($ruta)){
    require_once $permiso;
    }else{
      $controller = new Errores();
    }

  }

}

?>