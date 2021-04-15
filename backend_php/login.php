<?php

//Session START
session_Start();

//DB config & establish connection
require_once('db_config.php');


//user data
if(isset($_POST['login'])){
    $email = $_POST['InputEmail'];
    $password = md5($_POST['InputPassword']);

    //check if the user exists with the given username & password
    $select_user_and_pass = "SELECT Email, Pass from person where Email = :email1 and Pass = :pass1";
    
    $login_query = $conn -> prepare($select_user_and_pass);
    $login_query = bindValue(':email1',$email);
    $login_query = bindValue(':pass1',$password);
    $login_query -> execute();
    $results = $login_query -> fetchAll(PDO::FETCH_OBJ);
    if($login_query -> rowCount() >0){
        $_SESSION['InputEmail'] = $_POST['InputEmail'];
        echo "<script> document.loaction = 'welcome.html'; </script>";

    }
    else{
        $error = "Invalid details!";
    }
    
    
}

?>