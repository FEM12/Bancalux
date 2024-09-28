<?php
    session_start();
    $usuario =  $_SESSION['idCliente'];

    if(!isset($usuario)){ header("location:../Vista/login.php"); }

?>

<?php

    include_once ("../Modelo/Conexion.php");
    $consulta = "SELECT nombre, apellido, correo, sueldo, prestamo, estado  FROM prestamos WHERE idCliente = :idCliente";
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

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/prestamos.css">

    <title>Cliente</title>

</head>

<body>
    
    <header>

        <h2> Movimientos de Prestamos</h2>

        <i class='bx bx-menu' id="mostrar"></i>

        <ul id="menu">

           
            <li> <a href="index.php">Inicio</a> </li>
            <li> <a href="CuentaBac.php?id=<?php echo $usuario ?>">Crear cuentas</a> </li>
            <li> <a href="transferencias.php?id=<?php echo $usuario ?>">Transferencias</a> </li>
            <li> <a href="../Controlador/cerrarCli.php">Cerrar Sesión</a> </li>
            
        </ul>

    </header>

    <div class="container">

        <table>
            
            <thead>

                <tr>

                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Sueldo</th>
                    <th>Prestamo</th>
                    <th>Estado</th>

                </tr>

            </thead>

            <tbody>

                <?php 

                    $numerocuenta = '';

                    foreach ($resultados as $fila): 
                ?>

                    <tr>

                        <td><?php echo $fila['nombre']; ?> <?php echo $fila['apellido']; ?></td>
                        <td><?php echo $fila['correo']; ?></td>
                        <td>$ <?php echo $fila['sueldo']; ?></td>
                        <td><?php echo $fila['prestamo']; ?></td>
                        <td><?php echo $fila['estado']; ?></td>

                    </tr>

                <?php endforeach; ?>


            </tbody> 

        </table>
    </div>
            
    <script src="./js/menuDesple.js"></script>

</body>
</html>

<?php require_once "../Modelo/Conexion.php"; ?>