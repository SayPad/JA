<?php 
  $modulo = "trabajadores";
  $operacion = "ver";
  $usuario = $_SESSION['usuario'];
  if ($this->model->trabajadores->verificar($modulo, $operacion, $usuario)) {
    if ($param[0] == 1) {
      $this->view->mensaje = '¡No se puede modificar al usuario root!';
      header('HTTP/1.1 500 Internal Server Error');
      echo json_encode([
        'error'=>true,
        'error_msg'=>'No cuenta con los permisos para realizar esta acción'
      ]);

    } else {
      $trabajadores = $this->model->trabajadores->get($param[0]);
      if (isset($trabajadores[0])) {
        $trabajadores = $trabajadores[0];
        $response = [
          'nombre'=>$trabajadores->getNombre(),
          'cargo'=>$trabajadores->getCargo(),
          'apellido'=>$trabajadores->getApellido(),
          'cedula'=>$trabajadores->getCedula(),
          'correo'=>$trabajadores->getCorreo(), 
          'fecha_ingreso'=>$trabajadores->getFecha_ingreso()
        ];
        echo json_encode($response);
      } else {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode([
          'error'=>true,
          'error_msg'=>'Usuario no encontrado'
        ]);

      }
    }
  } else {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode([
      'error'=>true,
      'error_msg'=>'No cuenta con los permisos para realizar esta acción'
    ]);
  }
?>