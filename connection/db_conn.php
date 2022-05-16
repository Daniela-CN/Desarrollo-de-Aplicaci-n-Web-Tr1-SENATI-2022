<?php

    $databaseHost = 'localhost';
    $databaseName = 'usuarios_tr1';
    $databaseUsername = 'root';
    $databasePassword = '';


    $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
    
    if(!$conn){
        echo '¡Error de conexion!';
    }



?>