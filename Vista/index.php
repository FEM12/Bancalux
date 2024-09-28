<?php

    session_start();
    $usuario =  $_SESSION['idCliente'];

    if(!isset($usuario)){ header("location:../Vista/login.php"); }

?>

<?php

    include_once ("../Modelo/Conexion.php");
    
    $consulta = "SELECT numerocuenta, nombre, apellido, saldo, fechaCrea  FROM cuentabanc WHERE idCliente = :idCliente";

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
    <link rel="stylesheet" href="css/index.css">

    <title>Home - Clientes</title>

</head>

<body>
    
    <header>

        <h2>¡Bienvenido! <?php foreach($resultados as $fila){echo $fila['nombre']; break;} ?></h2>

        <i class='bx bx-menu' id="mostrar"></i>

        <ul id="menu">

            <li> <a href="../Controlador/cerrarCli.php">Cerrar Sesión</a> </li>
            <li> <a href="CuentaBac.php?id=<?php echo $usuario ?>">Crear cuentas</a> </li>
            <li> <a href="transferencias.php?id=<?php echo $usuario ?>">Transferencias</a> </li>
            <li> <a href="PrestamosCli.php?id=<?php echo $usuario ?>">Prestamos</a> </li>
            <li> <a href="movimientosPrestamos.php?id=<?php echo $usuario ?>">Lista de prestamos</a> </li>
            <li> <a href="movimientos.php?id=<?php echo $usuario ?>">Movimientos</a> </li>
            
        </ul>

    </header>

    
    <?php

        if(isset($_GET['opcion'])) {
            echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Ha alcanzado el máximo de Cuentas
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        };

        if(isset($_GET['sucses'])) {
            echo '<div class="alert  alert-dismissible alert-success" role="alert">
            <strong>Exito:</strong> Se ha creado la cuenta
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

        if(isset($_GET['success'])) {
            echo '<div class="alert  alert-dismissible alert-success" role="alert">
            <strong>Exito:</strong> Se hizo el retiro de su cuenta
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

        if(isset($_GET['transfe'])) {
            echo '<div class="alert  alert-dismissible alert-success" role="alert">
            <strong>Exito:</strong> Transferencia Exitosa!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

        if(isset($_GET['prestamo'])) {
            echo '<div class="alert  alert-dismissible alert-success" role="alert">
            <strong>Exito:</strong> Se ha postulado para un prestamo!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

    ?> 

    <main>

        <?php 

            $numerocuenta = '';

            foreach ($resultados as $fila): 
        ?>
                
            <div class="account" >

                <h1><?php echo $numerocuenta = $fila['numerocuenta']; ?></h1>
                <h5><strong>Saldo: </strong>$<?php echo $fila['saldo']; ?></h5>
                <h6><strong>Propietario: </strong><?php echo $fila['nombre']; ?> <?php echo $fila['apellido']; ?></h6>
                <h6><strong>Creada:</strong>  <?php echo $fila['fechaCrea']; ?>

            </div> 

        <?php endforeach; ?>                   

            
    </main>

    

    <script src="./js/menuDesple.js"></script>

</body>
</html>

<?php require_once "../Modelo/Conexion.php"; ?>