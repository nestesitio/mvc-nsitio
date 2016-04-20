<?php
/*
Basic instantiation and usage
*/

include('../html2pdf.class.php');
$h2pdf = new html2pdf();

//set the url to convert
$h2pdf->setParam('document_url','https://www.google.com/');

//start the conversion
$h2pdf->convertHTML();

//display the pdf file
$h2pdf->displayCapture();

?>
