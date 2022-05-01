<?php
sleep(1);
	   $nombre    = ($_POST['nombre'] !== "") ? $_POST['nombre'] : NULL;
      $sueldo = ($_POST['sueldo'] !== "") ? $_POST['sueldo'] : NULL;
      $prima = ($_POST['prima'] !== "") ? $_POST['prima'] : NULL;
      
      if ($this->model->cargo->insert(['nombre'=>$nombre, 'sueldo'=>$sueldo, 'prima'=>$prima])){ 
        $this->bitacora($_SESSION['usuario'], 'Cargo', 'Registró a '. $nombre);
      }else{
        echo "error inesperado";
      }

?>


