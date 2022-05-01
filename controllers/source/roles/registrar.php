<?php
sleep(1);
	$nombre_rol = ($_POST['nombre_rol'] !== "") ? $_POST['nombre_rol'] : NULL;
  $selected = $_POST['selected'];
      if ($this->model->roles->insert($nombre_rol)){
        foreach( $selected as $operacion ){
           $this->model->roles->insertPermisos($nombre_rol, $operacion);
        }
        $this->bitacora($_SESSION['usuario'], 'Usuarios', 'Registró a '. $nombre_rol);  
      }else{
        echo "error inesperado";
      }
?>