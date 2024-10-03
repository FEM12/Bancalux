<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/registro.css">

    <title>Registro - Cliente</title>

</head>

<body>

   
    <main>

        <form method="post" action="../Controlador/registro2.php">

            <?php

                if(isset($_GET['opcion'])) {
                    echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> No se permiten caracteres o números en Campo "Nombre", "Apellido"
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                };

                if(isset($_GET['dui'])) {
                    echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> No se permiten letras o caracteres en especiales en Campo "DUI"
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                };

            ?>

            <div class="container">

                <div class="form"><h1>REGISTRO</h1></div>

                <span class="name">
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                    <i class='bx bx-text'></i>
                </span> 

                <span class="last-name">
                    <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>
                    <i class='bx bx-text'></i>
                </span>

                <span class="userName">
                    <input type="text" id="usuario" name="usuario" placeholder="Usuario" required>
                    <i class='bx bxs-user' ></i>
                </span>

                <span class="email">
                    <input type="email" id="correo" name="correo" placeholder="Correo Electronico" required>
                    <i class='bx bxs-envelope' ></i>
                </span>

                <span class="password">
                    <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                    <i class='bx bxs-lock' id="view" ></i>
                </span>

                <span class="identify">
                    <input type="text" id="identificador " name="identificador" value ="<?php echo generar_identificador(); ?>" readonly>
                </span>

                <span class="document">
                    <input type="text" id="dui" name="dui" placeholder="DUI" required>
                    <i class='bx bx-id-card' ></i>
                </span>

                <select id="sucursal" name="sucursal" required class="selection">

                    <option value="" disabled selected>Seleccione una sucursal</option>
                    <option value="Sucursal A">Sucursal A</option>
                    <option value="Sucursal B">Sucursal B</option>
                    <option value="Sucursal C">Sucursal C</option>

                </select>

                <input type="submit" value="Registrarse" id="Registrar">

            </div>

        </form>

    </main>



    <?php

        function generar_identificador() {

            $longitud = 6;
            $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $identificador = "";

            for ($i=0; $i<$longitud; $i++) {

                $indice = rand(0, strlen($caracteres)-1);
                $identificador .= $caracteres[$indice];

            }

            return $identificador;

        }

    ?>
   
    <script src="./js/mostrarContraseña.js"></script>

</body>
</html>