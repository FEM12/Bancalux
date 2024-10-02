<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Registro - Cliente</title>

</head>

<style>
    body {
      background-image: radial-gradient(circle at 85% 32%, rgba(22, 78, 99, 0.2) 15%, transparent 35%),
      radial-gradient(circle at 27% 51%, rgba(22, 78, 99, 0.5) 1%, transparent 50%),
      radial-gradient(circle at 50% 50%, rgba(22, 78, 99, 0.1) 10%, transparent 50%);
    }
</style>

<body class="bg-slate-900 flex flex-col min-h-screen">

    <nav class="bg-slate-950 bg-opacity-0 w-full p-4">
        <ul class="flex justify-between items-center text-zinc-50 text-lg">
            <li class="flex items-center font-bold text-2xl">
                <div class="relative inline-block w-[2.5rem] h-[2.5rem] mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute inset-0 text-zinc-200 opacity-40 w-full h-full" viewBox="0 0 16 16">
                        <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.5.5 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute inset-0 bottom-4 m-auto w-[1.2rem] h-[1.2rem] text-white" viewBox="0 0 16 16">
                        <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                    </svg>
                </div>
                | Bancalux
            </li>
            <li>
                <a href="index.php" class="text-blue-500">Volver</a>
            </li>
        </ul>
    </nav>

    <main class="min-h-screen flex items-center justify-center">
        <div class="bg-black/30 backdrop-blur-lg p-8 rounded-lg shadow-lg w-full max-w-lg mx-auto">
            <form method="post" action="../Controlador/registro3.php">

                <div class="form mb-6">
                    <h1 class="text-3xl font-bold text-center text-white">REGISTRO</h1>
                </div>

                <?php
                if (isset($_GET['opcion'])) {
                    echo '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                            <strong>Error:</strong> No se permiten caracteres o números en Campo "Nombre", "Apellido"
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }

                if (isset($_GET['dui'])) {
                    echo '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                            <strong>Error:</strong> No se permiten letras o caracteres especiales en Campo "DUI"
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                ?>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre" required
                            class="w-full p-3 bg-gray-100 rounded-lg" />
                    </div>
                    <div>
                        <input type="text" id="apellido" name="apellido" placeholder="Apellido" required
                            class="w-full p-3 bg-gray-100 rounded-lg" />
                    </div>
                    <div>
                        <input type="text" id="usuario" name="usuario" placeholder="Usuario" required
                            class="w-full p-3 bg-gray-100 rounded-lg" />
                    </div>
                    <div>
                        <input type="email" id="correo" name="correo" placeholder="Correo Electrónico" required
                            class="w-full p-3 bg-gray-100 rounded-lg" />
                    </div>
                    <div>
                        <input type="text" id="contrasena" name="contrasena" value="<?php echo generar_identificador(); ?>" required
                            class="w-full p-3 bg-gray-100 rounded-lg" />
                    </div>
                    <div>
                        <input type="text" id="dui" name="dui" placeholder="DUI" required
                            class="w-full p-3 bg-gray-100 rounded-lg" />
                    </div>
                    <div>
                        <input type="text" id="identificador" name="identificador" value="<?php echo generar_identificador(); ?>" readonly
                            class="w-full p-3 bg-gray-100 rounded-lg" />
                    </div>
                    <div>
                        <select id="sucursal" name="sucursal" required class="w-full p-3 bg-gray-100 rounded-lg">
                            <option value="" disabled selected>Seleccione una sucursal</option>
                            <option value="Sucursal A">Sucursal A</option>
                            <option value="Sucursal B">Sucursal B</option>
                            <option value="Sucursal C">Sucursal C</option>
                        </select>
                    </div>
                </div>

                <input type="submit" value="Registrarse" id="Registrar" class="w-full p-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg cursor-pointer transition duration-300">

            </form>
        </div>
    </main>

    <script src="./js/mostrarContraseña.js"></script>

</body>

</html>

<?php
function generar_identificador() {
    $longitud = 6;
    $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $identificador = "";

    for ($i = 0; $i < $longitud; $i++) {
        $indice = rand(0, strlen($caracteres) - 1);
        $identificador .= $caracteres[$indice];
    }

    return $identificador;
}
?>
