<?php
sleep(1);
    $id = ($_POST['trabajador'] !== "") ? $_POST['trabajador'] : NULL;
    $periodo_desde        = ($_POST['periodo_desde'] !== "") ? $_POST['periodo_desde'] : NULL;
    $periodo_hasta        = ($_POST['periodo_hasta'] !== "") ? $_POST['periodo_hasta'] : NULL;
    $pago            = ($_POST['pago'] !== "") ? $_POST['pago'] : NULL;
    $fecha_pago  = ($_POST['fecha_pago'] !== "") ? $_POST['fecha_pago'] : NULL;
    $horas_extras = ($_POST['horas_extras'] !== "") ? $_POST['horas_extras'] : NULL;

$faltas = $this->model->nominas->getFaltas($id, $periodo_desde, $periodo_hasta);
    //Datos del trabajador
    $id = ($_POST['trabajador'] !== "") ? $_POST['trabajador'] : NULL;
    $datos = $trabajador = $this->model->nominas->getTrabajador($id);
    $nombre = $datos[0];
    $apellido = $datos[1];
    $cedula = $datos[2];
    $cargo = $datos[3];
    $sueldo_semanal = $datos[4];
    $prima = $datos[5];
    //Obtener inasistencias
    $faltas = $this->model->nominas->getFaltas($id, $periodo_desde, $periodo_hasta);
    $sueldo_diario = $sueldo_semanal / 7;
    $sueldo_hora = $sueldo_diario / 8;
    #--------------------Asignaciones----------------
    $total_dias_descanso = $sueldo_diario * 2;
    $dias_laborados = 5 - $faltas;
    $total_dias_laborados = $dias_laborados * $sueldo_diario;
    $total_dias_perdidos = $faltas * $sueldo_diario;
    $valor_horas_extras = $sueldo_hora + (($sueldo_hora * 50) / 100);
    $total_horas_extras = $horas_extras * $valor_horas_extras;
    $total_asignaciones = $total_dias_laborados + $prima + $total_horas_extras + $total_dias_descanso;
    
    #-------------------------------------------------------
    //obtener porcentaje de duccion
    $id_deducciones = 1;
    $datos_dedduccion = $this->model->nominas->getDeducciones($id_deducciones);
    $porcentaje_ivss = $datos_dedduccion[0];
    $porcentaje_rpe = $datos_dedduccion[1];
    $porcentaje_faov = $datos_dedduccion[2];
    $porcentaje_inces = $datos_dedduccion[3];
    
    //Obtener inasistencias
    #--------------------Deducciones------------------------
    
    $ivss = ($sueldo_semanal * $porcentaje_ivss) /100 ;
    $rpe = ($sueldo_semanal * $porcentaje_rpe) /100 ;
    $faov = ($sueldo_semanal * $porcentaje_faov) /100 ;
    $inces = ($sueldo_semanal * $porcentaje_inces) /100 ;
    $total_deducciones = $ivss + $rpe + $faov + $inces;
    
    #-------------------------------------------------------
    #--------------------Total------------------------
    $total_pagar =  $total_asignaciones - $total_deducciones ;
    #-------------------------------------------------------
    if ($this->model->nominas->insert([
 
        'id_trabajador'=>$id, 
        'periodo_desde'=>$periodo_desde, 
        'periodo_hasta'=>$periodo_hasta,
        'fecha_pago'=>$fecha_pago,
        'tipo_pago'=>$pago, 
        'horas_extras'=>$horas_extras, 
        'ivss'=>$ivss, 
        'rpe'=>$rpe,
        'faov'=>$faov,
        'inces'=>$inces, 
        'total_pagar_nomina'=>$total_pagar, 
        'inasistencias'=>$faltas

      ])){
        $this->bitacora($_SESSION['usuario'], 'nominas', 'Registró a '. $cedula); 
      }else{
        echo "error inesperado";
      }
  
      
?>