<?php

  $con = mysqli_connect("localhost", "sbgb", "MI9wi3nxwd0qZXa", "sbgb");
  
  require 'PHPMailer/PHPMailerAutoload.php';

  $email_sent = false;
  $mail = new PHPMailer;
  $mail->IsSMTP(); // telling the class to use SMTP
  $mail->SMTPAuth = true; // enable SMTP authentication
  $mail->SMTPSecure = "tls"; // sets the prefix to the servier
  $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
  $mail->Port = 587; // set the SMTP port for the GMAIL server
  $mail->Username = "housekiper2021@gmail.com"; // GMAIL username
  $mail->Password = "abafurupolf"; // GMAIL password



  if(isset($_GET["email"])) {
    ini_set("SMTP","ssl://smtp.gmail.com");
    
    ini_set("smtp_port","587");

    $link = "http://localhost:8080/sarga-bogre-gorbe-bogre/loginescsatlakozas.php?housemanage=" . $_GET["haztartas"];


      $message = $_GET["name"]." meghivott, hogy csatlakozz a haztartasahoz,
       amennyiben szeretnel csatlakozni, kattints a linkre es jelentkezz be vagy pedig regisztralj ha nem vagy meg tag!.\n
Csatlakozas: " .$link;

    $mail->AddAddress($_GET["email"], "You");
    $mail->SetFrom("jacint9876543210@gmail.com", 'Cost');
    $mail->Subject = "Csatlakozas a haztartashoz!";
    $mail->Body = $message;
    if($mail->Send()){
        $email_sent = true;
  }
  }
if($email_sent){
    echo "Email sending was successful!";
}
else{
    echo "Email sending was failed!";
}

?>