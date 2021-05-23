<?php

session_Start();
require_once "db_config.php";
$sql_command = "";
if(isset($_POST['reset-password'])){
    $veri_code = $_POST['code'];
    if($_POST['new-password'] === $_POST['confirm-password']){
        $sql_command = "UPDATE person SET pass = :pass1 WHERE pass = :token1 ";
        $update_query = $conn -> prepare($sql_command);
        $password = password_hash($_POST['new-password'], PASSWORD_DEFAULT);
        $update_query -> bindValue(':pass1',$password);
        $update_query -> bindValue(':token1',$veri_code);
        $update_query -> execute();
        if($update_query -> rowCount() == 1){
            echo "Successfull!";
        }
        else{
            echo "Shit!";
        }
    }
}


?>

<!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <script src="https://use.fontawesome.com/1d8204edd4.js"></script>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     <link rel="stylesheet" href="css/resetpassword.css">

     <title>Reset Password</title>

   </head>

   <body>

     <div class="d-flex justify-content-center align-items-center login-container">

         <form class="login-form text-center col-3 col-sm-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
             <h1 class="mb-3 font-weight-light text-uppercase">SET A NEW PASSWORD</h1>



             <div class="form-group">
                 <label>NEW PASSWORD:</label>
                 <input type="password" name="new-password" required class="form-control rounded-pill form-control-lg" placeholder="Type your new password here...">
             </div>

             <div class="form-group">
                 <label>CONFIRM PASSWORD:</label>
                 <input type="password" name="confirm-password" required class="form-control rounded-pill form-control-lg" placeholder="Type your password again here...">
             </div>

             <div class="form-group">
                 <label>VERIFICATION CODE:</label>
                 <input type="text" name="code" required class="form-control rounded-pill form-control-lg" placeholder="Type your verification code here...">
             </div>

             <input type="submit" name="reset-password" value="CONFIRM" class="mt-3 btn rounded-pill btn-lg btn-custom btn-block"/>

             <p class="mt-3 font-weight-normal"><a href="http://localhost:8080/sarga-bogre-gorbe-bogre/login.html"><strong>Sign in!</strong></a></p>
         </form>

     </div>

   </body>
 </html>