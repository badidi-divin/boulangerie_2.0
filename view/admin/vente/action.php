<?php
session_start();
include 'Invoice.php';
$invoice = new Invoice();
if($_GET['action'] == 'delete_invoice' && $_GET['id']) {
	$invoice->deleteInvoice($_GET['id']);	
	$jsonResponse = array(
		"status" => 1	
	);
	echo json_encode($jsonResponse);	
}

