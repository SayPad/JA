<?php 
  class Controller {

    function __construct() {
      $this->view = new View();
    }

    function loadModel($model, $param = null) {
      $url = 'models/' . $model. 'model.php';

      if( file_exists($url) ) {
        require_once $url;
        $modelName = $model .'Model';
        $this->model = new $modelName();

      }
    }
    //Conigurar usuario y devolver datos a la vista;
    public function setUsuario ($usuario) {
      $query = $this->model->db->connect()->prepare
      ('SELECT * FROM usuarios INNER JOIN trabajadores ON usuarios.cedula_trabajador = trabajadores.cedula WHERE usuario = :usuario');
      $query->execute(['usuario' => $usuario]);

      foreach($query as $usuarioActual) {
        $this->view->nombre = $usuarioActual['nombre'];
        $this->view->apellido = $usuarioActual['apellido'];
        $this->view->usuario = $usuarioActual['usuario'];
        $this->view->cedula = $usuarioActual['cedula'];
        $this->view->rol = $usuarioActual['id_rol'];
      }
    }

    public function bitacora ($usuario, $tabla, $operacion) {
      $urlBitacora = 'models/bitacoramodel.php';
      if( file_exists($urlBitacora) ) {
        require_once $urlBitacora;
        $this->model = new BitacoraModel();
        $fecha = date('Y-m-d H:i:s');
        $this->model->insert($usuario, $tabla, $operacion, $fecha);
      }
       
    }
    /*
    public function alerta () {
        date_default_timezone_set('America/Caracas');  
        $this->view->mensajeAlerta = [];
        $trabajadores = $this->model->trabajadores->get();
        $date2 = new DateTime(date("Y-m-d"));
         $campana = "campana.png";
        foreach($trabajadores as $row){
          $trabajador = $row;
          $cedula = $trabajador->getCedula();
          $desde = $this->model->nominas->getAlerta($cedula);
          $fecha = new DateTime($desde);
          $diff = $fecha->diff($date2);
            if ($diff->days > 7) {    
              $campana = "campanaActiva.png";
            } 
        }
        foreach($trabajadores as $row){
          $trabajador = $row;
          $cedula = $trabajador->getCedula();
          $desdeCesta = $this->model->cestaticket->getAlerta($cedula);
          $fecha = new DateTime($desdeCesta);
          $diff = $fecha->diff($date2);
            if ($diff->days > 7) {    
              $campana = "campanaActiva.png";
            } 
        }
      
      return $campana;
      }*/

  }
?>