<?php

session_start();
include_once("../Modelo/conexion.php");

$usuario =  $_SESSION['idCliente'];

if (!isset($usuario)) { header("location:../Vista/loginCliente.php"); }

$consulta = "SELECT numerocuenta, nombre, apellido, tipoTransac, monto, fechaTransac  FROM movimientos WHERE idCliente = :idCliente";
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

  <script src="https://cdn.tailwindcss.com"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <title>Movimientos</title>

</head>

<body class="bg-slate-900 bg-fixed bg-cover min-h-screen flex flex-col items-center">
  <style>
    body {
      background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%),
        radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%),
        radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
    }
  </style>

  <div class="container mx-auto p-8 mt-10">
    <h2 class="text-3xl font-bold text-center text-white mb-6">Movimientos de Cuenta</h2>
    <table class="w-full table-auto text-left text-white rounded-lg shadow-lg overflow-hidden">
      <thead class="bg-slate-800 rounded-t-lg">
        <tr>
          <th class="px-4 py-2 text-center align-middle">Número Cuenta</th>
          <th class="px-4 py-2 text-center align-middle">Nombres</th>
          <th class="px-4 py-2 text-center align-middle">Movimiento</th>
          <th class="px-4 py-2 text-center align-middle">Monto</th>
          <th class="px-4 py-2 text-center align-middle">Fecha Movimiento</th>
        </tr>
      </thead>
      <tbody class="bg-slate-700 divide-y divide-slate-600">
        <?php foreach ($resultados as $fila): ?>
          <tr>
            <td class="px-4 py-2 text-center align-middle"><?php echo $fila['numerocuenta']; ?></td>
            <td class="px-4 py-2 text-center align-middle"><?php echo $fila['nombre'] . ' ' . $fila['apellido']; ?></td>
            <td class="px-4 py-2 text-center align-middle"><?php echo $fila['tipoTransac']; ?></td>
            <td class="px-4 py-2 text-center align-middle">$ <?php echo $fila['monto']; ?></td>
            <td class="px-4 py-2 text-center align-middle"><?php echo $fila['fechaTransac']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>

</html>
