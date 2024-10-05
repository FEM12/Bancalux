<?php

    require_once "../Modelo/Conexion.php";
    require "../Controlador/transfe2.php";
    $usuario = $_SESSION['idCliente'];

    // Consulta para obtener las cuentas del cliente actual
    $stmt3= $db->prepare("SELECT numerocuenta, saldo FROM cuentabanc WHERE idCliente = $usuario");
    $stmt3->execute();
    $resultado = $stmt3->fetchAll(PDO::FETCH_ASSOC);

    // Consulta para obtener el saldo disponible correspondiente al número de cuenta seleccionado
    if (isset($_POST['numerocuenta'])) {

        $numerocuenta = $_POST['numerocuenta'];
        $stmt4= $db->prepare("SELECT saldo FROM cuentabanc WHERE idCliente = $usuario AND numerocuenta = :numerocuenta");
        $stmt4->bindValue(':numerocuenta', $numerocuenta);
        $stmt4->execute();
        $prueba4 = $stmt4->fetch(PDO::FETCH_ASSOC);
        $dato4 = $prueba4["saldo"];

    }else {

        // Si no se ha seleccionado ningún número de cuenta, se utiliza el saldo disponible de la primera cuenta en la lista
        $dato4 = $resultado[0]['saldo'];

    }

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Framework y Librerias -->
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <!-- AOS Animate on Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Retiros</title>

</head>


<body class="flex items-center justify-center min-h-screen">

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
    </style>

    <nav class="bg-slate-950 bg-opacity-0 fixed top-0 left-0 w-full z-10" id="navbar">
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

    <form action="../Controlador/transfe2.php" method="post">

        <main>

            <div
                class="container bg-white backdrop-blur-lg rounded-lg py-[3rem] px-6 flex flex-col items-center justify-center gap-4 w-[28rem] relative">

                <div class="form flex items-center justify-center">
                    <h1 class="text-black text-3xl font-bold">Transferencia</h1>
                </div>

                <?php 
                    if(isset($_GET['noex'])) {
                        echo '<div class="alert alert-danger" role="alert"> Error: La cuenta a transferir no existe </div>'; 
                    }; 

                    if(isset($_GET['nosal'])) { 
                        echo '<div class="alert alert-danger" role="alert"> Error: Debe ingresar un saldo mayor a 0 </div>'; 
                    }; 
                ?>


                <input type="text" name="nombre" id="nombre" value="<?php echo $dato ?>" readonly
                    class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm cursor-not-allowed">
                <input type="text" name="apellido" id="apellido" value="<?php echo $dato2?>" readonly
                    class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm cursor-not-allowed">
                <input type="text" name="correo" id="correo" value="<?php echo $dato3?>" readonly
                    class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm cursor-not-allowed">
                <input type="text" name="saldo" id="saldo" value="Saldo disponible: <?php echo $dato4?>" readonly
                    class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm cursor-not-allowed">
                <input type="number" name="monto" id="monto" value="Monto a retirar" min="1" max="500" required
                    class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm">

                <select name="numerocuenta" id="numerocuenta" onchange="actualizarSaldo()"
                    class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm cursor-pointer">
                    <option value="" disabled selected>Seleccione una cuenta</option>
                    <?php foreach ($resultado as $fila): ?>
                    <option value="<?php echo $fila['numerocuenta']; ?>"><?php echo $fila['numerocuenta']; ?></option>
                    <?php endforeach; ?>
                </select>

                <input type="number" name="cuentaEnv" id="cuentaEnv" placeholder="Cuenta a Enviar" required
                    class="w-4/5 p-4 rounded-md bg-gray-200 text-black text-sm">

                <input type="hidden" name="IdCliente" id="IdCliente" value="<?php echo $usuario ?>">
                <input type="hidden" name="transf" id="transf" value="Transferencia">

                <input type="submit" id="transfe" name="transfe" value="Transferir"
                class="mt-4 btn bg-cyan-700 border-cyan-900 hover:bg-cyan-800 hover:border-2 hover:border-cyan-900 text-white border border-2 border-cyan-900 px-5">
            </div>

        </main>

    </form>

    <script>
    function actualizarSaldo() {

        var numerocuenta = document.getElementById("numerocuenta").value;
        var saldoInput = document.getElementById("saldo");
        var saldo = 0;

        <?php foreach ($resultado as $fila): ?>

        if (numerocuenta == <?php echo $fila['numerocuenta']; ?>) {
            saldo = <?php echo json_encode($fila['saldo']); ?>;
        }

        <?php endforeach; ?>

        saldoInput.value = "Saldo disponible: " + saldo;

    }
    </script>
</body>

</html>