<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Framework y Librerias -->
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--Iconos-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--Tailwind-->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- <link rel="stylesheet" href="css/registro.css"> -->

    <title>Registro - Cliente</title>

</head>

<body>

<style>
        body{
            background-color: #0f172a;
            background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%), 
                            radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%), 
                            radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
            background-size: cover;
            background-attachment: fixed;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>

    <div class="flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-2xl rounded-3xl p-10 w-full max-w-md m-20">

        <form class="space-y-6" method="post" action="../Controlador/registro2.php">

            <?php

                if(isset($_GET['opcion'])) {
                    echo  '<div class="bg-yellow-500 text-white px-4 py-3 rounded relative mb-4">
                    <strong>Error:</strong> No se permiten caracteres o números en Campo "Nombre" "Apellido"
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <i class="bx bx-x"></i>
                    </span>
                    </div>';
                };

                if(isset($_GET['dui'])) {
                    echo  '<div class="bg-yellow-500 text-white px-4 py-3 rounded relative mb-4">
                    <strong>Error:</strong> No se permiten letras o caracteres especiales en Campo "DUI"
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <i class="bx bx-x"></i>
                    </span>
                    </div>';
                };

            ?>


            <div class="container">

            <div class="mb-8 text-center">
                <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-indigo-600">Registrate</h1>
            </div>

            <!--Nombre-->
                <span class="name relative">
                <label class="label font-semibold text-gray-700" for="nombre">
                <span class="label-text">Nombre</span>
                </label>
                <div class="flex mb-4 items-center bg-gray-100 border border-gray-300 rounded-lg">
                    <!--Icon-->
                        <span class="pl-3 text-gray-400">
                        <i class='bx bx-text'></i>
                        </span>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-r-lg" required>
            </div>
                </span> 
            <!--Apellido-->
                <span class="last-name relative">
                <label class="label font-semibold text-gray-700" for="apellido">
                <span class="label-text">Apellido</span>
                </label>
                <div class="flex mb-4 items-center bg-gray-100 border border-gray-300 rounded-lg">
                    <!--Icon-->
                    <span class="pl-3 text-gray-400">
                        <i class='bx bx-text'></i>
                        </span>
                    <input type="text" id="apellido" name="apellido" placeholder="Apellido" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-r-lg" required>
            </div>
                </span>
            <!--Usuario-->
                <span class="userName relative">
                <label class="label font-semibold text-gray-700" for="apellido">
                <span class="label-text">Usuario</span>
                </label>
                <div class="flex mb-4 items-center bg-gray-100 border border-gray-300 rounded-lg">
                    <!--Icon-->
                    <span class="pl-3 text-gray-400">
                    <i class='bx bxs-user'></i>
                        </span>
                    <input type="text" id="usuario" name="usuario" placeholder="Usuario" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-r-lg" required>
            </div>
                </span>

                <!--Email-->

                <span class="email relative">
                <label class="label font-semibold text-gray-700" for="apellido">
                <span class="label-text">Correo electronico</span>
                </label>
                <div class="flex mb-4 items-center bg-gray-100 border border-gray-300 rounded-lg">
                <!--Icon-->
                <span class="pl-3 text-gray-400">
                <i class='bx bxs-envelope' ></i>
                </span>    
                <input type="email" id="correo" name="correo" placeholder="Correo Electronico" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-r-lg" required>
            </div>
                </span>

                <!--Password-->

                <span class="password relative">
                <label class="label font-semibold text-gray-700" for="apellido">
                <span class="label-text">Contraseña</span>
                </label>
                <div class="flex mb-4 items-center bg-gray-100 border border-gray-300 rounded-lg">
                <!--Icon-->
                <span class="pl-3 text-gray-400">
                <i class='bx bxs-lock' id="view" ></i>
                </span>    
                    <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-r-lg" required>
            </div>
                </span>
                <!--Identificador-->
                <span class="identify relative">
                <label class="label font-semibold text-gray-700" for="apellido">
                <span class="label-text">Identificador unico</span>
                </label>
                <div class="flex mb-4 items-center bg-gray-300 border border-gray-300 rounded-lg">
                <!--Icon-->
                <span class="pl-3 text-gray-400">
                <i class='bx bxs-lock' id="view" ></i>
                </span>    
                    <input type="text" id="identificador " name="identificador" value ="<?php echo generar_identificador(); ?>" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-r-lg" readonly>
            </div>
                </span>
                <!--DUI-->
                <span class="document relative">
                <label class="label font-semibold text-gray-700" for="apellido">
                <span class="label-text">Identificador unico</span>
                </label>
                <div class="flex mb-4 items-center bg-gray-100 border border-gray-300 rounded-lg">
                <!--Icon-->
                <span class="pl-3 text-gray-400">
                <i class='bx bx-id-card' ></i>
            </span>
                    <input type="text" id="dui" name="dui" placeholder="DUI" class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-r-lg" required>
            </div>
                </span>
                <!--SUCURSAL-->
                <span class="document relative">
                <label class="label font-semibold text-gray-700" for="apellido">
                <span class="label-text">Sucursal</span>
                </label>
                <div class="flex mb-4 items-center bg-gray-100 border border-gray-300 rounded-lg">
                <select id="sucursal" name="sucursal" required class="selection bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-r-lg">

                    <option value="" disabled selected>Seleccione una sucursal</option>
                    <option value="Sucursal A">Sucursal A</option>
                    <option value="Sucursal B">Sucursal B</option>
                    <option value="Sucursal C">Sucursal C</option>

                </select>
            </div>

                <div class="form-control mt-8 border-none">
                <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-lg font-semibold focus:outline-none focus:ring-4 focus:ring-indigo-400 shadow-lg transform transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-xl" id="Registrar">
                Registrarse        
                </button>
            </div>
            </div>

        </form>

            </div>
            </div>



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