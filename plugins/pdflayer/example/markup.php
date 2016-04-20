<?php
/*
Post markup to the api
*/

include('../html2pdf.class.php');
$h2pdf = new html2pdf();

//read html into a variable
$html = file_get_contents('test.html');

//set the document_html parameter with the html markup
$h2pdf->setParam('document_html',$html);

//start the conversion
$h2pdf->convertHTML();

//display the pdf file
$h2pdf->displayCapture();

?>
