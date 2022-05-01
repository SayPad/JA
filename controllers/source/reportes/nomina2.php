<?php

	ob_start();

		require 'plantilla.php';
		$pdf = new PDF();
		$pdf->SetTitle("Reportes");
		$pdf->AddPage();
		$pdf->SetLeftMargin($pdf->GetPageWidth() / 2 - 80);
		$pdf->SetFont('Helvetica','B',15);//Tipo de letra, negrita, tamaño
		$pdf->Ln(10);//salto de linea

		$nominas = $this->model->nominas->get();

		//MODELOS
		$pdf->Cell(160, 10,  'Nominas',2, 0,'C', 0);
		$pdf->Ln(10);

		$pdf->SetFont('Arial','B',12);//Tipo de letra, negrita, tamaño

		$pdf->Cell(45, 10, 'Nombre',1, 0,'C', 0);
		$pdf->Cell(19, 10, 'C.I',1, 0,'C', 0);
		$pdf->Cell(20, 10, 'Cargo',1, 0,'C', 0);
		$pdf->Cell(30, 10, 'Pago semanal',1, 0,'C', 0);
		$pdf->Cell(30, 10, 'Total nomina',1, 0,'C', 0);
		$pdf->Cell(20, 10, 'Fecha',1, 0,'C', 0);


 
		$pdf->Ln(10);

		$pdf->SetFont('Arial','',10);//Tipo de letra, negrita, tamaño
		foreach ($nominas as $row) {

			$pdf->Cell(45,10, $row->getNombre() . ' ' .  $row->getApellido(), 1, 0,'C', 0);
			$pdf->Cell(19,10, $row->getCedula(), 1, 0,'C', 0);
			$pdf->Cell(20,10, $row->getCargo(), 1, 0,'C', 0);
			$pdf->Cell(30,10, $row->getSueldo_semanal(), 1, 0,'C', 0);
			$pdf->Cell(30,10, $row->getTotal_nomina(), 1, 0,'C', 0);
			$pdf->Cell(20,10, $row->getFecha_pago(), 1, 0,'C', 0);
		    $pdf->Ln(10);//salto de linea

		}

		//$pdf->AddPage();
		$pdf->Output();
		ob_end_flush();
?>
