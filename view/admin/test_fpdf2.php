<?php  
	require('../../Vendor/fpdf/fpdf.php');

	// ********************Demarrage***************
	$pdf=new FPDF('P','mm',"A5");

	// *********Ajouter une nouvelle page************
	$pdf->AddPage();

	// Entete
	$pdf->image('./img/65bc0599767380.77804845.jpg',10,5,130,20);

	// Saut de ligne::hauteur:18
	$pdf->Ln(18);

	$pdf->SetFont('Arial','B', 16);
	// Titre
	$pdf->cell(0,10,'Attestation de Reussite','TB',1,'C');
	$pdf->cell(0,10,'N°:',0,1,'C');

	// Saut de ligne::hauteur:18
	$pdf->Ln(5);

	$pdf->SetFont('Arial','', 10);
	$h=7;
	$retrait="     ";

	$pdf->write($h,"Je soussigne,Directeur de l'etablissement que:\n");
	$pdf->write($h,$retrait."L'eleve: ");

	// Ecriture en gras italique-soulignés
	$pdf->SetFont('','BIU');
	$pdf->write($h,"BADIDI \n");

	// ******Ecriture normal************************
	$pdf->SetFont('','');

	$pdf->write($h,$retrait." Né(e) le:10/10/2024 A Kinshasa \n");
	$pdf->write($h,$retrait." Né(e) le:10/10/2024 A Kinshasa \n");
	$pdf->write($h,$retrait." Né(e) le:10/10/2024 A Kinshasa \n");

	$pdf->Output();





