<?php

/* !isset($_POST["nombre"]) && !isset($_POST["apellido"]) && !isset($_POST["direc"]) && !isset($_POST["cedula"]) && !isset($_POST["clave"]) && !isset($_POST["tlf"])*/
    print_r($_POST);
    
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $direc = $_POST["direc"];
    $tlf = $_POST["tlf"];
    $clave = $_POST["clave"];


    include_once "funciones.php";
    agregarUsuario($nombre, $apellido, $cedula, $direc, $tlf, $clave);
    header("Location: ../pages/login/login.php");
?>