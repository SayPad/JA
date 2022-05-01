<?php 

class Trabajos_extras extends Controller{

  function __construct () {
    parent::__construct();
  }

  function render () {
    $modulo = "trabajosExtras";
    $operacion = "ver";
    $usuario = $_SESSION['usuario'];
    if ($this->model->trabajos_extras->verificar($modulo, $operacion, $usuario)) {

    $this->view->mensaje = 'Esta pagina controla las trabajos_extras';
    $trabajos_extras = $this->model->trabajos_extras->get();
    $trabajadores = $this->model->trabajos_extras->getTrabajadores();
    $this->view->trabajadores = $trabajadores;
    
    $this->view->trabajos_extras = $trabajos_extras;
    
    $this->view->render('trabajos_extras/index');
   }else{
    $this->view->render('errores/bloquear');
  }
  }

  public function load ($metodo, $param = null) {

    $trabajos_Extras = 'source/trabajos_extras/'.$metodo.'.php';
    $ruta = 'controllers/'.$trabajos_Extras;
    if(file_exists($ruta)){
    require_once $trabajos_Extras;
    }else{
      $controller = new Errores();
    }
  }

}

?>