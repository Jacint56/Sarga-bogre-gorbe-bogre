<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Elektronikus költségvetés, by: Sárga bögre, görbe bögre csapat">
    <meta name="author" content="Juhász Jácint, Süge Ákos">

    <title>Profil</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
     <!-- Custom icon-->
     <link rel="icon" href="../img/icon.ico" type="image/x-icon">
</head>
<body>
        <!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">HouseKeeper </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Kezdőlap</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menü
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Tudjon meg többet</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">További információ:</h6>
                <a class="collapse-item" href="about-us.php">Rólunk</a>
                <a class="collapse-item" href="buttons.php">Buttons</a>
                <a class="collapse-item" href="cards.php">Cards</a>

            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Lehetőségek</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                           
                    <a class="collapse-item" href="house-manage-insert.php">Háztartás</a>
                       <!-- <a class="collapse-item" href="utilities-border.php">Borders</a>-->
                        <a class="collapse-item" href="cost-frame.php">Költség keret</a>
                        <a href="main-panel.php"class="collapse-item">Személyek - módosítása</a>
                        <a class="collapse-item " href="utilities-expanses-insert.php">Költségek hozzáadása</a>
                    </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Oldalak</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Bejelentkezés:</h6>
                <a class="collapse-item" href="../login.html">Belépés</a>
                <a class="collapse-item" href="../register.html">Regisztráció</a>
                <a class="collapse-item" href="../forgot-password.html">Elfelejtett jelszó</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Egyéb oldalak:</h6>
                <a class="collapse-item active" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.php">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
<!-- Content wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <buttonid id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <span style="font-size: 24px; color:black; font-weight: bold; background-color:#71B48D;">
                            <?php 

                        require_once "../backend_php/db_config.php";
                            $select_user_and_pass = "SELECT * from person where email = :email1";
    
                            $login_query = $conn -> prepare($select_user_and_pass);
                            $login_query -> bindValue(':email1',$_SESSION["member_login"]);
                            $login_query -> execute();


                            if($login_query -> rowCount() ==1){
                                if($row = $login_query->fetch()){ 
                                    $select_user_and_pass = "SELECT Name from house_manage where ID = ". $row["id_house_manage"];
                                    
                                    $login_query = $conn -> prepare($select_user_and_pass);
                                    $login_query -> execute();
                                
                                
                                    if($login_query -> rowCount() ==1){
                                        if($row = $login_query->fetch()){
                                            echo  $row["Name"];
                                        }
                                    }
                                }
                            }
                        ?></span>
                    </div>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto" style="margin-top:30px;">
                    
                    <?php

                    
                        //session_Start();
                        
                        
                        require_once "../backend_php/db_config.php";
                        $select_invite = "SELECT id_invite from invite
                        where invite.invited_person = 
                        (SELECT ID from person where person.name = :name) and accepted = 0";

                        $select_invite_query = $conn -> prepare($select_invite);
                        $select_invite_query->bindValue(':name',$_SESSION["name"]);
                        $select_invite_query -> execute();
                        if($select_invite_query->rowCount()>=1){
                            echo '<li class="nav-item dropdown no-arrow mx-1">
                          
                            <a class="nav-link" href="../backend_php/meghivasok.php" id="yetInvited" onclick="yetClicked()" >
                                <button class="btn btn-primary" type="button" >Meghívások elérhetőek</button>
                            </a>';
                            
                        }
                        else{
                            echo " ";
                        }


                        ?>
                  
                        <div class="topbar-divider d-none d-sm-block"></div>
                        
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    
                                    <?php
                                        //var_dump($_COOKIE);
                                        echo $_SESSION["name"] . " " . $_SESSION["lastname"];
                                    ?>

                                </span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile-setting.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="profile-settings.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

        </nav>
        <!-- Begin of page content -->
        <div class="container-fluid">
            
        <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profil szerkesztése</h1>
                    </div>

                <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                       
                                        <div class="col-auto">
                                        <form method="POST" action="profi-settings-data.php">
                                                    <div class="form-group">
                                                        <label for="changeFirstName">Keresztnév szerkesztése:</label>
                                                        <input type="text" class="form-control" id="changeFirstName" name="changeFirstName">
                                                    </div>
                                                    <button type="submit" name="updateFirstName" id="updateFirstName" class="btn btn-primary">Módosítás</button>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                

               
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        
                                        <div class="col-auto">
                                        <form method="POST" action="profi-settings-data.php">
                                                    <div class="form-group">
                                                        <label for="changeLastName">Vezetéknév szerkesztése:</label>
                                                        <input type="text" class="form-control" id="changeLastName" name="changeLastName">
                                                    </div>
                                                    <button type="submit" name="updateLastName" id="updateLastName" class="btn btn-primary">Módosítás</button>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        
                                        <div class="col-auto">
                                        <form method="POST" action="profi-settings-data.php">
                                                    <div class="form-group">
                                                        <label for="changePhone">Telefonszám szerkesztése:</label>
                                                        <input type="text" class="form-control" id="changePhone" name="changePhone">
                                                    </div>
                                                    <button type="submit" name="updatePhone" id="updatePhone" class="btn btn-primary">Módosítás</button>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                

                    <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        
                                        <div class="col-auto">
                                        <form method="POST" action="profi-settings-data.php">
                                                    <div class="form-group">
                                                        <label for="changeAddress">Cím szerkesztése:</label>
                                                        <input type="text" class="form-control" id="changeAddress" name="changeAddress">
                                                    </div>
                                                    <button type="submit" name="updateAddress" id="updateAddress" class="btn btn-primary">Módosítás</button>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                

                
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        
                                        <div class="col-auto">
                                        <form method="POST" action="profi-settings-data.php">
                                                    <div class="form-group">
                                                        <label for="changePass">Jelszó szerkesztése:</label>
                                                        <input type="text" class="form-control" id="changePass" name="changePass">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="changePassConfirm">Jelszó szerkesztés megerősítése:</label>
                                                        <input type="text" class="form-control" id="changePassConfirm" name="changePassConfirm">
                                                    </div>
                                                    <button type="submit" name="updatePass" id="updatePass" class="btn btn-primary">Módosítás</button>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

        </div>
        <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; HouseKeeper 2021</span>
                    </div>
                </div>
            </footer>
    </div>
</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Már távozna?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Válassza a "Kijelentkezés" lehetőséget, ha szeretné abbahagyni ezt a munkamenetet.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Mégse</button>
                    <a class="btn btn-primary" href="../index.php">Kijelentkezés</a>
                </div>
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
    <script>
        function yetClicked(){

            var inviteButton = getElementById("yetInvited");
            inviteButton.style.display = 'none';


        }
    </script>
</body>
</html>