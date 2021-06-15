<?php

session_start();


require_once "db_config.php";



if(isset($_POST['insertHouseManage'])){
    $select_user_and_pass = "SELECT * from person where email = :email1";
    
    $login_query = $conn -> prepare($select_user_and_pass);
    $login_query -> bindValue(':email1',$_SESSION["member_login"]);
    $login_query -> execute();

    $name = $_POST["inputHouseManageName"];
    $desc = $_POST["inputHouseManageDescription"];

    if($login_query -> rowCount() ==1){
        if($row = $login_query->fetch()){
            if($row["id_house_manage"] == 0){
            $create_housemanage_query = "INSERT INTO house_manage(Name, Description, Date) VALUES
            ('" . $name . "','" . $desc . "', NOW())";
            
            $query = $conn -> prepare($create_housemanage_query);
            $query -> execute();
            $lastInsertID = $conn -> lastInsertID();

                if($lastInsertID > 0){
                    $alter_person = "update person set id_house_manage=:parameterneve WHERE ID=:id";
                    $query = $conn -> prepare($alter_person);
                    $query->bindValue(':parameterneve',$lastInsertID);
                    $query->bindValue(':id',$row["ID"]);
                    if($query -> execute() && $row['rank'] == 3 ){
                        header('Location: ../Admin/utilities-expanses-insert.php');
                    }
                    else if($query -> execute() && $row['rank'] == 2){
                        header('Location: ../Registered-user/utilities-expanses-insert.php');
                    }
                    else if($query -> execute()){
                        header('Location: ../Registered-user/utilities-expanses-insert.php');
                    }
                    else
                        echo "Nem sikerult a hozzaadnunk a sajat haztartasahoz!";
                    
                }
                else{
                    echo "Nem sikerult letrehoznunk a haztartasat!";
                    
                    
                }
            }
            else{
                echo "Mar van haztartasa, kerem jelentkezzen az adminnal hogy torolje azt vagy pedig hogy kileptesse jelenlegi haztartasabol es utana probalja ujra!";
            }
        }
    }
}


?>