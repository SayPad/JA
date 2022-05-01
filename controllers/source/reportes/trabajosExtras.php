<?php


	ob_start();

		require 'plantilla.php';
		$pdf = new PDF();
		$pdf->SetTitle("Reportes");
		$pdf->AddPage();
		$pdf->SetLeftMargin($pdf->GetPageWidth() / 2 - 90);
		$pdf->SetFont('Helvetica','B',15);//Tipo de letra, negrita, tamaño
		$pdf->Ln(10);//salto de linea

		$trabajosextras = $this->model->trabajos_extras->get();

		//MODELOS
		$pdf->Cell(160, 10,  'Trabajos extras',2, 0,'C', 0);
		$pdf->Ln(10);

		$pdf->SetFont('Arial','B',12);//Tipo de letra, negrita, tamaño

		$pdf->Cell(45, 10, 'Nombre',1, 0,'C', 0);
		$pdf->Cell(20, 10, 'Cedula',1, 0,'C', 0);
		$pdf->Cell(25, 10, 'Tipo pago',1, 0,'C', 0);
		$pdf->Cell(25, 10, 'Fecha pago',1, 0,'C', 0);
		$pdf->Cell(25, 10, 'Total pagar',1, 0,'C', 0);
		$pdf->Cell(50, 10, 'Descripcion',1, 0,'C', 0);
	 

		$pdf->Ln(10);

		$pdf->SetFont('Arial','',10);//Tipo de letra, negrita, tamaño
		foreach ($trabajosextras as $row) {

			$pdf->Cell(45,10, $row->getNombre() . ' ' .  $row->getApellido(), 1, 0,'C', 0);
			$pdf->Cell(20,10, $row->getCedula(), 1, 0,'C', 0);
			$pdf->SetFont('Arial','',8);//Tipo de letra, negrita, tamaño
			$pdf->Cell(25,10, $row->getTipo_pago(), 1, 0,'C', 0);
			$pdf->SetFont('Arial','',10);//Tipo de letra, negrita, tamaño
			$pdf->Cell(25,10, $row->getFecha_pago(), 1, 0,'C', 0);
			$pdf->Cell(25,10, $row->getTotal_pagar(), 1, 0,'C', 0);
			$pdf->MultiCell(50, 5, utf8_decode($row->getDescripcion_trabajo()), 1, 'C');
		   

		}

		//$pdf->AddPage();
		$pdf->Output();
		ob_end_flush();

?>
