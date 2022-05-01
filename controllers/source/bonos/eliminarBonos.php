<?php 
	$modulo = "usuarios";
    $operacion = "eliminar";
    $usuario = $_SESSION['usuario'];
    if ($this->model->bonos->verificar($modulo, $operacion, $usuario)) {

		 $this->view->mensaje = '¡No se puede eliminar al usuario root!';

		if ( $this->model->bonos->drop($param[0]) ) {
		$this->bitacora($_SESSION['usuario'], 'Usuarios', 'Eliminó a '. $param[0]);
		 header('location:'. constant('URL').'bonos');
	} else {
		 $this->view->mensaje = '¡Ha ocurrido un error!';

		 $this->view->render('bonos/mensaje');
	}
	

	$this->view->render('bonos/mensaje');

	}else{

        $this->view->render('errores/bloquear');
     }
?>