<?php
	$desde        = ($_POST['desde'] !== "") ? $_POST['desde'] : NULL;
    $hasta        = ($_POST['hasta'] !== "") ? $_POST['hasta'] : NULL;
    $nominas = $this->model->nominas->getConsultar($desde, $hasta);
    $this->view->nominas = $nominas;
    $this->view->render('nominas/consultar');
?>