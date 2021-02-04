<?php
ob_start();
if (isset($_POST["submit"])) {
require('fpdf17\fpdf.php');
session_start();
$items = $_SESSION['items'];

	$pdf = new FPDF('P', 'mm', 'A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Cell(130, 5, 'Shopsky India Pvt. Ltd', 0, 0);
	$pdf->Cell(59, 5, 'INVOICE', 0, 1);
	$pdf->SetFont('Arial', '', 14);
	$pdf->Cell(130, 5, 'Charan Singh Gate,Laxmangarh Road', 0, 0);
	$pdf->Cell(59, 5, '', 0, 1);
	$pdf->Cell(130, 5, 'Jaipur, Rajasthan 302013', 0, 0);
	$pdf->Cell(25, 5, 'Date', 0, 0);

	$pdf->Cell(34, 5, $_POST['date'], 0, 1);
	$pdf->Cell(130, 5, 'Phone +917976383369', 0, 0);
	$pdf->Cell(25, 5, 'Invoice #', 0, 0);
	$pdf->Cell(34, 5, $_POST['id'], 0, 1);
	$pdf->Cell(130, 5, 'Email ID: support@shopsky.in', 0, 0);
	$pdf->Cell(25, 5, 'Cust ID', 0, 0);
	$pdf->Cell(34, 5, $_POST['custId'], 0, 1);
	$pdf->Cell(189, 10, '', 0, 1);
	$pdf->Cell(100, 5, 'Bill to', 0, 1);
	$pdf->Cell(10, 5, '', 0, 0);
	$pdf->Cell(90, 5, $_POST['name'], 0, 1);
	$pdf->Cell(10, 5, '', 0, 0);
	$pdf->Cell(90, 5, $_POST['company'], 0, 1);
	$pdf->Cell(10, 5, '', 0, 0);
	$pdf->Cell(90, 5, $_POST['address'], 0, 1);
	$pdf->Cell(10, 5, '', 0, 0);
	$pdf->Cell(90, 5, $_POST['phone'], 0, 1);
	$pdf->Cell(189, 10, '', 0, 1);
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(130, 5, 'Description', 1, 0);
	$pdf->Cell(25, 5, 'Qty', 1, 0);

	$pdf->Cell(34, 5, 'Amount', 1, 1);
	$pdf->SetFont('Arial', '', 12);

	$subtotal = 0;
	$quantity = 0;
	for ($j = 1; $j <= $items; $j++) {
		$name = 'itemname' . $j;
		$Qty = 'itemQty' . $j;
		$amount = 'itemamount' . $j;
		
		$pdf->Cell(130, 5, $_POST[$name], 1, 0);
		$pdf->Cell(25, 5, $_POST[$Qty], 1, 0);
		$pdf->Cell(34, 5, $_POST[$amount], 1, 1, 'R');

		$subtotal += $_POST[$amount];
		$quantity += $_POST[$Qty];
	}
	


	// $subtotal =  + $_POST['item2amount'] + $_POST['item3amount'] + $_POST['item4amount'] + $_POST['item5amount'];
	$pdf->Cell(130, 5, '', 0, 0);
	$pdf->Cell(25, 5, 'Subtotal', 0, 0);
	$pdf->Cell(30, 5, $subtotal, 1, 1, 'R');

	// $Qty =  + $_POST['item2Qty'] + $_POST['item3Qty'] + $_POST['item4Qty'] + $_POST['item5Qty'];
	$pdf->Cell(130, 5, '', 0, 0);
	$pdf->Cell(25, 5, 'Qty', 0, 0);
	$pdf->Cell(30, 5, $quantity, 1, 1, 'R');

	$pdf->Cell(130, 5, '', 0, 0);
	$pdf->Cell(25, 5, 'Total Due', 0, 0);
	$pdf->Cell(30, 5, $subtotal, 1, 1, 'R');


	// $subtotal = $_POST['item1amount'] + $_POST['item2amount'] + $_POST['item3amount'] + $_POST['item4amount'] + $_POST['item5amount'];
	$pdf->Cell(130, 5, '', 0, 0);
	$pdf->Cell(25, 5, 'PayAmt', 0, 0);
	$pdf->Cell(30, 5, $subtotal, 1, 1, 'R');

	$pdf->Output();
	ob_end_flush(); 
}
else{

	echo "Error";
}
?>