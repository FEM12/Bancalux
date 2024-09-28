<?php

  require_once "../Modelo/Conexion.php";
  require "../Controlador/deposito2.php";

  $idCliente =  $_SESSION['idEmpleado'];

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/deposito.css">

    <title>Depositos</title>

</head>

<body>  

    <form action="../Controlador/deposito2.php" method="POST">
      
        <main>

            <div class="container">

                <?php

                    if(isset($_GET['noex'])) {
                        echo '<div class="alert  alert-dismissible alert-danger" role="alert">
                        <strong>Error:</strong> La cuenta no existe.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        
                    } 
                    

                    if(isset($_GET['noco'])){

                        echo '<div class="alert  alert-dismissible alert-danger" role="alert">
                        <strong>Error:</strong> No hay conincidencias en los datos Ingresados.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        
                    }

                ?>

                <div class="forma"> <h1>DEPOSITOS</h1> </div>

                <!-- Cuenta de destino -->
                <input type="number" name="numerocuenta" id="numerocuenta" placeholder="Cuenta a Depositar" min="1" required>

                <!-- Monto a transferir -->
                <input type="number" name="monto" id="monto" placeholder="Monto" min="1" required>

                <input type="hidden" name="deposito" value="Deposito">

                <input type="submit" name="Depositar" value="Depositar" id="Depositar">

                <a href="indexCaj.php">Volver</a>

            </div>

        </main>

    </form>
    
</body>
</html>