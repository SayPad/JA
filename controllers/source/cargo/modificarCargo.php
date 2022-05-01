<?php 
sleep(1);
      $nombre_cargo    = ($_POST['cargo'] !== "") ? $_POST['cargo'] : NULL;
      $sueldo = ($_POST['sueldo_semanal'] !== "") ? $_POST['sueldo_semanal'] : NULL;
      $prima = ($_POST['prima_hogar'] !== "") ? $_POST['prima_hogar'] : NULL;

  if ($this->model->cargo->update(['nombre_cargo'=>$nombre_cargo, 'sueldo'=>$sueldo, 'prima'=>$prima])){
        $this->bitacora($_SESSION['usuario'], 'Cargo', 'Modificó a '. $nombre_cargo);
        $this->view->mensaje = '¡Cargo Modificado exitosamente!';
      }else{
        $this->view->mensaje = '¡Ha ocurrido un error!';
      }
?>