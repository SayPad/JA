<?php 
sleep(1);
      
      $id    = ($_POST['id'] !== "") ? $_POST['id'] : NULL;
      $desde = ($_POST['desde'] !== "") ? $_POST['desde'] : NULL;
      $hasta = ($_POST['hasta'] !== "") ? $_POST['hasta'] : NULL;
      $descripcion = ($_POST['descripcion'] !== "") ? $_POST['descripcion'] : NULL;
  if ($this->model->permiso->update(['id'=>$id, 'desde'=>$desde, 'hasta'=>$hasta, 'descripcion'=>$descripcion])){
        $this->view->mensaje = '¡Permiso modificado exitosamente!';
        $this->bitacora($_SESSION['usuario'], 'Permiso', 'Modificó a '. $id);
      }else{
        $this->view->mensaje = '¡Ha ocurrido un error!';
      }
?>