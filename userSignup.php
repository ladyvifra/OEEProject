<?php

session_start();

extract($_REQUEST);
require "connectiondb.php";

$objectConnection = Connect();

echo $_SESSION['companyNit']


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet"href=style.css>
</head>
<body>
    <header>
        <h1 id="pageName">SMART OEE</h1>
        <nav>
            <a href="mainMenu.php">Inicio</a>
            <a href="#">Ayuda</a>
            <a href="index.php">Salir</a>
            
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
                                    <li><a href="userSignup.html">Registrar usuario</a></li>
                                    <li><a href="viewUsers.php">Ver usuarios</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Parametrización del sistema</a>
                                <ul>
                                    <li><a href="#">Productos</a></li>
                                    <li><a href="#">Paradas</a></li>
                                    <li><a href="#">Máquinas</a></li>
                                    <li><a href="#">Fallas</a></li>
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
                <h2 class="companyName" id="company"> Nombre de la empresa </h2>
                <h3 class="companyName"> Registrar nuevo usuario </h3>
                <div class="row-2">
                    <form role="form" v-on:submit.prevent="createPatient">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card m-2">
                                    <div class="card-body">
                                
                                        <div class="form-group">
                                            <label for="numeroIdentificacion">
                                                Número de identificación
                                            </label>
                                                <input type="text" class="form-control" id="identification" />
<br>
                                                <label for="numeroIdentificacion">
                                                    Nombres
                                                </label>
                                                <input type="text" class="form-control" id="Nombres">
                                                <br>

                                                <label for="numeroIdentificacion">
                                                    Apellidos
                                                </label>
                                                <input type="text" class="form-control" id="Apellidos">
                                            </div>
                                                    
                                                
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <label for="role">
                                                        Rol
                                                    </label>
                                                    <div class="form-check">
                                            
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                        Supervisor
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                        Operario
                                                        
                                                        </label>
                                                        
                                                    </div>
                                                </div>

                                          
                                                <div class="col-md-6 mb-4">
                                                    <label for="sucursal">
                                                        Sucursal
                                                    </label>
                            
                                                <select class="Sucursal">
                                                    <option value="1">Sucursal 1</option>
                                                    <option value="2">Sucursal 2</option>
                                                    <option value="3">Sucursal 3</option>
                                                    <option value="4">Sucursal 4</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="userTelephone">
                                                Número de contacto
                                            </label>
                                            <input type="text"class="form-control" id="nit" />
                                            <br>
                                            <label for="email">
                                                Correo electrónico
                                            </label>
                                            <input  type="text" class="form-control" id="email"/> 
                                        </div>
                                        
                            
                                        <div class="form-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Email input -->
                                                 <div class="form-outline mb-4">
                                                    <label class="form-label" for="form3Example3">Usuario</label>
                                                    <input type="username" id="form3Example3" class="form-control" />
                                                     
                                                </div>

                                                <!-- Password input -->
                                                <div class="form-outline mb-4">
                                                    <form action="" name="f1">
                                                        Contraseña: <input type="password" name="clave1" size="20">
                                                        <br>
                                                        Repite contraseña: <input type="password" name="clave2" size="20">
                                                        <br>
                                                        <input type="button" value="Comprobar si son iguales" onClick="comprobarClave()">
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>   

                                        </div>

                                        <div class="form-group">
                                            
                                            <div class="row m-2">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <div class="row m-2">
                                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                                    </div>
                                                    <div class="row m-2">
                                                    <button type="button" class="btn btn-danger" >Cancelar</button>
                                                    </div>        
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                   

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