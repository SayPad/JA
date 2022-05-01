<?php  
    $modulo = "cestaticket";
    $operacion = "ver";
    $usuario = $_SESSION['usuario'];
    if ($this->model->bonos->verificar($modulo, $operacion, $usuario)) {
        
    $datos = $this->model->bonos->getGenerar($param[0]);
    $id = $datos[0];
    $nombre = $datos[1];
    $apellido = $datos[2];
    $cedula = $datos[3];
    $nombre_cargo = $datos[4];
    $periodo_desde = $datos[5];
    $periodo_hasta = $datos[6];
    $fecha_pago = $datos[7];
    $tipo_pago = $datos[8];
    $inasistencias = $datos[9];
    $total_pagar = $datos[10];
    $dolar = $datos[11];
    $valor = $datos[12];
    $nombre_bono = $datos[13];
    $nombre_bono = strtoupper($nombre_bono);
    $dias = $datos[14];
    $moneda = $datos[15];

    if ($moneda == 1) {
        $valor = $valor * $dolar;
    }
    $valor_diario = $valor / $dias;
    $total_inacistencias = $valor_diario * $inasistencias;

    $bono_cestaticket_diario = 2 / 30;
    $date1 = new DateTime($periodo_desde);
    $date2 = new DateTime($periodo_hasta);
    $diff = $date1->diff($date2);                         
    $dias_pagar = $diff->days - $inasistencias;
    $total_dias_pagar = 30 * $bono_cestaticket_diario;
    $total = $total_dias_pagar - $total_inacistencias;



    ob_start();

        require 'controllers/source/reportes/plantilla.php';
        $pdf = new PDF('P', 'mm', 'letter', true );
        $pdf->AddPage();
        $pdf->SetTitle("Recibo de bono");
        $pdf->SetLeftMargin($pdf->GetPageWidth() / 12 - 1);
        $pdf->SetFont('Arial','B',9);//Tipo de letra, negrita, tamaño
        $pdf->Ln(10);//salto de linea
        $pdf->SetFillColor(146,143,142);
        $id_recibo = $GLOBALS['id_ultimo_salario']; 
        $salarios = $this->model->bonos->get($id_recibo);
        $format_bono_cestaticket_diario = $bono_cestaticket_diario;
        $format_bono_cestaticket = 2;
        $format_total_dias_pagar = $dias_pagar;
        $format_cedula = $cedula;
        $format_total = $total;
        $format_total_inacistencias = $total_inacistencias;
    

        //formatos
        $bono_cestaticket_diario = number_format($format_bono_cestaticket_diario, 2, ",", ".");
        $bono_cestaticket = number_format($format_bono_cestaticket, 2, ",", ".");
        $cedula = number_format($format_cedula, 0, ".", ".");
        $dias_pagar = number_format($format_total_dias_pagar, 2, ",", ".");
        $total = number_format($format_total, 2, ",", ".");
        $total_inacistencias = number_format($format_total_inacistencias, 2, ",", ".");

        $pdf->SetFont('Arial','',8);
        $pdf->Cell(60, 4,  'IDENTIFICACION DEL TRABAJADOR',1, 0,'C', true);
        $pdf->Cell(80, 4,  'RETROACTIVO BONO DE '. $nombre_bono ,1, 0,'C', true);
        $pdf->Cell(40, 4,  'PERIODO:',1, 0,'C', true);

        $pdf->Ln(4);

        $pdf->SetFont('Arial','',9);//Tipo de letra, negrita, tamaño

        $pdf->Cell(30, 4,  'Nombre',1, 0,'C', 0);
        $pdf->Cell(30, 4, $nombre ,1, 0,'C', 0);//NOMBRE

        $pdf->Cell(52, 4,  'PAGO Bs',1, 0,'C', 0);
        $pdf->Cell(28, 4, $valor , 1, 0,'C', 0);//SUELDO



        $pdf->Cell(20, 4,  'DESDE',1, 0,'C', 0);
        $pdf->Cell(20, 4,  'HASTA',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Apellido',1, 0,'C', 0);
        $pdf->Cell(30, 4, $apellido , 1, 0,'C', 0); //APELLIDO

        $pdf->Cell(52, 4,  'PAGO DIARIO Bs',1, 0,'C', 0);
        $pdf->Cell(28, 4, $valor_diario ,1, 0,'C', 0); //SUELDO DIARIO

        $pdf->Cell(20, 4, $periodo_desde ,1, 0,'C', 0); //PERIODO DESDE
        $pdf->Cell(20, 4, $periodo_hasta ,1, 0,'C', 0); //PERIODO HASTA

        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'C.I No:',1, 0,'C', 0);
        $pdf->Cell(30, 4, $cedula ,1, 0,'C', 0); //CEDULA

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(120, 4,  'FORMA DE PAGO',1, 0,'C', true);

        $pdf->SetFont('Arial','',9);
        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Cargo',1, 0,'C', 0);
        $pdf->Cell(30, 4, $nombre_cargo ,1, 0,'C', 0); //CARGO

        $pdf->Cell(30, 4,  'FECHA',1, 0,'C', 0);
        $pdf->Cell(40, 4,  $fecha_pago  ,1, 0,'C', 0); //FECHA PAGO
        $pdf->Cell(50, 4,  $tipo_pago ,1, 0,'C', 0);  //PAGO

        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'ASIGNACIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  'CANTIDAD DIAS',1, 0,'C', true);
        $pdf->Cell(40, 4,  'BS/UNIDAD',1, 0,'C', true);
        $pdf->Cell(50, 4,  'TOTAL',1, 0,'C', true);

        $pdf->SetFont('Arial','',9);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Dias a pagar',1, 0,'C', 0);
        $pdf->Cell(30, 4,  $dias ,1, 0,'C', 0);  //DIAS LABORADOS
        $pdf->Cell(40, 4,  $valor_diario ,1, 0,'C', 0);  //SUELDO DIARIO
        $pdf->Cell(50, 4,  $valor ,1, 0,'C', 0); //TOTAL DE DIAS LABORADOS
        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  '',1, 0,'C');
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '' ,1, 0,'C', 0);
        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'TOTAL DEDUCCIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4, "" ,1, 0,'C', 0);   //total de deducciones

        $pdf->Ln(4);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(60, 4,  'Inasistencias',1, 0,'C', 0);
        $pdf->Cell(30, 4,  $inasistencias,1, 0,'C', 0);
        $pdf->Cell(40, 4,  $valor_diario,1, 0,'C', 0);
        $pdf->Cell(50, 4,  $total_inacistencias ,1, 0,'C', 0);

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