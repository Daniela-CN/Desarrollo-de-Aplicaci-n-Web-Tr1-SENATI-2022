<?php 
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }

include_once('connection/db_conn.php');

if(isset($_POST['sesion'])){

    $email= $_POST['email'];
    
    $password = $_POST['password'];

    $query = mysqli_query($conn,"SELECT * FROM users WHERE email= '$email' AND password ='$password' ");

    $nfila = mysqli_num_rows($query);
    
    $fila = $query-> fetch_array();

    if($nfila > 0){

        $_SESSION['user_id'] = $fila['id'];
        header("Location: main.php");
        

    }else{

        header("Location: error.php");

    }
}
?>