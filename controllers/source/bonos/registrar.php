<?php
sleep(1);
    $trabajador = ($_POST['trabajador'] !== "") ? $_POST['trabajador'] : NULL;
    $bono        = ($_POST['bono'] !== "") ? $_POST['bono'] : NULL;
    $periodo_desde     = ($_POST['periodo_desde'] !== "") ? $_POST['periodo_desde'] : NULL;
    $periodo_hasta     = ($_POST['periodo_hasta'] !== "") ? $_POST['periodo_hasta'] : NULL;
    $tipo_pago     = ($_POST['pago'] !== "") ? $_POST['pago'] : NULL;
    $fecha_pago     = ($_POST['fecha_pago'] !== "") ? $_POST['fecha_pago'] : NULL;
    //Obtener inasistencias
    $inasistencias = $this->model->bonos->getFaltas($trabajador, $periodo_desde, $periodo_hasta);
    //Obetener valor    
    $datos = $this->model->bonos->getValor($bono);
    $valor = $datos[0];
    $moneda = $datos[1];
    $dias = $datos[2];
    if ($moneda == 1) {
       $dolar = $this->model->bonos->getDolar();
       $pago = $valor * $dolar;
    }else{
      $dolar = 0;
      $pago = $valor;
    }
    $diasLaborados = $dias - $inasistencias;
    $valorDia = $pago / $dias;
    $total_pagar = $valorDia * $diasLaborados;
    //Obetener el precio del dolar actual

    
      if ($this->model->bonos->insert([
        'trabajador'=>$trabajador,
        'bono'=>$bono, 
        'periodo_desde'=>$periodo_desde,
        'periodo_hasta'=>$periodo_hasta, 
        'tipo_pago'=>$tipo_pago, 
        'fecha_pago'=>$fecha_pago,
        'inasistencias'=>$inasistencias, 
        'total_pagar'=>$total_pagar,
        'dolar'=>$dolar
      ])){
        $this->bitacora($_SESSION['usuario'], 'Recibos Bonos', 'Registró recibo de '. $trabajador); 
      }else{
        echo "error inesperado";
      }

  
?>