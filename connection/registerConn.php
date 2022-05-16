<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

//incluir el archivo de conexión

include_once('connection/db_conn.php');

//verificar si el form ha sido enviado, insertar data de usuario dentro de la base de datos

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $dni = $_POST['dni'];
    $email= $_POST['email'];
    $password = $_POST['password'];

    //si el email existe, muestre error
    $email_result = mysqli_query($conn,"SELECT * FROM users  WHERE email='$email'");
    //si el dni existe, muestre error
    $dni_result = mysqli_query($conn,"SELECT * FROM users WHERE dni='$dni'");

    //muestre cuantas filas son consultadas

    $email_match = mysqli_num_rows($email_result);
    $dni_match2 = mysqli_num_rows($dni_result);

    //si el numero de filas retornadas son mas que 0; significa que el email ya existe
   
    if($email_match >0 && $dni_match2 >0){

        $val=1;
        $message ="El email:  $email  y el DNI:  $dni  ya están registrados";
    
        
    }else if($email_match >0){

        $val=1;
        $message ="El email:  $email  ya está registrado";
        
    }
    else if($dni_match2 >0){

        $val=1;
        $message ="el DNI:  $dni  ya está registrado";
        
        
    }
    else{

        //insertar la data dentro de la base de datos

        $result = mysqli_query($conn,"INSERT INTO users(name, dni, email, password) VALUES('$name','$dni','$email','$password')");

        //si la data ha sido insertada exitosamente

        if($result){
        
            header("Location: login.php");
            

        }
        else{

            echo "error de registro, intente nuevamente".mysqli_error($conn);
            header("Location: error.php");

        }

    }

}

?>