<?php 
	$modulo = "nominas";
  $operacion = "ver";
  $usuario = $_SESSION['usuario'];
  if ($this->model->nominas->verificar($modulo, $operacion, $usuario)) {

      $deducciones = $this->model->nominas->getDeduccion($param[0]);
      if (isset($deducciones[0])) {
        $deducciones = $deducciones[0];
        $response = [
          'id'=>$deducciones->getId(),
          'ivss'=>$deducciones->getIvss(),
          'rpe'=>$deducciones->getRpe(),
          'faov'=>$deducciones->getFaov(),
          'inces'=>$deducciones->getInces()
        ];
        
        echo json_encode($response);
      } else {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode([
          'error'=>true,
          'error_msg'=>'Deducciones no encontrado'
        ]);

      }
    
	} else {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode([
      'error'=>true,
      'error_msg'=>'No cuenta con los permisos para realizar esta acción'
    ]);
  }
?>