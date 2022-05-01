<?php
	$modulo = "cargo";
    $operacion = "eliminar";
    $usuario = $_SESSION['usuario'];
    if ($this->model->cargo->verificar($modulo, $operacion, $usuario)) {

	if ( $this->model->cargo->drop($param[0]) ) {
	$this->bitacora($_SESSION['usuario'], 'Cargo', 'Eliminó a '. $param[0]);
	header('location:'. constant('URL').'cargo');
	} else {
		 $this->view->mensaje = '¡Ha ocurrido un error!';
	} 
	$this->view->render('cargo/mensaje');
	}else{
        $this->view->render('errores/bloquear');
     }
?>