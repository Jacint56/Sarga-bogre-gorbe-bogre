<?php

session_Start();

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
                setcookie("member_login", $email, time() + (86400 * 30), "/");
                setcookie("member_password", $password, time() + (86400 * 30), "/");
                setcookie("name", $row["name"], time() + (86400 * 30), "/");
                setcookie("lastname", $row["lname"], time() + (86400 * 30), "/");
               	//session_set_cookie_params("member_login", $email, time()+3600,'/');
                //session_set_cookie_params("member_password", $password, time()+3600,'/');


               	$insert_into_login = "INSERT INTO login(LoginID,IP, Browser,Time) VALUES ("
                . strval($row['ID']) .
                ",'"
                . strval($_SERVER["REMOTE_ADDR"]) .
                "' ,'"
                . strval($_SERVER["HTTP_USER_AGENT"]) . 
                "' ,NOW())";
            	echo "<br><br>";
				var_dump($insert_into_login);
                $insert_into_query = $conn-> prepare($insert_into_login);
                $insert_into_query -> execute();
                $lastInsertID = $conn -> lastInsertID();

                if($lastInsertID > 0){
                    header('Location: ../index.php');
                }
                else{
                    echo "Nem sikerult az adatbevitel";
                    
                }

            }
            else{
                echo "Something went wrong";
            }
        }
    }
    else{
        header("Location: login.html");
    }
}


?>