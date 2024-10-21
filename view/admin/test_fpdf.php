<?php  
	require('../../Vendor/fpdf/fpdf.php');

	// ********************Demarrage***************
	$pdf=new FPDF('P','mm',"A4");

	$pdf->AddPage();

	$pdf->SetFont('Arial','B', 20);

	$pdf->cell(71,10,'',0,0);
	$pdf->cell(59,5,'invoice',0,0);
	$pdf->cell(59,10,'',0,1);

	$pdf->SetFont('Arial','B', 15);
	$pdf->cell(71,5,'WET',0,0);
	$pdf->cell(59,5,'',0,0);
	$pdf->cell(59,5,'Details',0,1);

	$pdf->SetFont('Arial','', 10);

	$pdf->cell(130,5,'Near DAV',0,0);
	$pdf->cell(25,5,'Custumer ID',0,0);
	$pdf->cell(34,5,'0012',0,1);

	$pdf->cell(130,5,'City, 751001',0,0);
	$pdf->cell(25,5,'Invoice Date:',0,0);
	$pdf->cell(34,5,'12th Jan 2019',0,1);

	$pdf->cell(130,5,'',0,0);
	$pdf->cell(25,5,'Invoice N°:',0,0);
	$pdf->cell(34,5,'ORD001',0,1);

	$pdf->SetFont('Arial','B', 15);
	$pdf->cell(130,5,'Bill To',0,0);
	$pdf->cell(59,5,'',0,0);
	$pdf->SetFont('Arial','B', 10);
	$pdf->cell(189,10,'',0,1);

	$pdf->cell(50,10,'',0,1);

	$pdf->SetFont('Arial','B', 10);

	// ********Heading************************
	$pdf->cell(10,6,'S1',1,0,'C');
	$pdf->cell(80,6,'Description',1,0,'C');
	$pdf->cell(23,6,'Qty',1,0,'C');
	$pdf->cell(30,6,'unit Price',1,0,'C');
	$pdf->cell(20,6,'Sales Tax',1,0,'C');
	$pdf->cell(25,6,'Total',1,1,'C');
	// **************End line*****************

	$pdf->SetFont('Arial','', 10);
	for ($i=0; $i <= 10; $i++) { 
		$pdf->cell(10,6,$i,1,0);
		$pdf->cell(80,6,'HP Laptop',1,0);
		$pdf->cell(23,6,'1',1,0,'R');
		$pdf->cell(30,6,'15000.00',1,0,'R');
		$pdf->cell(20,6,'100.00',1,0,'R');
		$pdf->cell(25,6,'15100.00',1,1,'R');

	}

	$pdf->cell(118,6,'',0,0);
	$pdf->cell(25,6,'SubTotal',0,0);
	$pdf->cell(45,6,'15000.00',1,1,'R');



	$pdf->Output();

