<?php 
	$modulo = "usuarios";
  $operacion = "ver";
  $usuario = $_SESSION['usuario'];
  if ($this->model->roles->verificar($modulo, $operacion, $usuario)) {
    if ($param[0] == 1) {
      $this->view->mensaje = '¡No se puede modificar al root!';
      header('HTTP/1.1 500 Internal Server Error');
      echo json_encode([
        'error'=>true,
        'error_msg'=>'No cuenta con los permisos para realizar esta acción'
      ]);

    } else {
      $dato = $this->model->roles->get($param[0]);
      if (isset($dato[0])) {
        $dato = $dato[0];
        $response = [
          'nombre'=>$dato->getNombre_rol(),
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