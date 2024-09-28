<?php

    session_start();
    $usuario =  $_SESSION['idGer'];

    if(!isset($usuario)){ 
        header("location:../Vista/logGerente.php"); 
    }

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

        <h2>Bienvenido</h2>

        <i class='bx bx-menu' id="mostrar"></i>

        <ul id="menu">
            <li>
                
                <a href="../Controlador/cerrar.php">Cerrar Sesión</a>
            </li>
            <li> <a href="casosPrestamos.php?id=<?php echo $usuario ?>">Casos de Prestamos</a> </li>
        </ul>

    </header>
    
    <?php

        if(isset($_GET['emple'])) {
            echo '<div class="alert  alert-dismissible alert-success" role="alert">
            <strong>Exito:</strong> Se ha registrado el empleado!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            
        }

                
        if(isset($_GET['retiro'])) {
            echo '<div class="alert  alert-dismissible alert-success" role="alert">
            <strong>Exito:</strong> Se ha retirado de la Cuenta!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

    ?> 

    <main>

        <div class="card">

            <section class="image"><img src="../img/deposito.png" alt="deposito"></section>

            <div class="text"> <h1>Registrar empleados</h1> </div>

            <a href="registroCajero.php?id=<?php echo $usuario ?> " class='bx bxs-chevron-right'></a>

            <section class="log"> <p>Registrar</p> </section>

        </div>

        <div class="card">

            <section class="image"><img src="../img/deposito.png" alt="deposito"></section>

            <div class="text"> <h1>Administrar empleados</h1> </div>

            <a href="adminEmpleados.php?id=<?php echo $usuario ?> " class='bx bxs-chevron-right'></a>

            <section class="log"> <p>Registrar</p> </section>

        </div>

        <div class="card">

            <section class="image"><img src="../img/cliente.png" alt="registro"></section>

            <div class="text"> <h1>Registrar cajero</h1> </div>

            <a href="registroCajero2.php?id=<?php echo $usuario ?> " class='bx bxs-chevron-right'></a>

            <section class="log"> <p>Registrar</p> </section>

        </div>

        
    </main>
        
        

    

    <script src="./js/menuDesple.js"></script>

</body>
</html>

<?php require_once "../Modelo/Conexion.php"; ?>