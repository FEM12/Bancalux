<?php

  session_start();
  $usuario =  $_SESSION['idCliente'];

  if(!isset($usuario)){  header("location:../Vista/login.php"); }

?>
<?php

  include_once ("../Modelo/Conexion.php");
  $consulta = "SELECT  nombre, apellido, correo  FROM cliente WHERE idCliente = :idCliente";
  $stmt = $db->prepare($consulta);
  $stmt->execute([':idCliente' => $usuario]);
  $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="./css/prestacli.css">

  <title>Solicitud Prestamo</title>

</head>

<body>

  <main>

    <form action="../Controlador/Prestamocli2.php" method="post">

      <div class="container">

        <div class="forma"> <h1>PRESTAMOS</h1> </div>
        
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
                    
        <input type="text" name="nombre" id="nombre" value ="<?php echo $nombre?>" readonly>
        <input type="text" name="apellido" id="apellido" value ="<?php echo $apellido ?>"readonly>
        <input type="text" name="correo" id="correo" value ="<?php echo $correo?>"readonly>
        <input type="number" name="sueldo" id="sueldo" placeholder="Ingrese su sueldo">
        <input type="hidden" name="estado" id="prestamo" value="Procesando solicitud">
        <input type="number" name="prestamo" id="prestamo" placeholder="Ingrese el monto del prestamo">
        <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $usuario ?>"readonly>   

        <input type="submit" value="Solicitar Prestamo" id="Solicitar Prestamo">

      </div>

    </form>
  </main>
</body>
</html>