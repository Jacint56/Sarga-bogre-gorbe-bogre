<?php/*
$_COOKIE["name"] . " " . $_COOKIE["lastname"];
$_COOKIE["member_login"]
$_COOKIE["member_password"]

*/
session_Start();


require_once "db_config.php";
if(isset($_POST['insertHouseManage'])){
    $select_user_and_pass = "SELECT * from person where email = :email1";
    $login_query -> bindValue(':email1',$_COOKIE["member_login"]);
    $login_query -> execute();
    $name = $_POST["inputHouseManageName"];
    $desc = $_POST["inputHouseManageDescription"];

    if($login_query -> rowCount() ==1){
        if($row = $login_query->fetch()){
            
            $create_housemanage_query = "INSERT INTO house_manage(Name, Description, Date) VALUES
            ('" . $name . "','" . $desc . "', NOW()";
            $query = $conn -> prepare($create_housemanage_query);
            $query -> execute();
            $lastInsertID = $conn -> lastInsertID();

            if($lastInsertID > 0){
                $alter_person = "update person set id_house_manage=:parameterneve WHERE ID=:id";
                $query = $conn -> prepare($alter_person);
                $query->bindValue(':parameterneve',$lastInsertID);
                $query->bindValue(':id',$row["ID"]);
                $query -> execute();
                $lastInsertID = $conn ->lastInsertID();
                if($lastInsertID>0){
                    header('Location: utilities-expanses-insert.php');
                }
                else
                     echo "Nem sikerult az adatbevitel";
                
            }
            else{
                echo "Nem sikerult az adatbevitel";
                
                
            }
            
        }
    }
}


?>