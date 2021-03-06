<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <script type="text/javascript">
        window.history.pushState('', 'Title', 'utilities-expanses-insert.php');
	</script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Elektronikus költségvetés, by: Sárga bögre, görbe bögre csapat">
    <meta name="author" content="Juhász Jácint, Süge Ákos">

    <title>Költség - kívánság megadása</title>

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

<body id="page-top" onload="checkCookie()">
<?php
    if(isset($_GET["insert"])){
        if($_GET["insert"]){
            echo '<script type="text/javascript">
            alert("Sikeres bevitel")
                </script>';
        } 
        else{
            echo '<script type="text/javascript">
            alert("Sikertelen bevitel")
                </script>';
        }
    }
    else if(isset($_GET["tagmeghivva"])){
        if($_GET["tagmeghivva"]){
            echo '<script type="text/javascript">
            alert("Meghivo sikeresen elkuldve!")
                </script>';
        } 
        else{
            echo '<script type="text/javascript">
            alert("A meghivot nem sikerult elkuldeni!")
                </script>';
        }
    }

?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HouseKeeper</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
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
                    <span>További információ</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tudjon meg többet:</h6>
                        <a class="collapse-item" href="../about-us.php">Rólunk</a>
                        
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
                           
                    <a class="collapse-item" href="house-manage-insert.php">Háztartás</a>
                        <a class="collapse-item" href="cost-frame.php">Költség keret</a>
                        
                        <a class="collapse-item active" href="utilities-expanses-insert.php">Költségek hozzáadása</a>
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
                        
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Grafikon</span></a>
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

                    <!--<form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>-->

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
                                <a class="dropdown-item" href="profile-settings.php">
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

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-6" >

                            <!-- Insert form -->
                            <form method="POST" action="../backend_php/insert_expenses.php" id="insertExpenseForm" name="insertExpenseForm">
                                 <div class="form-group">
                                    <label for="selectExpenseCategory">Költség kategória megadása:</label>
                                    <select name="selectExpenseCategory" id="selectExpenseCategory">

                                        <option value="0" disabled selected name="0" > -- Válasszon kategóriát -- </option>
                                        <?php
                                            session_Start();
                                            require_once "../backend_php/db_config.php";
                                            $select_user_and_pass = "SELECT * from expense_category";
                                            $login_query = $conn -> prepare($select_user_and_pass);
                                            $login_query -> execute();
                                            $data = $login_query->fetchAll();
                                            foreach($data as $row ){

                                                unset($id, $name);
                                                $id = $row['ID'];
                                                $name = $row['expenses_category_name']; 
                                                echo '<option value="'.$id.'" name="'.$id.'" >'.$name.'</option>';
                                            }
                                            

                                        ?>
                                    </select>
                                    </div>
                                    
                                    <div class="form-group">
                                    <label for="inputExpenseCategory">Ha nem találja a keresett kategóriát, vigyen be újat:</label>
                                    <input type="text" class="form-control" id="inputExpenseCategory" name="inputExpenseCategory" placeholder="Költség kategória pl.: élelem">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="inputExpenseDetails">Költség leírása:</label>
                                    <input type="text" class="form-control" id="inputExpenseDetails" name="inputExpenseDetails" placeholder="Költség leírása pl.: banán">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="inputExpensePrice">Költség ára:</label>
                                    <input type="text" class="form-control" id="inputExpensePrice" name="inputExpensePrice" placeholder="Költség ára">
                                </div>
                                <button type="submit" name="insertExpense" id="insertExpense" class="btn btn-primary">Hozzáadás</button>
                            </form>
                        </div>
                        <div class="col-lg-6" >
                            <!-- Insert form -->
                            <form method="POST" action="../backend_php/insert_expenses.php" id="insertWishForm" name="insertWishForm">
                            <div class="form-group">
                                    <label for="selectWishCategory">Költség kategória megadása:</label>
                                    <select name="selectWishCategory" id="selectWishCategory">

                                        <option value="0" disabled selected name="0" > -- Válasszon kategóriát -- </option>
                                        <?php
                                            require_once "../backend_php/db_config.php";
                                            $select_user_and_pass = "SELECT * from expense_category";
                                            $login_query = $conn -> prepare($select_user_and_pass);
                                            $login_query -> execute();
                                            $data = $login_query->fetchAll();
                                            foreach($data as $row ){
                                                unset($id, $name);
                                                $id = $row['ID'];
                                                $name = $row['expenses_category_name']; 
                                                echo '<option value="'.$id.'" name="'.$id.'" >'.$name.'</option>';
                                            }
                                            

                                        ?>
                                    </select>
                                    </div>     
                            <div class="form-group">
                                    <label for="inputWishCategory">Kívánság kategória megadása:</label>
                                    <input type="text" class="form-control" id="inputWishCategory" name="inputWishCategory" placeholder="Kívánság kategória pl.: számítógép">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="inputWishName">Kívánság:</label>
                                    <input type="text" class="form-control" id="inputWishName" name="inputWishName" placeholder="Kívánság">
                                </div>
                                <div class="form-group">
                                    <label for="inputWishPrice">Kívánság ára:</label>
                                    <input type="text" class="form-control" id="inputWishPrice" name="inputWishPrice" placeholder="Kívánság ára">
                                </div>
                                
                                <button type="submit" name="insertWish" id="insertWish" class="btn btn-primary">Hozzáadás</button>
                            </form>
                        </div>
                    </div>
                    <div class="row" style="padding-top:10px;">
                        <div class="col-lg-12">
                        <form method="POST" id="inviteMemberToHouseManage" name="inviteMemberToHouseManage">         
                            <button type="submit" name="inviteMemberToHouseManage" id="inviteMemberToHouseManage" class="btn btn-primary">Tagok meghívása</button>
                        </form>
                        </div>
                    </div>
                    <?php
                        if(isset($_POST['inviteMemberToHouseManage'])){
                            echo "
                                <div class='row'>
                                <div class='col-lg-12'>
                                <br>
                                <form method='POST' action='../backend_php/tagmeghivas.php'>
                                
                                <div class='form-group'>
                                <label for='invitedPersonName'>Meghivni kivant szemely neve:</label>
                                
                                <input type='text' class='form-control' name='invitedPersonName' id='invitedPersonName' placeholder='Meghivni kivant szemely neve:'>
                                </div>
                                <button type='submit' name='submitInvite' id='submitInvite' class='btn btn-primary'>Meghivas</button>
                                </form>
                                </div>
                                </div>
                                ";
                        }
                    ?>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>SzemelyID</th>
                                    <th>Kivanság neve</th>
                                    <th>Kivanság kategoria</th>
                                    <th>Kivanság ara</th>
                                    <th>Igénylés időpontja</th></th>
                                    <th>Művelet</th></th>

                                    
                                
                                    <?php
                                require_once "../backend_php/db_config.php";
                                $leader = false;
                                $select_user_and_pass = "SELECT * from person where email = :email1";
                                
                                $login_query = $conn -> prepare($select_user_and_pass);
                                $login_query -> bindValue(':email1',$_SESSION["member_login"]);
                                $login_query -> execute();
                                $housemanageID = "";
                                $person = "";
                                if($login_query -> rowCount() ==1){
                                    if($row = $login_query->fetch()){
                                        if($row["rank"] == 2 or $row["rank"] == 3){
                                            $leader = true;
                                            $housemanageID =$row["id_house_manage"];
                                            $person = $row["ID"];
                                        }
                                    }
                                }
                                    require_once "../backend_php/db_config.php";
                                    $select_user_and_pass = "SELECT wish.ID, person.name, wish_name, expenses_category_name ,Price,date, wish.id_house_manage from wish
   JOIN expense_category ON 
   wish.wish_category = expense_category.ID
   JOIN person ON
   wish.id_person = person.ID
    where wish.id_house_manage=".  $housemanageID ;
                                    $asd = $conn -> prepare($select_user_and_pass);
                                    $asd -> execute();
                                    $data = $asd->fetchAll();
                                    $wishName = "";
                                    foreach($data as $row ){
                                        //unset($id, $name);
                                        $id = $row['ID'];
                                        $idPerson = $row['name']; 
                                        $wishName = $row['wish_name'];
                                        $wishCategory = $row['expenses_category_name'];
                                        $wishPrice = $row['Price'];
                                        $date = $row['date'];
                                        //echo '<option value="'.$id.'" name="'.$id.'" >'.$name.'</option>';
                                        echo "<tr>
                                        <td name=\"" . $id ." \">".$id ."</td>".
                                        "<td>".$idPerson ."</td>".
                                        "<td>".$wishName ."</td>".
                                        "<td>".$wishCategory ."</td>".
                                        "<td>".$wishPrice ."</td>".
                                        "<td>".$date ."</td>";

                                        if($leader){
                                        echo '<td>
                                        
                                        <form method="POST" action="#" id="insertWishForm" name="insertWishForm">         
                                        <button type="submit" name="elfogad" id="inviteMemberToHouseManage" class="btn btn-primary" value="'. $id .'">Elfogad</button>
                                          
                                        <button type="submit" name="elvet" id="inviteMemberToHouseManage" class="btn btn-primary" value="'. $id .'">Elvet</button>
                                        </form>
                                        
                                        </td>';
                                    }

                                    echo "</tr>

                                    ";
                                    }
                                    
                                    

                                ?>
                                </table>
                                
                                <?php
                                    if(isset($_POST['elfogad'])){

                                        $select_from_wishes = "SELECT * FROM wish where ID = ". $_POST['elfogad'];
                                        $wish_query = $conn -> prepare($select_from_wishes);
                                        $wish_query -> execute();
                                        if($row = $wish_query->fetch()){
                                            $insert_into_exp = "INSERT INTO expenses(id_person,id_expenses_category, details, date, Price, id_house_manage)
                                            VALUES (:id_person," . $row["wish_category"] .",:details, NOW(), :price, :idHouse)";
                                            
                                            $expense_query = $conn -> prepare($insert_into_exp);
                                            $expense_query -> bindValue(':id_person',$person);
                                            
                                            $expense_query -> bindValue(':details',$row["wish_name"]);
                                            $expense_query -> bindValue(':price',$row["Price"]);
                                            $expense_query -> bindValue(':idHouse',$row["id_house_manage"]);
                                            
                                            if($expense_query -> execute()){
                                                $delete_from_wishes = "DELETE FROM wish WHERE ID=".$_POST['elfogad'];
                                                $wish_query = $conn -> prepare($delete_from_wishes);
                                                if($wish_query -> execute()){
                                                    $update_expense_budget = "UPDATE expense_budget SET keret = keret - :keret WHERE ID_house_manage = :idHouse AND expense_category_id = :expense_cat_ID";
                                                    $query = $conn -> prepare($update_expense_budget);
                                                    $query->bindValue(":keret", $row["Price"]);
                                                    $query->bindValue(":idHouse", $row["id_house_manage"]);
                                                    $query->bindValue(":expense_cat_ID", $row["wish_category"]);
                                                    $query->execute();
                                                    echo "<script>location.reload();</script>";
                                                }
                                            }
                                        }

                                    }
                                    if(isset($_POST['elvet'])){
                                        $delete_from_wishes = "DELETE FROM wish WHERE ID=".$_POST['elvet'];
                                        $wish_query = $conn -> prepare($delete_from_wishes);
                                        if($wish_query -> execute()){
                                            echo "<script>location.reload();</script>";
                                        }
                                    }
                                
                                ?>
                        </div>
                    </div>



                </div>
                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; HouseKeeper 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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