<?php 
sleep(1);

  if (!isset($_POST['ajax'])) {

    if(isset($_POST['modificarUsuario'])) {
        $usuario = ($_POST['usuario'] !== "") ? $_POST['usuario'] : NULL;
        $id_rol        = ($_POST['rol'] !== "") ? $_POST['rol'] : NULL;
        $id_trabajador     = ($_POST['trabajador'] !== "") ? $_POST['trabajador'] : NULL;
        $contrasena     = ($_POST['contrasena'] !== "") ? $_POST['contrasena'] : NULL;
  
  
        if ($this->model->usuarios->update(['contrasena'=>$contrasena, 'id_rol'=>$id_rol,'id_trabajador'=>$id_trabajador, 'usuario'=>$usuario])){
          $this->bitacora($_SESSION['usuario'], 'Usuarios', 'Modificó a '. $usuario);
          $this->view->mensaje = '¡Usuario Modificado exitosamente!';
  
        }else{
          $this->view->mensaje = '¡Ha ocurrido un error!';
        }
        $this->view->render('usuarios/mensaje');
  
  
      }elseif (isset($_POST['modificarUsuarioMain'])) {
        
        $usuario = ($_POST['usuario'] !== "") ? $_POST['usuario'] : NULL;
        $id_rol        = ($_POST['rol'] !== "") ? $_POST['rol'] : NULL;
        $id_trabajador     = ($_POST['trabajador'] !== "") ? $_POST['trabajador'] : NULL;
        $contrasena     = ($_POST['contrasena'] !== "") ? $_POST['contrasena'] : NULL;
  
  
        if ($this->model->usuarios->update(['contrasena'=>$contrasena, 'id_rol'=>$id_rol,'id_trabajador'=>$id_trabajador, 'usuario'=>$usuario])){
          $this->view->mensaje = '¡Modificado exitosamente! Los cambios se efectuaran al iniciar sesion nuevamente';
  
        }else{
          $this->view->mensaje = '¡Ha ocurrido un error!';
        }
  
        $this->view->render('main/mensaje');
  
      }
  
       else {
  
      $modulo = "usuarios";
      $operacion = "editar";
      $usuario = $_SESSION['usuario'];
      if ($this->model->usuarios->verificar($modulo, $operacion, $usuario)) {
        if ($param[0] == 1) {
          $this->view->mensaje = '¡No se puede Modificar al usuario root!';
          $alerta = $this->alerta();
          $this->view->alerta = $alerta;
           $this->view->render('usuarios/mensaje');
        }else{
          $usuarios = $this->model->usuarios->get($param[0]);
          $roles = $this->model->usuarios->getRoles();
          $this->view->roles = $roles;
          $trabajadores = $this->model->usuarios->getTrabajadores();
          $this->view->trabajadores = $trabajadores;
  
          if (isset($usuarios[0])){
            $this->view->usuarios = $usuarios[0];
            $this->view->render('usuarios/actualizar'); 
          }else{
            $this->view->mensaje = 'Usuario no encontrado';
  
            $this->view->render('usuarios/mensaje');
          }
        }
        }else{
  
          $this->view->render('errores/bloquear');
        }
      }
  } else {
    $usuario = ($_POST['usuario'] !== "") ? $_POST['usuario'] : NULL;
    $id_rol        = ($_POST['rol'] !== "") ? $_POST['rol'] : NULL;
    $id_trabajador     = ($_POST['trabajador'] !== "") ? $_POST['trabajador'] : NULL;
    $contrasena     = ($_POST['contrasena'] !== "") ? $_POST['contrasena'] : NULL;

    if ($this->model->usuarios->update(['contrasena'=>$contrasena, 'id_rol'=>$id_rol,'id_trabajador'=>$id_trabajador, 'usuario'=>$usuario])){
      $this->bitacora($_SESSION['usuario'], 'Usuarios', 'Modificó a '. $usuario);
      echo json_encode(['success_message' => '¡Usuario Modificado exitosamente!']);

    }else{
      header('HTTP/1.1 500 Internal Server Error');
      echo json_encode([
        'error'=>true,
        'error_msg'=> '¡Ha ocurrido un error!'
      ]);
    }
  }

?>