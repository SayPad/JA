<?php
sleep(1);
	$usuario = ($_POST['usuario'] !== "") ? $_POST['usuario'] : NULL;
    $id_rol        = ($_POST['rol'] !== "") ? $_POST['rol'] : NULL;
    $id_trabajador     = ($_POST['trabajador'] !== "") ? $_POST['trabajador'] : NULL;
    $contrasena     = ($_POST['contrasena'] !== "") ? $_POST['contrasena'] : NULL;

      if ($this->model->usuarios->insert(['contrasena'=>$contrasena, 'id_rol'=>$id_rol,'id_trabajador'=>$id_trabajador, 'usuario'=>$usuario])){
        $this->bitacora($_SESSION['usuario'], 'Usuarios', 'Registró a '. $usuario); 
      }else{
        echo "error inesperado";
      }

  
?>