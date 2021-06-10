<?php

session_start();

require_once "db_config.php";


if(isset($_POST['button'])){
    $email = $_POST['InputEmail'];
    $password = $_POST['InputPassword'];
    
    $select_user_and_pass = "SELECT * from person where email = :email1";
    $login_query = $conn -> prepare($select_user_and_pass);
    $login_query -> bindValue(':email1',$email);
    $login_query -> execute();
    
    if($login_query -> rowCount() ==1){
        if($row = $login_query->fetch()){
            
            if(password_verify($password, $row['pass'])){
                
                $_SESSION["member_login"] = $email;
                $_SESSION["member_password"] = $password;
                $_SESSION["name"] = $row["name"];
                $_SESSION["lastname"] = $row["lname"];

                if(isset($_GET["housemanage"])){
                    $update_query = "UPDATE person SET id_house_manage WHERE email = :email";
                    $updatequery = $conn -> prepare($update_query);
                    $updatequery -> bindValue(':email1',$email);
                    $updatequery -> execute();
                }
                


               	$insert_into_login = "INSERT INTO login(LoginID,IP, Browser,Time) VALUES ("
                . strval($row['ID']) .
                ",'"
                . strval($_SERVER["REMOTE_ADDR"]) .
                "' ,'"
                . strval($_SERVER["HTTP_USER_AGENT"]) . 
                "' ,NOW())";
            	
                $insert_into_query = $conn-> prepare($insert_into_login);
                $insert_into_query -> execute();
                $lastInsertID = $conn -> lastInsertID();

                if($lastInsertID > 0){
                    if($row['rank'] == 1 || $row['rank'] == 3){
                        header('Location: ../Admin/index.php');
                    }
                    else {
                        goto a;
                    }
                }
                else{
                    echo "Nem sikerult az adatbevitel";
                    
                }

            	
            }
            else{
                a:
                header('Location: ../Registered-user/index.php');
            }
        }
    }
    
}


?>