<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Botellones de agua</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <?php
            include('./templates/header/header.php')
        ?>
        <div class="login-box">
            <img class="avatar" src="imagenes/logo.jpg" alt="">
            <h1>Iniciar sesión</h1>
            <form action="validar.php" method="POST">
                <!-- USERNAME-->
                <label for="usermane">Numero de cedula</label>
                <input name="Iu" type="text" placeholder= "Ingresa el numero de cedula" required="">

                <!-- PASSWORD-->
                <label for="password">Contraseña</label>
                <input name="Ic" type="text" placeholder= "Ingresa la contraseña" required="">
                <input type="submit" value="Ingresar">
                <a href="#">¿Olvidaste la contraseña?</a><br>
                <a href="../register/register.php">¿No tienes una cuenta?</a>
            </form>
        </div>
    </body>
</html>