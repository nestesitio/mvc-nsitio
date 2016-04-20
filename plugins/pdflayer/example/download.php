<?php
/*
Downloading a webpage
*/

include('../html2pdf.class.php');
$h2pdf = new html2pdf();

//set the url to convert
$h2pdf->setParam('document_url','https://www.google.com/');

//start the conversion
$h2pdf->convertHTML();

//download the pdf file using supplied name
$h2pdf->downloadCapture('google.pdf');

?>
