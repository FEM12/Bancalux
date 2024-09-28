<?php

    session_start();
    $usuario =  $_SESSION['idEmpleado'];

    if(!isset($usuario)){ header("location:../Vista/logCajero.php"); }

?>

<?php

    include_once ("../Modelo/Conexion.php");

    $consulta = "SELECT nombre, apellido  FROM empleado WHERE idEmpleado = :idEmpleado";
    $stmt = $db->prepare($consulta);
    $stmt->execute([':idEmpleado' => $usuario]);
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
    <link rel="stylesheet" href="css/cajero.css">

    <title>Cliente</title>

</head>

<body>


    
    <header>

        <h2><?php foreach($resultados as $fila){ echo $fila['nombre']; echo' ' ; echo $fila['apellido']; } ?> </h2>

        <i class='bx bx-menu' id="mostrar"></i>

        <ul id="menu">
            <li>
                <a href="../Controlador/cerrar.php">Cerrar Sesión</a>
            </li>
        </ul>

    </header>

    <?php

        if(isset($_GET['exito'])) {
            echo '<div class="alert  alert-dismissible alert-success" role="alert">
            <strong>Exito:</strong> Se ha depositado a la Cuenta!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

                
        if(isset($_GET['retiro'])) {
            echo '<div class="alert  alert-dismissible alert-success" role="alert">
            <strong>Exito:</strong> Se ha retirado de la Cuenta!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

        if(isset($_GET['cuentacre'])) {
            echo '<div class="alert  alert-dismissible alert-success" role="alert">
            <strong>Exito:</strong> Se ha creado la cuenta!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

    ?> 

    
    <main>

    

        <div class="card">

            <section class="image"><img src="../img/deposito.png" alt="deposito"></section>

            <div class="text"> <h1>Depositos</h1> </div>

            <a href="deposito.php?id=<?php echo $usuario ?> " class='bx bxs-chevron-right'></a>

            <section class="log"> <p>Ingresar</p> </section>

        </div>

        

        <div class="card">

            <section class="image"><img src="../img/retiro.png" alt="deposito"></section>

            <div class="text"> <h1>Retiros</h1> </div>

            <a href="retiro.php?id=<?php echo $usuario ?>" class='bx bxs-chevron-right'></a>

            <section class="log"> <p>Ingresar</p> </section>

        </div>

        <div class="card">

            <section class="image"><img src="../img/deposito.png" alt="deposito"></section>

            <div class="text"> <h1>Registrar </h1><h1>Clientes</h1> </div>

            <a href="registrarCliente.php?id=<?php echo $usuario ?> " class='bx bxs-chevron-right'></a>

            <section class="log"> <p>Ingresar</p> </section>

        </div>
        <div class="card">

            <section class="image"><img src="../img/prestamo.png" alt="deposito"></section>

            <div class="text"> <h1>Prestamo</h1> </div>

            <a href="prestamos.php?id=<?php echo $usuario ?> " class='bx bxs-chevron-right'></a>

            <section class="log"> <p>Ingresar</p> </section>

        </div>

        <div >

        </div>

    </main>
        
        

    

    <script src="./js/menuDesple.js"></script>

</body>
</html>

<?php require_once "../Modelo/Conexion.php"; ?>