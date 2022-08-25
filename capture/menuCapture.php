<?php

session_start();

extract($_REQUEST);
require "../connectiondb.php";

$objectConnection = Connect();
//buscar infromaicón de usuario
$sql="SELECT us_id  FROM user WHERE us_nickname='$_SESSION[user]' ";
$result=$objectConnection->query($sql);
$user=$result->fetch_object();
$usId=$user->us_id;


$capt_start=$_REQUEST['displayDateTime'];
$ord_num= $_REQUEST['order'];

//búsqueda órden de producción
$sql3="SELECT ord_id, ord_num, ord_date, ord_quantityProg, ord_timeEst, comp_nit, us_id, mach_id, prod_id 
FROM order_production 
WHERE ord_num='$_REQUEST[order]'";
 
$result3=$objectConnection->query($sql3);
$order=$result3->fetch_object();
$ordId=$order->ord_id;


//Insertar nueva captura de producción 
$sql1 ="INSERT INTO capture_production(capt_start, us_id, ord_id)
VALUES('$capt_start',$usId,$ordId)";
$result1 = $objectConnection->query($sql1);
//búsqueda tipos de parada

 $sql2="SELECT stop_id, stop_name, stop_description, comp_nit  FROM stop_production 
WHERE comp_nit='$_SESSION[companyNit]'";
$result2=$objectConnection->query($sql2);

$arrayStops=[];


while ($stops = mysqli_fetch_assoc($result2)) {
  $arrayStops[]= $stops; 
}

//búsqueda tipos de fallas de calidad
$sql6="SELECT fault_id, fault_name, fault_description, comp_nit  FROM fault_production 
WHERE comp_nit='$_SESSION[companyNit]'";
$result6=$objectConnection->query($sql6);

$arrayFaults=[];


while ($faults = mysqli_fetch_assoc($result6)) {
  $arrayFaults[]= $faults; 
}
//búsqueda producto
$sql4="SELECT prod_id, prod_name FROM product p INNER JOIN  company c ON p.comp_nit=c.comp_nit
WHERE p.comp_nit='$_SESSION[companyNit]'";
 
$result1=$objectConnection->query($sql4);

//búsqueda máquina
$sql5="SELECT mach_id, mach_name FROM machine m INNER JOIN  company c ON m.comp_nit=c.comp_nit
WHERE m.comp_nit='$_SESSION[companyNit]'";
 
$result2=$objectConnection->query($sql5);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Order Production </title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styleRede.css">
    <link rel="stylesheet"href=../css/registerProduct.css>
    <link rel="stylesheet"href=css/styleCopy.css>

</head>

<body id="page-top">
<?php include 'modalReporStop.php';?> 
<?php include 'modalFault.php';?> 
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a href="../mainMenu.php" class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SMART OEE</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="../users/viewUsers.php">Ver usuarios</a>
                        <a class="collapse-item" href="../users/userSignup.php">Registrar usuario</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Parametrización del sistema
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                    aria-expanded="true" aria-controls="collapseProducts">
                    <i class="fas fa-fw fa-store"></i>
                    <span>Productos</span>
                </a>
                <div id="collapseProducts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="../products/viewProducts.php">Ver productos</a>
                        <a class="collapse-item" href="../products/registerProduct.php">Registrar producto</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStops"
                    aria-expanded="true" aria-controls="collapseStops">
                    <i class="fas fa-fw fa-stopwatch"></i>
                    <span>Paradas</span>
                </a>
                <div id="collapseStops" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="../stops/viewProducts.php">Ver paradas</a>
                        <a class="collapse-item" href="../stops/registerStopProduction.php">Registrar parada</a>
                    </div>
                </div>
            </li>

            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMachines"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Máquinas</span>
                </a>
                <div id="collapseMachines" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../machines/viewMachines.php">Ver máquinas</a>
                        <a class="collapse-item" href="../machines/registerMachine.php">Registrar máquina</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFaults"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-exclamation-triangle"></i>
                    <span>Fallas</span>
                </a>
                <div id="collapseFaults" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../faults/viewFaults.php">Ver fallas</a>
                        <a class="collapse-item" href="../faults/registerFault.php">Registrar falla</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseShifts"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>Horarios</span>
                </a>
                <div id="collapseShifts" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="viewShifts.php">Ver horarios</a>
                        <a class="collapse-item" href=".registerShifts.php">Registrar horario</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBranches"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Sucursales</span>
                </a>
                <div id="collapseBranches" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../branches/viewBranches.php">Ver sucursales</a>
                        <a class="collapse-item" href="../branches/registerBranch.php">Registrar sucursales</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Ordenes de producción
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item active" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
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
            <?php
       $x=isset($_REQUEST['user']);
      if($x){  
        echo "<script>alert('El horario se ha registrado correctamente')</script>";
          }

    ?>
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-question-circle fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
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
                                <a href="../login/logout.php" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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

                    <section class="column m2-2">
                        <h1><?php echo $_SESSION['company'];?></h1>
                        <?php
                        $x=isset($_REQUEST['user']);
                        if($x=='fail'){  
                            echo "<h3 style='color:red'>No se ha podido registar el horario correctamente, verifique los campos </h3>";
                            }

                        ?>
                    <div class="container">
                        <div class="row header">
                            <h1>Captura de producción  &nbsp;</h1>
                        </div>
                         <div class="row body">
                            <form role="form" name="formFaults" method="post" action = "validateOrderForm.php">
                                <div class="row">
                                        <p>Número de orden: <?php echo $ord_num;?></p>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-4">
                                        <img class="rounded-circle info three-columns"src="../assets/stop.png" id="info" style="width: 32%;
                                        display: inline-block;">
                                        <p>
                                            <a id= "modal_view_user "class ="link_view view_user" 
                                            href="#" data-toggle="modal" data-target="#modalRepStop" data-dismiss="modal" data-backdrop="false">Reportar parada de máquina</a>
                                        </p>

                                    </div>
                                    <div class="col-4">
                                            <img class="rounded-circle three-columns"src="../assets/error-message.png" name="login" style="width: 32%;
                                            display: inline-block;">
                                            <p>
                                                <a id= "modal_view_user "class ="link_view view_user" 
                                            href="#" data-toggle="modal" data-target="#modalFault" data-dismiss="modal" data-backdrop="false">Registrar falla de calidad</a>
                                            </p>
                                    </div>
                                    <div class="col-4">
                                            <img class="rounded-circle three-columns"src="../assets/count.png" name="signup" style="width: 32%;
                                            display: inline-block;">
                                            <p>
                                                <a class="btn-secundary" href="../OEEProject/company/companySignup.php" role="button" id="signup">Registrar total productos fabricados</a>
                                            </p>
                                    </div>
                                </div>
                        
                                    
                                <div class="row">
                                        <p> Si ya terminó de registrar la captura de producción, de clic en "Finalizar"
                                       
                                
                                </div> 
                                <div class="row">
                                        
                                        <input class="btn btn-submit" type="submit" value="Finalizar" />
                                        <small>or press <strong>enter</strong></small>
                                
                                </div>        
                        
                            </form>  
                        </div>
                    </div>


                    </section>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Simplex 2020</span><br>
                        <span>Centro de servicios financieros SENA 2022</span>

                    
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

</html