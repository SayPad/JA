<?php 
	$modulo = "usuarios";
    $operacion = "eliminar";
    $usuario = $_SESSION['usuario'];
    if ($this->model->usuarios->verificar($modulo, $operacion, $usuario)) {

	if ($param[0] == 1) {
		 $this->view->mensaje = '¡No se puede eliminar al usuario root!';
	}else{
		if ( $this->model->usuarios->drop($param[0]) ) {
		$this->bitacora($_SESSION['usuario'], 'Usuarios', 'Eliminó a '. $param[0]);
		 header('location:'. constant('URL').'usuarios');
	} else {
		 $this->view->mensaje = '¡Ha ocurrido un error!';

		 $this->view->render('usuarios/mensaje');
	}
	}

	$this->view->render('usuarios/mensaje');

	}else{

        $this->view->render('errores/bloquear');
     }
?>