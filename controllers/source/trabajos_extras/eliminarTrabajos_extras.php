<?php
	$modulo = "trabajosExtras";
    $operacion = "eliminar";
    $usuario = $_SESSION['usuario'];
    if ($this->model->trabajos_extras->verificar($modulo, $operacion, $usuario)) {

	if ( $this->model->trabajos_extras->drop($param[0]) ) {
		$this->bitacora($_SESSION['usuario'], 'Trabajos Extras', 'Eliminó trabajos extras '. $param[0]);
		$mensaje = 'Trabajo extra Eliminado';
	} else {
		$mensaje = 'Ha ocurrido un Error';

	}

	echo $mensaje;
	}else{
        $this->view->render('errores/bloquear');
     }
?>