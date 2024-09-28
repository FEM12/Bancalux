<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/login.css">

    <title>Login - Cliente</title>

</head>

<body>

    <main>

        <form action="../Controlador/login2.php" method="post">

            <div class="container">

                <div class="form"> <h1>LOGIN</h1> </div>

                <i class='bx bxs-user'></i>

                <span class="user">
                    <input type="text" name="usuario" id="usuario" placeholder="Usuario" autocomplete="off">
                    <i class='bx bxs-user'></i>
                </span>

                <span class="password">
                    <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" autocomplete="off">
                    <i class='bx bxs-lock' id="view"></i>
                </span>

                <input type="submit" value="Iniciar de sesión"> <br> <br>

            </div>

        </form>
       
    </main>

    <?php

        if(isset($_GET['opcion'])) {

            echo '<div class="alert alert-danger" role="alert">
            Error: Credenciales incorrectas.
            </div>';
            
        };

    ?>

    <script src="./js/mostrarContraseña.js"></script>

</body>
</html>