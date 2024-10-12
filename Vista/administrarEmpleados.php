<?php

require_once("../Modelo/conexion.php");

session_start();

$usuario = $_SESSION['idGer'];

if (!isset($usuario)) { header("location:../Vista/loginCliente.php"); }

require_once("../Modelo/conexion.php");
$consulta = "SELECT nombre, apellido, correo, dui, sucursal, estado, rol, usuario, idEmpleado FROM empleado";
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

  <title>Lista de Empleados</title>
</head>

<style>
  ::-webkit-scrollbar{ width: 0; }

  body {
    background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%),
      radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%),
      radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
  }
</style>

<body class="bg-slate-900 bg-fixed bg-cover min-h-screen flex flex-col items-center">

  <div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold text-center text-white mb-6">Lista de Empleados</h2>
    <table class="w-full table-auto text-left text-white rounded-lg shadow-lg overflow-hidden">
      <thead class="bg-slate-800 rounded-t-lg">
        <tr>
          <th class="px-4 py-2 text-center align-middle">Nombre</th>
          <th class="px-4 py-2 text-center align-middle">Correo</th>
          <th class="px-4 py-2 text-center align-middle">Sucursal</th>
          <th class="px-4 py-2 text-center align-middle">Rol</th>
          <th class="px-4 py-2 text-center align-middle">Estado</th>
          <th class="px-4 py-2 text-center align-middle">Acciones</th>
        </tr>
      </thead>
      <tbody class="bg-slate-700 divide-y divide-slate-600">
        <?php foreach ($resultados as $fila): ?>
          <tr>
            <td class="px-4 py-2 text-center align-middle"><?php echo $fila['nombre'] . ' ' . $fila['apellido']; ?></td>
            <td class="px-4 py-2 text-center align-middle"><?php echo $fila['correo']; ?></td>
            <td class="px-4 py-2 text-center align-middle"><?php echo $fila['sucursal']; ?></td>
            <td class="px-4 py-2 text-center align-middle"><?php echo $fila['rol']; ?></td>
            <td class="px-4 py-2 text-center align-middle"><?php echo $fila['estado']; ?></td>
            <td class="px-4 py-2 text-center align-middle">
              <form method="post" action="../Controlador/administrarEmpleados.php" class="flex justify-center space-x-2">
                <input type="hidden" name="idEmpleado" value="<?php echo $fila['idEmpleado']; ?>">
                <button type="submit" class="bg-green-500 text-white py-2 px-2 rounded-lg shadow hover:bg-green-600 transition duration-300 bx bx-user-check" name="estado" value="Activo"></button>
                <button type="submit" class="bg-red-500 text-white py-2 px-2 rounded-lg shadow hover:bg-red-600 transition duration-300 bx bx-user-x" name="estado" value="Inactivo"></button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>

</html>