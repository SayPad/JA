<?php 

  class Main extends Controller{

    function __construct () {
      parent::__construct();
      
    }

function render() {
date_default_timezone_set('America/Caracas');
$dolar = $this->model->dolar->get();
$this->view->dolar = $dolar;


$this->view->mensajeAlerta = [];
$trabajadores = $this->model->trabajadores->get();
$date2 = new DateTime(date("Y-m-d"));
$alertaNomina = 0;
$alertaCestaticket = 0;
foreach($trabajadores as $row){
  $trabajador = $row;
  $cedula = $trabajador->getCedula();
  $desde = $this->model->nominas->getAlerta($cedula);
  $fecha = new DateTime($desde);
  $diff = $fecha->diff($date2);
        if ($diff->days > 7) {    
          array_push($this->view->mensajeAlerta, 'Ultima nomina de '.$trabajador->getNombre(). ' ' . $trabajador->getApellido(). ' hace una semana');
          $alertaNomina = ++$alertaNomina;
        } 
}

if ($alertaNomina > 0) {
  $_SESSION['campana'] = 'campanaActiva.png';
}else{
  if ($alertaCestaticket > 0) {
    $_SESSION['campana'] = 'campanaActiva.png';
  }else{
    $_SESSION['campana'] = 'campana.png';
  }
}




$cantUsuario = $this->model->main->cantUsuario();
$this->view->cantUsuario = $cantUsuario;

$cantRoles = $this->model->main->cantRoles();
$this->view->cantRoles = $cantRoles;

$cantTrabajadores = $this->model->main->cantTrabajadores();
$this->view->cantTrabajadores = $cantTrabajadores;

$cantCargo = $this->model->main->cantCargo();
$this->view->cantCargo = $cantCargo;

$cantNomina = $this->model->main->cantNomina();
$this->view->cantNomina = $cantNomina;

$cantReposo = $this->model->main->cantReposo();
$this->view->cantReposo = $cantReposo;

$cantPermiso = $this->model->main->cantPermiso();
$this->view->cantPermiso = $cantPermiso;

    $this->view->render('main/index');
    }

    public function load ($metodo, $param = null) {

    $rutaMain = 'source/main/'.$metodo.'.php';
    $ruta = 'controllers/'.$rutaMain;
    if(file_exists($ruta)){
    require_once $rutaMain;
    }else{
      $controller = new Errores();
    }
  }

  }

?>