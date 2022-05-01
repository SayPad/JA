<?php  
    $modulo = "trabajosExtras";
    $operacion = "ver";
    $usuario = $_SESSION['usuario'];
    if ($this->model->trabajos_extras->verificar($modulo, $operacion, $usuario)) {

    $dolar = $this->model->trabajos_extras->getDolar();
    $datos = $this->model->trabajos_extras->getGenerar($param[0]);

    $id = $datos[0];
    $fecha_trabajo = $datos[1];
    $descripcion_trabajo = $datos[2];
    $tipo_pago = $datos[3];
    $fecha_pago = $datos[4];
    $descripcion = $datos[5];
    $cantidad = $datos[6];
    $total_unidad = $datos[7];
    $total_pagar = $datos[8];
    $nombre = $datos[9];
    $apellido = $datos[10];
    $cedula = $datos[11];
    $cargo = $datos[12];
    

   ob_start();

        require 'controllers/source/reportes/plantilla.php';
        $pdf = new PDF('P', 'mm', 'letter', true );
        $pdf->AddPage();
        $pdf->SetLeftMargin($pdf->GetPageWidth() / 12 - 1);
        $pdf->SetFont('Arial','B',9);//Tipo de letra, negrita, tamaño
        $pdf->Ln(10);//salto de linea
        $pdf->SetFillColor(146,143,142);
        $id_recibo = $GLOBALS['id_ultimo_trabajosExtras']; 

        $salarios = $this->model->trabajos_extras->get($id_recibo);
        $format_total_pagar = $total_pagar;
        $format_total_unidad = $total_unidad;
        $format_cedula = $cedula;

        //formatos
        $total_pagar = number_format($format_total_pagar, 2, ",", ".");
        $total_unidad = number_format($format_total_unidad, 2, ",", ".");
        $cedula = number_format($format_cedula, 0, ".", ".");

        $pdf->Cell(60, 4,  'IDENTIFICACION DEL TRABAJADOR',1, 0,'C', true);
        $pdf->Cell(120, 4,  'DESCRPCION DEL TRABAJO:',1, 0,'C', true);

        $pdf->Ln(4);

        $pdf->SetFont('Arial','',9);//Tipo de letra, negrita, tamaño

        $pdf->Cell(30, 4,  'Nombre',1, 0,'C', 0);
        $pdf->Cell(30, 4, $nombre ,1, 0,'C', 0);//NOMBRE

        $pdf->Cell(120, 12,  $descripcion_trabajo,1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Apellido',1, 0,'C', 0);
        $pdf->Cell(30, 4, $apellido , 1, 0,'C', 0); //APELLIDO


        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'C.I No:',1, 0,'C', 0);
        $pdf->Cell(30, 4, $cedula ,1, 0,'C', 0); //CEDULA

     

        $pdf->SetFont('Arial','',9);
        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Cargo',1, 0,'C', 0);
        $pdf->Cell(30, 4, $cargo ,1, 0,'C', 0); //CARGO
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4, 'FECHA DE TRABAJO',1, 0,'C', true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(60, 4, $fecha_trabajo ,1, 0,'C', 0); 

         $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(180, 4,  'FORMA DE PAGO',1, 0,'C', true);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'FECHA',1, 0,'C', 0);
        $pdf->Cell(60, 4,  $fecha_pago  ,1, 0,'C', 0); //FECHA PAGO
        $pdf->Cell(60, 4,  $tipo_pago ,1, 0,'C', 0);  //PAGO

        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'DESCRPCION',1, 0,'C', true);
        $pdf->Cell(30, 4,  'CANTIDAD',1, 0,'C', true);
        $pdf->Cell(40, 4,  'BS/UNIDAD',1, 0,'C', true);
        $pdf->Cell(50, 4,  'TOTAL',1, 0,'C', true);

        $pdf->SetFont('Arial','',9);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  $descripcion ,1, 0,'C', 0);
        $pdf->Cell(30, 4,  $cantidad ,1, 0,'C', 0);   
        $pdf->Cell(40, 4,  $total_unidad ,1, 0,'C', 0);  
        $pdf->Cell(50, 4,  $total_pagar ,1, 0,'C', 0); 

        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  "DEDUCCIONES" ,1, 0,'C', TRUE);
        $pdf->Cell(30, 4,  "" ,1, 0,'C', 0);  
        $pdf->Cell(40, 4,  "" ,1, 0,'C', 0); 
        $pdf->Cell(50, 4,  "-" ,1, 0,'C', 0); 

        $pdf->SetFont('Arial','',9);
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  "" ,1, 0,'C', 0);
        $pdf->Cell(30, 4,  "" ,1, 0,'C', 0);  
        $pdf->Cell(40, 4,  "" ,1, 0,'C', 0); 
        $pdf->Cell(50, 4,  "-" ,1, 0,'C', 0); 

        $pdf->SetFont('Arial','B',9);
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  '',0, 0,'C', 0);
        $pdf->Cell(30, 4,  '',0, 0,'C', 0);
        $pdf->Cell(40, 4,  'TOTAL A PAGAR',1, 0,'C', true);
        $pdf->Cell(50, 4,  $total_pagar ,1, 0,'C', 0);         //total a pagar
        $pdf->SetFont('Arial','',9);

   
        $pdf->Ln(10);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30, 4,  'Nombre y Apellido: ',0, 0,'C', 0);
        $pdf->Ln(0);
        $pdf->Cell(130, 4,  '__________________________________________________________________________',0, 0,'C', 0);
        $pdf->Cell(17, 4,  'Huella',0, 0,'C', 0);

        $pdf->Ln(5);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(10, 4,  'C.I No: ',0, 0,'C', 0);
        $pdf->Ln(0);
        $pdf->Cell(60, 4,  '__________________________________',0, 0,'C', 0);

        $pdf->Cell(71, 4,  'Firma:__________________________________ ',0, 0,'C', 0);


        $pdf->Cell(40, 4,  'dactilar: ____________',0, 0,'C', 0);
        $pdf->Output();
        ob_end_flush();
 }else{
    $this->view->render('errores/bloquear');
  }
?>