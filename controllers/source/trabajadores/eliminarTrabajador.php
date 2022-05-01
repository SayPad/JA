<?php
	$modulo = "trabajadores";
    $operacion = "eliminar";
    $usuario = $_SESSION['usuario'];
    if ($this->model->trabajadores->verificar($modulo, $operacion, $usuario)) {

	if ( $this->model->trabajadores->drop($param[0]) ) {
		$this->view->mensaje = '¡Eliminado con exito!';
	$this->bitacora($_SESSION['usuario'], 'Trabajadores', 'Eliminó a '. $param[0]);
	 header('location:'. constant('URL').'trabajadores');
	} else {
		 $this->view->mensaje = '¡Ha ocurrido un error!';
	} 
	$this->view->render('trabajadores/mensaje');
	}else{
        $this->view->render('errores/bloquear');
     }
?>