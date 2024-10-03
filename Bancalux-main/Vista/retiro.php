<?php

  require_once "../Modelo/Conexion.php";
  require "../Controlador/retiro2.php";

  if($_POST){ $idCliente =  $_SESSION['idCajero']; }

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

    <title>Retiros</title>

</head>

<body>  

   

    <main>
    

        <form action="../Controlador/retiro2.php" method="POST">

        <?php               

            if(isset($_GET['noex'])) {
                echo '<div class="alert  alert-dismissible alert-danger" role="alert">
                <strong>Error:</strong> La cuenta no existe.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                
            }

            if(isset($_GET['noin'])) {
                echo '<div class="alert  alert-dismissible alert-danger" role="alert">
                <strong>Error:</strong> DUI INCORRECTO.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                
            }


        ?>

            <div class="container">

                <div class="forma"> <h1>RETIROS</h1> </div>

                <!-- Cuenta de retiro -->
                <input type="number" name="numerocuenta" id="numerocuenta" placeholder="Cuenta a Retirar" min="1" required>

                <input type="number" name="DUI" id="DUI" placeholder="DUI" required>

                <!-- Monto a retirar -->
                <input type="number" name="monto" id="monto" placeholder="Monto" min="1" required>

                <input type="hidden" name="retiro" value="Retiro">

                <input type="submit" name="Retirar" value="Retirar" id="Retirar">

            </div>

        </form>

    </main>



</body>
</html>