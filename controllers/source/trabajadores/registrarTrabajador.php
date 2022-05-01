<?php 
  
  if(isset($_POST['agregar'])){
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
        $this->view->mensaje = '¡Trabajador agregado exitosamente!';
        $this->bitacora($_SESSION['usuario'], 'Trabajadores', 'Registró a '. $nombre);
      }else{
        $this->view->mensaje = $this->model->trabajadores->getError();
      }
      $this->view->render('trabajadores/mensaje');
    }else{
      $this->view->mensaje = 'Rellene los campos';
    
    $modulo = "trabajadores";
    $operacion = "agregar";
    $usuario = $_SESSION['usuario'];
    if ($this->model->trabajadores->verificar($modulo, $operacion, $usuario)) {
    $cargos = $this->model->trabajadores->getCargos();
    $this->view->cargos = $cargos;
    $this->view->render('trabajadores/agregar');
    }else{
      $this->view->render('errores/bloquear');
    }
    }
?>