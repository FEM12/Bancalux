<?php

    require_once "../Modelo/Conexion.php";
    require "../Controlador/transfe2.php";
    $usuario = $_SESSION['idCliente'];

    // Consulta para obtener las cuentas del cliente actual
    $stmt3= $db->prepare("SELECT numerocuenta, saldo FROM cuentabanc WHERE idCliente = $usuario");
    $stmt3->execute();
    $resultado = $stmt3->fetchAll(PDO::FETCH_ASSOC);

    // Consulta para obtener el saldo disponible correspondiente al número de cuenta seleccionado
    if (isset($_POST['numerocuenta'])) {

        $numerocuenta = $_POST['numerocuenta'];
        $stmt4= $db->prepare("SELECT saldo FROM cuentabanc WHERE idCliente = $usuario AND numerocuenta = :numerocuenta");
        $stmt4->bindValue(':numerocuenta', $numerocuenta);
        $stmt4->execute();
        $prueba4 = $stmt4->fetch(PDO::FETCH_ASSOC);
        $dato4 = $prueba4["saldo"];

    }else {

        // Si no se ha seleccionado ningún número de cuenta, se utiliza el saldo disponible de la primera cuenta en la lista
        $dato4 = $resultado[0]['saldo'];

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
    
    <link rel="stylesheet" href="./css/transferencias.css">

    <title>Retiros</title>

</head>

<body>

    <form action="../Controlador/transfe2.php" method="post">

        <main>

            <div class="container">

                <div class="form"> <h1>TRANSFERENCIA</h1> </div>

                <?php 

                    if(isset($_GET['noex'])) {
                        echo '<div class="alert alert-danger" role="alert"> Error: La cuenta a transferir no existe </div>'; 
                    }; 

                    if(isset($_GET['nosal'])) { 
                        echo '<div class="alert alert-danger" role="alert"> Error: Debe ingresar un saldo mayor a 0 </div>'; 
                    }; 
                    
                ?>
                

                <input type="text" name="nombre" id="nombre" value="<?php echo $dato ?>" readonly>
                <input type="text" name="apellido" id="apellido" value="<?php echo $dato2?>" readonly>
                <input type="text" name="correo" id="correo" value="<?php echo $dato3?>" readonly>
                <input type="text" name="saldo" id="saldo" value="Saldo disponible: <?php echo $dato4?>" readonly>
                <input type="number" name="monto" id="monto" value="Monto a retirar" min="1" max="500" required>

                <!--- select con las cuentas de la personas --->
                <select name="numerocuenta" id="numerocuenta" onchange="actualizarSaldo()">

                    <option value="" disabled selected>Seleccione una cuenta</option>
                    
                    <?php foreach ($resultado as $fila): ?>

                        <option value="<?php echo $fila['numerocuenta']; ?>"><?php echo $fila['numerocuenta']; ?></option>

                    <?php endforeach; ?>

                </select>

                <input type="number" name="cuentaEnv" id="cuentaEnv" placeholder="Cuenta a Enviar" required>

                <input type="hidden" name="IdCliente" id="IdCliente" value="<?php echo $usuario ?>">
                <input type="hidden" name="transf" id="transf" value="Transferencia">
                <input type="submit" id="transfe" name="transfe" value="Transferir">
                
                
            </div>
            
        </main>

    </form>

    <script>

        function actualizarSaldo() {

            var numerocuenta = document.getElementById("numerocuenta").value;
            var saldoInput = document.getElementById("saldo");
            var saldo = 0;

            <?php foreach ($resultado as $fila): ?>

                if (numerocuenta == <?php echo $fila['numerocuenta']; ?>) { saldo = <?php echo json_encode($fila['saldo']); ?>; }

            <?php endforeach; ?>

            saldoInput.value = "Saldo disponible: " + saldo;

        }

    </script>
</body>
</html>