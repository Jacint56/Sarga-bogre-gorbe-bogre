<?php

//Session START
session_Start();

//DB config & establish connection
require_once "db_config.php";


//user data
if(isset($_POST['button'])){
    $email = $_POST['InputEmail'];
    $password = $_POST['InputPassword'];
    //check if the user exists with the given username & password
    $select_user_and_pass = "SELECT pass from person where email = :email1";
    $login_query = $conn -> prepare($select_user_and_pass);
    $login_query -> bindValue(':email1',$email);
    $login_query -> execute();
    
    if($login_query -> rowCount() ==1){
        if($row = $login_query->fetch()){
            if(password_verify($password, $row['pass'])){
                header('Location: ../index.html');
            }
            else{
                goto a;
            }
        }
    }
    else{
        a:
        echo "szopas";
      //  header('Location: ../index.html');
    }
}


?>