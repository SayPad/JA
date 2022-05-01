<?php 
	$modulo = "usuarios";
  $operacion = "ver";
  $usuario = $_SESSION['usuario'];
  if ($this->model->bonos->verificar($modulo, $operacion, $usuario)) {
    if ($param[0] == 1) {
      $this->view->mensaje = '¡No se puede modificar al usuario root!';
      header('HTTP/1.1 500 Internal Server Error');
      echo json_encode([
        'error'=>true,
        'error_msg'=>'No cuenta con los permisos para realizar esta acción'
      ]);

    } else {
      $bonos = $this->model->bonos->getBonos($param[0]);
      if (isset($bonos[0])) {
        $bonos = $bonos[0];
        $response = [
          'id'=>$bonos->getId(),
          'nombre_bono'=>$bonos->getNombre_bono(),
          'valor'=>$bonos->getValor(),
          'dias'=>$bonos->getDias(),
          'nombre_cargo'=>$bonos->getNombre_cargo(), 
          'moneda'=>$bonos->getMoneda()
        ];
        echo json_encode($response);
      } else {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode([
          'error'=>true,
          'error_msg'=>'Bono no encontrado'
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