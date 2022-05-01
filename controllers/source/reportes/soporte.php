<?php

	ob_start();

	require 'plantilla.php';
		$pdf = new PDF();
		$pdf->AddPage();
		$pdf->SetLeftMargin($pdf->GetPageWidth() / 2 - 55);
		$pdf->SetFont('Helvetica','B',15);//Tipo de letra, negrita, tamaño
		$pdf->Ln(10);//salto de linea

		$soporte = $this->model->soporte->get();


	//PARTES

		$pdf->SetLeftMargin($pdf->GetPageWidth() / 2 - (207) / 2);
		$pdf->Ln(10);
		$pdf->SetFont('Helvetica','B',15);//Tipo de letra, negrita, tamaño
		$pdf->Cell(207, 10,'soporte',1, 0,'C', 0);
		$pdf->Ln(10);

		$pdf->SetFont('Arial','B',12);//Tipo de letra, negrita, tamaño
		$pdf->Cell(28, 10,  'Num soporte',1, 0,'C', 0);
		$pdf->Cell(42, 10, 'Falla reportada',1, 0,'C', 0);
		$pdf->Cell(23, 10, 'fecha',1, 0,'C', 0);
		$pdf->Cell(20, 10, 'Hora en',1, 0,'C', 0);
		$pdf->Cell(20, 10, 'Hora sda',1, 0,'C', 0);
		$pdf->Cell(48, 10, 'Descrip actividad',1, 0,'C', 0);
		$pdf->Cell(26, 10, 'Num prueba',1, 0,'C', 0);

		$pdf->Ln(10);

		$pdf->SetFont('Arial','',12);//Tipo de letra, negrita, tamaño
		foreach ($soporte as $row) {

			$pdf->Cell(28,10, $row->getNumSop(), 1, 0,'C', 0);
			$pdf->Cell(42,10, $row->getFallaReport(), 1, 0,'C', 0);
			$pdf->Cell(23,10, $row->getFecha(), 1, 0,'C', 0);
			$pdf->Cell(20,10, $row->getHoraEn(), 1, 0,'C', 0);
			$pdf->Cell(20,10, $row->getHoraSda(), 1, 0,'C', 0);
			$pdf->Cell(48,10, $row->getDesActividad(), 1, 0,'C', 0);
			$pdf->Cell(26,10, $row->getNumPrueba(), 1, 0,'C', 0);
		    $pdf->Ln(10);//salto de linea

		}
		$pdf->SetLeftMargin(0);
		$pdf->AddPage();



		//$pdf->AddPage();
		$pdf->Output();
		ob_end_flush();
?>