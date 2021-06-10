<?php
require_once "db_config.php";

/*
function ekezettelenites($szo){
    $betuk = array("ő","ú","é","á","ű","ü","ó","ö","í");
    $Nbetuk = array("Ő","Ú","É","Á","Ű","Ü","Ó","Ö","Í");
    $letters = array("o","u","e","a","u","u","o","o","i");
    $Bletters = array("O","U","E","A","U","U","O","O","I");
    $chars = str_split($szo);
    $ujszo = "";
    foreach ($chars as $char) {
        $tru = true;
        if($char == $betuk[0]){
            $ujszo .= $letters[0];
            $tru = false;
        }
        if($char == $betuk[1]){
            $ujszo .= $letters[1];
            $tru = false;
        }
        if($char == $betuk[2]){
            $ujszo .= $letters[2];
            $tru = false;
        }
        if($char == $betuk[3]){
            $ujszo .= $letters[3];
            $tru = false;
        }
        if($char == $betuk[4]){
            $ujszo .= $letters[4];
            $tru = false;
        }
        if($char == $betuk[5]){
            $ujszo .= $letters[5];
            $tru = false;
        }
        if($char == $betuk[6]){
            $ujszo .= $letters[6];
            $tru = false;
        }
        if($char == $betuk[7]){
            $ujszo .= $letters[7];
            $tru = false;
        }
        if($char == $betuk[8]){
            $ujszo .= $letters[8];
            $tru = false;
        }
        if($char == $Nbetuk[0]){
            $ujszo .= $Bletters[0];
            $tru = false;
        }
        if($char == $Nbetuk[1]){
            $ujszo .= $Bletters[1];
            $tru = false;
        }
        if($char == $Nbetuk[8]){
            $ujszo .= $Bletters[8];
            $tru = false;
        }
        if($char == $Nbetuk[2]){
            $ujszo .= $Bletters[2];
            $tru = false;
        }
        if($char == $Nbetuk[3]){
            $ujszo .= $Bletters[3];
            $tru = false;
        }
        if($char == $Nbetuk[4]){
            $ujszo .= $Bletters[4];
            $tru = false;
        }
        if($char == $Nbetuk[5]){
            $ujszo .= $Bletters[5];
            $tru = false;
        }
        if($char == $Nbetuk[6]){
            $ujszo .= $Bletters[6];
            $tru = false;
        }
        if($char == $Nbetuk[7]){
            $ujszo .= $Bletters[7];
            $tru = false;
        }
        if($tru){
            $ujszo .= $char;
        }
    }
    return $ujszo;
}*/

if(isset($_POST['button'])){
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $email = $_POST['InputEmail'];
    $splitted_email = explode("@", $email);
    $address = $_POST['InputAddress'];
    $phone = $_POST['InputPhone'];
    $pass = $_POST['InputPassword'];
    $md5_pass = password_hash($pass, PASSWORD_DEFAULT);
    $repeat_pass = $_POST['RepeatPassword'];
    $error = $success_message = NULL;
    $user_email = "";
    //user match
    $user_match = $conn -> prepare("SELECT Email from person where Email = :user_email");
    $user_match -> execute(array(':user_email' => $email));
    while($row = $user_match -> fetch(PDO::FETCH_ASSOC)){
        $user_email = $row['Email'];

    
    }
    if(empty($fname)||empty($lname)){
        $success_message = "Írja be a keresztnevét!";
    }
    else if(empty($email)){
        $success_message = "Írjon be létező e-mail címet!";
    }
    else if(!preg_match("/^[.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email)){
        $success_message = "Írjon be létező e-mail címet!";
    }
    else if(empty($phone)){
        $success_message = "Írja be a telefonszámát!";
    }
    else if($user_email == $email){
        $success_message = "Ezzel az e-mail címmel, már regisztráltak!";
    }
    else if($pass == "" || $repeat_pass == "" ){
        $success_message = "Írja be a használni kívánt jelszavát!";
    }
    else if($_POST['InputPassword'] != $_POST['RepeatPassword']){
        $success_message = "A két jelszó nem egyezik! Kérem ellenőrizze le!";
    }
    else if (preg_match('/(?=^.{6,}$)((?=.\d)|(?=.\W+))(?![.\n])(?=.[A-Z])(?=.[a-z]).*$/',$pass)){
        $success_message = "Ez a jelszó nem használható, írjon be újat!";
    }
    else{
        $sql_insert_registration = "INSERT INTO person (name, lname,phone, address, pass, email, verification, rank, id_house_manage)
        values (:fname1, :lname1, :phone1,:address1,:pass1,:email1, NULL, 0,:id_house)";
        $query = $conn -> prepare($sql_insert_registration);
        if(isset($_GET["housemanage"])){
            $query -> bindValue(':id_house',$_GET["housemanage"]);
        }
        else{
            $query -> bindValue(':id_house',0);
        }
        
        
        $query->bindValue(':fname1',$fname);
        $query->bindValue(':lname1',$lname);
        $query->bindValue(':phone1',$phone);
        $query->bindValue(':address1',$address);
        $query->bindValue(':pass1',$md5_pass);
        $query->bindValue(':email1',$email);
        
        $query -> execute();
        $lastInsertID = $conn -> lastInsertID();
        if($lastInsertID > 0){
            $success_message = "Sikeres adatbevitel";
            header('Location: ../login.html');
        }
        else{
            $success_message = "Nem sikerult az adatbevitel";
            
        }
    }
    echo $success_message;
}

?>