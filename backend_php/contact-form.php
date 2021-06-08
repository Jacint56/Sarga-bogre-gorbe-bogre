<?php

if(isset($_POST['submitEmail'])){
    $name = trim($_POST['inputName']);
    $emailFrom = trim($_POST['InputEmail']);
    $subject = trim($_POST['inputSubject']);
    $message = trim($_POST['inputMessage']);


    //where to send the email from the user
    $mailSendTo = "sugeakos@gmail.com";
    $headers = "From: " . $emailFrom;
    $txt = "Email from: " . $name . ".\n\n". $message;
    mail($mailSendTo,$subject,$txt,$headers);
    if(isset($_COOKIE['member_login'])){
        header("Location: ../Registered-user/index.php?mailsent");
    }
    else{
        header("Location: ../Guest/index.php?mailsent");
    }
    

}

?>