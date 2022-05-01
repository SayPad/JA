<?php  
	if(isset($_POST['modificarRol'])) {
      $id_rol    = ($_POST['id_rol'] !== "") ? $_POST['id_rol'] : NULL;
      $nombre_rol    = ($_POST['nombre_rol'] !== "") ? $_POST['nombre_rol'] : NULL;
    

      if ($this->model->roles->update([
        'id_rol'=>$id_rol, 
        'nombre_rol'=>$nombre_rol])){
        $this->bitacora($_SESSION['usuario'], 'Roles', 'Modificó a '. $nombre_rol);
        $this->view->mensaje = '¡Rol Modificado exitosamente!';

      }else{
    
        $this->view->mensaje = '¡Ha ocurrido un error! El nombre del rol ya existe.';
      }
      $this->view->render('roles/mensaje');

    } else {
      $modulo = "seguridad";
      $operacion = "editar";
      $usuario = $_SESSION['usuario'];
      if ($this->model->roles->verificar($modulo, $operacion, $usuario)) {
          
      $roles = $this->model->roles->get($param[0]);
      if (isset($roles[0])){

        $this->view->roles = $roles[0];

        $this->view->render('roles/actualizar'); 
      } else {
        $this->view->mensaje = 'Rol no encontrado';
        $this->view->render('roles/mensaje');
      }
      }else{
        $this->view->render('errores/bloquear');
      }
    }

?>