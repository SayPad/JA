<?php 
	$modulo = "usuarios";
  $operacion = "ver";
  $usuario = $_SESSION['usuario'];
  if ($this->model->usuarios->verificar($modulo, $operacion, $usuario)) {
    if ($param[0] == 'root') {
      $this->view->mensaje = '¡No se puede modificar al usuario root!';
      header('HTTP/1.1 500 Internal Server Error');
      echo json_encode([
        'error'=>true,
        'error_msg'=>'No cuenta con los permisos para realizar esta acción'
      ]);

    } else {
      $usuario = $this->model->usuarios->get($param[0]);
      if (isset($usuario[0])) {
        $usuario = $usuario[0];
        $response = [
          'usuario'=>$usuario->getUsuario(),
          'nombre'=>$usuario->getNombre(),
          'apellido'=>$usuario->getApellido(),
          'cedula'=>$usuario->getCedula(), 
          'rol'=>$usuario->getRol()
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