<?php 

class Bitacora extends Controller{

  function __construct () {
    parent::__construct();
  }

  function render () {
    $modulo = "seguridad";
    $operacion = "ver";
    $usuario = $_SESSION['usuario'];
    if ($this->model->bitacora->verificar($modulo, $operacion, $usuario)) {
    $this->view->mensaje = 'Esta pagina controla los bitacora';

    $bitacora = $this->model->bitacora->get();
    $this->view->bitacora = $bitacora;

    $this->view->render('bitacora/index');

    }else{
    $this->view->render('errores/bloquear');
  }
  }

  public function load ($metodo, $param = null) {

    $bitacora = 'source/bitacora/'.$metodo.'.php';
    $ruta = 'controllers/'.$bitacora;
    if(file_exists($ruta)){
    require_once $bitacora;
    }else{
      $controller = new Errores();
    }
   

  }
}
?>