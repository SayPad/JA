<?php
sleep(1);
	$nombre = ($_POST['nombre'] !== "") ? $_POST['nombre'] : NULL;
      if ($this->model->cargo->existe($nombre)){
        $this->bitacora($_SESSION['usuario'], 'Cargo', 'Registró a '. $nombre); 
      }else{
        
      }
?>