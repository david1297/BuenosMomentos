<?php ob_start();
require_once 'dompdf/autoload.inc.php';
require_once ("config/db.php");
require_once ("config/conexion.php");

?>
<?php
 //Agregamos la libreria FPDF


// Reference the Dompdf namespace
use Dompdf\Dompdf;

// Instantiate and use the dompdf class
$dompdf = new Dompdf();



$pdf='<html><head>
<meta charset="utf-8">
  <title>Buenos Momentos Abbott</title>
  <meta content="width=device-width, initial-scale=1.0,user-scalable=no" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="subjetc" content="Tupro Creativo Publicidad y Marketing">
  <meta name="robots" content="Index, Follow">
  <meta content="Tupro Creativo Publicidad y Marketing" name="author">
  <meta content="Diseno,Web,Publicidad,Marketing,Creatividad,Negocio,Incremento,Ventas,Tupro,Creativo" name="keywords">
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/Efect.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="76x76" href="../Abbott/Imagenes/<?php echo $Icono; ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="../Abbott/Imagenes/<?php echo $Icono; ?>">
    <link rel="stylesheet" href="lib/font-awesome/css/fontawesome-all.css" media="none"
       >
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="lib/animate/animate.min.css" media="none">
    <link rel="stylesheet" href="lib/owlcarousel/assets/owl.carousel.min.css" media="none"
       >
    <link rel="stylesheet" href="lib/lightbox/css/lightbox.min.css" media="none">
    <link href="css/creative.min.css" rel="stylesheet">
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet"></head><body>';

$sql="SELECT * FROM respuestas where Fecha = CURDATE() ";
$query = mysqli_query($con, $sql);

while ($row=mysqli_fetch_array($query)){
		$pdf.=$row['Respuestas'];
		$pdf.='<div style="page-break-after:always;"></div>';

	}


	
$pdf.='</body></html>';

$dompdf->load_html($pdf );

 ini_set("memory_limit","360M");
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');



// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (1 = download and 0 = preview)
$dompdf->stream("codexworld",array("Attachment"=>0));
//$dompdf->stream("Encuestas ".$D.".pdf");




?>