<?php
/*
Send the request directly to the API
*/

include('../html2pdf.class.php');
$h2pdf = new html2pdf();

//set the url to convert
$h2pdf->setParam('document_url','https://www.google.com/');

//tell api to display pdf in browser
$h2pdf->setParam('inline',1);

//send request directly to the api
$h2pdf->convertHTML(true);

?>
