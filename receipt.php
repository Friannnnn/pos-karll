<?php
session_start();
require('fpdf186/fpdf.php');

class ThermalReceipt extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'POS System', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, 'Receipt', 0, 1, 'C');
        $this->Ln(5);
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // after clicking confirm order this will run
    $orderData = $_POST['orderData'] ?? '';
    $paymentMethod = $_POST['paymentMethod'] ?? 'Cash';
    $amountPaid = (float) ($_POST['amountPaid'] ?? 0);

    if (empty($orderData)) {
        die("No order data received.");
    }

    $orderItems = explode(',', trim($orderData, '[]'));

    $totalPrice = 0;
    $pdf = new ThermalReceipt('P', 'mm', array(80, 200));
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 10);

    foreach ($orderItems as $item) { // checking the items inn the array from the dashboard
        $itemParts = explode(' - ', $item);
        $itemName = $itemParts[0] ?? '';
        $price = isset($itemParts[1]) ? (float) preg_replace('/[^0-9.]/', '', $itemParts[1]) : 0;

        $totalPrice += $price;
        $pdf->Cell(0, 10, sprintf('%-20s P%5.2f', $itemName, $price), 0, 1); //print item and price
    }   // understandable na iba

    $pdf->Cell(0, 10, '', 0, 1);
    $pdf->Cell(0, 10, 'Total: P' . number_format($totalPrice, 2), 0, 1, 'R');
    $pdf->Cell(0, 10, '', 0, 1);
    $pdf->Cell(0, 10, 'Payment Method: ' . htmlspecialchars($paymentMethod), 0, 1, 'L');

    if ($amountPaid > 0) {
        $change = $amountPaid - $totalPrice;
        $pdf->Cell(0, 10, 'Amount Paid: P' . number_format($amountPaid, 2), 0, 1, 'R');
        $pdf->Cell(0, 10, 'Change: P' . number_format($change, 2), 0, 1, 'R');
    }

    $pdf->Output('I', 'receipt.pdf');
}
?>
