<?php 
sleep(1);
      $nombre_bono    = ($_POST['nombre_bono'] !== "") ? $_POST['nombre_bono'] : NULL;
      $nombre_cargo    = ($_POST['cargo'] !== "") ? $_POST['cargo'] : NULL;
      $moneda = ($_POST['moneda'] !== "") ? $_POST['moneda'] : NULL;
      $valor = ($_POST['valor'] !== "") ? $_POST['valor'] : NULL;
      $dias = ($_POST['dias'] !== "") ? $_POST['dias'] : NULL;
  if ($this->model->bonos->update(['nombre_bono'=>$nombre_bono, 'moneda'=>$moneda, 'valor'=>$valor, 'dias'=>$dias, 'nombre_cargo'=>$nombre_cargo])){
        $this->view->mensaje = '¡Bonos Modificado exitosamente!';
      }else{
        $this->view->mensaje = '¡Ha ocurrido un error!';
      }
?>