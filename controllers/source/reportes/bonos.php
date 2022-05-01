<?php

	ob_start();

		require 'plantilla.php';
		$pdf = new PDF();
		$pdf->AddPage();
		$pdf->SetTitle("Reportes");
		$pdf->SetLeftMargin($pdf->GetPageWidth() / 2 - 80);
		$pdf->SetFont('Helvetica','B',15);//Tipo de letra, negrita, tamaño
		$pdf->Ln(10);//salto de linea

		$bonos = $this->model->bonos->get();

		//MODELOS
		$pdf->Cell(160, 10,  'Bonos',2, 0,'C', 0);
		$pdf->Ln(10);

		$pdf->SetFont('Arial','B',10);//Tipo de letra, negrita, tamaño

		$pdf->Cell(45, 10, 'Nombre',1, 0,'C', 0);
		$pdf->Cell(20, 10, 'Cedula',1, 0,'C', 0);
		$pdf->Cell(20, 10, 'Cargo',1, 0,'C', 0);
		$pdf->Cell(45, 10, 'Nombre del bono',1, 0,'C', 0);
		$pdf->Cell(20, 10, 'Pago',1, 0,'C', 0);
		$pdf->Cell(20, 10, 'Fecha',1, 0,'C', 0);

		$pdf->Ln(10);

		$pdf->SetFont('Arial','',9);//Tipo de letra, negrita, tamaño
		foreach ($bonos as $row) {


			$pdf->Cell(45,10, $row->getNombre() . ' '. $row->getNombre() , 1, 0,'C', 0);
			$pdf->Cell(20,10, $row->getCedula(), 1, 0,'C', 0);
			$pdf->Cell(20,10, $row->getNombre_cargo(), 1, 0,'C', 0);
			$pdf->Cell(45,10, $row->getNombre_bono(), 1, 0,'C', 0);
			$pdf->Cell(20,10, $row->getTotal_pagar(), 1, 0,'C', 0);
			$pdf->Cell(20,10, $row->getFecha_pago(), 1, 0,'C', 0);
		    $pdf->Ln(10);//salto de linea

		}

		//$pdf->AddPage();
		$pdf->Output();
		ob_end_flush();
?>
