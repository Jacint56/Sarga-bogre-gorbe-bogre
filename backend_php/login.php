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
    $select_user_and_pass = "SELECT * from person where email = :email1";
    $login_query = $conn -> prepare($select_user_and_pass);
    $login_query -> bindValue(':email1',$email);
    $login_query -> execute();
    
    if($login_query -> rowCount() ==1){
        if($row = $login_query->fetch()){
            if(password_verify($password, $row['pass'])){
                setcookie("member_login", $email, time() + (86400 * 30), "/");
                setcookie("member_password", $password, time() + (86400 * 30), "/");
                setcookie("name", $row["name"], time() + (86400 * 30), "/");
                setcookie("lastname", $row["lname"], time() + (86400 * 30), "/");
               // session_set_cookie_params("member_login", $email, time()+3600,'/');
                //session_set_cookie_params("member_password", $password, time()+3600,'/');
/*
                var_dump( $row['ID'] );
                echo "<br>";
                var_dump($_SERVER["REMOTE_ADDR"]);
                echo "<br>";
                var_dump($_SERVER["HTTP_USER_AGENT"]);
*/
                $insert_into_login = "INSERT INTO login(LoginID,IP, Browser,Time) VALUES ("
                . strval($row['ID']) .
                ","
                .strval($_SERVER["REMOTE_ADDR"]) .
                " ,"
                . strval($_SERVER["HTTP_USER_AGENT"]) . 
                " ,NOW())";

                $insert_into_query = $conn-> prepare($insert_into_login);
                $insert_into_query -> execute();
                $lastInsertID = $conn -> lastInsertID();

                if($lastInsertID > 0){
                    $success_message = "Sikeres adatbevitel";
                    //header('Location: ../login.html');
                }
                else{
                    $success_message = "Nem sikerult az adatbevitel";
                    
                }
                //header('Location: ../index.php');
            }
            else{
                goto a;
            }
        }
    }
    else{
        a:
        header("Location: ../login.php");
    }
}


?>