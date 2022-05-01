<?php
sleep(1);
	$dato = ($_POST['cedula'] !== "") ? $_POST['cedula'] : NULL;
      if ($this->model->trabajadores->existe($dato)){ 
      }
?>