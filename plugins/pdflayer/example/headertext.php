<?php
/*
Include a page header
*/

include('../html2pdf.class.php');
$h2pdf = new html2pdf();

//set the url to convert
$h2pdf->setParam('document_url','https://www.google.com/');

//set the header text
$h2pdf->setParam('header_text','Page [page] of [topage]');

//start the conversion
$h2pdf->convertHTML();

//display the pdf file
$h2pdf->displayCapture();

?>
