<?php
  require_once ("config/db.php");
  require_once ("config/conexion.php");
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
    <link rel="apple-touch-icon" sizes="76x76" href="img/icono.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/icono.png">
    <link rel="stylesheet" href="lib/font-awesome/css/fontawesome-all.css" media="none"
        onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="lib/animate/animate.min.css" media="none" onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="lib/owlcarousel/assets/owl.carousel.min.css" media="none"
        onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="lib/lightbox/css/lightbox.min.css" media="none" onload="if(media!='all')media='all'">
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
<header>
        <div class="fixed-top">
            <nav class="navbar   navbar-dark  bg-core ">

                <div class="m-lg-auto">

                    <img src="img/logo-buenos-momentos.png" class="img-fluid" alt="Responsive image" width="200px">


                </div>
            </nav>
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="container justify-content-center">

                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav justify-content-center m-lg-auto">
                            <li class="nav-item active">
                                <a class="nav-link Calibri" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
  <div id="inicio"></div>
  
  
  
  <?php

  if (isset($_GET['Id'])) {
    $Id=$_GET['Id'];
  }  else{
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
        <Div class='Contenedores' id='<?php echo 'Section'.$Session['Id'];?>' style="<?php echo $Fondo;?>" >
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
                      <source src="Videos/<?php echo $Video; ?>" type="video/mp4"  >
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
              if ($Sessiond['Tipo']=='Botonera'){
                $sql="SELECT * FROM Botonerad where Botonera = ".$Sessiond['Elemento'].";";
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
              if($Sessiond['Tipo']=='Boton'){
                $sql="SELECT * FROM Boton where Id = ".$Sessiond['Elemento'].";";
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
        <Div class='Contenedores' id='<?php echo 'Section'.$Session['Id'];?>' style="<?php echo $Fondo;?>" >
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
                            <source src="Videos/<?php echo $Video; ?>" type="video/mp4"  >
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
                            <source src="Videos/<?php echo $Video; ?>" type="video/mp4"  >
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

  ?>
  </main>
  <div class="bajar">
    <span class="fas fa-chevron-up "></span>
    <span class="fas fa-chevron-down "></span>
  </div>

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
    <script>
    $(document).ready(function(){
     /* $('.bajar').hide();
      $(window).scroll(function(){
        if($(this).scrollTop() > 100){
          $('.bajar').fadeIn('1000');
        }else{
          $('.bajar').fadeOut('1000');
        }
      });
*/
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
    </script>

</body>

</html>