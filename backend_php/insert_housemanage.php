<?php

/*
$_COOKIE["name"] . " " . $_COOKIE["lastname"];
$_COOKIE["member_login"]
$_COOKIE["member_password"]

*/
session_Start();


require_once "db_config.php";



if(isset($_POST['insertHouseManage'])){
    $select_user_and_pass = "SELECT * from person where email = :email1";
    
    $login_query = $conn -> prepare($select_user_and_pass);
    $login_query -> bindValue(':email1',$_COOKIE["member_login"]);
    $login_query -> execute();

    $name = $_POST["inputHouseManageName"];
    $desc = $_POST["inputHouseManageDescription"];

    if($login_query -> rowCount() ==1){
        if($row = $login_query->fetch()){
            
            $create_housemanage_query = "INSERT INTO house_manage(Name, Description, Date) VALUES
            ('" . $name . "','" . $desc . "', NOW())";
            var_dump($create_housemanage_query);
            echo "<br><br>";
            $query = $conn -> prepare($create_housemanage_query);
            $query -> execute();
            $lastInsertID = $conn -> lastInsertID();

            if($lastInsertID > 0){
                $alter_person = "update person set id_house_manage=:parameterneve WHERE ID=:id";
                $query = $conn -> prepare($alter_person);
                $query->bindValue(':parameterneve',$lastInsertID);
                $query->bindValue(':id',$row["ID"]);
                if($query -> execute()){
                    header('Location: ../utilities-expanses-insert.php');
                }
                else
                     echo "Nem sikerult az elso adatbevitel";
                
            }
            else{
                echo "Nem sikerult a masodik adatbevitel";
                
                
            }
            
        }
    }
}


?>