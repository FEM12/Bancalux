<?php
    require_once "../Modelo/Conexion.php"; 
    
    // Obtener el ID del préstamo y el estado enviado desde el formulario
    $id = $_POST['idPrestamo'];
    $estado = $_POST['estado'];

    // Actualizar el estado del préstamo en la base de datos
    $consulta = "UPDATE prestamos SET estado = :estado WHERE idPrestamo = :idPrestamo";
    $stmt = $db->prepare($consulta);
    $stmt->bindParam(":estado", $estado);
    $stmt->bindParam(":idPrestamo", $id);
    $stmt->execute();

    // Redireccionar de vuelta a la página de solicitudes de préstamos
    header("Location: ../Vista/Prestamos.php");
?>