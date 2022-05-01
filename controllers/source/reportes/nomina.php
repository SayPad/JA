<?php

ob_start();

        require 'controllers/source/reportes/plantilla.php';
        $pdf = new PDF('P', 'mm', 'letter', true );
        $pdf->AddPage();
        $pdf->SetLeftMargin($pdf->GetPageWidth() / 12 - 1);
        $pdf->SetFont('Arial','B',9);//Tipo de letra, negrita, tamaño
        $pdf->Ln(10);//salto de linea
        $pdf->SetFillColor(146,143,142);
        $nominas = $this->model->nominas->get();
        
        $pdf->Cell(60, 4,  'IDENTIFICACION DEL TRABAJADOR',1, 0,'C', true);
        $pdf->Cell(64, 4,  'SALARIO BASE:',1, 0,'C', true);
        $pdf->Cell(56, 4,  'PERIODO:',1, 0,'C', true);

        $pdf->Ln(4);

        $pdf->SetFont('Arial','',9);//Tipo de letra, negrita, tamaño

        $pdf->Cell(30, 4,  'Nombre',1, 0,'C', 0);
        $pdf->Cell(30, 4, '----',1, 0,'C', 0);

        $pdf->Cell(36, 4,  'SALARIO SEMANAL Bs',1, 0,'C', 0);
        $pdf->Cell(28, 4, '----',1, 0,'C', 0);

        $pdf->Cell(28, 4,  'DESDE',1, 0,'C', 0);
        $pdf->Cell(28, 4, 'HASTA',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Apellido',1, 0,'C', 0);
        $pdf->Cell(30, 4, '----',1, 0,'C', 0);

        $pdf->Cell(36, 4,  'SALARIO SEMANAL',1, 0,'C', 0);
        $pdf->Cell(28, 4, '----',1, 0,'C', 0);

        $pdf->Cell(28, 4,  '--/--/--',1, 0,'C', 0);
        $pdf->Cell(28, 4, '--/--/--',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'C.I No:',1, 0,'C', 0);
        $pdf->Cell(30, 4, '----',1, 0,'C', 0);

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(120, 4,  'FORMA DE PAGO',1, 0,'C', true);

        $pdf->SetFont('Arial','',9);
        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Cargo',1, 0,'C', 0);
        $pdf->Cell(30, 4, '----',1, 0,'C', 0);

        $pdf->Cell(30, 4,  'FECHA',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '--/--/---',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '--------',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'ASIGNACIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  'CANTIDAD DIAS',1, 0,'C', true);
        $pdf->Cell(40, 4,  'BS/UNIDAD',1, 0,'C', true);
        $pdf->Cell(50, 4,  'TOTAL',1, 0,'C', true);

        $pdf->SetFont('Arial','',9);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Dias Laborados',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '------',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '------',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '------',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Dias de descanso (1 dia de permiso)',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '-------',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '-------',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Prima por hogar',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '------',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '------',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '------',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Horas extras',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '-------',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '-------',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Dias feriados',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '-------',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '-------',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Horas del dias feriados ',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '-------',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '-------',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Dias perdidos injustifacados',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '-------',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '-------',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'TOTAL DE ASIGNACIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  '',1, 0,'C', true);
        $pdf->Cell(40, 4,  '',1, 0,'C', true);
        $pdf->Cell(50, 4,  '----------',1, 0,'C', true);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'DEDUCCIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '',1, 0,'C', 0);
        $pdf->SetFont('Arial','',9);
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Retencion IVSS 4%',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Retencion IVSS RPE 0.5%',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Retencion FAOV 1%',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'INCES',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);
        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'TOTAL DEDUCCIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  '',0, 0,'C', 0);
        $pdf->Cell(30, 4,  '',0, 0,'C', 0);
        $pdf->Cell(40, 4,  'TOTAL A PAGAR',1, 0,'C', true);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);
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





        $pdf->Image(constant('URL').'/public/img/logo_recibo.jpg', 33, 147, 147, '', 'jpg' );

        $pdf->SetFont('Helvetica','',12);
        $pdf->Ln(26);
        $pdf->Cell(176, 10,  'Sector Brisas del Obelisco, carrera 2 entre Av. Rotaria y calle 3, Nro. 63-73, Barquisimeto-Lara', 0, 0,'C', 0);
        $pdf->Ln(5);
        $pdf->Cell(176, 10,  'Telf.: 04167501719 - jyachirinosinstalaciones@gmail.com',0, 0,'C', 0);

        $pdf->SetFont('Arial','B',9);//Tipo de letra, negrita, tamaño
        $pdf->Ln(10);
        $pdf->Cell(60, 4,  'IDENTIFICACION DEL TRABAJADOR',1, 0,'C', true);
        $pdf->SetFont('Arial','B',8);//Tipo de letra, negrita, tamaño
        $pdf->Cell(64, 4,  'BONO DE COMPENSACION ALIMENTARIA',1, 0,'C', true);
        $pdf->SetFont('Arial','B',9);//Tipo de letra, negrita, tamaño
        $pdf->Cell(56, 4,  'PERIODO:',1, 0,'C', true);

        $pdf->Ln(4);

        $pdf->SetFont('Arial','',9);//Tipo de letra, negrita, tamaño

        $pdf->Cell(30, 4,  'Nombre',1, 0,'C', 0);
        $pdf->Cell(30, 4, '----',1, 0,'C', 0);

        $pdf->Cell(36, 4,  'SALARIO SEMANAL Bs',1, 0,'C', 0);
        $pdf->Cell(28, 4, '----',1, 0,'C', 0);

        $pdf->Cell(28, 4,  'DESDE',1, 0,'C', 0);
        $pdf->Cell(28, 4, 'HASTA',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Apellido',1, 0,'C', 0);
        $pdf->Cell(30, 4, '----',1, 0,'C', 0);

        $pdf->Cell(36, 4,  'SALARIO SEMANAL',1, 0,'C', 0);
        $pdf->Cell(28, 4, '----',1, 0,'C', 0);

        $pdf->Cell(28, 4,  '--/--/--',1, 0,'C', 0);
        $pdf->Cell(28, 4, '--/--/--',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'C.I No:',1, 0,'C', 0);
        $pdf->Cell(30, 4, '----',1, 0,'C', 0);

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(120, 4,  'FORMA DE PAGO',1, 0,'C', true);

        $pdf->SetFont('Arial','',9);
        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Cargo',1, 0,'C', 0);
        $pdf->Cell(30, 4, '----',1, 0,'C', 0);

        $pdf->Cell(30, 4,  'FECHA',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '--/--/---',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '--------',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'ASIGNACIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  'CANTIDAD DIAS',1, 0,'C', true);
        $pdf->Cell(40, 4,  'BS/UNIDAD',1, 0,'C', true);
        $pdf->Cell(50, 4,  'TOTAL',1, 0,'C', true);

        $pdf->SetFont('Arial','',9);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Dias a pagar',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '------',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '------',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '------',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  '',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '',1, 0,'C', 0);


    
        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'TOTAL DE ASIGNACIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  '',1, 0,'C', true);
        $pdf->Cell(40, 4,  '',1, 0,'C', true);
        $pdf->Cell(50, 4,  '----------',1, 0,'C', true);
        
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  '',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'DEDUCCIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '',1, 0,'C', 0);
        $pdf->SetFont('Arial','',9);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Inacistencias injustificada en la semana',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  '',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '',1, 0,'C', 0);
    
        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'TOTAL DEDUCCIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  '',0, 0,'C', 0);
        $pdf->Cell(30, 4,  '',0, 0,'C', 0);
        $pdf->Cell(40, 4,  'TOTAL A PAGAR',1, 0,'C', true);
        $pdf->Cell(50, 4,  '-------',1, 0,'C', 0);
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

        ob_end_flush();?>
