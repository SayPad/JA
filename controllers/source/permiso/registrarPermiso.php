<?php 
  if(isset($_POST['agregar'])){
      $trabajador    = ($_POST['trabajador'] !== "") ? $_POST['trabajador'] : NULL;
      $desde = ($_POST['desde'] !== "") ? $_POST['desde'] : NULL;
      $hasta = ($_POST['hasta'] !== "") ? $_POST['hasta'] : NULL;
      $descripcion = ($_POST['descripcion'] !== "") ? $_POST['descripcion'] : NULL;


      if ($this->model->permiso->insert(['trabajador'=>$trabajador, 'desde'=>$desde, 'hasta'=>$hasta,'descripcion'=>$descripcion])){
        $this->view->mensaje = '¡Permiso agregado exitosamente!';
        $this->bitacora($_SESSION['usuario'], 'Permiso', 'Registró a '. $trabajador);
      }else{
        $this->view->mensaje = $this->model->permiso->getError();
      }
      $this->view->render('permiso/mensaje');
    }else{
      $this->view->mensaje = 'Rellene los campos';
    
      $modulo = "inasistencias";
      $operacion = "agregar";
      $usuario = $_SESSION['usuario'];
      if ($this->model->permiso->verificar($modulo, $operacion, $usuario)) {
        
      $trabajadores = $this->model->permiso->getTrabajadores();
      $this->view->trabajadores = $trabajadores;
      $this->view->render('permiso/agregar');
      }else{
      $this->view->render('errores/bloquear');
      }
    }
?> 