<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de Botellon</title>
    <link rel="stylesheet" href="css/PedidosRecarga.css">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.14.0/css/pro.min.css">
</head>

<body>
    <div class="top">
        <h1 class="config">Realizar compra de botellon</h1>
    </div>
    <div class="pedidos">
        <form>

            <div class="inputs">
                <div class="input1">
                    <p class="inputTitulo">Cantidad de Botellones
                        <input type="number" class="CB1" placeholder="999.999,99" required>
                    </p>
                </div>
                <div class="input2">
                    <p class="inputTitulo1">Precio Total
                        <input type="number" class="CB2" placeholder="Bs. 999.999,99" disabled>
                    </p>
                </div>
            </div>

            <div class="T1">
                <p>El precio de cada botellon es de <span class="T4">$99</span></p>
            </div>

            <div class="select-container">
                <div class="select">
                    <div class="selected-option">
                        <span class="select-value">Dolares(USD)</span>
                        <span class="icon fas fa-caret-down"></span>
                    </div>
                    <div data-toggle="collapsed" class="options">
                        <div class="option">Dolares(USD)</div>
                        <div class="option">Trasferencia(Bs.)</div>
                    </div>
                </div>
            </div>


            <div class="T1">
                <p data-toggle="" class="T5">El tipo de pago en dolares debera ser realizado de manera <span class="T4">presencial</span></p>
                <p data-toggle="st" class="T6">Debera realizar la transferencia e <span class="T4">ingresar los datos del movimiento</span></p>
            </div>

            <div data-toggle="collapsed" class="transferencia">
                <div class="inputs">

                    <div class="input1">
                        <p class="inputTitulo">Numero de referencia del pago
                            <input type="number" class="CB1" placeholder="99999999" >
                        </p>
                    </div>

                    <div class="input1">
                        <p class="inputTitulo">Telefono del titular
                            <input type="number" class="CB1" placeholder="04XX-9999999">
                        </p>
                    </div>
                    
                </div>
                <div class="inputs">

                    <div class="input1">
                        <p class="inputTitulo">Fecha de pago
                            <input type="date" class="CB1">
                        </p>
                    </div>

                    <div class="input1">
                        <p class="inputTitulo">Nombre del Banco 
                            <input type="text" class="CB1" placeholder="XXXXXXXXXXXXXXX"> 
                        </p>
                    </div>
                    
                </div>
                <div class="inputs">

                    <div class="input1">
                        <p class="inputTitulo">Monto del Pago
                            <input type="number" class="CB1" placeholder="99.999,99">
                        </p>
                    </div>
                </div>
            </div>

            <div class="botones">
                <input class="aceptar"  type="submit" value="Aceptar" formaction="/ConfirmacionCompra.html">
                <input class="cancelar" type="submit" value="Cancelar">
            </div>
        </form>
    </div>

    <script src="js/PedidosCompra.js"></script>
</body>

</html>