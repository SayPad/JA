<?php
	$modulo = "seguridad";
    $operacion = "eliminar";
    $usuario = $_SESSION['usuario']; 
    if ($this->model->roles->verificar($modulo, $operacion, $usuario)) {

    if ($param[0] == 1) {
		 $this->view->mensaje = '¡No se puede eliminar al rol root!';
	}else{

	if ( $this->model->roles->drop($param[0]) ) {
		$this->bitacora($_SESSION['usuario'], 'Roles', 'Eliminó a '. $param[0]);
		 header('location:'. constant('URL').'roles');
	} else {
		$this->view->mensaje = '¡Ha ocurrido un error!';
	}
	}
	$this->view->render('roles/mensaje');
	}else{
        $this->view->render('errores/bloquear');
     }
?>