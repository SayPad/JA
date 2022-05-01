<?php 
class Backup extends Controller{
  function __construct () {
    parent::__construct();
  }
  function render () {
    
    $this->view->mensaje = 'Respaldo de la base de datos';
    $this->view->render('backup/index');
  
  }

  public function load ($metodo, $param = null) {
    $backup = 'source/backup/'.$metodo.'.php';
    $ruta = 'controllers/'.$backup;
    if(file_exists($ruta)){
    require_once $backup;
    }else{
      $controller = new Errores();
    }

  }

}

?>