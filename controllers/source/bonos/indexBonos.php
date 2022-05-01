<?php
    $bonos = $this->model->bonos->getBonos();
    $this->view->bonos = $bonos;

    $cargos = $this->model->bonos->getCargos();
    $this->view->cargos = $cargos;

    $this->view->render('bonos/indexBonos');
?>