<?php

    session_start();

    // Conexión a la base de datos
    require "../Modelo/Conexion.php";

    // Comprobación de nombre de usuario y contraseña
    if(isset($_POST['usu']) && isset($_POST['contra'])) {

        $username = $_POST['usu'];
        $password = $_POST['contra'];
       
        $query = "SELECT idEmpleado FROM empleado WHERE usuario = :username AND contrasena = :password";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($result) {

            $_SESSION['idEmpleado'] = $result['idEmpleado'];
            header("Location: ../Vista/indexCaj.php");
            exit;
            
        } 
        else { 

            header("Location: ../Vista/logCajero.php?opcion=error:''"); 

        }
        
    }

?>
