<?php

    // Conexión a la base de datos
    $host = 'localhost';
    $dbname = 'catedra';
    $username = 'root';
    $password = '';

    try { $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); }
    catch(PDOException $e) { die( $e->getMessage() ."<br>" . "No se ha podido conectar a la base de datos: "); }

?>