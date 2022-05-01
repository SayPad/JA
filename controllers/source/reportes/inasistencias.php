<?php

	ob_start();

		require 'plantilla.php';
		$pdf = new PDF();
		$pdf->SetTitle("Reportes");
		$pdf->AddPage();
		$pdf->SetLeftMargin($pdf->GetPageWidth() / 2 - 80);
		$pdf->SetFont('Helvetica','B',15);//Tipo de letra, negrita, tamaño
		$pdf->Ln(10);//salto de linea

		$inasistencias = $this->model->permiso->get();

		//MODELOS
		$pdf->Cell(160, 10,  'Inasistencias',2, 0,'C', 0);
		$pdf->Ln(10);

		$pdf->SetFont('Arial','B',12);//Tipo de letra, negrita, tamaño

		$pdf->Cell(45, 10, 'Nombre',1, 0,'C', 0);
		$pdf->Cell(20, 10, 'Cedula',1, 0,'C', 0);
		$pdf->Cell(25, 10, 'Desde',1, 0,'C', 0);
		$pdf->Cell(25, 10, 'Hasta',1, 0,'C', 0);
		$pdf->Cell(27, 10, 'Descripcion',1, 0,'C', 0);


		$pdf->Ln(10);

		$pdf->SetFont('Arial','',10);//Tipo de letra, negrita, tamaño
		foreach ($inasistencias as $row) {

			$pdf->Cell(45,10, $row->getNombre() . ' ' .  $row->getApellido(), 1, 0,'C', 0);
			$pdf->Cell(20,10, $row->getCedula(), 1, 0,'C', 0);
			//$pdf->Cell(40,10, $row->getjustificado(), 1, 0,'C', 0);
			$pdf->Cell(25,10, $row->getDesde(), 1, 0,'C', 0);
			$pdf->Cell(25,10, $row->getHasta(), 1, 0,'C', 0);
			$pdf->Cell(27,10, $row->getDescripcion(), 1, 0,'C', 0);
		    $pdf->Ln(10);//salto de linea

		}

		//$pdf->AddPage();
		$pdf->Output();
		ob_end_flush();
?>
