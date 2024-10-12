<?php

session_start();
$usuario = $_SESSION['idGer'];

if (!isset($usuario)) {
    header("location:../Vista/loginGerente.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Importar Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Boxicons para los íconos -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Cliente - Bancalux</title>
</head>

<body class="bg-slate-900 bg-fixed bg-cover min-h-screen flex flex-col items-center">

    <style>
        body {
            background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%),
                radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
        }
    </style>

    <nav class="bg-slate-950 bg-opacity-0 w-full p-4">
        <ul class="flex justify-between items-center text-zinc-50 text-lg">
            <li class="flex items-center font-bold text-2xl">
                <!-- Logo -->
                <div class="relative w-10 h-10 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute w-full h-full text-zinc-200 opacity-40" viewBox="0 0 16 16">
                        <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.5.5 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute inset-0 bottom-4 m-auto w-6 h-6 text-white" viewBox="0 0 16 16">
                        <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z" />
                    </svg>
                </div>
                Bancalux
            </li>
            <li>
                <a href="../Controlador/cerrarSesionGerente.php" class="text-blue-500">Cerrar Sesión</a>
            </li>
        </ul>
    </nav>

    <main class="w-full max-w-3xl mx-auto p-8 mt-10">
        <h2 class="text-3xl font-bold text-center text-white mb-6">Opciones disponibles</h2> <!-- Título centrado -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-black/30 backdrop-blur-lg p-6 rounded-lg shadow-lg text-center transition-transform duration-300 hover:scale-105">
                <img src="Recursos/Imagenes/cajero.png" alt="deposito" class="w-16 h-16 mx-auto mb-4">
                <h1 class="text-lg font-bold text-white">Registrar empleados</h1>
                <a href="registroEmpleado.php?id=<?php echo $usuario ?>" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-600">
                    Nuevo empleado
                </a>
            </div>

            <!-- Card 2 -->
            <div class="bg-black/30 backdrop-blur-lg p-6 rounded-lg shadow-lg text-center transition-transform duration-300 hover:scale-105">
                <img src="Recursos/Imagenes/cliente.png" alt="deposito" class="w-16 h-16 mx-auto mb-4">
                <h1 class="text-lg font-bold text-white">Administrar empleados</h1>
                <a href="administrarEmpleados.php?id=<?php echo $usuario ?>" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-600">
                    Administrar
                </a>
            </div>

            <!-- Card 3 -->
            <div class="bg-black/30 backdrop-blur-lg p-6 rounded-lg shadow-lg text-center transition-transform duration-300 hover:scale-105">
                <img src="Recursos/Imagenes/prestamo.png" alt="registro" class="w-16 h-16 mx-auto mb-4">
                <h1 class="text-lg font-bold text-white">Casos de prestamos</h1>
                <a href="resumenPrestamos.php?id=<?php echo $usuario ?>" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-600">
                    Ir a prestamos
                </a>
            </div>

        </div>

        <!-- Alertas -->
        <?php
        if (isset($_GET['success'])) {
            echo '<div class="mt-6 text-center text-green-500">Empleado registrado con exito</div>';
        }

        if (isset($_GET['retiro'])) {
            echo '<div class="mt-6 text-center text-green-500">Retiro realizado con exito</div>';
        }
        ?>
    </main>

</body>
</html>