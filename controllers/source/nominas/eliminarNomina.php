<?php
	$modulo = "nominas";
    $operacion = "eliminar";
    $usuario = $_SESSION['usuario'];
    if ($this->model->nominas->verificar($modulo, $operacion, $usuario)) {
	if ( $this->model->nominas->drop($param[0]) ) {
		 $this->bitacora($_SESSION['usuario'], 'Nominas', 'Eliminó nomina '. $param[0]);
		$mensaje = 'Nomina Eliminado';
	} else {
		$mensaje = 'Ha ocurrido un Error';

	}

	echo $mensaje;
	}else{
        $this->view->render('errores/bloquear');
     }
?>