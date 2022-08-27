<?php
session_start();
require "../connectiondb.php";

extract($_REQUEST);
if(!isset($_REQUEST['x']))
  $x=0;

  $objConnection= Connect();

//búsqueda sucursales

$sql3="SELECT bran_id, bran_name FROM branch b INNER JOIN  company c ON b.comp_nit=c.comp_nit
WHERE b.comp_nit='$_SESSION[companyNit]'";
//búsqueda roles

$sql4="SELECT rol_id, rol_name FROM role";



//búsqueda supervisores
 $sql= "SELECT u.us_id, us_name, us_lastname, us_document,us_email, us_contactNumber, us_nickname, us_password, rol_name, us_status, bran_name,MAX(login_date)AS 
 lastDate ,rol_id, b.bran_id FROM user u 
 LEFT JOIN company c ON c.comp_nit= u.comp_nit
  LEFT JOIN role r ON r.rol_id= u.us_role
  LEFT JOIN branch b ON b.bran_id= u.bran_id
  LEFT JOIN login l ON l.us_id= u.us_id
    WHERE (u.us_role = 2) AND (u.comp_nit='$_SESSION[companyNit]')
    GROUP BY u.us_id";
//búsqueda operarios
$sql2= "SELECT u.us_id, us_name, us_lastname, us_document,us_email, us_contactNumber, us_nickname, us_password, rol_name, us_status, bran_name,MAX(login_date) AS 
lastDate, rol_id , b.bran_id FROM user u
LEFT JOIN company c ON c.comp_nit= u.comp_nit
  LEFT JOIN role r ON r.rol_id= u.us_role
  LEFT JOIN branch b ON b.bran_id= u.bran_id
  LEFT JOIN login l ON l.us_id= u.us_id
    WHERE (u.us_role = 1) AND (u.comp_nit='$_SESSION[companyNit]')
    GROUP BY u.us_id";


  $result4=$objConnection->query($sql4);
  $result3=$objConnection->query($sql3);
  $result1=$objConnection->query($sql);
  $result2=$objConnection->query($sql2);

  
$arrayBranch=[];

while ($branch = mysqli_fetch_assoc($result3)) {
  $arrayBranch []= $branch; 
}

$arrayRole=[];

while ($role = mysqli_fetch_assoc($result4)) {
  $arrayRole []= $role; 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Users</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    
    
</head>

<body id="page-top">
<?php include 'modalViewUser.php';?> 
<?php include 'modalEditUser.php';?> 

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
                        
                        <a class="collapse-item" href="viewUsers.php">Ver usuarios</a>
                        <a class="collapse-item" href="userSignup.php">Registrar usuario</a>
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
                        <a class="collapse-item" href="../shift/viewShifts.php">Ver horarios</a>
                        <a class="collapse-item" href="../shift/registerShifts.php">Registrar horario</a>
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
                        
                        <a class="collapse-item" href="../stops/viewStops.php">Ver paradas</a>
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVelocity"
                    aria-expanded="true" aria-controls="collapseVelocity">
                    <i class="fas fa-fw fa-bolt"></i>
                    <span>Velocidades</span>
                </a>
                <div id="collapseVelocity" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../velocity/viewVelocity.php">Ver velocidades</a>
                        <a class="collapse-item" href="../velocity/registerVelocity.php">Registrar velocidades</a>
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
            <li class="nav-item ">
                <a class="nav-link" href="../orders/registerOrder.php" >
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Registrar orden de producción</span>
                </a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../orders/viewOrders.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Ver ordenes de producción</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../capture/selectCapture.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Registrar captura de producción</span></a>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Reportes
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="../OEE/viewOEE.php" >
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Ver OEE</span>
                </a>
                
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Análisis OEE</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Históricos</span></a>
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
        echo "<script>alert('El usuario se ha registrado correctamente')</script>";
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
            <div class="row-2">

<div class="tabs">
  <!--Operarios-->
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
      <label for="tab-1" class="tab-label">Operarios</label>
      <div class="tab-content"> 
          <div class="container">
            <div class="wrapper-editor">
                <!--Encabezado lista-->
                <div class="block my-4"> 
                  <div class="d-flex justify-content-center">
                   
                  </div>
                </div>
                <!--botonesModal-->
                <div class="row d-flex justify-content-center modalWrapper">
                
              
                
                </div>
              
                <!--Tabla de usuarios-->
                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="th-sm">Nombres
              
                      </th>
                      <th class="th-sm">Apellidos
              
                      </th>
                      <th class="th-sm">Planta
              
        
                      </th>
                      <th class="th-sm">Último acceso
              
                      </th>
                      <th class="th-sm">Estado
              
                      </th>
                      <th class="th-sm">Ver registro
              
                      </th>
                      <th class="th-sm">Editar
              
                      </th>
                      <th class="th-sm">Eliminar
              
                      </th>

                    </tr>
                  </thead>
                  <tbody>

                  <?php
                      
                      while($user =$result2->fetch_object())
                      {
                      ?>
                    <tr>
                    <td><?php echo $user->us_name ?></td>
                    <td><?php echo $user->us_lastname ?></td>
                    <td><?php if($user->bran_name==NULL){
                            echo "--";
                    }else{
                      echo $user->bran_name;
                    }
                    
                    ?></td>
                    <td><?php echo $user->lastDate ?></td>
                    <td><?php if($user->us_status==1){
                            echo "Activo";
                    }else{
                      echo "Inactivo";
                    }
                    
                    ?></td>
                    <td align="center"><a  id= "modal_view_user "class ="link_view view_user" user = "<?php echo 
                    $user->us_id."//".$user->us_name."//".$user->us_lastname."//".$user->us_document."//".$user->rol_name."//".
                    $user->bran_name."//".$user->us_email."//".$user->us_contactNumber."//".$user->us_nickname.
                    "//".$user->us_password."//".$user->us_status
                   ;?>" 
                    href="#" data-toggle="modal" data-target="#modalAdd" data-dismiss="modal" data-backdrop="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                  </svg></td>

                  
                  <td align="center"><a  id= "modal_view_user "class ="link_view edit_user" user = "<?php echo 
                    $user->us_id."//".$user->us_name."//".$user->us_lastname."//".$user->us_document."//".$user->rol_name."//".
                    $user->bran_name."//".$user->us_email."//".$user->us_contactNumber."//".$user->us_nickname.
                    "//".$user->us_password."//".$user->us_status."//".$user->rol_id."//".$user->bran_id
                   ;?>" 
                   
                    href="updateUser.php?us_id=<?php echo $user->us_id?>"data-toggle="modal" data-target="#modalEdit" data-dismiss="modal" data-backdrop="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg></td>

                    <td align="center"><a href="deleteUser.php?us_id=<?php echo $user->us_id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                    <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                  </svg></td>
                    </tr>
                    <?php
                      }
                      
                      ?>
                      
                    
                  </tbody>
                  
                </table>
              </div>

          </div>
      </div>
    </div>
    <!--Supervisores-->
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
      <label for="tab-2" class="tab-label">Supervisores</label>
      <div class="tab-content">   
        <div class="container">
            <div class="wrapper-editor">
                <!--Encabezado lista-->
                <div class="block my-4"> 
                  <div class="d-flex justify-content-center">
                    <p class="h5 text-primary createShowP">0 registros seleccionados</p>
                  </div>
                </div>
                <!--Modal-->
                <div class="row d-flex justify-content-center modalWrapper">
                
              
                 
                
              

                <!--Tabla de usuarios-->
                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="th-sm">Nombres
              
                      </th>
                      <th class="th-sm">Apellidos
              
                      </th>
                      <th class="th-sm">Planta
              
        
                      </th>
                      <th class="th-sm">Último acceso
              
                      </th>
                      <th class="th-sm">Estado
              
                      </th>
                      </th>
                      <th class="th-sm">Ver registro
              
                      </th>
                      <th class="th-sm">Editar
              
                      </th>
                      <th class="th-sm">Eliminar
              
                      </th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      
                      while($user =$result1->fetch_object())
                      {
                      ?>
                    <tr>
                    <td><?php echo $user->us_name ?></td>
                    <td><?php echo $user->us_lastname ?></td>
                    <td><?php if($user->bran_name==NULL){
                            echo "--";
                    }else{
                      echo $user->bran_name;
                    }
                    
                    ?></td>
                    <td><?php echo $user->lastDate ?></td>
                    <td><?php if($user->us_status==1){
                            echo "Activo";
                    }else{
                      echo "Inactivo";
                    }
                    
                    ?></td>
                    <td align="center"><a  id= "modal_view_user "class ="link_view view_user" user = "<?php echo 
                    $user->us_id."//".$user->us_name."//".$user->us_lastname."//".$user->us_document."//".$user->rol_name."//".
                    $user->bran_name."//".$user->us_email."//".$user->us_contactNumber."//".$user->us_nickname.
                    "//".$user->us_password."//".$user->us_status
                   ;?>" 
                    href="#" data-toggle="modal" data-target="#modalAdd" data-dismiss="modal" data-backdrop="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                  </svg></td>
                  <td align="center"><a  id= "modal_view_user "class ="link_view edit_user" user = "<?php echo 
                    $user->us_id."//".$user->us_name."//".$user->us_lastname."//".$user->us_document."//".$user->rol_name."//".
                    $user->bran_name."//".$user->us_email."//".$user->us_contactNumber."//".$user->us_nickname.
                    "//".$user->us_password."//".$user->us_status."//".$user->rol_id."//".$user->bran_id
                   ;?>" 
                    href="updateUser.php?us_id=<?php echo $user->us_id?>"data-toggle="modal" data-target="#modalEdit" data-dismiss="modal" data-backdrop="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg></td>
                    <td align="center"><a href="deleteUser.php?us_id=<?php echo $user->us_id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                    <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                  </svg></td>
                    </tr>
                    <?php
                      }
                      
                      ?>
                    
                  </tbody>
                  
                </table>
              </div>

        </div>
      </div>
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

</html>