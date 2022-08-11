<?php

session_start();

extract($_REQUEST);

if(!isset($_SESSION['user']))
    header("location:login/login.php?x=2");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet"href=css/style.css>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="mainMenu.js"></script>
</head>
<body>
    <header>
        <h1 id="pageName">SMART OEE</h1>
        <nav>
            <a href="mainMenu.php">Inicio</a>
            <a href="#">Ayuda</a>
            <a href="login/logout.php">Salir</a>
            
        </nav>


        

    </header>

    <?php
       $x=isset($_REQUEST['user']);
      if($x){  
        echo "<script>alert('El usuario se ha registrado correctamente')</script>";
          }

    ?>

    <div class="main-component">
        <div class="row m2">
            <div class="column m2-1">
                <div class="menu-container">
                    <nav class="menu-2">
                        <ul class="nav">
                            <li><a href="#">Usuarios</a>
                                <ul>
                                    <li><a href="users/userSignup.php">Registrar usuario</a></li>
                                    <li><a href="users/viewUsers.php">Ver usuarios</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Parametrización del sistema</a>
                                <ul>
                                    <li><a href="#">Productos</a></li>
                                        <ul>
                                        <li><a href="products/registerProduct.php">Registrar producto</a></li>
                                        <li><a href="products/viewProducts.php">Ver productos registrados</a></li>
                                        
                                        </ul>
                                    <li><a href="#">Paradas</a></li>
                                        <ul>
                                            <li><a href="stops/registerStopProduction.php">Registrar tipo de paradas</a></li>
                                            <li><a href="stops/viewStopsProduction.php">Ver tipos de parada</a></li>
                                        
                                        </ul>
                                    <li><a href="#">Máquinas</a></li>
                                        <ul>
                                            <li><a href="machines/registerMachine.php">Registrar tipo de máquina</a></li>
                                            <li><a href="machines/viewMachines.php">Ver tipos de máquina</a></li>
                                        
                                        </ul>
                                    <li><a href="#">Fallas</a></li>
                                        <ul>
                                            <li><a href="faults/registerFault.php">Registrar tipo de falla</a></li>
                                            <li><a href="faults/viewFaults.php">Ver tipos de fallas</a></li>
                                        
                                        </ul>
                                    <li><a href="#">Horarios</a></li>
                                    <li><a href="#">Sucursales</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Ordenes de producción</a>
                                <ul>
                                    <li><a href="#">Registrar orden de producción</a></li>
                                    <li><a href="#">Captura de producción</a></li>
                                    <li><a href="#">Ver órdenes de producción</a></li>
    
                                </ul>
                            </li>
                            <li><a href="#">Reportes</a>
                                <ul>
                                    <li><a href="#">Ver OEE</a></li>
                                    <li><a href="#">Análisis OEE</a></li>
                                    <li><a href="#">Históricos</a></li>
    
                                </ul>
                            </li>
                        </ul>

                    </nav>

                </div>

            </div>
            <section class="column m2-2">
            <h1><?php echo $_SESSION['company'];?></h1>
                <div class="row-2">
                    <div class="col">
                        <img class="imagen im-m2"  src="assets/john-schnobrich-FlPc9_VocJ4-unsplash.jpg" />

                    </div>
                    <div class="col bienvenida">
                        <h3> Estimado usuario, bienvenido a nuestro sistema de información Smart OEE</h3>

                    </div>

                </div>

            </section>

            </div>

        </div>


    </div>
>

    <footer class="text-center ">
        <!-- Copyright -->
        <div
          class="text-center p-4" id="text-footer"
        >
          © 2021 Copyright: Simplex <br>
          Centro de servicios financieros SENA 2022 
        </div>
        <!-- Copyright -->
      </footer>

      
</body>
</html>