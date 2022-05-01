<?php 
	
	if(isset($_POST['actualizar'])) {

    $id_rol = ($_POST['id_rol'] !== "") ? $_POST['id_rol'] : NULL;

        if(!empty($_POST['check_list'])){
          $this->model->roles->restaurarOperaciones($id_rol);
          foreach($_POST['check_list'] as $selected){
            $this->model->roles->updateOperaciones($id_rol, $selected);
          }
        }
        $this->bitacora($_SESSION['usuario'], 'Roles', 'Modificó permisos de '. $id_rol);
        $this->view->mensaje = '¡Exito!';
      $this->view->render('roles/mensaje');
    } else {
      $modulo = "seguridad";
      $operacion = "editar";
      $usuario = $_SESSION['usuario'];
      if ($this->model->roles->verificar($modulo, $operacion, $usuario)) {

      $roles = $this->model->roles->get($param[0]);
      if (isset($roles)){

        $this->view->roles = $roles[0];

        $this->view->render('roles/permisos'); 
      } else {
        $this->view->mensaje = 'Rol no encontrado';
        $this->view->render('roles/mensaje');
      }
      }else{
        $this->view->render('errores/bloquear');
      }
    }

?>