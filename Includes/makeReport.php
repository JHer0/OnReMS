<?php
require 'dompdf/vendor/autoload.php';

use Dompdf\Dompdf;
$id = $_GET['id'];
$user = $_GET['user'];

// instantiate and use the dompdf class
$dompdf = new Dompdf();

ob_start();
if($id == 1){
    require('report/reportDashboard.php');
}else if($id == 2) {
    require('report/cemetery.php');
} else if($id == 3) {
    require('report/reportChurchMember.php');
} else if($id == 4) {
    require('report/reportChurchList.php');
} else if($id == 5) {
    require('report/reportPastorList.php');
}

$html =ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html. 'hello world<br><br>'. $id);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('OnReMS-Report',['Attachment'=>false]);

