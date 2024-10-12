<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.tailwindcss.com"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <title>Iniciar Sesión</title>

</head>

<style>
  body {
    background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%),
      radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%),
      radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
  }

  html {
    scroll-behavior: smooth;
  }
</style>

<body class="bg-slate-900 bg-fixed bg-cover min-h-screen flex items-center justify-center">

  <main class="w-full max-w-xs mx-auto bg-black/30 backdrop-blur-lg p-8 rounded-lg shadow-lg relative">

    <form action="../Controlador/loginCajero.php" method="post">

      <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold text-white">Ingresa a nuestro servicio</h1>
        <!-- Agregar el logo debajo de la palabra LOGIN -->
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSO1ClEZtzoSAwXwgbE3iplkg-cZ1zWTnHw0os8S8rlSE9NrDrwc37J0cCOh2Ofzi3j1PI&usqp=CAU"
          alt="Logo" class="mx-auto mt-4 w-20 h-20"> <!-- Ajusta la ruta y tamaño según tu necesidad -->
      </div>


      <!-- Input para el usuario -->
      <div class="relative mb-6">
        <i class='bx bxs-user absolute left-3 top-3 text-gray-500'></i>
        <input type="text" name="usu" id="usu" placeholder="Usuario" autocomplete="off"
          class="w-full pl-10 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
      </div>

      <!-- Input para la contraseña -->
      <div class="relative mb-6">
        <i class='bx bxs-lock absolute left-3 top-3 text-gray-500'></i>
        <input type="password" name="contra" id="contra" placeholder="Contraseña" autocomplete="off"
          class="w-full pl-10 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
      </div>

      <!-- Botón de inicio de sesión -->
      <input type="submit" value="Iniciar sesión"
        class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition duration-300 cursor-pointer">

    </form>

    <!-- Mensaje de error (si las credenciales son incorrectas) -->
    <?php
    if (isset($_GET['opcion'])) {
      echo '
        <div class="mt-6 text-center text-red-500">
          Error: Credenciales incorrectas.
        </div>
      ';
    }
    ?>

  </main>

</body>

</html>