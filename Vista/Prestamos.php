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

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/prestamos.css">

    <title>Cliente</title>

</head>

<body>
    
    <header>

        <h2>Solicitudes de prestamos</h2>

        <i class='bx bx-menu' id="mostrar"></i>

        <ul id="menu">
            <li> <a href="indexCaj.php">Inicio</a> </li>
            <li> <a href="../Controlador/cerrarCli.php">Cerrar Sesión</a> </li>
            
        </ul>

    </header>

    <div class="container">

        <table>
            
            <thead>

                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Sueldo</th>
                    <th>Prestamo</th>
                    <th>Estado</th>
                    <th>Modificar Estado</th>

                </tr>

            </thead>
    

            <tbody>

                <?php 

                    $numerocuenta = '';

                    foreach ($resultados as $fila): 
                ?>

                    <tr>

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
                                    <button type="submit" class="btn btn-success" name="estado" value="Espera">Aperturar Prestamo</button>

                                </form>

                            <?php else: ?>

                                <button type="button" class="btn btn-secondary" disabled value="<?php echo $fila['estado']; ?>">

                                    <?php echo $fila['estado']; ?>
                                    
                                </button>

                            <?php endif; ?>


                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>    
                   
        </table>
    </div>
            
    <script src="./js/menuDesple.js"></script>

</body>
</html>

<?php require_once "../Modelo/Conexion.php"; ?>