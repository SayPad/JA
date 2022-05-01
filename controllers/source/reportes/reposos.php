<?php

	ob_start();

		require 'plantilla.php';
		$pdf = new PDF();
		$pdf->AddPage();
		$pdf->SetLeftMargin($pdf->GetPageWidth() / 2 - 80);
		$pdf->SetFont('Helvetica','B',15);//Tipo de letra, negrita, tamaño
		$pdf->Ln(10);//salto de linea

		$salarios = $this->model->salarios->get();

		//MODELOS
		$pdf->Cell(160, 10,  'CHOFERES',2, 0,'C', 0);
		$pdf->Ln(10);

		$pdf->SetFont('Arial','B',12);//Tipo de letra, negrita, tamaño

		$pdf->Cell(15, 10,  'ID',1, 0,'C', 0);
		$pdf->Cell(30, 10, 'Nombre',1, 0,'C', 0);
		$pdf->Cell(30, 10, 'Apellido',1, 0,'C', 0);
		$pdf->Cell(25, 10, 'Cedula',1, 0,'C', 0);
		$pdf->Cell(30, 10, 'Cargo',1, 0,'C', 0);
		$pdf->Cell(15, 10, 'Fecha de ingreso',1, 0,'C', 0);
		$pdf->Cell(30, 10, 'Inasistencias justificadas',1, 0,'C', 0);
		$pdf->Cell(30, 10, 'Inasistencias injustificadas',1, 0,'C', 0);
		$pdf->Cell(30, 10, 'sueldo semanal',1, 0,'C', 0);
		$pdf->Cell(25, 10, 'bono',1, 0,'C', 0);
		$pdf->Cell(30, 10, 'cestaticket',1, 0,'C', 0);


		$pdf->Ln(10);

		$pdf->SetFont('Arial','',10);//Tipo de letra, negrita, tamaño
		foreach ($choferes as $row) {

			$pdf->Cell(15,10, $row->getId(), 1, 0,'C', 0);
			$pdf->Cell(30,10, $row->getNombre(), 1, 0,'C', 0);
			$pdf->Cell(30,10, $row->getApellido(), 1, 0,'C', 0);
			$pdf->Cell(25,10, $row->getCedula(), 1, 0,'C', 0);
			$pdf->Cell(30,10, $row->getCargo(), 1, 0,'C', 0);
			$pdf->Cell(15,10, $row->getFecha_ingreso(), 1, 0,'C', 0);
			$pdf->Cell(30,10, $row->getDias_perdidos_justificados(), 1, 0,'C', 0);
			$pdf->Cell(30,10, $row->getDias_perdidos_injustificados(), 1, 0,'C', 0);
			$pdf->Cell(30,10, $row->getSueldo_semanal(), 1, 0,'C', 0);
			$pdf->Cell(25,10, $row->getBono_compensacion(), 1, 0,'C', 0);
			$pdf->Cell(30,10, $row->getBono_cestaticket(), 1, 0,'C', 0);
		    $pdf->Ln(10);//salto de linea

		}

		//$pdf->AddPage();
		$pdf->Output();
		ob_end_flush();
?>
