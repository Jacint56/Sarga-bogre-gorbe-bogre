<?php

session_Start();
require_once "db_config.php";
if(isset($_POST['changeFirstName'])){
    $update_name = "UPDATE person SET name=:name where email=:email";
    $query = $conn ->prepare($update_name);
    $query->bindValue(":name",$_POST["changeFirstName"]);
    $query->bindValue(":email",$_SESSION["member_login"]);
    $query -> execute();
}
if(isset($_POST['changeLastName'])){
    $update_name = "UPDATE person SET lname=:name where email=:email";
    $query = $conn ->prepare($update_name);
    $query->bindValue(":name",$_POST["changeLastName"]);
    $query->bindValue(":email",$_SESSION["member_login"]);
    $query -> execute();
}
if(isset($_POST['changePhone'])){
    $update_phone = "UPDATE person SET phone=:phone where email=:email";
    $query = $conn ->prepare($update_phone);
    $query->bindValue(":phone",$_POST["changePhone"]);
    $query->bindValue(":email",$_SESSION["member_login"]);
    $query -> execute();
}
if(isset($_POST['changeAddress'])){
    $update_address = "UPDATE person SET address=:address where email=:email";
    $query = $conn ->prepare($update_phone);
    $query->bindValue(":address",$_POST["changeAddress"]);
    $query->bindValue(":email",$_SESSION["member_login"]);
    $query -> execute();
}
if(isset($_POST['changePass'])){
    var_dump($_POST['changePass']);
    var_dump($_POST["changePassConfirm"]);
    exit();
    if($_POST['changePass']===$_POST["changePassConfirm"]){
        $update_address = "UPDATE person SET pass=:pass where email=:email";
        $query = $conn ->prepare($update_address);
        $query->bindValue(":pass",password_hash($_POST["changePass"], PASSWORD_DEFAULT));
        $query->bindValue(":email",$_SESSION["member_login"]);
        $query -> execute();
    }
}
if(isset($_POST['change_house_manage'])){
    $update_address = "UPDATE house_manage INNER JOIN person ON house_manage.ID = person.id_house_manage SET house_manage.Name=:name where person.email=:email";
    $query = $conn ->prepare($update_address);
    $query->bindValue(":name",$_POST['change_house_manage']);
    $query->bindValue(":email",$_SESSION["member_login"]);
    $query -> execute();
}
