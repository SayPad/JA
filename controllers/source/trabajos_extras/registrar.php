<?php 
  sleep(1);
   //datos suministrados por el usuario
    $descripcion_trabajo        = ($_POST['descripcion_trabajo'] !== "") ? $_POST['descripcion_trabajo'] : NULL;
    $fecha_trabajo        = ($_POST['fecha_trabajo'] !== "") ? $_POST['fecha_trabajo'] : NULL;
    $tipo_pago            = ($_POST['tipo_pago'] !== "") ? $_POST['tipo_pago'] : NULL;
    $fecha_pago  = ($_POST['fecha_pago'] !== "") ? $_POST['fecha_pago'] : NULL;
    $descripcion = ($_POST['descripcion'] !== "") ? $_POST['descripcion'] : NULL;
    $cantidad  = ($_POST['cantidad'] !== "") ? $_POST['cantidad'] : NULL;
    $total_unidad = ($_POST['pago'] !== "") ? $_POST['pago'] : NULL;
    //Obetener el precio del dolar actual
    $dolar = $this->model->trabajos_extras->getDolar();
    //Datos del trabajador
    $id = ($_POST['trabajador'] !== "") ? $_POST['trabajador'] : NULL;
    $datos = $trabajador = $this->model->trabajos_extras->getTrabajador($id);
    $nombre = $datos[0];
    $apellido = $datos[1];
    $cedula = $datos[2];
    $cargo = $datos[3];
   
    $total_unidadbs = $total_unidad * $dolar;
    $total_pagar = $cantidad * $total_unidadbs;
      if ($this->model->trabajos_extras->insert([
 
        'id_trabajador'=>$id, 
        'fecha_trabajo'=>$fecha_trabajo, 
        'descripcion_trabajo'=>$descripcion_trabajo, 
        'tipo_pago'=>$tipo_pago,
        'fecha_pago'=>$fecha_pago,
        'descripcion'=>$descripcion, 
        'cantidad'=>$cantidad, 
        'total_unidad'=>$total_unidadbs, 
        'total_pagar'=>$total_pagar
      ])){
         
        $this->bitacora($_SESSION['usuario'], 'Trabajos Extras', 'Registró trabajos extras de '. $cedula);
      }else{
        echo "error inesperado";
      }

?>