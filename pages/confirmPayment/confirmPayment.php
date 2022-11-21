<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./confirmPayment.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Confirm Payment</title>
  </head>
  <body>
    <?php
        // include("../../templates/header/header.php");
    ?>

    <header class="confirmPayment_Header">
      <h1 class="confirmPayment_Header_h1">Verificacion de Pagos</h1>
    </header>

    <div class="confirmPayment_Container">
			<section class="confirmPayment_Info confirmPayment_Center">
        <i class="bx bxs-info-circle"></i> Presiona un movimiento para
        <b>ver mas informacion.</b>
      </section>

      <table class="confirmPayment_Center">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Referencia</th>
            <th>Cedula</th>
            <th>Pedido</th>
            <th>Cantidad</th>
            <th>Tipo Pago</th>
            <th>Monto (BsD)</th>
          </tr>
        </thead>
        <tbody>
          <tr id="myBtn">
            <td>99-99-999 99:99 XX</td>
            <td>99999999999</td>
            <td>99.999.999</td>
            <td>XXXXXXXXX</td>
            <td>999.999.999</td>
            <td>xxx</td>
            <td>999.999.999,99</td>
          </tr>
          <tr id="myBtn">
            <td>99-99-999 99:99 XX</td>
            <td>99999999999</td>
            <td>99.999.999</td>
            <td>XXXXXXXXX</td>
            <td>999.999.999</td>
            <td>xxx</td>
            <td>999.999.999,99</td>
          </tr>
          <tr id="myBtn">
						<td>99-99-999 99:99 XX</td>
            <td>99999999999</td>
            <td>99.999.999</td>
            <td>XXXXXXXXX</td>
            <td>999.999.999</td>
            <td>xxx</td>
            <td>999.999.999,99</td>
          </tr>
          <tr id="myBtn">
						<td>99-99-999 99:99 XX</td>
            <td>99999999999</td>
            <td>99.999.999</td>
            <td>XXXXXXXXX</td>
            <td>999.999.999</td>
            <td>xxx</td>
            <td>999.999.999,99</td>
          </tr>
          <tr id="myBtn">
            <td>99-99-999 99:99 XX</td>
            <td>99999999999</td>
            <td>99.999.999</td>
            <td>XXXXXXXXX</td>
            <td>999.999.999</td>
            <td>xxx</td>
            <td>999.999.999,99</td>
          </tr>
          <tr id="myBtn">
            <td>99-99-999 99:99 XX</td>
            <td>99999999999</td>
            <td>99.999.999</td>
            <td>XXXXXXXXX</td>
            <td>999.999.999</td>
            <td>xxx</td>
            <td>999.999.999,99</td>
          </tr>
          <tr id="myBtn">
            <td>99-99-999 99:99 XX</td>
            <td>99999999999</td>
            <td>99.999.999</td>
            <td>XXXXXXXXX</td>
            <td>999.999.999</td>
            <td>xxx</td>
            <td>999.999.999,99</td>
          </tr>
        </tbody>
      </table>
			
      <!-- The Modal -->
      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
					<div class="modal-header">
						<span class="close">&times;</span>
            <h2>Informacion del movimiento</h2>
          </div>
          <div class="modal-body">
            <div class="Referencia">
							<h3>Referencia:</h3>
							<p>99999999999</p>
						</div>
						
						<div class="Fecha">
							<h3>Fecha:</h3>
							<p>99-99-999 99:99 XX</p>
						</div>

						<div class="Cedula">
							<h3>Cedula:</h3>
							<p>99.999.999</p>
						</div>

						<div class="Fecha">
							<h3>Fecha:</h3>
							99-99-999 99:99 XX
						</div>

						<div class="Cantidad">
							<h3>Cantidad:</h3>
							<p>999.999.999</p>
						</div>

						<div class="Pedido">
							<h3>Pedido:</h3>
							<p>Pedido/Compra</p>
						</div>

						<div class="Monto">
							<h3>Monto total (BsD):</h3>
							<p>999.999.999,99</p>
						</div>

						<div class="Tipo">
							<h3>Tipo de pago:</h3>
							<p>Efectivo BsS / Efectivo USD</p>
						</div>
          </div>
          <div class="modal-footer">
            <button class="confirmPayment_Button_Cancelar">Cancelar</button>
            <button class="confirmPayment_Button_Validar">Validar</button>
            <button class="confirmPayment_Button_Cerrar">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <?php
        // include("../../templates/footer/footer.php");
    ?>
		<script src="confirmPayment.js"></script>
  </body>
</html>
