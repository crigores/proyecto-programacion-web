<?php
 $host = "localhost";
 $user = "root";
 $pass = "";
 $bbdd = "AquaTech";
 $con_bd = new mysqli($host, $user, $pass, $bbdd);

 if ($con_bd->connect_errno) {
   echo "Falló la conexión a MySQL: (" . $con_bd->connect_errno . ") " . $con_bd->connect_error;
 }

   return $con_bd;
?>