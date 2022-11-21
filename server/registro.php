<?php

include('./dbconnection.php');

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass'])) {
    $user=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $query = "INSERT INTO login (username, email, pass) VALUES ('$user', '$email', '$pass')";

    $validar=mysqli_query($con_bd, $query);

    if ($validar) {
        echo'<script language="javascript">alert("Se ha registrado exitosamente");</script>';
        header("location: ../login.php");
    }else{
        echo'<script language="javascript">alert("Intente de Nuevo");</script>';
    }
}

?>