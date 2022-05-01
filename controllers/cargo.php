<?php 

class Cargo extends Controller{

  function __construct () {
    parent::__construct();
  }

  function render () {
    $modulo = "cargo";
    $operacion = "ver";
    $usuario = $_SESSION['usuario'];
    if ($this->model->cargo->verificar($modulo, $operacion, $usuario)) {
    $this->view->mensaje = 'Esta pagina controla los cargo';
    
    $cargo = $this->model->cargo->get();
    $this->view->cargo = $cargo;

    $this->view->render('cargo/index');
    }else{
    $this->view->render('errores/bloquear');
  }

  }

  public function load ($metodo, $param = null) {

    $cargo = 'source/cargo/'.$metodo.'.php';
    $ruta = 'controllers/'.$cargo;
    if(file_exists($ruta)){
    require_once $cargo;
    }else{
      $controller = new Errores();
    }


  }

}
?>