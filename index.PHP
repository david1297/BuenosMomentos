<?php
  require_once ("config/db.php");
  require_once ("config/conexion.php");
  $sql="SELECT * FROM administracion ";
  $query = mysqli_query($con, $sql);
  $row=mysqli_fetch_array($query);
  $ImagenP=$row['ImagenP'];
  $ColorP=$row['ColorP'];
  $ColorS=$row['ColorS'];
  $Icono=$row['Icono'];
  $Justificacion=$row['Justificacion'];
  $ColorT= 'Color:'.$row['ColorT'];


  $Tamano = 'font-size:'.$row['Tamano'].'px;';
  $TipoGrafia =$row['TipoGrafia'];
 
?>
<!DOCTYPE html>
<html lang="es">

<head>
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
        onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="lib/animate/animate.min.css" media="none" onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="lib/owlcarousel/assets/owl.carousel.min.css" media="none"
        onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="lib/lightbox/css/lightbox.min.css" media="none" onload="if(media!='all')media='all'">
    <link href="css/creative.min.css" rel="stylesheet">
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
  <header id='main'>
    <div class="fixed-top">
      <nav class="navbar   navbar-dark  bg-core " style='background-color: <?php echo $ColorP;?>!important;'>
        <div class="m-lg-auto">
          <img src="../Abbott/Imagenes/<?php echo $ImagenP; ?>" class="img-fluid" alt="Responsive image" width="200px">
        </div>
      </nav>
      <nav class="navbar navbar-expand-md navbar-light bg-light" style='background-color: <?php echo $ColorS;?>!important;'>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container justify-content-center">
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav justify-content-center m-lg-auto">                
            <?php
              $sql="SELECT * FROM administracionD ";
              $query = mysqli_query($con, $sql);
              while($row=mysqli_fetch_array($query)){
                $Texto=$row['Texto'];
                $Enlace=$row['Enlace'];
                $Tipo=$row['Tipo'];
                $Seccion=$row['Seccion'];
                ?>
                <li class="nav-item active">
               
                <?php
                  if($Tipo =='Pagina'){
                    ?>
                    <a class="nav-link js-scroll-trigger <?php echo  $TipoGrafia.' '.$Justificacion;?>" href="index.php?Id=<?php echo $Enlace;?>#Section<?php echo $Seccion;?>" style='<?php echo $Tamano.' '.$ColorT;?>'><?php echo $Texto;?> <span class="sr-only">(current)</span></a>

                    <?php
                  }else{
                    ?>
                    <a class="nav-link js-scroll-trigger <?php echo  $TipoGrafia.' '.$Justificacion;?>" href="index.php?Id=<?php echo $Enlace;?>&Tipo=Encuesta" style='<?php echo $Tamano.' '.$ColorT;?>'><?php echo $Texto;?> <span class="sr-only">(current)</span></a>
                    <?php

                  }

                 ?>
                </li>
                <?php
              }
              
            ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <div id="inicio"></div>
  <?php
  if (isset($_GET['Tipo'])) {
    $Id=$_GET['Id'];
    $sql="SELECT * FROM encuestad where encuesta = $Id order by Orden";
    $query = mysqli_query($con, $sql);
    ?>
    <div class="container" id="Encuesta">
<form action="">
<?php
while ($row=mysqli_fetch_array($query)){
?>
<div class="row"><div class="col-md-8"><?php echo '<spam>'.$row['Pregunta'].'<spam>';?><br>
<label class='Res'for="input<?php echo $row['Id']; ?>" id="Label<?php echo $row['Id']; ?>">R:/</label>
<?php        
if( $row['Tipo']=='Texto'){
?>
<div class="form-group"><input type="text" class='form-control pregunta' id='<?php echo $row['Id']; ?>' name="input<?php echo $row['Id']; ?>" value=''></div>
<?php
}else{
if( $row['Tipo']=='Multiple'){
$sql1="SELECT * FROM p_seleccion where Pregunta = ".$row['Id']." ";
$query1 = mysqli_query($con, $sql1);
while ($row1=mysqli_fetch_array($query1)){
?>
<div class="form-check"><input class="form-check-input pregunta " type="checkbox" id='C-<?php echo $row1['Id']; ?>-<?php echo $row['Id']; ?>' value="<?php echo $row1['Opcion']; ?>" name="Check<?php echo $row['Id']; ?>"><label class="form-check-label pregunta " for="defaultCheck1"><?php echo $row1['Opcion']; ?></label></div><?php
}
}else{
if( $row['Tipo']=='Seleccion'){
$sql1="SELECT * FROM p_seleccion where Pregunta = ".$row['Id']." ";
$query1 = mysqli_query($con, $sql1);
while ($row1=mysqli_fetch_array($query1)){
?>
<div class="form-check"><input class="form-check-input pregunta radio" type="radio"  id='R-<?php echo $row1['Id']; ?>-<?php echo $row['Id']; ?>' name="Radio<?php echo $row['Id']; ?>" value="<?php echo $row1['Opcion']; ?>"><label class="form-check-label pregunta" for="Radio<?php echo $row1['Id']; ?>" ><?php echo $row1['Opcion']; ?></label></div><?php
}
}
} 
}          
?>
</div>
</div>
<?php
}
?>  
</form>
</div>
<div class="container">
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href='Index.php'">Cancelar</button>
<button type="submit" class="btn btn-primary" id="actualizar_datos3B" onclick='GuardarEncuesta()'>Guardar</button>
</div>
</div>
<?php

  }else{ 
    if (isset($_GET['Id'])) {
      $Id=$_GET['Id'];
    }else{
      $sql="SELECT * FROM pagina where Principal ='True'";
      $query = mysqli_query($con, $sql);
      $row=mysqli_fetch_array($query);
      $Id=$row['Id'];
    }
    $sql="SELECT Tipo,Seccion FROM paginad where Pagina = $Id order by ORden";
    $query = mysqli_query($con, $sql);
    while ($row=mysqli_fetch_array($query)){
      $Tipo=$row['Tipo'];
      if ( $Tipo=='1'){
        $sql="SELECT Descripcion,Id,TipoFondo,Fondo,Completa FROM seccion1 where Id = ".$row['Seccion']."";
        $query1 = mysqli_query($con, $sql);
        $Session=mysqli_fetch_array($query1);
        if ($Session['Completa']=='True'){
          $Container='container-fluid';
        }else{
          $Container='container';
        }
        if ($Session['TipoFondo']=='Imagen'){
          $Fondo='background :url(../Abbott/Imagenes/'.$Session['Fondo'].')
          no-repeat
          center center;
          background-size: cover;
        ';
        }else{
          $Fondo ='background-color:'.$Session['Fondo'];
        }

        ?>
        <Div class='Contenedores' id='<?php echo 'Section1-'.$Session['Id'];?>' style="<?php echo $Fondo;?>" >
          <div class='<?php echo $Container;?>' >
          
            <?php
            $sql="SELECT Tipo,Elemento FROM seccion1d where Seccion = ".$row['Seccion']." order by Orden ";
            $queryd = mysqli_query($con, $sql);
            while($Sessiond=mysqli_fetch_array($queryd)){
              if ($Sessiond['Tipo']=='Titulo'){
                $sql="SELECT Texto,color,Tamano,TipoGrafia,Justificacion FROM titulos where Id = ".$Sessiond['Elemento'].";";
                $queryO = mysqli_query($con, $sql);
                $Objeto=mysqli_fetch_array($queryO);
                $Tamano = 'font-size:'.$Objeto['Tamano'].'px;';
                $Color=' color:'.$Objeto['color'];
                $TipoGrafia =$Objeto['TipoGrafia'];
                $Justificacion =$Objeto['Justificacion'];
                ?>
                <div class="row"style="margin-top: 0px;margin-bottom: 0px;">
                  <div class="col-md-12 "> 
                    <p style='<?php echo $Tamano.$Color;?>' class='<?php echo  $TipoGrafia.' '.$Justificacion;?>'><?php echo $Objeto['Texto'];?></p>
                  </div>
                </div>
                <?php
              }
              if ($Sessiond['Tipo']=='Parrafo'){
                $sql="SELECT Texto,color,Tamano,TipoGrafia,Justificacion FROM parrafos where Id = ".$Sessiond['Elemento'].";";
                $queryO = mysqli_query($con, $sql);
                $Objeto=mysqli_fetch_array($queryO);
                $Tamano = 'font-size:'.$Objeto['Tamano'].'px;';
                $Color=' color:'.$Objeto['color'];
                $TipoGrafia =$Objeto['TipoGrafia'];
                $Justificacion =$Objeto['Justificacion'];
                ?>
                <div class="row">
                  <div class="col-md-12 "> 
                    <p style='<?php echo $Tamano.$Color;?>' class='  <?php echo  $TipoGrafia.' '.$Justificacion;?>'><?php echo $Objeto['Texto'];?></p>
                    </div>
                </div>
                <?php
              }
              if ($Sessiond['Tipo']=='Imagen'){
                $sql="SELECT * FROM imagenes where Id = ".$Sessiond['Elemento'].";";
                $queryO = mysqli_query($con, $sql);
                $Objeto=mysqli_fetch_array($queryO);
                $Imagen = $Objeto['Imagen'];
                $Tamano = $Objeto['Tamano'];
                $Justificacion = $Objeto['Justificacion'];
                
                if( $Justificacion=='text-center'){
                  $offset = (12-$Tamano);
                  if ($offset<>0){
                    $offset=$offset/2;
                    $offset='col-md-offset-'.$offset.' text-center';
                  }else{
                    $offset='text-center';
                  }
                }else{
                  $offset='';
                }  
                ?>
                <div class="row">
                  <div class='col-md-<?php echo $Tamano; ?>  <?php echo $offset; ?>' style="margin-top: 0px;margin-bottom: 0px; padding-left: 0px;padding-right: 0px;">
                    <img src="../Abbott/Imagenes/<?php echo $Imagen; ?>" class="img-fluid"  alt="Imagen" />
                  </div> 
                </div>
                <?php
              }
              if ($Sessiond['Tipo']=='Video'){
                $sql="SELECT * FROM Videos where Id = ".$Sessiond['Elemento'].";";
                $queryO = mysqli_query($con, $sql);
                $Objeto=mysqli_fetch_array($queryO);
                $Video = $Objeto['Video'];
                $Autoplay = $Objeto['Autoplay'];
                $Tamano = $Objeto['Tamano'];
                $Justificacion = $Objeto['Justificacion'];
                
                if( $Justificacion=='text-center'){
                  $offset = (12-$Tamano);
                  if ($offset<>0){
                    $offset=$offset/2;
                    $offset='col-md-offset-'.$offset.' text-center';
                  }else{
                    $offset='text-center';
                  }
                }else{
                  $offset='';
                }   
                ?>
                <div class="row">
                  <div class='col-md-<?php echo $Tamano; ?> <?php echo $offset; ?>' style="margin-top: 0px;margin-bottom: 0px; padding-left: 0px;padding-right: 0px;">
                    <video controls loop class="embed-responsive-item"  width="100%" <?php echo $Autoplay; ?> >
                      <source src="../Abbott/Videos/<?php echo $Video; ?>" type="video/mp4"  >
                    </video>
                  </div> 
                </div>
                <?php
              }
              if ($Sessiond['Tipo']=='Carrusel'){
                $sql="SELECT * FROM carrusel where Id = ".$Sessiond['Elemento'].";";
                    $queryO = mysqli_query($con, $sql);
                    $Objeto=mysqli_fetch_array($queryO);
                    $Controles = $Objeto['Controles'];
                    $Tamano = $Objeto['Tamano'];
                    $offset = (12-$Tamano);
                    if ($offset<>0){
                      $offset=$offset/2;
                    }
                    
                ?>
                <style>
                .container-fluid{
                }
                </style>
                <div class="row" style=" padding-left: 0px;padding-right: 0px;">
                  <div class='col-md-<?php echo $Tamano; ?>  col-md-offset-<?php echo $offset; ?>' style="margin-top: 0px;margin-bottom: 0px; padding-left: 0px;padding-right: 0px;">
                    <div id="carouselExampleCaptions<?php echo $Sessiond['Elemento'];?>" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <?php
                        $h=0;
                        $sql="SELECT * FROM carruseld where Carrusel = ".$Sessiond['Elemento'].";";
                        $queryO = mysqli_query($con, $sql);
                        while($Objeto=mysqli_fetch_array($queryO)){
                          $Imagen = $Objeto['Imagen'];
                          $Titulo = $Objeto['Titulo'];
                          $TTamano = 'font-size:'.$Objeto['TTamano'].'px;';
                          $TColor=' color:'.$Objeto['TColor'];
                          $TTipografia =$Objeto['TTipografia'];
                          $TJustificacion =$Objeto['TJustificacion'];
                          $Parrafo = $Objeto['Parrafo'];
                          $PTamano = 'font-size:'.$Objeto['PTamano'].'px;';
                          $PColor=' color:'.$Objeto['PColor'];
                          $PTipografia =$Objeto['PTipografia'];
                          $PJustificacion =$Objeto['PJustificacion'];
                          if($h==0){
                            $active =' active ';
                          }else{
                            $active='';
                          }
                          ?>
                          <div class="carousel-item <?php echo $active; ?>">
                            <img src="../Abbott/Imagenes/<?php echo $Imagen; ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <p style='<?php echo $TTamano.$TColor;?>' class=' <?php echo  $TTipografia.' '.$TJustificacion;?>'><?php echo $Objeto['Titulo'];?></p>
                              <p style='<?php echo $PTamano.$PColor;?>' class=' <?php echo  $PTipografia.' '.$PJustificacion;?>'><?php echo $Objeto['Parrafo'];?></p>
                            </div>
                          </div>
                          <?php
                          $h=1;
                        }
                        ?>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleCaptions<?php echo $Sessiond['Elemento'];?>" role="button" data-slide="prev">
                        <?php
                        if($Controles=='True'){
                          ?>
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                          <?php
                        }
                        ?>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleCaptions<?php echo $Sessiond['Elemento'];?>" role="button" data-slide="next">
                        <?php
                        if($Controles=='True'){
                          ?>
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                          <?php
                        }
                        ?>
                      </a>
                    </div>
                  </div>
                </div>
                <?php
              }
              if ($Sessiond['Tipo']=='Album'){
                ?>
                <style>
                .container-fluid{
                  padding-right: 0;
                  padding-left: 0;
                }
                </style>
                <section id="portfolio" class="section-bg container">
                  <div class="row portfolio-container">
                    <?php
                    $sql="SELECT * FROM albumd where Album = ".$Sessiond['Elemento']."  order by Orden";
                    $queryO = mysqli_query($con, $sql);
                    while($Objeto=mysqli_fetch_array($queryO)){
                      $Imagen = $Objeto['Imagen'];
                      ?>
                      <div class="col-lg-3 col-md-6 col-xs-12 portfolio-item1 filter-publicidad ">
                        <div class="portfolio-wrap">
                          <figure class="catalogo"><img src="../Abbott/Imagenes/<?php echo $Imagen; ?>" class="img-fluido " alt="">
                            <a id="p1" href="../Abbott/Imagenes/<?php echo $Imagen; ?>" data-lightbox="portfolio" data-title="Carrera 4k" class="link-preview" title="Preview">
                              <i class="fas fa-eye"></i>
                            </a>
                          </figure>
                        </div>
                      </div>
                      <?php
                      $h=1;
                    }
                    ?>
                  </div>
                </section>
                <?php
              }
              if ($Sessiond['Tipo']=='Botonera'){
                $sql2="select distinct Anio from botonerad where botonera =  ".$Sessiond['Elemento']." order by Anio;";
                    $query2 = mysqli_query($con, $sql2);
                    

                $sql="SELECT * FROM Botonerad where Botonera = ".$Sessiond['Elemento'].";";
                $queryO = mysqli_query($con, $sql);
                ?>
                <section id="portfolio"  class="section-bg" >
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-12">
                        <ul id="portfolio-flters">
                          <?php
                          
                          $h=0;
                          while($row2=mysqli_fetch_array($query2)){
                            if($h==0){
                              $Filtro='filter-active';
                            }else{
                              $Filtro='';
                            }
                            $Anio=$row2['Anio'];
                            echo '<li data-filter=".filter-'.$Anio.'" class="'.$Filtro.'" >'.$Anio.'</li>';
                            $h++;
                          }
                          ?>
                        </ul>
                      </div>
                    </div>
                    <div class="row portfolio-container" style="margin-top: 0px; margin-bottom: 0px;">
                      <?php
                      while($Objeto=mysqli_fetch_array($queryO)){
                        $Enlace = $Objeto['Enlace'];
                        $Imagen = $Objeto['Imagen'];
                        $RBorder = $Objeto['RBorder'];
                        $BGrosor = $Objeto['BGrosor'];
                        $Descripcion = $Objeto['Descripcion'];
                        $BColor = $Objeto['BColor'];
                        $RBorderI = $Objeto['RBorderI'];
                        $Anio = $Objeto['Anio'];                      
                        ?>           
                        <div class="col-md-4 portfolio-item filter-<?php echo $Anio;?>" style="padding-top: 15px; padding-bottom: 15px;">
                          <div class="text-center" style=' border-width: <?php echo  $BGrosor;?>px; border-style: solid; border-color: <?php echo  $BColor;?>;border-radius:<?php echo  $RBorder;?>%;'>              
                            <a class="nav-link" href="index.php?Id=<?php echo $Enlace; ?>">
                            <img src='../Abbott/Imagenes/<?php echo $Imagen; ?>' class="img-fluid" style='border-radius:<?php echo  $RBorderI;?>%;' alt="Responsive image"> 
                            </a>
                            <h3 style ="color: <?php echo $BColor;?>"> <?php echo $Descripcion;?></h3>
                          </div>   
                        </div>
                        <?php
                      }
                      ?>
                    </div>
                  </div> 
                </section>
                <?php
              }
              if($Sessiond['Tipo']=='Boton'){
                $sql="SELECT * FROM Boton where Id = ".$Sessiond['Elemento'].";";
                $queryO = mysqli_query($con, $sql);
                $Objeto=mysqli_fetch_array($queryO);
                $Enlace = $Objeto['Enlace'];
                $Texto = $Objeto['Texto'];
                $TipoB = $Objeto['Tipo'];
                $Justificacion = $Objeto['Justificacion'];
                ?>
                <div class="row"style="margin-top: 0px;margin-bottom: 0px;">
                <div class=' col-md-12 <?php echo $Justificacion; ?>' style="margin-top: 0px;margin-bottom: 0px; padding-left: 0px;padding-right: 0px;">
                <?php
                  if($TipoB=='Pagina'){
                    ?>
                    <a href="index.php?Id=<?php echo $Enlace; ?>" class="btn btn-primary punteado"><?php echo $Texto;?></a>
                    <?php
                  }else{
                    ?>
                    <a href="index.php?Id=<?php echo $Enlace; ?>&Tipo=Encuesta" class="btn btn-primary punteado"><?php echo $Texto;?></a>
                    <?php
                  }
                ?>
                
                  </div> 
                </div>
                <?php
              }
            }
            ?>
          </div> 
        </Div>
    
        <?php
      } else{
        $sql="SELECT Descripcion,Id,TipoFondo,Fondo,Completa FROM seccion2 where Id = ".$row['Seccion']." ";
        $query1 = mysqli_query($con, $sql);
        $Session=mysqli_fetch_array($query1);
        if ($Session['Completa']=='True'){
          $Container='container-fluid';
        }else{
          $Container='container';
        }
        if ($Session['TipoFondo']=='Imagen'){
          $Fondo='background :url(data:image/gif;base64,'.$Session['Fondo'].')
          no-repeat
          left center;
          background-size: cover;
        ';
        }else{
          $Fondo ='background-color:'.$Session['Fondo'];
        }

        ?>
        <Div class='Contenedores' id='<?php echo 'Section2-'.$Session['Id'];?>' style="<?php echo $Fondo;?>" >
          <div class='<?php echo $Container;?>' >
            <?php
            $sql="SELECT Tipo1,Elemento1,Tipo2,Elemento2 FROM seccion2d where Seccion = ".$row['Seccion']."  order by Orden";
            $queryd = mysqli_query($con, $sql);
            while($Sessiond=mysqli_fetch_array($queryd)){
            ?>
              <div class="row"style="margin-top: 0px;margin-bottom: 0px;">
                <div class="col-md-6">
                  <?php
                    if ($Sessiond['Tipo1']=='Titulo'){
                      $sql="SELECT Texto,color,Tamano,TipoGrafia,Justificacion FROM titulos where Id = ".$Sessiond['Elemento1'].";";
                      $queryO = mysqli_query($con, $sql);
                      $Objeto=mysqli_fetch_array($queryO);
                      $Tamano = 'font-size:'.$Objeto['Tamano'].'px;';
                      $Color=' color:'.$Objeto['color'];
                      $TipoGrafia =$Objeto['TipoGrafia'];
                      $Justificacion =$Objeto['Justificacion'];
                      ?>
                      <div class="row"style="margin-top: 0px;margin-bottom: 0px;">
                        <div class="col-md-12 "> 
                          <p style='<?php echo $Tamano.$Color;?>' class='<?php echo  $TipoGrafia.' '.$Justificacion;?>'><?php echo $Objeto['Texto'];?></p>
                        </div>
                      </div>
                      <?php
                    }
                    if ($Sessiond['Tipo1']=='Parrafo'){
                      $sql="SELECT Texto,color,Tamano,TipoGrafia,Justificacion FROM parrafos where Id = ".$Sessiond['Elemento1'].";";
                      $queryO = mysqli_query($con, $sql);
                      $Objeto=mysqli_fetch_array($queryO);
                      $Tamano = 'font-size:'.$Objeto['Tamano'].'px;';
                      $Color=' color:'.$Objeto['color'];
                      $TipoGrafia =$Objeto['TipoGrafia'];
                      $Justificacion =$Objeto['Justificacion'];
                      ?>
                      <div class="row"style="margin-top: 0px;margin-bottom: 0px;">
                        <div class="col-md-12 "> 
                          <p style='<?php echo $Tamano.$Color;?>' class='  <?php echo  $TipoGrafia.' '.$Justificacion;?>'><?php echo $Objeto['Texto'];?></p>
                          </div>
                      </div>
                      <?php
                    }
                    if ($Sessiond['Tipo1']=='Imagen'){
                      $sql="SELECT * FROM imagenes where Id = ".$Sessiond['Elemento1'].";";
                      $queryO = mysqli_query($con, $sql);
                      $Objeto=mysqli_fetch_array($queryO);
                      $Imagen = $Objeto['Imagen'];
                      $Tamano = $Objeto['Tamano'];
                      $Justificacion = $Objeto['Justificacion'];
                      
                      if( $Justificacion=='text-center'){
                        $offset = (12-$Tamano);
                        if ($offset<>0){
                          $offset=$offset/2;
                          $offset='col-md-offset-'.$offset.' text-center';
                        }else{
                          $offset='text-center';
                        }
                      }else{
                        $offset='';
                      }  
                      ?>
                      <div class="row">
                      <div class='col-md-<?php echo $Tamano; ?>  <?php echo $offset; ?>' style="margin-top: 0px;margin-bottom: 0px; padding-left: 0px;padding-right: 0px;">
                          <img src="../Abbott/Imagenes/<?php echo $Imagen; ?>" class="img-fluid"  alt="Imagen" />
                        </div> 
                      </div>
                      <?php
                    }
                    if ($Sessiond['Tipo1']=='Video'){
                      $sql="SELECT * FROM Videos where Id = ".$Sessiond['Elemento1'].";";
                      $queryO = mysqli_query($con, $sql);
                      $Objeto=mysqli_fetch_array($queryO);
                      $Video = $Objeto['Video'];
                      $Autoplay = $Objeto['Autoplay'];
                      $Tamano = $Objeto['Tamano'];
                      $Justificacion = $Objeto['Justificacion'];
                      
                      if( $Justificacion=='text-center'){
                        $offset = (12-$Tamano);
                        if ($offset<>0){
                          $offset=$offset/2;
                          $offset='col-md-offset-'.$offset.' text-center';
                        }else{
                          $offset='text-center';
                        }
                      }else{
                        $offset='';
                      }   
                      ?>
                      <div class="row">
                        <div class='col-md-<?php echo $Tamano; ?> <?php echo $offset; ?>' style="margin-top: 0px;margin-bottom: 0px; padding-left: 0px;padding-right: 0px;">
                          <video controls loop class="embed-responsive-item"  width="100%" <?php echo $Autoplay; ?> >
                            <source src="../Abbott/Videos/<?php echo $Video; ?>" type="video/mp4"  >
                          </video>
                        </div> 
                      </div>
                      <?php
                    }
                    if ($Sessiond['Tipo1']=='Carrusel'){
                      $sql="SELECT * FROM carrusel where Id = ".$Sessiond['Elemento1'].";";
                          $queryO = mysqli_query($con, $sql);
                          $Objeto=mysqli_fetch_array($queryO);
                          $Controles = $Objeto['Controles'];
                          $Tamano = $Objeto['Tamano'];
                          $offset = (12-$Tamano);
                          if ($offset<>0){
                            $offset=$offset/2;
                          }

                      ?>
                      <style>
                      .container-fluid{
                        padding-right: 0;
                        padding-left: 0;
                      }
                      </style>
                      <div class="row" style=" padding-left: 0px;padding-right: 0px;">
                        <div class='col-md-<?php echo $Tamano; ?>  col-md-offset-<?php echo $offset; ?>' style="margin-top: 0px;margin-bottom: 0px; padding-left: 0px;padding-right: 0px;">
                        <div id="carouselExampleCaptions<?php echo $Sessiond['Elemento1'];?>" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                              $h=0;
                              $sql="SELECT * FROM carruseld where Carrusel = ".$Sessiond['Elemento1'].";";
                              $queryO = mysqli_query($con, $sql);
                              while($Objeto=mysqli_fetch_array($queryO)){
                                $Imagen = $Objeto['Imagen'];
                                $Titulo = $Objeto['Titulo'];
                                $TTamano = 'font-size:'.$Objeto['TTamano'].'px;';
                                $TColor=' color:'.$Objeto['TColor'];
                                $TTipografia =$Objeto['TTipografia'];
                                $TJustificacion =$Objeto['TJustificacion'];
                                $Parrafo = $Objeto['Parrafo'];
                                $PTamano = 'font-size:'.$Objeto['PTamano'].'px;';
                                $PColor=' color:'.$Objeto['PColor'];
                                $PTipografia =$Objeto['PTipografia'];
                                $PJustificacion =$Objeto['PJustificacion'];
                                if($h==0){
                                  $active ='active';
                                }else{
                                  $active='';
                                }
                                ?>
                                <div class="carousel-item <?php echo $active; ?>">
                                  <img src="../Abbott/Imagenes/<?php echo $Imagen; ?>" class="d-block w-100" alt="...">
                                  <div class="carousel-caption d-none d-md-block">
                                    <p style='<?php echo $TTamano.$TColor;?>' class=' <?php echo  $TTipografia.' '.$TJustificacion;?>'><?php echo $Objeto['Titulo'];?></p>
                                    <p style='<?php echo $PTamano.$PColor;?>' class=' <?php echo  $PTipografia.' '.$PJustificacion;?>'><?php echo $Objeto['Parrafo'];?></p>
                                  </div>
                                </div>
                                <?php
                                $h=1;
                              }
                              ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions<?php echo $Sessiond['Elemento1'];?>" role="button" data-slide="prev">
                              <?php
                              if($Controles=='True'){
                                ?>
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                <?php
                              }
                              ?>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions<?php echo $Sessiond['Elemento1'];?>" role="button" data-slide="next">
                              <?php
                              if($Controles=='True'){
                                ?>
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                <?php
                              }
                              ?>
                            </a>
                          </div>
                        </div>
                      </div>
                      <?php
                    }
                    if ($Sessiond['Tipo1']=='Album'){
                      ?>
                      <style>
                      .container-fluid{
                        padding-right: 0;
                        padding-left: 0;
                      }
                      </style>
                      <section id="portfolio" class="section-bg container">
                        <div class="row portfolio-container">
                          <?php
                          $sql="SELECT * FROM albumd where Album = ".$Sessiond['Elemento1']."  order by Orden";
                          $queryO = mysqli_query($con, $sql);
                          while($Objeto=mysqli_fetch_array($queryO)){
                            $Imagen = $Objeto['Imagen'];
                            ?>
                            <div class="col-lg-3 col-md-6 col-xs-12 portfolio-item filter-publicidad ">
                              <div class="portfolio-wrap">
                                <figure class="catalogo"><img src="../Abbott/Imagenes/<?php echo $Imagen; ?>" class="img-fluido " alt="">
                                  <a id="p1" href="../Abbott/Imagenes/<?php echo $Imagen; ?>" data-lightbox="portfolio" data-title="" class="link-preview" title="Preview">
                                    <i class="fas fa-eye"></i>
                                  </a>
                                </figure>
                              </div>
                            </div>
                            <?php
                            $h=1;
                          }
                          ?>
                        </div>
                      </section>
                      <?php
                    }
                    if ($Sessiond['Tipo1']=='Botonera'){
                      $sql="SELECT * FROM Botonerad where Botonera = ".$Sessiond['Elemento1'].";";
                      $queryO = mysqli_query($con, $sql);
                      ?>
                      <div class="row"style="margin-top: 0px; margin-bottom: 0px;">
                        <?php
                        while($Objeto=mysqli_fetch_array($queryO)){
                          $Enlace = $Objeto['Enlace'];
                          $Imagen = $Objeto['Imagen'];
                          $RBorder = $Objeto['RBorder'];
                          $BGrosor = $Objeto['BGrosor'];
                          $Descripcion = $Objeto['Descripcion'];
                          $BColor = $Objeto['BColor'];
                          $RBorderI = $Objeto['RBorderI'];
                          ?>
                          
                          <div class="col-md-4" style="padding-top: 15px; padding-bottom: 15px;">
                            <div class="text-center" style=' 
                              border-width: <?php echo  $BGrosor;?>px;
                              border-style: solid;
                              border-color: <?php echo  $BColor;?>;
                              border-radius:<?php echo  $RBorder;?>%;
                              '>              
                              <a class="nav-link" href="index.php?Id=<?php echo $Enlace; ?>">
                                <img src='../Abbott/Imagenes/<?php echo $Imagen; ?>' class="img-fluid" style='border-radius:<?php echo  $RBorderI;?>%;' alt="Responsive image">
                                
                              </a>
                              <h3 style ="color: <?php echo $BColor;?>"> <?php echo $Descripcion;?></h3>
                            </div>   
                          </div>
                          <?php
                        }
                      ?>
                      </div>
                    
                    <?php
                    }
                    if($Sessiond['Tipo1']=='Boton'){
                      $sql="SELECT * FROM Boton where Id = ".$Sessiond['Elemento1'].";";
                      $queryO = mysqli_query($con, $sql);
                      $Objeto=mysqli_fetch_array($queryO);
                      $Enlace = $Objeto['Enlace'];
                      $Texto = $Objeto['Texto'];
                      $Justificacion = $Objeto['Justificacion'];
                      ?>
                      <div class="row"style="margin-top: 0px;margin-bottom: 0px;">
                      <div class=' col-md-12 <?php echo $Justificacion; ?>' style="margin-top: 0px;margin-bottom: 0px; padding-left: 0px;padding-right: 0px;">
                      <a href="index.php?Id=<?php echo $Enlace; ?>" class="btn btn-primary punteado"><?php echo $Texto;?></a>
                        </div> 
                      </div>
                      <?php
                    }
                  ?>
                </div>
                <div class="col-md-6">
                  <?php
                    if ($Sessiond['Tipo2']=='Titulo'){
                      $sql="SELECT Texto,color,Tamano,TipoGrafia,Justificacion FROM titulos where Id = ".$Sessiond['Elemento2'].";";
                      $queryO = mysqli_query($con, $sql);
                      $Objeto=mysqli_fetch_array($queryO);
                      $Tamano = 'font-size:'.$Objeto['Tamano'].'px;';
                      $Color=' color:'.$Objeto['color'];
                      $TipoGrafia =$Objeto['TipoGrafia'];
                      $Justificacion =$Objeto['Justificacion'];
                      ?>
                      <div class="row"style="margin-top: 0px;margin-bottom: 0px;">
                        <div class="col-md-12 "> 
                          <p style='<?php echo $Tamano.$Color;?>' class='<?php echo  $TipoGrafia.' '.$Justificacion;?>'><?php echo $Objeto['Texto'];?></p>
                        </div>
                      </div>
                      <?php
                    }
                    if ($Sessiond['Tipo2']=='Parrafo'){
                      $sql="SELECT Texto,color,Tamano,TipoGrafia,Justificacion FROM parrafos where Id = ".$Sessiond['Elemento2'].";";
                      $queryO = mysqli_query($con, $sql);
                      $Objeto=mysqli_fetch_array($queryO);
                      $Tamano = 'font-size:'.$Objeto['Tamano'].'px;';
                      $Color=' color:'.$Objeto['color'];
                      $TipoGrafia =$Objeto['TipoGrafia'];
                      $Justificacion =$Objeto['Justificacion'];
                      ?>
                      <div class="row"style="margin-top: 0px;margin-bottom: 0px;">
                        <div class="col-md-12 "> 
                          <p style='<?php echo $Tamano.$Color;?>' class='  <?php echo  $TipoGrafia.' '.$Justificacion;?>'><?php echo $Objeto['Texto'];?></p>
                          </div>
                      </div>
                      <?php
                    }
                    if ($Sessiond['Tipo2']=='Imagen'){
                      $sql="SELECT * FROM imagenes where Id = ".$Sessiond['Elemento2'].";";
                      $queryO = mysqli_query($con, $sql);
                      $Objeto=mysqli_fetch_array($queryO);
                      $Imagen = $Objeto['Imagen'];
                      $Tamano = $Objeto['Tamano'];
                      $Justificacion = $Objeto['Justificacion'];
                      
                      if( $Justificacion=='text-center'){
                        $offset = (12-$Tamano);
                        if ($offset<>0){
                          $offset=$offset/2;
                          $offset='col-md-offset-'.$offset.' text-center';
                        }else{
                          $offset='text-center';
                        }
                      }else{
                        $offset='';
                      }  
                      ?>
                      <div class="row">
                      <div class='col-md-<?php echo $Tamano; ?>  <?php echo $offset; ?>' style="margin-top: 0px;margin-bottom: 0px; padding-left: 0px;padding-right: 0px;">
                          <img src="../Abbott/Imagenes/<?php echo $Imagen; ?>" class="img-fluid"  alt="Imagen" />
                        </div> 
                      </div>
                      <?php
                    }
                    if ($Sessiond['Tipo2']=='Video'){
                      $sql="SELECT * FROM Videos where Id = ".$Sessiond['Elemento2'].";";
                      $queryO = mysqli_query($con, $sql);
                      $Objeto=mysqli_fetch_array($queryO);
                      $Video = $Objeto['Video'];
                      $Autoplay = $Objeto['Autoplay'];
                      $Tamano = $Objeto['Tamano'];
                      $Justificacion = $Objeto['Justificacion'];
                      
                      if( $Justificacion=='text-center'){
                        $offset = (12-$Tamano);
                        if ($offset<>0){
                          $offset=$offset/2;
                          $offset='col-md-offset-'.$offset.' text-center';
                        }else{
                          $offset='text-center';
                        }
                      }else{
                        $offset='';
                      }   
                      ?>
                      <div class="row">
                        <div class='col-md-<?php echo $Tamano; ?> <?php echo $offset; ?>' style="margin-top: 0px;margin-bottom: 0px; padding-left: 0px;padding-right: 0px;">
                          <video controls loop class="embed-responsive-item"  width="100%" <?php echo $Autoplay; ?> >
                            <source src="../Abbott/Videos/<?php echo $Video; ?>" type="video/mp4"  >
                          </video>
                        </div> 
                      </div>
                      <?php
                    }
                    if ($Sessiond['Tipo2']=='Carrusel'){
                      $sql="SELECT * FROM carrusel where Id = ".$Sessiond['Elemento2'].";";
                          $queryO = mysqli_query($con, $sql);
                          $Objeto=mysqli_fetch_array($queryO);
                          $Controles = $Objeto['Controles'];
                          $Tamano = $Objeto['Tamano'];
                          $offset = (12-$Tamano);
                          if ($offset<>0){
                            $offset=$offset/2;
                          }

                      ?>
                      <style>
                      .container-fluid{
                        padding-right: 0;
                        padding-left: 0;
                      }
                      </style>
                      <div class="row" style=" padding-left: 0px;padding-right: 0px;">
                        <div class='col-md-<?php echo $Tamano; ?>  col-md-offset-<?php echo $offset; ?>' style="margin-top: 0px;margin-bottom: 0px; padding-left: 0px;padding-right: 0px;">
                        <div id="carouselExampleCaptions<?php echo $Sessiond['Elemento2'];?>" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                              $h=0;
                              $sql="SELECT * FROM carruseld where Carrusel = ".$Sessiond['Elemento2'].";";
                              $queryO = mysqli_query($con, $sql);
                              while($Objeto=mysqli_fetch_array($queryO)){
                                $Imagen = $Objeto['Imagen'];
                                $Titulo = $Objeto['Titulo'];
                                $TTamano = 'font-size:'.$Objeto['TTamano'].'px;';
                                $TColor=' color:'.$Objeto['TColor'];
                                $TTipografia =$Objeto['TTipografia'];
                                $TJustificacion =$Objeto['TJustificacion'];
                                $Parrafo = $Objeto['Parrafo'];
                                $PTamano = 'font-size:'.$Objeto['PTamano'].'px;';
                                $PColor=' color:'.$Objeto['PColor'];
                                $PTipografia =$Objeto['PTipografia'];
                                $PJustificacion =$Objeto['PJustificacion'];
                                if($h==0){
                                  $active ='active';
                                }else{
                                  $active='';
                                }
                                ?>
                                <div class="carousel-item <?php echo $active; ?>">
                                  <img src="../Abbott/Imagenes/<?php echo $Imagen; ?>" class="d-block w-100" alt="...">
                                  <div class="carousel-caption d-none d-md-block">
                                    <p style='<?php echo $TTamano.$TColor;?>' class=' <?php echo  $TTipografia.' '.$TJustificacion;?>'><?php echo $Objeto['Titulo'];?></p>
                                    <p style='<?php echo $PTamano.$PColor;?>' class=' <?php echo  $PTipografia.' '.$PJustificacion;?>'><?php echo $Objeto['Parrafo'];?></p>
                                  </div>
                                </div>
                                <?php
                                $h=1;
                              }
                              ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions<?php echo $Sessiond['Elemento2'];?>" role="button" data-slide="prev">
                              <?php
                              if($Controles=='True'){
                                ?>
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                <?php
                              }
                              ?>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions<?php echo $Sessiond['Elemento2'];?>" role="button" data-slide="next">
                              <?php
                              if($Controles=='True'){
                                ?>
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                <?php
                              }
                              ?>
                            </a>
                          </div>
                        </div>
                      </div>
                      <?php
                    }
                    if ($Sessiond['Tipo2']=='Album'){
                      ?>
                      <style>
                      .container-fluid{
                        padding-right: 0;
                        padding-left: 0;
                      }
                      </style>
                      <section id="portfolio" class="section-bg container">
                        <div class="row portfolio-container">
                          <?php
                          $sql="SELECT * FROM albumd where Album = ".$Sessiond['Elemento2']."  order by Orden";
                          $queryO = mysqli_query($con, $sql);
                          while($Objeto=mysqli_fetch_array($queryO)){
                            $Imagen = $Objeto['Imagen'];
                            ?>
                            <div class="col-lg-3 col-md-6 col-xs-12 portfolio-item filter-publicidad ">
                              <div class="portfolio-wrap">
                                <figure class="catalogo"><img src="../Abbott/Imagenes/<?php echo $Imagen; ?>" class="img-fluido " alt="">
                                  <a id="p1" href="../Abbott/Imagenes/<?php echo $Imagen; ?>" data-lightbox="portfolio" data-title="" class="link-preview" title="Preview">
                                    <i class="fas fa-eye"></i>
                                  </a>
                                </figure>
                              </div>
                            </div>
                            <?php
                            $h=1;
                          }
                          ?>
                        </div>
                      </section>
                      <?php
                    }
                    if ($Sessiond['Tipo2']=='Botonera'){
                      $sql="SELECT * FROM Botonerad where Botonera = ".$Sessiond['Elemento2'].";";
                      $queryO = mysqli_query($con, $sql);
                      ?>
                      <div class="row"style="margin-top: 0px; margin-bottom: 0px;">
                        <?php
                        while($Objeto=mysqli_fetch_array($queryO)){
                          $Enlace = $Objeto['Enlace'];
                          $Imagen = $Objeto['Imagen'];
                          $RBorder = $Objeto['RBorder'];
                          $BGrosor = $Objeto['BGrosor'];
                          $Descripcion = $Objeto['Descripcion'];
                          $BColor = $Objeto['BColor'];
                          $RBorderI = $Objeto['RBorderI'];
                          ?>
                          
                          <div class="col-md-4" style="padding-top: 15px; padding-bottom: 15px;">
                            <div class="text-center" style=' 
                              border-width: <?php echo  $BGrosor;?>px;
                              border-style: solid;
                              border-color: <?php echo  $BColor;?>;
                              border-radius:<?php echo  $RBorder;?>%;
                              '>              
                              <a class="nav-link" href="index.php?Id=<?php echo $Enlace; ?>">
                                <img src='../Abbott/Imagenes/<?php echo $Imagen; ?>' class="img-fluid" style='border-radius:<?php echo  $RBorderI;?>%;' alt="Responsive image">
                                
                              </a>
                              <h3 style ="color: <?php echo $BColor;?>"> <?php echo $Descripcion;?></h3>
                            </div>   
                          </div>
                          <?php
                        }
                      ?>
                      </div>
                    
                    <?php
                    }
                    if($Sessiond['Tipo2']=='Boton'){
                      $sql="SELECT * FROM Boton where Id = ".$Sessiond['Elemento2'].";";
                      $queryO = mysqli_query($con, $sql);
                      $Objeto=mysqli_fetch_array($queryO);
                      $Enlace = $Objeto['Enlace'];
                      $Texto = $Objeto['Texto'];
                      $Justificacion = $Objeto['Justificacion'];
                      ?>
                      <div class="row"style="margin-top: 0px;margin-bottom: 0px;">
                      <div class=' col-md-12 <?php echo $Justificacion; ?>' style="margin-top: 0px;margin-bottom: 0px; padding-left: 0px;padding-right: 0px;">
                      <a href="index.php?Id=<?php echo $Enlace; ?>" class="btn btn-primary punteado"><?php echo $Texto;?></a>
                        </div> 
                      </div>
                      <?php
                    }
                
                  ?>
                </div>
              </div>
            <?php
            }
            ?>
          </div> 
        </div>
        <?php
      }
    }
  }


  ?>
  </main>
 
  <div class="bajar">
    <span class="fas fa-chevron-up "></span>
    <span class="fas fa-chevron-down "></span>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/Posi.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/creative.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function mouseOver() {
            $(document).ready(function () {
                $('#imagen1').mouseOver();
            })

        }
    </script>
    <script>
    $(document).ready(function(){
      $('.Res').hide();

      $('input').keyup(function () {
        var Id =$(this).attr("id");
        $('#Label'+Id).text('R:/'+$('#'+Id).val());
      })
      $('.radio').click(function () {
        var Id =$(this).attr("id");
        var Id =$(this).attr("id");
        var P = Id.split('-');

        $('#Label'+P[2]).text('R:/'+$(this).val());
      })
      

 
     /* $('.bajar').hide();
      $(window).scroll(function(){
        if($(this).scrollTop() > 100){
          $('.bajar').fadeIn('1000');
        }else{
          $('.bajar').fadeOut('1000');
        }
      });
*/
$('.filter-active').click();
      $('.fa-chevron-up').click(function(){
        $('body, html').animate({
          scrollTop:window.pageYOffset-1000
         
        })
      })
      $('.fa-chevron-down').click(function(){
        $('body, html').animate({
          scrollTop:window.pageYOffset+1000
         
        })
      })
    })
    function GuardarEncuesta(){
      var r = confirm("Desea Guardar las Respuestas");
      if (r == true) {
        
        $('.Res').show();
        var diasSeleccionados = new Array();
        $('input[type=checkbox]:checked').each(function() {
          var Id =$(this).attr("id");
          var P = Id.split('-');
          $('#Label'+P[2]).text($('#Label'+P[2]).text()+$(this).val()+';');
         
        });
        $('.pregunta').remove();
        var Respuesta = $('#Encuesta').html();
        
       $.ajax({
        	url:'Guardar_Encuesta.php',
          type: "POST",
          data: 'Respuesta='+Respuesta,
		      beforeSend: function(objeto){
	        },
		      success:function(data){
            location.href='Index.php';
		      }
	      })
      }
    }
  



    </script>

</body>

</html>