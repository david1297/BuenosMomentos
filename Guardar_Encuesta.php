<?php
  require_once ("config/db.php");
  require_once ("config/conexion.php");
  $IdEncuesta = $_POST['IdEncuesta'];
  $sql=mysqli_query($con, "select LAST_INSERT_ID(NRes) as last from resp  order by NRes desc limit 0,1 ");
  $rw=mysqli_fetch_array($sql);
  $Numero=$rw['last']+1;
  $sql=mysqli_query($con, "select CURDATE() as Fecha,curTime() as Hora ");
	$rw=mysqli_fetch_array($sql);
 
  $Fecha = $rw['Fecha'];
	$Hora = $rw['Hora'];
  
  $sql="SELECT * FROM encuestad where Encuesta =$IdEncuesta ";
  $query = mysqli_query($con, $sql);
  while($row=mysqli_fetch_array($query)){
    $Id=$row['Id'];
    $Tipo=$row['Tipo'];
    $Pregunta=$row['Pregunta'];
    if ($Tipo=='Texto'){
      
      $Respuesta=mysqli_real_escape_string($con,(strip_tags($_REQUEST['T-'.$Id], ENT_QUOTES)));

      $sql2 =  "INSERT INTO resp (Fecha,NRes,Pregunta,Respuesta,Hora) VALUES ('$Fecha',$Numero,'$Pregunta','$Respuesta','$Hora');";
      $query_update = mysqli_query($con,$sql2);
      echo $sql2;
    }else{
      if ($Tipo=='Seleccion'){
        if(!empty($_POST['S-'.$Id])){
          $Respuesta=mysqli_real_escape_string($con,(strip_tags($_REQUEST['S-'.$Id], ENT_QUOTES)));
        } else{
          $Respuesta='';
        }
        $sql2 =  "INSERT INTO resp (Fecha,NRes,Pregunta,Respuesta,Hora) VALUES ('$Fecha',$Numero,'$Pregunta','$Respuesta','$Hora');";
        $query_update = mysqli_query($con,$sql2);
       
      }else{
        $sql1="SELECT * FROM p_seleccion where Pregunta =$Id ";
        $query1 = mysqli_query($con, $sql1);
        while($row1=mysqli_fetch_array($query1)){
          $S=$row1['Id'];
          if(!empty($_POST['M-'.$S])){
          
            $Respuesta=$row1['Opcion'];
            
          }else{
            $Respuesta='';
          }
          $sql2 =  "INSERT INTO resp (Fecha,NRes,Pregunta,Respuesta,Hora) VALUES ('$Fecha',$Numero,'$Pregunta','$Respuesta','$Hora');";
          $query_update = mysqli_query($con,$sql2);
        }
      }
    }

   
   

  }
  
//  
 
?>