
<?php
 //Agregamos la libreria FPDF
require_once 'dompdf/autoload.inc.php';

// Reference the Dompdf namespace
use Dompdf\Dompdf;

// Instantiate and use the dompdf class
$dompdf = new Dompdf();


$D=date("d-m-Y");
$pdf='<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head><body>';
	$mysqli = new mysqli('127.0.0.1', 'root', 'root', 'informe');
$mysqli->set_charset("utf8");
$consulta = (" select * from correos where fecha ='$D'");
$res = mysqli_query($mysqli, $consulta);
	while($f = mysqli_fetch_object($res)){
		$pdf.=$f->correo;
		$pdf.='<div style="page-break-after:always;"></div>';

	}


	
$pdf.='</body></html>';
$pdf=utf8_encode($pdf);
$dompdf->loadHtml($pdf);
 ini_set("memory_limit","360M");
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');



// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (1 = download and 0 = preview)
//$dompdf->stream("codexworld",array("Attachment"=>0));
$dompdf->stream("Correos ".$D.".pdf");




?>