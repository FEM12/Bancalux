<?php

    session_start();
    $usuario =  $_SESSION['idEmpleado'];

    if(!isset($usuario)){ header("location:../Vista/login.php"); }

?>

<?php

    include_once ("../Modelo/Conexion.php");
    $consulta = "SELECT nombre, apellido, correo, sueldo, prestamo, idCliente, idPrestamo, estado FROM prestamos";
    $stmt = $db->prepare($consulta);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="es">

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Librerías y Frameworks -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Solicitudes de Préstamos</title>

    <style>
        body {
            background-color: #0f172a;
            background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%),
                            radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%),
                            radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
            background-size: cover;
            background-attachment: fixed;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem;
            text-align: left;
        }

        th {
            background-color: #1e40af;
            color: white;
        }

        td {
            background-color: #f1f5f9;
        }
    </style>
</head>

<body>

    <header class="p-6 bg-gradient-to-r from-green-500 to-blue-600 text-white shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h2 class="text-3xl font-bold">Solicitudes de Préstamos</h2>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="indexCaj.php" class="hover:underline font-bold text-1xl">Inicio</a></li>
                    <li><a href="../Controlador/cerrarCli.php" class="hover:underline font-bold text-1xl">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <div class="bg-white shadow-2xl rounded-3xl p-10">
            <table class="min-w-full leading-normal ">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Sueldo</th>
                        <th>Préstamo</th>
                        <th>Estado</th>
                        <th>Modificar Estado</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($resultados as $fila): ?>
                    <tr class="border-b border-gray-200">
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['apellido']; ?></td>
                        <td><?php echo $fila['correo']; ?></td>
                        <td>$ <?php echo $fila['sueldo']; ?></td>
                        <td><?php echo $fila['prestamo']; ?></td>
                        <td><?php echo $fila['estado']; ?></td>
                        <td>
                            <?php if ($fila['estado'] == 'Procesando solicitud'): ?>
                                <form method="post" action="../Controlador/actualizar_estado.php">
                                    <input type="hidden" name="idPrestamo" value="<?php echo $fila['idPrestamo']; ?>">
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-all">Aperturar Préstamo</button>
                                </form>
                            <?php else: ?>
                                <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-lg" disabled><?php echo $fila['estado']; ?></button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

</body>

</html>

<?php require_once "../Modelo/Conexion.php"; ?>