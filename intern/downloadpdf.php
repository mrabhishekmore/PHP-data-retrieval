<?php

$file = $_GET["file"] . ".pdf";

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$pdf = new Dompdf();

ob_start();
?>

<?php
$html=ob_get_clean();
$pdf->loadHtml($html);
$pdf->setPaper('A4','Landscape');

$pdf->render();

$pdf->stream('result.pdf', Array('Attachment'=>0));



?>