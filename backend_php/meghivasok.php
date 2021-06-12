<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <script type="text/javascript">
        //window.history.pushState('', 'Title', 'utilities-expanses-insert.php');
	</script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Elektronikus költségvetés, by: Sárga bögre, görbe bögre csapat">
    <meta name="author" content="Juhász Jácint, Süge Ákos">

    <title>Meghivasok</title>

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

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../Registered-user/index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HouseKeeper</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../Registered-user/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Kezdőlap</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.php">Buttons</a>
                        <a class="collapse-item" href="cards.php">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Lehetőségek</span>
                </a>
                <div id="collapseUtilities" class="collapse" href="#" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                           
                    <a class="collapse-item" href="../Registered-user/house-manage-insert.php">Háztartás</a>
                        <a class="collapse-item" href="utilities-border.php">Borders</a>
                        <a class="collapse-item" href="utilities-animation.php">Animations</a>
                        <a class="collapse-item active" href="../Registered-user/utilities-expanses-insert.php">Költségek hozzáadása</a>
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
                <div id="collapsePages" class="collapse" href="#" aria-labelledby="headingPages"
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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <span style="font-size: 24px; color:black; font-weight: bold; background-color:#71B48D;">
                            <?php 

                        require_once "db_config.php";
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
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Költségek és kívánságok hozzáadása</h1>
                    <p class="mb-4">
                        Itt adhatja meg a költségeket, és a kívánságokat a háztartáshoz.
                    </p>

                    



                </div>
                <!-- Content Row -->
                <div class="row">
                    <div class='col-lg-6' >
                        <?php
                        echo "<table class='table table-bordered mt-5 ml-5'>
                        <tr>
                            
                            <th>inviter</th>
                            <th>houseManageTo</th>
                            <th>Elfogad/elutasit</th>
                            </tr>";
                        require_once "db_config.php";
                        $select_invite = "SELECT * from invite 
                        where invite.invited_person = 
                        (SELECT ID from person where person.name = '" . $_SESSION["name"] . "') and accepted = 0";

                        $select_invite_query = $conn -> prepare($select_invite);
                        $select_invite_query -> execute();
                        /*$inviter = "";
                        $housemanageTo "";
                        */if($select_invite_query->rowCount()>=1){
                            
                            foreach($select_invite_query as $row ){

                                //unset($id, $name);
                                $inviter = $row['inviter'];
                                $housemanageTo = $row['house_manage_TO']; 
                                //echo '<option value="'.$id.'" name="'.$id.'" >'.$name.'</option>';
                                echo "<tr>
                                        
                                        <td>".$inviter ."</td>".
                                        "<td>".$housemanageTo ."</td>".
                                        "<td><form method='POST' action='#'>
                                        
                                                <button type='submit' class='form-control' id='acceptInvite' name='acceptInvite' value='". $row['id_invite'] ."'>Elfogad</button>
                                                <button type='submit' class='form-control' id='cancelInvite' name='cancelInvite' value='". $row['id_invite']  ."'>Elutasit</button>
                                            
                                        </form></td>".
                                       
                                        "</tr>";


                            }
                            
                            
                        }
                        else{
                            echo " ";
                        }
                            
                        
                        ?>
                        </div>
                        <div class="col-lg-6" >
                            
                                <?php
                                    if(isset($_POST['acceptInvite'])){
                                        //var_dump($_POST); exit();
                                        $select_user_and_pass = "SELECT * from person where email = :email1";
                                            
                                        $login_query = $conn -> prepare($select_user_and_pass);
                                        $login_query -> bindValue(':email1',$_SESSION["member_login"]);
                                        $login_query -> execute();
                                        if($rowo = $login_query ->fetch()){
                                            $update_invite = "UPDATE invite set accepted =".$_POST['acceptInvite'] . " where invited_person =" . $rowo["ID"] . " AND id_invite=".$_POST['acceptInvite'];
                                            $invite_query = $conn -> prepare($update_invite);
                                            $invite_query -> execute();
                                            $update_person_invite = "UPDATE person set id_house_manage=". $housemanageTo ." and rank = 1";
                                            $person_invite = $conn -> prepare($update_person_invite);
                                            $person_invite -> execute();
                                            if($row = $person_invite->fetch()){
                                                echo "<script>location.reload();</script>";
                                            }
                                        }

                                    }
                                    if(isset($_POST['cancelInvite'])){
                                        $delete_from_invite = "DELETE FROM invite WHERE id_invite=".$_POST['cancelInvite'];
                                        $invite_query = $conn -> prepare($delete_from_invite);
                                        if($invite_query -> execute()){
                                            echo "<script>location.reload();</script>";
                                        }
                                    }
                                
                                ?>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer 
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; HouseKeeper 2021</span>
                    </div>
                </div>
            </footer>
             -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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

</body>

</html>