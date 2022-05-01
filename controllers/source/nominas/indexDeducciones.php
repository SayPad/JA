<?php
$id_deducciones = 1;
    $deducciones = $this->model->nominas->getDeduccion($id_deducciones);
    $this->view->deducciones = $deducciones;
    $this->view->render('nominas/indexDeducciones');
?>