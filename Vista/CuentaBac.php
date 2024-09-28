<?php

  session_start();
  $usuario =  $_SESSION['idCliente'];

  if(!isset($usuario)){ header("location:../Vista/login.php"); }

?>
<?php 

  include_once ("../Modelo/Conexion.php");
  $consulta = "SELECT  nombre, apellido, correo  FROM cliente WHERE idCliente = :idCliente";
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

  <link rel="stylesheet" href="./css/CuentaBac.css">

  <title>Crear Cuenta Bancaria</title>

</head>

<body>

  <main>

    <form action="../Controlador/CuentaBac2.php" method="post">

      <div class="container">

        <div class="forma"> <h1>CUENTAS</h1> </div>

        <input type="text" id="numerocuenta" name="numerocuenta" value="<?php echo id_cuenta(); ?>" readonly>

        <input type="number" name="saldo" id="saldo"  placeholder="Monto Inicial Cuenta" min="1" step="0.01"> 

        <?php

          $nombre = '';
          $apellido = '';
          $correo = '';

          foreach ($resultados as $datos):

            $nombre = $datos['nombre'];  
                  
            $apellido =  $datos['apellido'];
            
            $correo = $datos['correo'];

          endforeach;

        ?>
                    
        <input type="hidden" name="nombre" id="nombre" value ="<?php echo $nombre?>">
        <input type="hidden" name="apellido" id="apellido" value ="<?php echo $apellido ?>">
        <input type="hidden" name="correo" id="correo" value ="<?php echo $correo?>">
        <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $usuario ?>">

        <input type="submit" value="Crear Cuenta" id="Crear Cuenta">

      </div>
      
    </form>
    
  </main>

</body>
</html>

<?php

  function id_cuenta() {

    $longitud = 8;
    $caracteres = "0123456789";
    $identificador = "";

    for ($i=0; $i<$longitud; $i++) {

      $indice = rand(0, strlen($caracteres)-1);
      $identificador .= $caracteres[$indice];

    }

    return $identificador;
  }

?>