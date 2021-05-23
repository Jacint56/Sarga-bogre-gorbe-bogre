<?php

  $con = mysqli_connect("localhost", "root", "", "cost");
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

  $email_sent = false;
  $mail = new PHPMailer;
  $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );
  $mail->IsSMTP(); // telling the class to use SMTP
  $mail->SMTPAuth = true; // enable SMTP authentication
  $mail->SMTPSecure = "tls"; // sets the prefix to the servier
  $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
  $mail->Port = 587; // set the SMTP port for the GMAIL server
  $mail->Username = "housekiper2021@gmail.com"; // GMAIL username
  $mail->Password = "abafurupolf"; // GMAIL password



  if(isset($_POST["sendemail"])) {
    ini_set("SMTP","ssl://smtp.gmail.com");
    
    ini_set("smtp_port","587");
    $email = mysqli_real_escape_string($con, $_POST['email']);
    
    $emailquery = "SELECT * FROM person WHERE email = '$email' ";
    $uniq_id = uniqid();
    $token_query = "UPDATE person SET pass = '$uniq_id' WHERE email = '$email' ";

    $query = mysqli_query($con, $emailquery);
    $query2 = mysqli_query($con, $token_query);

    $emailcount = mysqli_num_rows($query);
    $link = "http://localhost:8080/sarga-bogre-gorbe-bogre/backend_php/reset-pass.php";

    if($emailcount) {

      $userdata = mysqli_fetch_array($query);



      $message = "If you want to reset your password, then click on the link below.\n
      Password reset:" .$link."\n
      Your verification code: ".$uniq_id;

      $mail->AddAddress($email, "You");
      $mail->SetFrom("jacint9876543210@gmail.com", 'Cost');
      $mail->Subject = "Password reset";
      $mail->Body = $message;
      if($mail->Send()){
          $email_sent = true;
      }
    }
  }
  var_dump($mail);
  echo '<br><br>';
if($email_sent){
    echo "Email sending was successful!";
}
else{
    echo "Email sending was failed!";
}

?>
