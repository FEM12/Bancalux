<?php
  function generar_identificador(){

    $longitud = 6;
    $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $id = "";

    for ($i = 0; $i < $longitud; $i++) {

      $indice = rand(0, strlen($caracteres) - 1);
      $id .= $caracteres[$indice];

    }

    return $id;
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
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.tailwindcss.com"></script>

  <title>Registrar Empleado</title>
</head>

<body>

  <style>
    body {
      background-color: #0f172a;
      background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%),
        radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%),
        radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
      background-size: cover;
      background-attachment: fixed;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    .container-custom {
      max-width: 600px;
    }
  </style>

  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-2xl rounded-3xl p-10 container-custom m-10"> <!-- Aumento del margen -->
      <form class="space-y-6" method="post" action="../Controlador/registroEmpleado.php">
        
        <?php
          if (isset($_GET['opcion'])) {
            echo '
              <div class="bg-yellow-500 text-white p-2 rounded relative mb-4">
                  <strong>Error:</strong>
                  Campo "Nombre" o "Apellido" incorrectos.<br>
                  <strong>Deben iniciar con una mayuscula</strong>
              </div>
            ';
          }

          if (isset($_GET['dui'])) {
            echo '
              <div class="bg-yellow-500 text-white p-2 rounded relative mb-4">
                  <strong>Error:</strong> 
                  Campo "DUI" incorrecto.<br>
                  <strong>Formato correcto: ########-# </strong>
              </div>
            ';
          }
        ?>

        <div class="flex mb-4">
          <div class="flex-1 pr-2">
            <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
              <span class="pl-3 text-gray-400">
                <i class='bx bx-text'></i>
              </span>
              <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-lg" required>
            </div>
          </div>
          <div class="flex-1 pl-2">
            <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
              <span class="pl-3 text-gray-400">
                <i class='bx bx-text'></i>
              </span>
              <input type="text" id="apellido" name="apellido" placeholder="Apellido" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-lg" required>
            </div>
          </div>
        </div>

        <div class="flex mb-4">
          <div class="flex-1 pr-2">
            <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
              <span class="pl-3 text-gray-400">
                <i class='bx bxs-user'></i>
              </span>
              <input type="text" id="usuario" name="usuario" placeholder="Usuario" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-lg" required>
            </div>
          </div>
          <div class="flex-1 pl-2">
            <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
              <span class="pl-3 text-gray-400">
                <i class='bx bxs-envelope'></i>
              </span>
              <input type="email" id="correo" name="correo" placeholder="Correo Electronico" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-lg" required>
            </div>
          </div>
        </div>

        <div class="flex mb-4">
          <div class="flex-1 pr-2">
            <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
              <span class="pl-3 text-gray-400">
                <i class='bx bxs-lock' id="view"></i>
              </span>
              <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-lg" required>
            </div>
          </div>
          <div class="flex-1 pl-2">
            <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
              <span class="pl-3 text-gray-400">
                <i class='bx bx-id-card'></i>
              </span>
              <input type="text" id="dui" name="dui" placeholder="DUI" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-lg" required>
            </div>
          </div>
        </div>

        <div class="flex mb-4">
          <div class="flex-1 pr-2">
            <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
              <select id="rol" name="rol" required class="selection bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-lg">
                <option value="" disabled selected>Seleccione un rol</option>
                <option value="Cajero">Cajero</option>
                <option value="Ordenanza">Ordenanza</option>
                <option value="Secretaria/o">Secretaria/o</option>
                <option value="Recepcionista">Recepcionista</option>
                <option value="Asesor Financiero">Asesor Financiero</option>
              </select>
            </div>
          </div>
          <div class="flex-1 pr-2">
            <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
              <select id="sucursal" name="sucursal" required class="selection bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-lg">
                <option value="" disabled selected>Seleccione una sucursal</option>
                <option value="Sucursal A">Sucursal A</option>
                <option value="Sucursal B">Sucursal B</option>
                <option value="Sucursal C">Sucursal C</option>
              </select>
            </div>
          </div>
        </div>

        <input type="hidden" name="estado" id="estado" value="Activo">

        <div class="flex mb-4">
          <div class="w-full">
            <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
              <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-lg font-semibold focus:outline-none focus:ring-4 focus:ring-indigo-400 shadow-lg transform transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-xl" id="Registrar">
                Registrar Empleado
              </button>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>

</body>

</html>
