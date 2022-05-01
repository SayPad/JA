<?php 
sleep(1);
      $nombre    = ($_POST['nombre'] !== "") ? $_POST['nombre'] : NULL;
      $apellido = ($_POST['apellido'] !== "") ? $_POST['apellido'] : NULL;
      $cedula = ($_POST['cedula'] !== "") ? $_POST['cedula'] : NULL;
      $fecha_ingreso = ($_POST['fecha_ingreso'] !== "") ? $_POST['fecha_ingreso'] : NULL;
      $cargo     = ($_POST['cargo'] !== "") ? $_POST['cargo'] : NULL;
      $correo     = ($_POST['correo'] !== "") ? $_POST['correo'] : NULL;

  if ($this->model->trabajadores->update(['nombre'=>$nombre, 'apellido'=>$apellido, 'cedula'=>$cedula, 'fecha_ingreso'=>$fecha_ingreso, 'cargo'=>$cargo, 'correo'=>$correo])){
        $this->view->mensaje = '¡Trabajador Modificado exitosamente!';
        $this->bitacora($_SESSION['usuario'], 'Trabajadores', 'Modificó a '. $cedula);
      }else{
        $this->view->mensaje = '¡Ha ocurrido un error!';
      }
?>