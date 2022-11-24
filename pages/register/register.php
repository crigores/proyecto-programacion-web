<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Botellones de agua</title>
    <link rel="stylesheet" href="../login/login.css">
</head>

<body id="body2">
    <div class="login-box2">
        <img class="avatar2" src="../login/imagenes/logo.jpg" alt="">
        <h1>Registrar Usuarios</h1>
        <form id="form2" action="../../server/registrarUsuario.php" method="POST">
            <div id="div-formulario-separado">
                <div id="f1">
                    <!-- USERNAME-->
                    <label class="l2" for="name">Nombre:</label>
                    <input class="i2" type="text" id="nombre" name="nombre" required="">

                    <!-- PASSWORD-->
                    <label class="l2" for="password">Apellido:</label>
                    <input class="i2" type="text" id="apellido" name="apellido" required="">

                    <label class="l2" for="text">Direccion:</label>
                    <input class="i2" type="text" id="direc" name="direc" required="">

                </div>

                <div id="f2">
                    <!-- USERNAME-->
                    <label class="l2" for="ci">Cedula:</label>
                    <input class="i2" type="number" id="cedula" name="cedula" required="">

                    <!-- PASSWORD-->
                    <label class="l2" for="password">Contraseña:</label>
                    <input class="i2" type="text" id="clave" name="clave" required="">

                    <label class="l2" for="tlf">Numero de telefono:</label>
                    <input class="i2" type="number" id="tlf" name="tlf" required="">
                </div>
            </div>

            <div id="sub">
                <input class="i2" type="submit" value="Registrar"> <br>
                <a href="../login/login.php"> Regresar al login </a>
            </div>
        </form>
    </div>


</body>

</html>