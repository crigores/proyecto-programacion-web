<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Botellones de agua</title>
    <link rel="stylesheet" href="../login/login.css">
</head>

<body id="body2">

    <?php
    include("./templates/header/header.php")
    ?>

    <div class="login-box2">
        <img class="avatar2" src="../login/imagenes/logo.jpg" alt="">
        <h1>Registrar Usuarios</h1>
        <form id="form2" action="validarFormulario.php" method="POST">
            <div id="div-formulario-separado">
                <div id="f1">
                    <!-- USERNAME-->
                    <label class="l2" for="name">Nombre:</label>
                    <input class="i2" type="text" id="name" name="user_name" required="">

                    <!-- PASSWORD-->
                    <label class="l2" for="password">Apellido:</label>
                    <input class="i2" type="text" id="clave" name="user_clave" required="">

                    <label class="l2" for="text">Direccion:</label>
                    <input class="i2" type="text" id="mail" name="user_email" required="">

                </div>

                <div id="f2">
                    <!-- USERNAME-->
                    <label class="l2" for="ci">Cedula:</label>
                    <input class="i2" type="number" id="name" name="user_ci" required="">

                    <!-- PASSWORD-->
                    <label class="l2" for="password">Contraseña:</label>
                    <input class="i2" type="text" id="clave" name="user_clave" required="">

                    <label class="l2" for="tlf">Numero de telefono:</label>
                    <input class="i2" type="number" id="mail" name="user_tlf" required="">
                </div>
            </div>

            <div id="sub">
                <input class="i2" type="submit" value="Registrar"> <br>
                <a href="login.html"> Regresar al login </a>
            </div>
        </form>
    </div>


</body>

</html>