<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Login - Gerente</title>

    <style>
        body {
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

        input::placeholder {
            color: #6b7280;
        }

        .input:focus {
            border-color: #2563eb;
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            background-position: right center;
            color: white;
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white shadow-2xl rounded-lg p-8 w-full max-w-md">
            <div class="mb-6 text-center">
                <h1 class="text-5xl font-extrabold text-gray-800">¡Bienvenido Gerente!</h1>
                <p class="text-gray-500">Inicia sesión en tu cuenta</p>
            </div>
            <form class="space-y-6" action="../Controlador/logGer.php" method="post">
                <!-- Usuario -->
                <div class="relative">
                    <label for="usu" class="text-sm font-medium text-gray-700">Usuario</label>
                    <input type="text" name="usu" id="usu" placeholder="Ingresa tu usuario"
                        class="input input-bordered w-full pl-12 py-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-500/50"
                        required autocomplete="off">
                    <i class='bx bxs-user absolute left-4 top-10 text-gray-500'></i>
                </div>

                <!-- Contraseña -->
                <div class="relative">
                    <label for="contra" class="text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="contra" id="contra" placeholder="Ingresa tu contraseña"
                        class="input input-bordered w-full pl-12 py-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-500/50"
                        required autocomplete="off">
                    <i class='bx bxs-lock-alt absolute left-4 top-10 text-gray-500'></i>
                </div>

                <!-- Botón de enviar -->
                <div>
                    <button type="submit"
                        class="btn btn-primary w-full py-2 px-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold rounded-lg transition-all duration-300 ease-in-out hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-500/50">
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
        }
    ?>

    <script src="./js/mostrarContraseña.js"></script>

</body>

</html>
