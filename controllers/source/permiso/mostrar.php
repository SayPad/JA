<?php 
	$modulo = "inasistencias";
  $operacion = "ver";
  $usuario = $_SESSION['usuario'];
  if ($this->model->permiso->verificar($modulo, $operacion, $usuario)) {
    if (2 == 1) {
      $this->view->mensaje = '¡No se puede modificar al root!';
      header('HTTP/1.1 500 Internal Server Error');
      echo json_encode([
        'error'=>true,
        'error_msg'=>'No cuenta con los permisos para realizar esta accion'
      ]);

    } else {
      $dato = $this->model->permiso->get($param[0]);
      if (isset($dato[0])) {
        $dato = $dato[0];
        $response = [
          'id'=>$dato->getId(),
          'nombre'=>$dato->getNombre(),
          'apellido'=>$dato->getApellido(),
          'cedula'=>$dato->getCedula(),
          'desde'=>$dato->getDesde(),
          'hasta'=>$dato->getHasta(),  
          'descripcion'=>$dato->getDescripcion()
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