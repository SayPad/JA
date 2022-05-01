<?php
	$desde        = ($_POST['desde'] !== "") ? $_POST['desde'] : NULL;
    $hasta        = ($_POST['hasta'] !== "") ? $_POST['hasta'] : NULL;
    $trabajos_extras = $this->model->trabajos_extras->getConsultar($desde, $hasta);
    $this->view->trabajos_extras = $trabajos_extras;
    $this->view->render('trabajos_extras/consultar');
?>