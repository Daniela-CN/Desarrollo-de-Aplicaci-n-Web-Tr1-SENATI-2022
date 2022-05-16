<?php 
//valida la sesion
    session_start();

    include_once('connection/db_conn.php');



    if(isset($_SESSION['user_id'])){


        $sesion1 = $_SESSION['user_id'];

        $record = mysqli_query($conn,"SELECT id, name, email, password FROM users WHERE id =$sesion1");

        $results = mysqli_fetch_assoc($record);//retorna la fila con el nombre del campo de la bd

        $user = null;
        
        if(count($results)> 0){
            
            $user = $results;

        }
        
        
    }

?>