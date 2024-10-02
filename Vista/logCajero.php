<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Importa Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Boxicons para los íconos -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Login - Cajero</title>

</head>

<body class="bg-slate-900 bg-fixed bg-cover min-h-screen flex items-center justify-center">

    <style>
    body {
        background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%),
            radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%),
            radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
    }

    html {
        scroll-behavior: smooth;
    }
    </style>
    <nav data-aos="fade-down" class="bg-slate-950 bg-opacity-0 fixed top-0 left-0 w-full z-10" id="navbar">
        <ul
            class="text-zinc-50 text-lg mx-auto flex flex-col md:flex-row items-center justify-between px-[8rem] md:gap-5 pt-3 md:py-3">

            <li class="flex flex-row items-center font-bold text-2xl">

                <!-- Logo Bancalux -->
                <div class="relative inline-block w-[2.5rem] h-[2.5rem] mr-2">
                    <!-- Ícono de banca (fondo) -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="absolute inset-0 text-zinc-200 opacity-40 w-full h-full" viewBox="0 0 16 16">
                        <path
                            d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.5.5 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72z" />
                    </svg>

                    <!-- Ícono de dólar (superpuesto) -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="absolute inset-0 bottom-4 m-auto w-[1.2rem] h-[1.2rem] text-white" viewBox="0 0 16 16">
                        <path
                            d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z" />
                    </svg>
                </div>

                | Bancalux
            </li>

        </ul>
    </nav>


    <main class="w-full max-w-xs mx-auto bg-black/30 backdrop-blur-lg p-8 rounded-lg shadow-lg relative">



        <form action="../Controlador/logCaj2.php" method="post">

            <div class="mb-6 text-center">
                <h1 class="text-2xl font-bold text-white">Ingresa a nuestro servicio</h1>
                <!-- Agregar el logo debajo de la palabra LOGIN -->
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSO1ClEZtzoSAwXwgbE3iplkg-cZ1zWTnHw0os8S8rlSE9NrDrwc37J0cCOh2Ofzi3j1PI&usqp=CAU"
                    alt="Logo" class="mx-auto mt-4 w-20 h-20"> <!-- Ajusta la ruta y tamaño según tu necesidad -->
            </div>


            <!-- Input para el usuario -->
            <div class="relative mb-6">
                <i class='bx bxs-user absolute left-3 top-2.5 text-gray-500'></i>
                <input type="text" name="usu" id="usu" placeholder="Usuario" autocomplete="off"
                    class="w-full pl-10 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Input para la contraseña -->
            <div class="relative mb-6">
                <i class='bx bxs-lock absolute left-3 top-2.5 text-gray-500'></i>
                <input type="password" name="contra" id="contra" placeholder="Contraseña" autocomplete="off"
                    class="w-full pl-10 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <i class='bx bxs-lock-alt absolute right-3 top-2.5 text-gray-500' id="view"></i>
            </div>

            <!-- Botón de inicio de sesión -->
            <input type="submit" value="Iniciar sesión"
                class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition duration-300 cursor-pointer">

        </form>

        <!-- Mensaje de error (si las credenciales son incorrectas) -->
        <?php
        if (isset($_GET['opcion'])) {
            echo '<div class="mt-6 text-center text-red-500">
            Error: Credenciales incorrectas.
            </div>';
        }
        ?>

    </main>

    <script src="./js/mostrarContraseña.js"></script>

</body>

</html>