<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.tailwindcss.com"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <title>Depositos</title>

</head>

<style>
  body {
    background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%),
      radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%),
      radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
  }
</style>

<body class="bg-slate-900">

  <form action="../Controlador/realizarDeposito.php" method="post">

    <main class="min-h-screen flex items-center justify-center">

      <div class="bg-black/30 backdrop-blur-lg p-8 rounded-lg shadow-lg w-full max-w-sm">

        <?php

          if (isset($_GET['noex'])) {
            echo '
              <div class="bg-red-500 text-white text-sm p-4 rounded mb-4">
                <strong>Error:</strong> La cuenta no existe.
                <button type="button" class="float-right text-lg text-white" onclick="this.parentElement.style.display=\'none\';">&times;</button>
              </div>
            ';
          }


          if (isset($_GET['noco'])) {
            echo '
              <div class="bg-red-500 text-white text-sm p-4 rounded mb-4">
                <strong>Error:</strong> No hay coincidencias en los datos ingresados.
                <button type="button" class="float-right text-lg text-white" onclick="this.parentElement.style.display=\'none\';">&times;</button>
              </div>
            ';
          }

        ?>

        <h1 class="text-2xl text-white font-bold text-center mb-6">Realizar Depósito</h1>

        <div class="relative mb-4">
          <input type="text" name="numerocuenta" id="numerocuenta" placeholder="Cuenta a Depositar" min="1" required
            class="w-full p-3 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="relative mb-4">
          <input type="text" name="monto" id="monto" placeholder="Monto" min="1" required
            class="w-full p-3 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <input type="hidden" name="deposito" value="Deposito">

        <input type="submit" name="Depositar" value="Depositar" id="Depositar" class="w-full p-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg cursor-pointer transition duration-300">

      </div>

    </main>

  </form>

</body>

</html>