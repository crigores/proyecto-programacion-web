<?php

include("./db/connection.php");

if(isset($_POST['ci']) && isset($_POST['pass'])){

    $ci=$_POST['ci'];
    $pass=$_POST['pass'];

    $query="SELECT * FROM usuarios where cedula='$ci' and clave='$pass' and activo='1'";

    $validar=mysqli_query($con_bd,$query);

    $row=mysqli_num_rows($validar);

    echo $row;
    if($row > 0){
        header('Location: ../pages/order/order.php');
    }else{
        header('Location: ../pages/login/login.php');
    }
}


?>