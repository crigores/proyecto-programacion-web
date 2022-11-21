<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/PedidosRecarga.css">
</head>
<body>
    <div class="top">
        <h1 class="config">Realizar pedido de recarga</h1>
    </div>

    <div class="confirmacion" id="C">
        <form action="">
            <h3>Compruebe que los datos seleccionados <span style="color:rgb(0, 176, 80);">sean correctos</span></h3>
            <div style="display: flex;" class="c">
                <div  class="cc">
                    <div class="container-div1">
                       <p><strong>Cantidad de botellones:</strong></p>
                       <p>999.999,99</p>
                    </div>
                    <div class="container-div1">
                       <p><strong>Precio total:</strong></p>
                       <p>Bs. 999.999,99</p>
                    </div>
                </div>

                <div  class="cc">
                    <div class="container-div1">
                       <p><strong>Tipo de pago:</strong></p>
                       <p>Efectivo / Dolares</p>
                    </div>
                    <div class="container-div1">
                       <p class="p1"> <strong>Nombre:</strong></p>
                       <p class="p2">XXXXXXXXXXXXX</p>
                    </div>
                </div>
                
            </div>

            <div class="botones">
               <input class="aceptar" type="submit" value="Aceptar">
               <input class="cancelar" type="submit" value="Cancelar" formaction="/PedidosRecarga.html">
            </div>
        </form>
     </div>

     <script src="js/PedidosRecarga.js"></script>
</body>
</html>