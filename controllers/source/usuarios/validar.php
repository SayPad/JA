<?php
sleep(1);
	$usuario = ($_POST['usuario'] !== "") ? $_POST['usuario'] : NULL;
      if ($this->model->usuarios->existe($usuario)){
      }
?>