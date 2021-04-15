<?php

if(isset($_POST['RegisterSubmit'])){
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $email = $_POST['InputEmail'];
    $address = $_POST['InputAddress'];
    $phone = $_POST['InputPhone'];
    $pass = $_POST['InputPassword'];
    $md5_pass = md5($pass);
    $repeat_pass = $_POST['RepeatPassword'];
    $error = $success_message = NULL;

    //user match
    $user_match = $conn -> prepare("SELECT Email from person where (Email = :user_email)");
    $user_match -> execute(array(':user_email' => $email));
    while($row = $user_match -> fetch(PDO::FETCH_ASSOC)){
        $user_name = $row['Email'];

    
    }
    if(empty($fname)){
        $error = "Írja be a keresztnevét!";
    }
    else if(empty($lname)){
        $error = "Írja be a keresztnevét!"
    }
    else if(empty($email)){
        $error = "Írjon be létező e-mail címet!"
    }
    else if(!preg_match("[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$email)){
        $error = "Írjon be létező e-mail címet!"
    }
    else if(empty($phone)){
        $error = "Írja be a telefonszámát!";
    }
    else if($user_name == $email){
        $error = "Ezzel az e-mail címmel, már regisztráltak!";
    }
    else if($pass == "" || $repeat_pass == "" ){
        $error = "Írja be a használni kívánt jelszavát!";
    }
    else if($_POST['InputPassword'] != $_POST['RepeatPassword']){
        $error = "A két jelszó nem egyezik! Kérem ellenőrizze le!";
    }
    else if(preg_match('(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/',$pass)){
        $error = "Ez a jelszó nem használható, írjon be újat!";
    }
    else{
        $sql_insert_registration = "INSERT INTO person ('Name', Lname,Phone, 'Address', Pass, Email, 'hash', verifation, Rank)
        values (:fname1, :lname1, :phone1,:address1,:pass1,:email1,:hash1,:verification1,:rank1)";
        $query = $conn -> prepare($sql_insert_registration);
        $query->bindValue(':fname1',$fname);
        $query->bindValue(':lname1',$lname);
        $query->bindValue(':phone1',$phone);
        $query->bindValue(':address1',$address);
        $query->bindValue(':pass1',$md5_pass);
        $query->bindValue(':email1',$email);
        //$query->bindValue(':hash1',); EZ MAJD KIDERUL
        //$query->bindValue(':verification1',$fname); NEM TUDOM A DEFAULT hogy viselkedig
        //$query->bindValue(':rank1',$fname); NEM TUDOM A DEFAULT hogy viselkedig
        $query -> execute();
        $lastInsertID = $conn -> $lastInsertID();
        if($lastInsertID > 0){
            $success_message = "Sikeres adatbevitel";

        }
        else{
            $success_message = "Nem sikerult az adatbevitel";
            
        }
    }
}

?>