<?php

session_start();

extract($_REQUEST);
require "../connectiondb.php";

$objectConnection = Connect();



echo $_SESSION['companyNit'];

        


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <title>Inicio</title>
    <link rel="stylesheet"href=../css/style.css>
    <link rel="stylesheet"href=../css/registerProduct.css>
</head>
<body>
    <header>
        <h1 id="pageName">SMART OEE</h1>
        <nav>
            <a href="../mainMenu.php">Inicio</a>
            <a href="#">Ayuda</a>
            <a href="../login/logout.php">Salir</a>
            
        </nav>

    </header>

    <div class="main-component">
        <div class="row m2">
            <div class="column m2-1">
                <div class="menu-container">
                    <nav class="menu-2">
                        <ul>
                            <li><a href="#">Usuarios</a>
                                <ul>
                                    <li><a href="../users/userSignup.php">Registrar usuario</a></li>
                                    <li><a href="../users/viewUsers.php">Ver usuarios</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Parametrización del sistema</a>
                                <ul>
                                    <li><a href="#">Productos</a></li>
                                        <ul>
                                            <li><a href="registerProduct.php">Registrar producto</a></li>
                                            <li><a href="viewProducts.php">Ver productos registrados</a></li>
                                        
                                        </ul>
                                    <li><a href="#">Paradas</a></li>
                                        <ul>
                                            <li><a href="registerStopProduction.php">Registrar tipo de paradas</a></li>
                                            <li><a href="viewPStopsProduction.php">Ver tipos de parada</a></li>
                                        
                                        </ul>
                                    <li><a href="#">Máquinas</a></li>
                                        <ul>
                                            <li><a href="registerMachine.php">Registrar tipo de máquina</a></li>
                                            <li><a href="viewMachines.php">Ver tipos de máquina</a></li>
                                        
                                        </ul>
                                    <li><a href="#">Fallas</a></li>
                                        <ul>
                                            <li><a href="../faults/registerFault.php">Registrar tipo de falla</a></li>
                                            <li><a href="../faults/viewFaults.php">Ver tipos de fallas</a></li>
                                        
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
                <h2 class="companyName" id="company"> <?php echo $_SESSION['company'];?></h2>

                <?php
       $x=isset($_REQUEST['user']);
      if($x=='fail'){  
        echo "<h3 style='color:red'>No se ha podido registar el producto, verifique los campos </h3>";
          }

                ?>
                <div class="container">
                    
               
                    <div class="row header">
                        <h1>Registrar máquinas  &nbsp;</h1>
                        <h3>Estimado usuario, por favor registre el nombre de la máquina:</h3>
                    </div>
                    <div class="row body">
                        <form role="form" name="formMachine" method="post" action = "validateMachineForm.php">
                        <ul>
                            
                            <li>
                            <p class="left">
                                <label for="first_name">Nombre de la máquina</label>
                                <input type="text" name="machine_name"  />
                            </p>
                            
                            </li>
                                    
        
                            
                            <li>
                            <input class="btn btn-submit" type="submit" value="Submit" />
                            <small>or press <strong>enter</strong></small>
                            </li>
                            
                        </ul>
                        </form>  
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

      <script src="js/menu1.js"></script>
</body>
</html>