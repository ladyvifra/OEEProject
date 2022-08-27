




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar empresa</title>
    
    
    <link rel="stylesheet"href=../css/styleCopy.css>
    <link rel="stylesheet"href=../css/registerProduct.css>
</head>
<body>
<div id="app" class="app">
    <header>
        <h1 id="pageName">SMART OEE</h1>
    </header>
    <section>

        
    <div class="container">
                    
               
                    <div class="row header">
                        <h1>Registra tu empresa  &nbsp;</h1>
                        <h3>Estimado usuario, por favor registre su empresa:</h3>
                    </div>

                    <div class="row body">
                        <form role="form" id="form_create_company" name="form_create_company" method ="post" action="validateCompanyRegister.php">
                       <div class="row">
                                           
                                                <div class="card m-2">
                                                    <h3 class="card-header">
                                                        Datos personales
                                                    </h3>
                                                    <div class="card-body">
                                                
                                                        <div class="form-group">
                                                            <label for="identification">NIT </label>
                                                            <input name="identification"type="text"class="form-control" id="nit"/>
                                                            <br>

                                                            <label for="companyName">Nombre o razón social </label>

                                                            <input name="companyName" type="text"class="form-control" id="companyName"/>
                                                            <br>

                                                            <label for="companyTelephone"> Número de contacto</label>

                                                            <input  name= "companyTelephone" type="text" class="form-control"  id="companyTelephone" />
                                                            <br>

                                                            <label for="companyAddress">Dirección</label>
                                                            <input name= "companyAddress" type="text" class="form-control" id="companyAddress"/>
                                                            <br>

                                                            <label for="companyEmail">Correo electrónico</label>
                                                            <input name="companyEmail" type="text" class="form-control" id="companyEmail" />
                                                             <br>

                                                        </div>
        
                                                    </div>
                                                        
                                                </div>
        
                                        
        
                                                
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <div class="row m-2">
                                                          <button type="submit" class="btn-secundary" id="myBtn">Enviar</button>
                                                        </div>
                                                        <div class="row m-2">
                                                            <button  type="button" class="btn-secundary" onClick="window.location='../index.php'">Cancelar</button>
                                                        </div>        
                                                    </div>
                                                

                                                <!-- The Modal -->
                                                <div id="myModal" class="modal">

                                                    <!-- Modal content -->
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <span class="close">&times;</span>
                                                        <h2>SMART OEE</h2>
                                                    </div>
                                                    <div class="modal-body" id="loginData">
                                                        <p>Estimado usuario, gracias por registrar su empresa</p>
                                                        <p>A continuación, encontrará un usuario y contraseña generada por el sistema.</p>
                                                        <p id="user"> Usuario: <span id="myP">Nombre de la empresa></span></p>
                                                        <p id="password">Contraseña: <span id="passwordadmin"></span> </p>
                                                        
                                                        <h3><a id="login">Inicie sesión</a></H3>
                                                        <br>
                                                    </div>
                                            
                                                    </div>

                                                </div>
                                        </div>
                                    </form>  
                    </div>
                </div>
           

        


    </section>
    <!-- Footer -->
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
    </div>
    
    <?php
            
              if(isset($_GET['inicio'])){
                  
                  echo'<div class="alert alert-danger" role="alert">
			<strong>Lo sentimos!</strong> El usuario y la contraseña no coiciden intenta de nuevo.
			</div>';
              }
            ?>
</body>
</html>