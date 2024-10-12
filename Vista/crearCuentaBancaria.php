<?php
  session_start();
  include_once ("../Modelo/conexion.php");

  $usuario = $_SESSION['idCliente'];

  if (!isset($usuario)) { header("location:../Vista/login.php"); }

  $consulta = "SELECT nombre, apellido, correo FROM cliente WHERE idCliente = :idCliente";
  $stmt = $db->prepare($consulta);
  $stmt->execute([':idCliente' => $usuario]);
  $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

  function id_cuenta() {
    $longitud = 8;
    $caracteres = "0123456789";
    $identificador = "";

    for ($i = 0; $i < $longitud; $i++) {
      $indice = rand(0, strlen($caracteres) - 1);
      $identificador .= $caracteres[$indice];
    }

    return $identificador;
  }

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.tailwindcss.com"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  
  <title>Crear Cuenta Bancaria</title>

  <style>
    body {
      background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%),
      radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%),
      radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
    }
  </style>

</head>

<body class="bg-slate-900">

  <main class="min-h-screen flex items-center justify-center">
    <form action="../Controlador/crearCuentaBancaria.php" method="post" class="bg-black/30 backdrop-blur-lg p-8 rounded-lg shadow-lg w-full max-w-md">
      <div class="forma mb-6">
          <h1 class="text-2xl font-bold text-center text-white">Crear Cuenta Bancaria</h1>
      </div>

      <input type="text" id="numerocuenta" name="numerocuenta" value="<?php echo id_cuenta(); ?>" readonly
          class="w-full p-3 bg-gray-100 rounded-lg mb-4" />

      <input type="hidden" name="saldo" id="saldo" value="50"/>

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

      <input type="hidden" name="nombre" id="nombre" value ="<?php echo $nombre ?>">
      <input type="hidden" name="apellido" id="apellido" value ="<?php echo $apellido ?>">
      <input type="hidden" name="correo" id="correo" value ="<?php echo $correo ?>">
      <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $usuario ?>">

      <input type="submit" value="Crear Cuenta" id="Crear Cuenta" class="w-full p-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg cursor-pointer transition duration-300">
    </form>
  </main>

  <script>
    document.getElementById('Crear Cuenta').addEventListener('click', function(event) {
      const saldo = document.getElementById('saldo').value;
      if (saldo <= 0) {
        event.preventDefault();
        alert('Por favor, ingresa un monto válido mayor a 0.');
      }
    });
  </script>

</body>
</html>
