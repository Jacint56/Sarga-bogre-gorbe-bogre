<?php

session_Start();
require_once "db_config.php";

if(isset($_POST['insertExpense'])){
    $select_user_and_pass = "SELECT * from person where email = :email1";
    
    $login_query = $conn -> prepare($select_user_and_pass);
    $login_query -> bindValue(':email1',$_COOKIE["member_login"]);
    $login_query -> execute();


    if($login_query -> rowCount() ==1){
        if($row = $login_query->fetch()){

            $create_expenses_query = "INSERT INTO expenses(id_person, id_expenses_category, details, date,Price, id_house_manage)
            VALUES (:id,:id_expenses,:details,NOW(),:price,:id_house_manage)";
            $query = $conn -> prepare($create_expenses_query);
            $query->bindValue('id', $row["ID"]);
            if(empty($_POST["selectExpenseCategory"])){
                $query->bindValue('id_expenses',$_POST["inputExpenseCategory"]);
            }
            else{
                $query->bindValue('id_expenses',$_POST["selectExpenseCategory"]);
            }
            
            $query->bindValue('details', $_POST["inputExpenseDetails"]);
            $query->bindValue('price', $_POST["inputExpensePrice"]);
            $query->bindValue('id_house_manage', $row["id_house_manage"]);

            if($query->execute()){
                setcookie("data", "Sikeres adatbevitel!", time() + (86400 * 30), "/");
                header('Location: ../utilities-expanses-insert.php');
            }
            else{
                setcookie("data", "Sikertelen adatbevitel!", time() + (86400 * 30), "/");
                header('Location: ../utilities-expanses-insert.php');
            }
        }   
        else{
            setcookie("data", "Something went wrong!", time() + (86400 * 30), "/");
            header('Location: ../utilities-expanses-insert.php');
        }
    }
    else{
        setcookie("data", "Something went wrong!", time() + (86400 * 30), "/");
        header('Location: ../Registered-user/utilities-expanses-insert.php');
    }
}
else if(isset($_POST['insertWish'])){/*
    $select_user_and_pass = "SELECT * from person where email = :email1";
    
    $login_query = $conn -> prepare($select_user_and_pass);
    $login_query -> bindValue(':email1',$_COOKIE["member_login"]);
    $login_query -> execute();

    if($login_query -> rowCount() ==1){
        if($row = $login_query->fetch()){

            $create_expenses_query = "INSERT INTO wish(id_person, wish_name, wish_category, Price, date)
            VALUES (:id,:name,:category,:price,NOW())";
            $query = $conn -> prepare($create_expenses_query);
            $query->bindValue('id', $row["ID"]);
            $query->bindValue('id_expenses', $_POST["selectExpenseCategory"]);
            $query->bindValue('details', $_POST["inputExpenseDetails"]);
            $query->bindValue('price', $_POST["inputExpensePrice"]);
            $query->bindValue('id_house_manage', $row["id_house_manage"]);

        }   
    
    }*/
}


/*

*/
?>