<?php
sleep(1);
	$nombre_rol = ($_POST['nombre_rol'] !== "") ? $_POST['nombre_rol'] : NULL;
      if ($this->model->roles->existe($nombre_rol)){
        $this->bitacora($_SESSION['usuario'], 'Roles', 'Registró a '. $nombre_rol); 
      }else{
        
      }
?>