<?php 
class reportes extends Controller{
  function __construct () {
    parent::__construct();
  }  
  function render () {
    $modulo = "reportes";
    $operacion = "ver";
    $usuario = $_SESSION['usuario'];
    if ($this->model->reportes->verificar($modulo, $operacion, $usuario)) {

    $this->view->mensaje = 'Esta pagina controla los reportes ';
    $this->view->render('reportes/index');
    }else{
    $this->view->render('errores/bloquear');
  }
 
  }

  public function load ($metodo, $param = null) {
	 $modulo = "reportes";

    $reportes = 'source/reportes/'.$metodo.'.php';
    $ruta = 'controllers/'.$reportes;
    if(file_exists($ruta)){
    require_once $reportes;
    }else{
      $controller = new Errores();
    }

  }

}

?>