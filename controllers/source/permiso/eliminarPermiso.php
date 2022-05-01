<?php
	$modulo = "inasistencias";
    $operacion = "eliminar";
    $usuario = $_SESSION['usuario'];

    if ($this->model->permiso->verificar($modulo, $operacion, $usuario)) {

	if ( $this->model->permiso->drop($param[0]) ) {
	$this->bitacora($_SESSION['usuario'], 'Permiso', 'Eliminó a '. $param[0]);
	header('location:'. constant('URL').'permiso');
	} else {
	$this->view->mensaje = '¡Ha ocurrido un error!';
	} 
	$this->view->render('permiso/mensaje');
	}else{
        $this->view->render('errores/bloquear');
     }
?>