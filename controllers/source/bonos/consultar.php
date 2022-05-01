<?php
	$desde        = ($_POST['desde'] !== "") ? $_POST['desde'] : NULL;
    $hasta        = ($_POST['hasta'] !== "") ? $_POST['hasta'] : NULL;
    $bonos = $this->model->bonos->getConsultar($desde, $hasta);
    $this->view->bonos = $bonos;
    $this->view->render('bonos/consultar');
?>