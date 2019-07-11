<?php
  require_once ("config/db.php");
  require_once ("config/conexion.php");
  $IdEncuesta = $_POST['IdEncuesta'];
  $sql=mysqli_query($con, "select LAST_INSERT_ID(NRes) as last,CURDATE() as Fecha,curTime() as Hora from resp  order by NRes desc limit 0,1 ");
	$rw=mysqli_fetch_array($sql);
  $Numero=$rw['last']+1;
  $Fecha = $rw['Fecha'];
	$Hora = $rw['Hora'];
  
  $sql="SELECT * FROM encuestad where Encuesta =$IdEncuesta ";
  $query = mysqli_query($con, $sql);
  while($row=mysqli_fetch_array($query)){
    $Id=$row['Id'];
    $Tipo=$row['Tipo'];
    $Pregunta=$row['Pregunta'];
    if ($Tipo=='Texto'){
      echo $Pregunta.'<br>';
      echo 'Respuesta:'.$_POST['T-'.$Id].'<br>';
    }else{
      if ($Tipo=='Seleccion'){
        if(!empty($_POST['S-'.$Id])){
          echo $Pregunta.'<br>';
          echo 'Respuesta:'.$_POST['S-'.$Id].'<br>';
        } 
       
      }else{
        $sql1="SELECT * FROM p_seleccion where Pregunta =$Id ";
        $query1 = mysqli_query($con, $sql1);
        while($row1=mysqli_fetch_array($query1)){
          $S=$row1['Id'];
          if(!empty($_POST['M-'.$S])){
            echo $Pregunta.'<br>';
            $Opcion=$row1['Opcion'];
            echo $Opcion.'<br>';
          }
        }
      }
    }

   
   

  }
  
//  $sql =  "INSERT INTO respuestas (Respuestas,Fecha) VALUES ('$Respuesta',CURDATE());";
//  $query_update = mysqli_query($con,$sql);
 
?>