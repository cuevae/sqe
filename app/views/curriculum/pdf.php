<?php
$html2pdf = new HTML2PDF( 'P', 'A4', 'en', true, 'UTF-8', array(10,10,10,13) );
$html2pdf->WriteHTML( $_view );
$html2pdf->Output( $_username . '.pdf' );
?>