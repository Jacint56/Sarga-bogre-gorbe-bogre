<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script>
function change(){
    document.getElementById("insertExpenseForm").submit();
}

</script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Elektronikus költségvetés, by: Sárga bögre, görbe bögre csapat">
    <meta name="author" content="Juhász Jácint, Süge Ákos">

    <title>Grafikon</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom graph style -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
     <!-- Custom icon-->
     <link rel="icon" href="../img/icon.ico" type="image/x-icon">

</head>

<body id="page-top">
<?php

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
                    <span>További információk</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tudjon meg többet:</h6>
                        <a class="collapse-item" href="../about-us.php">Rólunk</a>
                      
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
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
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
            <li class="nav-item active">
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
                                        //var_dump($_SESSION);
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
                    <h1 class="h3 mb-2 text-gray-800">Charts</h1>
            
                    
                            <div class="row">

                                <div class="col-xl-12 col-lg-12">

                                    <!-- Bar Chart -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Listázni kívánt év kiválasztása</h6>
                                        </div>
                                        <div class="card-body">
                                            <form action="charts.php" method="POST">
                                                <div class="form-group">
                                                <label for="inputYear">Év megadása:</label>
                                                <input type="text" class="form-control" name="inputYear" id="inputYear" placeholder="Vigye be a kilistázni kívánt évet pl.: 2021">
                                                </div>
                                                <button type="submit" name="insertYear" class="btn btn-primary" id="insertYear">Adat lekérése</button>
                                            </form>
                                            
                                        </div>
                                    </div>

                                </div>


                                </div>
                                <?php   
                                    if(isset($_POST['insertYear'])){
                                        $year = $_POST['inputYear'];
                                    }
                                    else{
                                        $year = date("Y");
                                    }
                                ?>
                    

                    <div class="row">

                        <div class="col-xl-12 col-lg-12">

                            <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 text-primary" style="font-size:24px;"><?php echo $year. " költségei. Az aktuális hónap: "."<b>". date("M")."</b>"; ?> </h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar" >
                                       
                                            <canvas id="myBarChart"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>

                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-12 col-lg-12">

                            <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php echo "A háztartás top 3 legmagasabb költségvetésű kategóriái:"; ?> </h6>
                                </div>
                                <div class="card-body">
                                <table class="table table-bordered">
                                <tr>
                                    <th>Kategória</th>
                                    <th>Összköltség az adott kategóriára</th>
                                </tr>
                                    
                                <?php
                            $select_user_and_pass = "SELECT * from person where email = :email1";
                            
                            $login_query = $conn -> prepare($select_user_and_pass);
                            $login_query -> bindValue(':email1',$_SESSION["member_login"]);
                            $login_query -> execute();

                            if($login_query -> rowCount() ==1){
                                if($row = $login_query->fetch()){ 
                                    require_once "../backend_php/db_config.php";
                                    $select_user_and_pass = "SELECT expense_category.expenses_category_name, sum(expenses.Price) FROM expense_category 
                                    INNER JOIN expenses ON expense_category.ID = expenses.id_expenses_category
                                     WHERE YEAR(expenses.date) = YEAR(NOW()) AND id_house_manage = :house GROUP BY expense_category.expenses_category_name ORDER BY sum(expenses.Price) DESC LIMIT 3";
                                    $login_query = $conn -> prepare($select_user_and_pass);
                                    $login_query -> bindValue(":house", $row["id_house_manage"]);
                                    $login_query -> execute();
                                    
                                    $data = $login_query->fetchAll();
                                    foreach($data as $row ){
                                        //unset($id, $name);
                                        $id = $row['expenses_category_name'];
                                        $expenseCategoryName = $row['sum(expenses.Price)']; 

                                        echo "<tr>
                                        <td>".$id ."</td>".
                                        "<td>".$expenseCategoryName ."</td>" ;
                                    }

                                    echo "</tr>

                                    ";
                                }
                            }
                                    

                                ?>
                                </table>
                                </div>
                            </div>

                        </div>

                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-12 col-lg-12">
                                    <!-- Insert form -->
                            <form method="POST" action="#" id="insertExpenseForm" name="insertExpenseForm">
                                 <div class="form-group">
                                    <label for="selectExpenseCategory">Költség kategória megadása:</label>
                                    <select onchange="change();" name="selectExpenseCategory" id="selectExpenseCategory">

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
                              </form>
                            <!-- Bar Chart -->
                            <!--  Echo-zva lesz -->
                            
                                
                                    
                                <?php

                                if(isset($_POST['selectExpenseCategory'])){
                                    require_once "../backend_php/db_config.php";
                                    $select_user_and_pass = "SELECT * from person where email = :email1";
                                    
                                    $login_query = $conn -> prepare($select_user_and_pass);
                                    $login_query -> bindValue(':email1',$_SESSION["member_login"]);
                                    $login_query -> execute();
                                    echo '<div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"> '; 
                                    echo $year. " költségei";
                                    echo ' </h6>
                                            </div>
                                            <div class="card-body">
                                            <table class="table table-bordered">
                                            <tr>
                                                <th>Ki adta hozzá</th>
                                                <th>KATEGORIA</th>
                                                <th>LEIRAS</th>
                                                <th>PRICE</th>
                                            </tr>';
                                    if($login_query -> rowCount() ==1){
                                        if($row = $login_query->fetch()){ 
                                            $select_expenses_AND_infos = "SELECT person.name,person.lname, expense_category.expenses_category_name ,expenses.details , expenses.Price FROM expenses 
                                                                        INNER JOIN expense_category ON expenses.id_expenses_category = expense_category.ID 
                                                                        INNER JOIN person ON expenses.id_person = person.ID
                                                                        WHERE expenses.id_expenses_category = :id_category AND expenses.id_house_manage = :id_house ORDER BY Price DESC";
                                           $expenses_AND_infos = $conn -> prepare($select_expenses_AND_infos);
                                           $expenses_AND_infos -> bindValue(":id_house", $row["id_house_manage"]);
                                           $expenses_AND_infos -> bindValue(":id_category", $_POST['selectExpenseCategory']);
                                           $expenses_AND_infos -> execute();
                                           $expenses_AND_infos_data = $expenses_AND_infos->fetchAll();

                                           foreach($expenses_AND_infos_data as $row ){
    
                                            echo "<tr>
                                            <td>".$row['name'] ." " . $row['lname'] ."</td>".
                                            "<td>".$row['expenses_category_name'] ."</td>".
                                            "<td>".$row['details'] ."</td>".
                                            "<td>".$row['Price'] ."</td>";
                                            echo "</tr>";
                                        }
                                        
                                        
                                        }
                                    }
                                    echo '</table></div>
                                    </div>';
                                }
                                    
                                    

                                ?>
                                
                                

                        </div>

                        
                    </div>
                     <!--  Echo-zva lesz -->

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

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <!-- Custom scripts-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>



    <!-- ChartScript -->
    <script type="text/javascript">
        var ctx = document.getElementById('myBarChart');
        var tomb = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep','Okt','Nov','Dec'];
        <?php
        $arr = array();
        foreach($arr as $item): ?>
            tomb.push(['<?php echo $item ?>']);
            <?php endforeach; ?>

            <?php

            require_once "../backend_php/db_config.php";
            $arr = [];
            for($i=1;$i<13;$i++){
                $select_query = "SELECT sum(price) AS 'osszegahonapra'
                FROM expenses WHERE MONTH(date) = " . $i . " and YEAR(date) = :ev1 ";
                $select_expenses_query = $conn -> prepare($select_query);
                $select_expenses_query ->bindValue(':ev1',$year);
                $select_expenses_query -> execute();
                $data = $select_expenses_query->fetchAll();
                foreach($data as $row ){
                    array_push($arr,$row["osszegahonapra"]);
                }
                
            }
            
            ?>
            
      
        
        
           


var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        //labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        labels: tomb,
        
        datasets: [{
            label: 'Költség',
            
                    
            data: [<?php 
            foreach($arr as $item){
                echo $item . ",";
            }
             ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          x: [{
            
            gridLines: {
              display: true,
              drawBorder: true
            },
            ticks: {
              maxTicksLimit: 6
            },
            maxBarThickness: 25,
          }],
          y: [{
            ticks: {
              min: 0,
              max: 15000,
              maxTicksLimit: 5,
              padding: 10,
              
              
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: true,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        }
    }
});
    </script>
    
    
</body>

</html>