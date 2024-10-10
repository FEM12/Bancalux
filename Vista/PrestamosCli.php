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
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Frameworks y Librerías -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Solicitud Préstamo</title>

    <style>
        body {
            background-color: #0f172a;
            background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%),
                            radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%),
                            radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white shadow-2xl rounded-3xl p-10 w-full max-w-md m-20">

            <form class="space-y-6" action="../Controlador/Prestamocli2.php" method="post">
                <div class="mb-8 text-center ">
                    <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-green-600">Solicitud de Préstamo</h1>
                </div>

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

                <!-- Nombre -->
                <div class="flex mb-4 items-center bg-gray-300 border border-gray-300 rounded-lg">
                    <span class="pl-3 text-gray-400"><i class='bx bx-text'></i></span>
                    <input type="text" name="nombre" value="<?php echo $nombre ?>" class="input bg-transparent w-full p-3 rounded-r-lg text-gray-600" readonly>
                </div>

                <!-- Apellido -->
                <div class="flex mb-4 items-center bg-gray-300 border border-gray-300 rounded-lg">
                    <span class="pl-3 text-gray-400"><i class='bx bx-text'></i></span>
                    <input type="text" name="apellido" value="<?php echo $apellido ?>" class="input bg-transparent w-full p-3 rounded-r-lg text-gray-600" readonly>
                </div>

                <!-- Correo -->
                <div class="flex mb-4 items-center bg-gray-300 border border-gray-300 rounded-lg">
                    <span class="pl-3 text-gray-400"><i class='bx bxs-envelope'></i></span>
                    <input type="text" name="correo" value="<?php echo $correo ?>" class="input bg-transparent w-full p-3 rounded-r-lg text-gray-600" readonly>
                </div>

                <!-- Sueldo -->
                <div class="flex mb-4 items-center bg-gray-100 border border-gray-300 rounded-lg">
                    <span class="pl-3 text-gray-400"><i class='bx bx-money'></i></span>
                    <input type="number" name="sueldo" placeholder="Ingrese su sueldo" class="input bg-transparent w-full p-3 rounded-r-lg" required>
                </div>

                <!-- Préstamo -->
                <div class="flex mb-4 items-center bg-gray-100 border border-gray-300 rounded-lg">
                    <span class="pl-3 text-gray-400"><i class='bx bxs-credit-card'></i></span>
                    <input type="number" name="prestamo" placeholder="Ingrese el monto del préstamo" class="input bg-transparent w-full p-3 rounded-r-lg" required>
                </div>

                <input type="hidden" name="estado" value="Procesando solicitud">
                <input type="hidden" name="idCliente" value="<?php echo $usuario ?>" readonly>

                <div class="form-control mt-8 border-none">
                    <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-green-600 text-white rounded-lg font-semibold hover:scale-105 transform transition-all duration-300 ease-in-out">Solicitar Préstamo</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>