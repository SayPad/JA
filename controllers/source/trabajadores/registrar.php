<?php
sleep(1);
	$cargo    = ($_POST['cargo'] !== "") ? $_POST['cargo'] : NULL;
  $nombre = ($_POST['nombre'] !== "") ? $_POST['nombre'] : NULL;
  $apellido = ($_POST['apellido'] !== "") ? $_POST['apellido'] : NULL;
  $cedula        = ($_POST['cedula'] !== "") ? $_POST['cedula'] : NULL;
  $correo     = ($_POST['correo'] !== "") ? $_POST['correo'] : NULL;
  $fecha     = ($_POST['fecha'] !== "") ? $_POST['fecha'] : NULL;
      if ($this->model->trabajadores->insert([
        'cargo'=>$cargo,
        'nombre'=>$nombre, 
        'apellido'=>$apellido, 
        'cedula'=>$cedula,
        'correo'=>$correo, 
        'fecha'=>$fecha])){
        $this->bitacora($_SESSION['usuario'], 'Trabajadores', 'Registró a '. $cedula);
      }else{
        echo "error inesperado";
      }

  
?>