<?php 
class Nominas extends Controller{

  function __construct () {
    parent::__construct();
  }

  function render () {
    $modulo = "nominas";
    $operacion = "ver";
    $usuario = $_SESSION['usuario'];
    if ($this->model->nominas->verificar($modulo, $operacion, $usuario)) {
    $this->view->mensaje = 'Esta pagina controla las nominas';
    $nominas = $this->model->nominas->get();
    $this->view->nominas = $nominas;
    $trabajadores = $this->model->nominas->getTrabajadores();
    $this->view->trabajadores = $trabajadores;
    $this->view->render('nominas/index');
    }else{
    $this->view->render('errores/bloquear');
  } 
  }

  public function load ($metodo, $param = null) {

    $nomina = 'source/nominas/'.$metodo.'.php';
    $ruta = 'controllers/'.$nomina;
    if(file_exists($ruta)){
    require_once $nomina;
    }else{
      $controller = new Errores();
    }
  }

}
?>