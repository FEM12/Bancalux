<?php

require_once("../Modelo/conexion.php");
require("../Controlador/realizarTransferencia.php");

$usuario = $_SESSION['idCliente'];

// Consulta para obtener las cuentas del cliente actual
$stmt3 = $db->prepare("SELECT numerocuenta, saldo FROM cuentabanc WHERE idCliente = $usuario");
$stmt3->execute();
$resultado = $stmt3->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener el saldo disponible correspondiente al número de cuenta seleccionado
if (isset($_POST['numerocuenta'])) {

  $numerocuenta = $_POST['numerocuenta'];
  $stmt4 = $db->prepare("SELECT saldo FROM cuentabanc WHERE idCliente = $usuario AND numerocuenta = :numerocuenta");
  $stmt4->bindValue(':numerocuenta', $numerocuenta);
  $stmt4->execute();
  $prueba4 = $stmt4->fetch(PDO::FETCH_ASSOC);
  $dato4 = $prueba4["saldo"];
} else {

  // Si no se ha seleccionado ningún número de cuenta, se utiliza el saldo disponible de la primera cuenta en la lista
  $dato4 = $resultado[0]['saldo'];
}

?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Framework y Librerias -->
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- DaisyUI -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
  <!-- AOS Animate on Scroll -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <title>Retiros</title>

</head>

<style>
  body {
    background-color: #0f172a;
    background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%),
      radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%),
      radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
    background-size: cover;
    background-attachment: fixed;
  }

  html {
    scroll-behavior: smooth;
  }
</style>

<body class="flex items-center justify-center min-h-screen">

  <form action="../Controlador/realizarTransferencia.php" method="post">

    <main>

      <div
        class="container bg-white backdrop-blur-lg rounded-lg py-[3rem] px-6 flex flex-col items-center justify-center gap-4 w-[28rem] relative">

        <div class="form flex items-center justify-center">
          <h1 class="text-black text-3xl font-bold">Transferencia</h1>
        </div>

        <?php
        if (isset($_GET['noex'])) {
          echo '<div class="alert alert-danger" role="alert"> Error: La cuenta a transferir no existe </div>';
        };

        if (isset($_GET['nosal'])) {
          echo '<div class="alert alert-danger" role="alert"> Error: Debe ingresar un saldo mayor a 0 </div>';
        };
        ?>


        <input type="text" name="nombre" id="nombre" value="<?php echo $dato ?>" readonly
          class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm cursor-not-allowed">
        <input type="text" name="apellido" id="apellido" value="<?php echo $dato2 ?>" readonly
          class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm cursor-not-allowed">
        <input type="text" name="correo" id="correo" value="<?php echo $dato3 ?>" readonly
          class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm cursor-not-allowed">
        <input type="text" name="saldo" id="saldo" value="Saldo disponible: <?php echo $dato4 ?>" readonly
          class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm cursor-not-allowed">
        <input type="number" name="monto" id="monto" value="Monto a retirar" min="1" max="500" required
          class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm">

        <select name="numerocuenta" id="numerocuenta" onchange="actualizarSaldo()"
          class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm cursor-pointer">
          <option value="" disabled selected>Cuenta Origen</option>
          <?php foreach ($resultado as $fila): ?>
            <option value="<?php echo $fila['numerocuenta']; ?>"><?php echo $fila['numerocuenta']; ?></option>
          <?php endforeach; ?>
        </select>

        <select name="cuentaEnv" id="cuentaEnv" onchange="actualizarSaldo()"
          class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm cursor-pointer">
          <option value="" disabled selected>Cuenta Destino</option>
          <?php foreach ($resultado as $fila): ?>
            <option value="<?php echo $fila['numerocuenta']; ?>"><?php echo $fila['numerocuenta']; ?></option>
          <?php endforeach; ?>
        </select>

        

        <input type="hidden" name="IdCliente" id="IdCliente" value="<?php echo $usuario ?>">
        <input type="hidden" name="transf" id="transf" value="Transferencia">

        <input type="submit" id="transfe" name="transfe" value="Transferir"
          class="mt-4 btn bg-cyan-700 border-cyan-900 hover:bg-cyan-800 hover:border-2 hover:border-cyan-900 text-white border border-2 border-cyan-900 px-5">
      </div>

    </main>

  </form>

  <script>
    function actualizarSaldo() {

      var numerocuenta = document.getElementById("numerocuenta").value;
      var saldoInput = document.getElementById("saldo");
      var saldo = 0;

      <?php foreach ($resultado as $fila): ?>

        if (numerocuenta == <?php echo $fila['numerocuenta']; ?>) {
          saldo = <?php echo json_encode($fila['saldo']); ?>;
        }

      <?php endforeach; ?>

      saldoInput.value = "Saldo disponible: " + saldo;

    }
  </script>
</body>

</html>