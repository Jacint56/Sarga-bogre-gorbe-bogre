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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Elektronikus költségvetés, by: Sárga bögre, görbe bögre csapat">
    <meta name="author" content="Juhász Jácint, Süge Ákos">

    
   <!-- Custom fonts for this template-->
   <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
     <!-- Custom icon-->
     <link rel="icon" href="../img/icon.ico" type="image/x-icon">
     
     <!--<link rel="stylesheet" href="css/resetpassword.css">-->
    
     <title>Reset Password</title>

   </head>

   <body class="bg-gray-400">
<div id="content-wrapper" class="d-flex flex-column ">
    <div id="content">
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

                 <p class="mt-3 font-weight-normal"><a href="http://sbgb.proj.vts.su.ac.rs/login.html"><strong>Sign in!</strong></a></p>
             </form>

        </div>
     </div>
</div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
   </body>
   
 </html>