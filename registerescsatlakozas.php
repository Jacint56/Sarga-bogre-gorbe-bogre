<?php
$houseManage = 0;
if(isset($_GET["housemanage"])){
    $houseManage = $_GET["housemanage"];
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

    <title>Regisztráció</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
     <!-- Custom icon-->
     <link rel="icon" href="img/icon.ico" type="image/x-icon">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Fiók létrehozása!</h1>
                            </div>
                            <form class="user" method="POST" action="./backend_php/registration.php?housemanage=<?php echo $houseManage ?>" name="poszt">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="FirstName">Keresztnév:</label>
                                        <input type="text" class="form-control form-control-user" name="FirstName" id ="FirstName"
                                            placeholder="Keresztnév">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="LastName">Vezetéknév:</label>
                                        <input type="text" class="form-control form-control-user" name="LastName" id="LastName"
                                            placeholder="Vezetéknév">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputEmail">E-mail:</label>
                                    <input type="email" class="form-control form-control-user" name="InputEmail" id="InputEmail"
                                        placeholder="E-mail cím">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="InputPassword">Jelszó:</label>
                                        <input type="password" class="form-control form-control-user" name="InputPassword"
                                            id="InputPassword" placeholder="Jelszó">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="RepeatPassword">Jelszó megerősítése:</label>
                                        <input type="password" class="form-control form-control-user" name="RepeatPassword"
                                            id="RepeatPassword" placeholder="Jelszó megerősítése">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputAddress">Cím:</label>
                                    <input type="text" class="form-control form-control-user" name="InputAddress" id="InputAddress"
                                        placeholder="Cím">
                                </div>
                                <div class="form-group">
                                    <label for="InputPhone">Telefon:</label>
                                    <input type="text" class="form-control form-control-user" id="InputPhone" name="InputPhone"
                                        placeholder="Telefon szám">
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" name="button" id="RegisterSubmit" value="Regisztráció" >
                                
                                
                            </form>
                            
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Elfelejtett jelszó?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Már regisztrált? Jelentkezzen be!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>