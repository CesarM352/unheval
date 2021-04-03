<?php
require 'vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml(file_get_contents( 'http://'.str_replace('archivopdf','documentobaja',$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ));
//$dompdf->loadHtml('w');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("archivo.pdf", array( "Attachment" => false ));