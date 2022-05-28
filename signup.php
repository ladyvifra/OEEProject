<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet"href="assets/css/style.css">
</head>
<body>
<?php require "partials/header.php"?>

<div id="app" class="app">
    <header>
        <h1>SMART OEE</h1>
    </header>
    <section>
        <div class="main-component mt-5">

            <div id="IngresarPaciente">
                <div class="container">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-center">
                                    Registra tu empresa
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <form role="form" v-on:submit.prevent="createPatient">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="card m-2">
                                            <h5 class="card-header">
                                                Datos personales
                                            </h5>
                                            <div class="card-body">
                                        
                                                <div class="form-group">
                                                    <label for="numeroIdentificacion">
                                                        NIT
                                                    </label>
                                                    <input 
                                                    type="text"
                                                    class="form-control" 
                                                    id="nit" 
                                                    v-model="company.nit"
                                                    />
                                                </div>
                                                <div class="form-group">
                                                    <label for="companyName">
                                                        Nombre o razón social
                                                    </label>
                                                    <input 
                                                    type="text"
                                                    class="form-control" 
                                                    id="name" 
                                                    v-model="company.name"
                                                    />
                                                </div>
                                                <div class="form-group">
                                                    <label for="companyTelephone">
                                                        Número de contacto
                                                    </label>
                                                    <input 
                                                    type="text"
                                                    class="form-control" 
                                                    id="nit" 
                                                    v-model="company.telephone"
                                                    />
                                                </div>
                                                <div class="form-group">
                
                                                    <label for="direccion">
                                                        Dirección
                                                    </label>
                                                    <input 
                                                    type="text" 
                                                    class="form-control" 
                                                    id="direccion"
                                                    v-model="patient.direccion" 
                                                    />
                                                </div>
                                                <div class="form-group">
        
                                                    <label for="ciudad">
                                                        Ciudad
                                                    </label>
                                                    <input 
                                                    type="text" 
                                                    class="form-control" 
                                                    id="ciudad" 
                                                    v-model="patient.ciudad"
                                                    />
                                                </div>

                                                <div class="form-group">
        
                                                    <label for="ciudad">
                                                        Correo electrónico
                                                    </label>
                                                    <input 
                                                    type="text" 
                                                    class="form-control" 
                                                    id="ciudad" 
                                                    v-model="patient.ciudad"
                                                    />
                                                </div>
        
                                                    
                                            </div>
                                                
                                        </div>

                                

                                        <div class="row m-2">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <div class="row m-2">
                                                  <button type="submit" class="btn btn-primary">Enviar</button>
                                                </div>
                                                <div class="row m-2">
                                                  <button type="button" class="btn btn-danger" v-on:click="init">Cancelar</button>
                                                </div>        
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
    
</body>
</html>