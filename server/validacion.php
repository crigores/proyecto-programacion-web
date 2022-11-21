<?php

include("./db/connection.php");

if(isset($_POST['ci']) && isset($_POST['pass'])){

    $ci=$_POST['ci'];
    $pass=$_POST['pass'];

    $query="SELECT*FROM login where ci='$ci' and pass='$pass'";

    $validar=mysqli_query($con_bd,$query);

    $row=mysqli_num_rows($validar);

    if($row<1){
        echo'<script language="javascript">alert("Intente de Nuevo");</script>';
    }else{
        /* header("location:../vista.php"); */
        echo'<script language="javascript">alert("Ta bien 😜");</script>';
    }

}


?>