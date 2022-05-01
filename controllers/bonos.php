<?php 

class Bonos extends Controller{

  function __construct () {
    parent::__construct();
  }

  function render () {
    $modulo = "usuarios";
    $operacion = "ver";
    $usuario = $_SESSION['usuario'];
    if ($this->model->bonos->verificar($modulo, $operacion, $usuario)) {

    $this->view->mensaje = 'Esta pagina controla los bonos';
    $bonos = $this->model->bonos->get();
    $this->view->bonos = $bonos;

    $trabajadores = $this->model->bonos->getTrabajadores();
    $this->view->trabajadores = $trabajadores;
    
    $getBonos = $this->model->bonos->getBonos();
    $this->view->getBonos = $getBonos;
     

      $this->view->render('bonos/index');
  }else{
    $this->view->render('errores/bloquear');
  }
  
  
  
}
  public function load ($metodo, $param = null) {
    $bonos = 'source/bonos/'.$metodo.'.php';
    $ruta = 'controllers/'.$bonos;
    if(file_exists($ruta)){
    require_once $bonos;
    }else{
      $controller = new Errores();
    }

  }

}

?>