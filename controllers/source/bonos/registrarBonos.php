<?php
sleep(1);
    $nombre_bono = ($_POST['nombre_bono'] !== "") ? $_POST['nombre_bono'] : NULL;
    $cargo        = ($_POST['cargo'] !== "") ? $_POST['cargo'] : NULL;
    $moneda     = ($_POST['moneda'] !== "") ? $_POST['moneda'] : NULL;
    $valor     = ($_POST['valor'] !== "") ? $_POST['valor'] : NULL;
    $dias     = ($_POST['dias'] !== "") ? $_POST['dias'] : NULL;

      if ($this->model->bonos->insertBonos(['dias'=>$dias,'valor'=>$valor, 'cargo'=>$cargo,'moneda'=>$moneda, 'nombre_bono'=>$nombre_bono])){
        $this->bitacora($_SESSION['usuario'], 'Bonos', 'Registró '. $nombre_bono); 
      }else{
        echo "error inesperado";
      }
?>