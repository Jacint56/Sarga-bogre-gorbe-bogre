<?php

session_Start();
require_once "db_config.php";

if(isset($_POST['insertExpense'])){
    $select_user_and_pass = "SELECT * from person where email = :email1";
    
    $login_query = $conn -> prepare($select_user_and_pass);
    $login_query -> bindValue(':email1',$_SESSION["member_login"]);
    $login_query -> execute();


    if($login_query -> rowCount() ==1){
        if($row = $login_query->fetch()){

            $create_expenses_query = "INSERT INTO expenses(id_person, id_expenses_category, details, date,Price, id_house_manage)
            VALUES (:id,:id_expenses,:details,NOW(),:price,:id_house_manage)";
            $query = $conn -> prepare($create_expenses_query);
            $query->bindValue('id', $row["ID"]);
            if($_POST["selectExpenseCategory"] == NULL){
                $createNewExpenseCategory = "INSERT into expense_category(expenses_category_name) values (:newCategory)";
                $query2 = $conn -> prepare($createNewExpenseCategory);
                $query2->bindValue(':newCategory',$_POST["inputExpenseCategory"]);
                $query2 ->execute();
                $query->bindValue(':id_expenses',$conn -> lastInsertID());

                
            }
            else{
                $query->bindValue('id_expenses',$_POST["selectExpenseCategory"]);
                
                $update_expense_budget = "UPDATE expense_budget SET keret = keret - :keret WHERE ID_house_manage = :idHouse AND expense_category_id = :expense_cat_ID";
                $query2 = $conn -> prepare($update_expense_budget);
                $query2->bindValue(":keret", $_POST["inputExpensePrice"]);
                $query2->bindValue(":idHouse", $row["id_house_manage"]);
                $query2->bindValue(":expense_cat_ID", $_POST["selectExpenseCategory"]);
                $query2->execute();
            }
            
            $query->bindValue('details', $_POST["inputExpenseDetails"]);
            $query->bindValue('price', $_POST["inputExpensePrice"]);
            $query->bindValue('id_house_manage', $row["id_house_manage"]);

            if($query->execute()){
                header('Location: ../Registered-user/utilities-expanses-insert.php?insert=true');
            }
            else{
                header('Location: ../Registered-user/utilities-expanses-insert.php?insert=false');
            }
        }   
        else{
            header('Location: ../Registered-user/utilities-expanses-insert.php?insert=false');
        }
    }
    else{
        header('Location: ../Registered-user/utilities-expanses-insert.php?insert=false');
    }
}
else if(isset($_POST['insertWish'])){
    $select_user_and_pass = "SELECT * from person where email = :email1";
    
    $login_query = $conn -> prepare($select_user_and_pass);
    $login_query -> bindValue(':email1',$_SESSION["member_login"]);
    $login_query -> execute();

    if($login_query -> rowCount() ==1){
        if($row = $login_query->fetch()){

            $create_expenses_query = "INSERT INTO wish(id_person, wish_name, wish_category, Price, date, id_house_manage)
            VALUES (:id,:name,:category,:price,NOW(),:houseid)";
            $query = $conn -> prepare($create_expenses_query);
            $query->bindValue('id', $row["ID"]);
            
            if($_POST["selectWishCategory"] == NULL){
                $query->bindValue('category',$_POST["inputWishCategory"]);
            }
            else{
                $query->bindValue('category',$_POST["selectWishCategory"]);
            }
            $query->bindValue('name', $_POST["inputWishName"]);
            $query->bindValue('price', $_POST["inputWishPrice"]);
            $query->bindValue('houseid', $row["id_house_manage"]);

            if($query->execute()){
                header('Location: ../Registered-user/utilities-expanses-insert.php?insert=true');
            }
            else{
                header('Location: ../Registered-user/utilities-expanses-insert.php?insert=false');
            }
        }   
        else{
            header('Location: ../Registered-user/utilities-expanses-insert.php?insert=false');
        }   
    }
    else{
        header('Location: ../Registered-user/utilities-expanses-insert.php?insert=false');
    }
}


/*

*/
?>