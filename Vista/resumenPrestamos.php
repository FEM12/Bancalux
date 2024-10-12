<?php

require_once("../Modelo/conexion.php");

session_start();

$usuario = $_SESSION['idGer'];

if (!isset($usuario)) {
  header("location:../Vista/indexCajero.php");
}

$consulta = "SELECT nombre, apellido, correo, sueldo, prestamo, idCliente, idPrestamo, estado FROM prestamos";
$stmt = $db->prepare($consulta);
$stmt->execute();
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

  <title>Cliente</title>

  <style>
    ::-webkit-scrollbar {
      width: 0;
    }

    body {
      background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%),
        radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%),
        radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
    }
  </style>

</head>

<body class="bg-slate-900 bg-fixed bg-cover min-h-screen flex flex-col items-center">

  <div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold text-center text-white mb-6">Solicitudes de Préstamos</h2>
    <table class="w-full table-auto text-left text-white rounded-lg shadow-lg overflow-hidden">
      <thead class="bg-slate-800 rounded-t-lg">
        <tr>
          <th class="px-4 py-2 text-center">Nombre</th>
          <th class="px-4 py-2 text-center">Apellido</th>
          <th class="px-4 py-2 text-center">Correo</th>
          <th class="px-4 py-2 text-center">Sueldo</th>
          <th class="px-4 py-2 text-center">Préstamo</th>
          <th class="px-4 py-2 text-center">Estado</th>
          <th class="px-4 py-2 text-center">Modificar Estado</th>
        </tr>
      </thead>

      <tbody class="bg-slate-700 divide-y divide-slate-600">
        <?php foreach ($resultados as $fila): ?>
          <tr>
            <td class="px-4 py-2 text-center"><?php echo $fila['nombre']; ?></td>
            <td class="px-4 py-2 text-center"><?php echo $fila['apellido']; ?></td>
            <td class="px-4 py-2 text-center"><?php echo $fila['correo']; ?></td>
            <td class="px-4 py-2 text-center">$ <?php echo $fila['sueldo']; ?></td>
            <td class="px-4 py-2 text-center"><?php echo $fila['prestamo']; ?></td>
            <td class="px-4 py-2 text-center"><?php echo $fila['estado']; ?></td>
            <td class="px-4 py-2 text-center">

              <?php if ($fila['estado'] == 'Procesando Solicitud'): ?>

                <form method="post" action="../Controlador/actualizarEstadoPrestamo.php" class="flex justify-center space-x-2">
                  <input type="hidden" name="idPrestamo" value="<?php echo $fila['idPrestamo']; ?>">
                  <button type="submit" class="bg-green-500 text-white p-2 rounded-lg shadow hover:bg-green-600 transition duration-300 bx bx-check" name="estado" value="Aprobado"></butto>
                  <button type="submit" class="bg-red-500 text-white p-2 rounded-lg shadow hover:bg-red-600 transition duration-300 bx bx-x" name="estado" value="Rechazado"></button>
                </form>

              <?php else: ?>
                <i class='bg-gray-500 text-white p-2 rounded-lg shadow bx bx-block'></i>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>

</html>