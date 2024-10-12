<?php

require_once("../Modelo/conexion.php");

if ($_POST) {
  $idCliente =  $_SESSION['idCajero'];
}

?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />

  <title>Retiro de efectivo</title>

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

  <main>


    <form action="../Controlador/realizarRetiro.php" method="POST">

      <div
        class="container bg-white backdrop-blur-lg rounded-lg py-[3rem] px-6 flex flex-col items-center justify-center gap-4 w-[28rem] relative">

        <?php

          if (isset($_GET['noex'])) {
            echo '
                <div class="bg-yellow-500 text-white p-2 rounded relative mb-4">
                    <strong>Error:</strong>
                      La cuenta no existe.<br>
                    <strong>Deben iniciar con una mayúscula</strong>
                </div>
              ';
          }

          if (isset($_GET['noin'])) {
            echo '
                <div class="bg-yellow-500 text-white p-2 rounded relative mb-4">
                    <strong>Error:</strong>
                    DUI incorrecto.<br>
                    <strong>Deben iniciar con una mayúscula</strong>
                </div>
              ';
          }

          if (isset($_GET['saldo'])) {
            echo '
                <div class="bg-yellow-500 text-white p-2 rounded relative mb-4">
                    <strong>Error:</strong>
                    Saldo insuficiente.<br>
                    <strong>Deben iniciar con una mayúscula</strong>
                </div>
              ';
          }

        ?>

        <div class="form flex items-center justify-center">
          <h1 class="text-black text-3xl font-bold">Retiros</h1>
        </div>

        <!-- Cuenta de retiro -->
        <input type="text" name="numerocuenta" id="numerocuenta" placeholder="Cuenta a Retirar" min="1"
          required class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm">

        <!-- DUI -->
        <input type="text" name="DUI" id="DUI" placeholder="DUI" required
          class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm">

        <!-- Monto a retirar -->
        <input type="text" name="monto" id="monto" placeholder="Monto" min="1" required
          class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm">

        <input type="hidden" name="retiro" value="Retiro">

        <input type="submit" name="Retirar" value="Retirar" id="Retirar"
          class="mt-4 btn bg-cyan-700 border-cyan-900 hover:bg-cyan-800 hover:border-2 hover:border-cyan-900 text-white border border-2 border-cyan-900 px-5">
      </div>

    </form>

  </main>



</body>

</html>