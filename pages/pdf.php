<?php
require('fpdf/fpdf.php');

$pdf=new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'Beuty SPA Management System');
$pdf->ln();
$pdf->Cell(40, 10, 'Date ');
$pdf->Cell(40, 10, date('d-m-y'));
$pdf->ln();
$pdf->Cell(40, 10, 'Services Report');
$pdf->ln();
$pdf->Cell(40, 10, 'NAME',1);
$pdf->Cell(40, 10, 'SERVICE',1);
$pdf->Cell(30, 10, 'PRICE',1);
$pdf->Cell(40, 10, 'DATE',1);
$pdf->ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(128, 128, 128);
$conn=mysqli_connect("localhost","root","","beauty");
$sql="SELECT * FROM `reports` WHERE 1";
$exec=mysqli_query($conn,$sql);

$sql1="SELECT *,SUM(price) AS tot FROM `reports` WHERE 1";
$exec1=mysqli_query($conn,$sql1);
$fetch=mysqli_fetch_array($exec1);

$total= $fetch['tot'];

$count=mysqli_num_rows($exec);

if ($count==0) {
    echo '';
}else{
    while ($row=mysqli_fetch_array($exec)) {
        $id=$row['id'];
        $services=$row['service'];
        $new_price=$row['price'];
        $date=$row['date'];
        $name=$row['name'];
$pdf->Cell(40, 10, $name,1);
$pdf->Cell(40, 10, $services,1);
$pdf->Cell(30, 10, $new_price,1);
$pdf->Cell(40, 10, $date,1);
$pdf->ln();
    }}
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, '',1);
$pdf->Cell(40, 10, 'TOTAL',1);
$pdf->Cell(30, 10, $total,1);
$pdf->Output();
?>