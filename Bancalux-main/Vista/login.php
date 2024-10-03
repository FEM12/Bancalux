<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Login - Cliente</title>

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
        <div class="bg-white shadow-2xl rounded-3xl p-10 w-full max-w-md transition transform hover:scale-105">
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-indigo-600">
                    ¡Inicia Sesión!
                </h1>
                <p class="text-gray-500">Accede a tu cuenta para continuar</p>
            </div>
            <form class="space-y-6" action="../Controlador/login2.php" method="post">
                
                <div class="relative">
                    <label class="label font-semibold text-gray-700" for="usuario">
                        <span class="label-text">Usuario</span>
                    </label>
                    <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
                        <span class="pl-3 text-gray-400">
                            <i class='bx bx-user text-xl'></i>
                        </span>
                        <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu usuario"
                            class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-r-lg"
                            autocomplete="off" required />
                    </div>
                </div>

                <div class="relative">
                    <label class="label font-semibold text-gray-700" for="contrasena">
                        <span class="label-text">Contraseña</span>
                    </label>
                    <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg">
                        <span class="pl-3 text-gray-400">
                            <i class='bx bx-lock text-xl'></i>
                        </span>
                        <input type="password" name="contrasena" id="contrasena" placeholder="Ingresa tu contraseña"
                            class="input bg-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full p-3 rounded-r-lg"
                            autocomplete="off" required />
                    </div>
                </div>

                <div class="form-control mt-8">
                    <button type="submit"
                        class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-lg font-semibold hover:bg-gradient-to-l focus:outline-none focus:ring-4 focus:ring-indigo-400 shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                        Iniciar sesión
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php

    if (isset($_GET['opcion'])) {

        echo '<div class="alert alert-danger mt-4 text-center" role="alert">
            Error: Credenciales incorrectas.
            </div>';
    };

    ?>

    <script src="./js/mostrarContraseña.js"></script>

</body>

</html>
