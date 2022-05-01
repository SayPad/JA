<?php
sleep(1);
	   $trabajador    = ($_POST['trabajador'] !== "") ? $_POST['trabajador'] : NULL;
      $desde = ($_POST['desde'] !== "") ? $_POST['desde'] : NULL;
      $hasta = ($_POST['hasta'] !== "") ? $_POST['hasta'] : NULL;
      $descripcion = ($_POST['descripcion'] !== "") ? $_POST['descripcion'] : NULL;

      if ($this->model->permiso->insert(['trabajador'=>$trabajador, 'desde'=>$desde, 'hasta'=>$hasta,'descripcion'=>$descripcion])){
        $this->bitacora($_SESSION['usuario'], 'Permiso', 'Registró a '. $trabajador);
      }else{
        echo "error inesperado";
      }

  
?>