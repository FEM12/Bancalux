<?php

require_once("../Modelo/Conexion.php");

session_start();

$usuario = $_SESSION['idCliente'];

if (!isset($usuario)) {
  header("location:../Vista/registroCliente.php");
}

$consulta = "SELECT nombre, apellido, correo FROM cliente WHERE idCliente = :idCliente";
$stmt = $db->prepare($consulta);
$stmt->execute([':idCliente' => $usuario]);
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

  <title>Solicitud Prestamo</title>

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

    .container-custom {
      max-width: 600px;
    }
  </style>
</head>

<body>
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-2xl rounded-3xl p-10 container-custom m-10">
      <form action="../Controlador/solicitarPrestamo.php" method="post" class="space-y-6">

        <div class="container">

          <div class="forma">
            <h1 class="text-center text-2xl font-bold mb-6">PRESTAMOS</h1>
          </div>

          <?php
          $nombre = '';
          $apellido = '';
          $correo = '';

          foreach ($resultados as $datos):
            $nombre = $datos['nombre'];
            $apellido = $datos['apellido'];
            $correo = $datos['correo'];
          endforeach;
          ?>

          <div class="flex mb-4">
            <div class="flex-1 pr-2">
              <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
                <span class="pl-3 text-gray-400">
                  <i class='bx bx-text'></i>
                </span>
                <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" readonly class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-lg">
              </div>
            </div>
            <div class="flex-1 pl-2">
              <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
                <span class="pl-3 text-gray-400">
                  <i class='bx bx-text'></i>
                </span>
                <input type="text" name="apellido" id="apellido" value="<?php echo $apellido ?>" readonly class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-lg">
              </div>
            </div>
          </div>

          <div class="flex mb-4">
            <div class="flex-1 pr-2">
              <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
                <span class="pl-3 text-gray-400">
                  <i class='bx bxs-envelope'></i>
                </span>
                <input type="text" name="correo" id="correo" value="<?php echo $correo ?>" readonly class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-lg">
              </div>
            </div>
          </div>

          <div class="flex mb-4">
            <div class="flex-1 pr-2">
              <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
                <span class="pl-3 text-gray-400">
                  <i class='bx bx-dollar'></i>
                </span>
                <input type="number" name="sueldo" id="sueldo" placeholder="Ingrese su sueldo" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-lg" required>
              </div>
            </div>
          </div>

          <div class="flex mb-4">
            <div class="flex-1 pr-2">
              <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
                <span class="pl-3 text-gray-400">
                  <i class='bx bx-dollar'></i>
                </span>
                <input type="number" name="prestamo" id="prestamo" placeholder="Ingrese el monto del prestamo" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-lg" required>
              </div>
            </div>
          </div>

          <input type="hidden" name="estado" id="prestamo" value="Procesando Solicitud">
          <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $usuario ?>" readonly>

          <!-- Botón de Solicitar Préstamo -->
          <div class="form-control mt-8 border-none">
            <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-lg font-semibold focus:outline-none focus:ring-4 focus:ring-indigo-400 shadow-lg transform transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-xl" id="Solicitar Prestamo">
              Solicitar Prestamo
            </button>
          </div>

        </div>

      </form>
    </div>
  </div>
</body>

</html>