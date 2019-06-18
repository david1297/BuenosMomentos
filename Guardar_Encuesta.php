<?php
  require_once ("config/db.php");
  require_once ("config/conexion.php");
  $Respuesta = $_POST['Respuesta'];
  $sql =  "INSERT INTO respuestas (Respuestas,Fecha) VALUES ('$Respuesta',CURDATE());";
  $query_update = mysqli_query($con,$sql);
  echo $sql;
?>