<?php 

class Trabajadores extends Controller{

  function __construct () {
    parent::__construct();
  }

  function render () {
    $modulo = "trabajadores";
    $operacion = "ver";
    $usuario = $_SESSION['usuario'];
    if ($this->model->trabajadores->verificar($modulo, $operacion, $usuario)) {


    $this->view->mensaje = 'Esta pagina controla los trabajadores';
    $trabajadores = $this->model->trabajadores->get();
    $this->view->trabajadores = $trabajadores;
    $cargos = $this->model->trabajadores->getCargos();
    $this->view->cargos = $cargos;
    $this->view->render('trabajadores/index');
    }else{
    $this->view->render('errores/bloquear');
  }

  }

  public function load ($metodo, $param = null) {

    $trabajadores = 'source/trabajadores/'.$metodo.'.php';
    $ruta = 'controllers/'.$trabajadores;
    if(file_exists($ruta)){
    require_once $trabajadores;
    }else{
      $controller = new Errores();
    }

  }

}

?>