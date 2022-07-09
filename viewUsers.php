<?php
session_start();
require "connectiondb.php";

extract($_REQUEST);
if(!isset($_REQUEST['x']))
  $x=0;

  $objConnection= Connect();
//búsqueda supervisores
 $sql= "SELECT u.us_id,us_document, us_name, us_lastname, us_status, bran_name,MAX(login_date) AS lastDate FROM user u
  LEFT JOIN company c ON c.comp_nit= u.comp_nit
  LEFT JOIN branch b ON b.bran_id= u.bran_id
  LEFT JOIN login l ON l.us_id= u.us_id
    WHERE (u.us_role = 2) AND (u.comp_nit='$_SESSION[companyNit]')
   GROUP BY u.us_id";
//búsqueda operarios
$sql2= "SELECT u.us_id, us_document, us_name, us_lastname, us_status, bran_name,MAX(login_date) AS lastDate FROM user u
  LEFT JOIN company c ON c.comp_nit= u.comp_nit
  LEFT JOIN branch b ON b.bran_id= u.bran_id
  LEFT JOIN login l ON l.us_id= u.us_id
    WHERE (u.us_role = 1) AND (u.comp_nit='$_SESSION[companyNit]')
    GROUP BY u.us_id";

  
  $result1=$objConnection->query($sql);
  $result2=$objConnection->query($sql2);


 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

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
              <h1><?php echo $_SESSION['company'];?></h1>
                
                <div class="row-2">

                    <div class="tabs">
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
                                    <!--Modal-->
                                    <div class="row d-flex justify-content-center modalWrapper">
                                    <!--Modal añadir usuario-->
                                      <div class="modal fade addNewInputs" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header text-center">
                                              <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Añadir nuevo usuario</h4>
                                              <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body mx-3">
                                              <div class="md-form mb-5">
                                                <input type="text" id="inputName" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="inputName">Nombres</label>
                                              </div>
                                  
                                              <div class="md-form mb-5">
                                                <input type="text" id="inputPosition" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="inputPosition">Apellidos</label>
                                              </div>
                                  
                                              <div class="md-form mb-5">
                                                <input type="text" id="inputOfficeInput" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="inputOfficeInput">Planta</label>
                                              </div>
                                  
                                             
                        
                                              <div class="md-form mb-5">
                                                <input type="date" id="inputDate" class="form-control" placeholder="Select Date">
                                                <label data-error="wrong" data-success="right" for="inputDate"></label>
                                              </div>
                                  
                                              <div class="md-form mb-5">
                                                <input type="text" id="inputSalary" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="inputSalary">Estado</label>
                                              </div>
                                  
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center buttonAddFormWrapper">
                                              <button class="btn btn-outline-primary btn-block buttonAdd" data-dismiss="modal">Add form
                                                <i class="fas fa-paper-plane-o ml-1"></i>
                                              </button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  
                                      <div class="text-center">
                                        <a href="userSignup.php" class="btn btn-info btn-rounded btn-sm" data-toggle="modal" data-target="#modalAdd">Nuevo usuario<i
                                            class="fas fa-plus-square ml-1"></i></a>
                                      </div>
                                    <!--Modal editar usuario-->
                                      <div class="modal fade modalEditClass" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header text-center">
                                              <h4 class="modal-title w-100 font-weight-bold text-secondary ml-5">Editar registro</h4>
                                              <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            
                                            <div class="modal-body mx-3">

                                                <div class="md-form mb-5">
                                                    <input type="text" id="formIdEdit" class="form-control validate">
                                                    <label data-error="wrong" data-success="right" for="formNameEdit">Identificación</label>
                                                  </div>

                                              <div class="md-form mb-5">
                                                <input type="text" id="formNameEdit" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="formNameEdit">Nombres</label>
                                              </div>

                                              <div class="md-form mb-5">
                                                <input type="text" id="formLastNameEdit" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="formNameEdit">Apellidos</label>
                                              </div>
                                  
                                              <div class="md-form mb-5">
                                                  <div class="form-check">
                                                    <input class="form-check-input" id="flexRadioDefault1" type="radio" name="flexRadioDefault">
                                                    <label class="form-check-label" for="flexRadioDefault">"Supervisor"</label>
                                                  </div>

                                                  <div class="form-check">
                                                    <input class="form-check-input" id="flexRadioDefault2" type="radio" name="flexRadioDefault">
                                                    <label class="form-check-label" for="flexRadioDefault">"Operario"</label>
                                                  </div>
                                                
                                                <label data-error="wrong" data-success="right" for="formPositionEdit">Rol</label>
                                              </div>
                                  
                                              <div class="md-form mb-5">
                                                <label data-error="wrong" data-success="right" for="formOfficeEdit">Planta</label>
                                                <select class="Branch">
                                                    <option value="1">Sucursal1</option>
                                                    <option value="1">Sucursal2</option>
                                                    <option value="1">Sucursal3</option>
                                                    <option value="1">Sucursal4</option>
                                                </select>
                                              </div>
                                  
                                    
                                  
                                              <div class="md-form mb-5">
                                                <input type="date" id="inputDate" class="form-control" placeholder="Select Date">
                                                <label data-error="wrong" data-success="right" for="inputDate"></label>
                                              </div>
                                  
                                              <div class="md-form mb-5">
                                                <input type="text" id="userTelephoneEdit" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="userTelephoneEdit" >Número de contacto</label>
                                              </div>

                                              <div class="md-form mb-5">
                                                <input type="text" id="userEmail" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="userEmail" >Correo electrónico</label>
                                              </div>

                                              <div class="md-form mb-5">
                                                <input type="text" id="userUsername" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="userUsername" >Usuario</label>
                                              </div>

                                              <div class="md-form mb-5">
                                                <input type="text" id="userPassword" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="userPassword" >Contraseña</label>
                                              </div>
                                  
                                  
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center editInsideWrapper">
                                              <button class="btn btn-outline-secondary btn-block editInside" data-dismiss="modal">Editar registro
                                        
                                                <i class="fas fa-paper-plane-o ml-1"></i>
                                              </button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  
                                      <!--Eliminar usuario-->
                                      <div class="text-center buttonEditWrapper">
                                        <button class="btn btn-info btn-rounded btn-sm buttonEdit" data-toggle="modal" data-target="#modalEdit"
                                          disabled>Editar registro<i class="fas fa-pencil-square-o ml-1"></i></a>
                                      </div>
                                  
                                      <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header text-center">
                                              <h4 class="modal-title w-100 font-weight-bold ml-5 text-danger">Eliminar</h4>
                                              <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body mx-3">
                                              <p class="text-center h4">¿Está seguro de que desea eliminar el registro del usuario xxxxx?</p>
                                  
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center deleteButtonsWrapper">
                                              <button type="button" class="btn btn-danger btnYesClass" id="btnYes" data-dismiss="modal">Sí</button>
                                              <button type="button" class="btn btn-primary btnNoClass" id="btnNo" data-dismiss="modal">No</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  
                                      <div class="text-center">
                                        <button class="btn btn-danger btn-sm btn-rounded buttonDelete" data-toggle="modal" disabled data-target="#modalDelete"
                                          disabled>Eliminar<i class="fas fa-times ml-1"></i></a>
                                      </div>

                                      <div class="text-center">
                                        <button class="btn btn-danger btn-sm btn-rounded buttonView" data-toggle="modal" disabled data-target="#modalDelete"
                                          disabled>Ver Registro<i class="fas fa-times ml-1"></i></a>
                                      </div>
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
                                        <td align="center"><a href="viewUserRegister.php?us_id=<?php echo $user->us_id?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                      </svg></td>
                                        <td align="center"><a href="updateUser.php?us_id=<?php echo $user->us_id?>">
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
                                    <!--Modal añadir usuario-->
                                      <div class="modal fade addNewInputs" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header text-center">
                                              <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Añadir nuevo usuario</h4>
                                              <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body mx-3">
                                              <div class="md-form mb-5">
                                                <input type="text" id="inputName" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="inputName">Nombres</label>
                                              </div>
                                  
                                              <div class="md-form mb-5">
                                                <input type="text" id="inputPosition" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="inputPosition">Apellidos</label>
                                              </div>
                                  
                                              <div class="md-form mb-5">
                                                <input type="text" id="inputOfficeInput" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="inputOfficeInput">Planta</label>
                                              </div>
                                  
                                             
                        
                                              <div class="md-form mb-5">
                                                <input type="date" id="inputDate" class="form-control" placeholder="Select Date">
                                                <label data-error="wrong" data-success="right" for="inputDate"></label>
                                              </div>
                                  
                                              <div class="md-form mb-5">
                                                <input type="text" id="inputSalary" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="inputSalary">Estado</label>
                                              </div>
                                  
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center buttonAddFormWrapper">
                                              <button class="btn btn-outline-primary btn-block buttonAdd" data-dismiss="modal">Add form
                                                <i class="fas fa-paper-plane-o ml-1"></i>
                                              </button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  
                                      <div class="text-center">
                                        <a href="" class="btn btn-info btn-rounded btn-sm" data-toggle="modal" data-target="#modalAdd">Nuevo usuario<i
                                            class="fas fa-plus-square ml-1"></i></a>
                                      </div>
                                    <!--Modal editar usuario-->
                                      <div class="modal fade modalEditClass" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header text-center">
                                              <h4 class="modal-title w-100 font-weight-bold text-secondary ml-5">Editar registro</h4>
                                              <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            
                                            <div class="modal-body mx-3">

                                                <div class="md-form mb-5">
                                                    <input type="text" id="formIdEdit" class="form-control validate">
                                                    <label data-error="wrong" data-success="right" for="formNameEdit">Identificación</label>
                                                  </div>

                                              <div class="md-form mb-5">
                                                <input type="text" id="formNameEdit" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="formNameEdit">Nombres</label>
                                              </div>

                                              <div class="md-form mb-5">
                                                <input type="text" id="formLastNameEdit" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="formNameEdit">Apellidos</label>
                                              </div>
                                  
                                              <div class="md-form mb-5">
                                                  <div class="form-check">
                                                    <input class="form-check-input" id="flexRadioDefault1" type="radio" name="flexRadioDefault">
                                                    <label class="form-check-label" for="flexRadioDefault">"Supervisor"</label>
                                                  </div>

                                                  <div class="form-check">
                                                    <input class="form-check-input" id="flexRadioDefault2" type="radio" name="flexRadioDefault">
                                                    <label class="form-check-label" for="flexRadioDefault">"Operario"</label>
                                                  </div>
                                                
                                                <label data-error="wrong" data-success="right" for="formPositionEdit">Rol</label>
                                              </div>
                                  
                                              <div class="md-form mb-5">
                                                <label data-error="wrong" data-success="right" for="formOfficeEdit">Planta</label>
                                                <select class="Branch">
                                                    <option value="1">Sucursal1</option>
                                                    <option value="1">Sucursal2</option>
                                                    <option value="1">Sucursal3</option>
                                                    <option value="1">Sucursal4</option>
                                                </select>
                                              </div>
                                  
                                    
                                  
                                              <div class="md-form mb-5">
                                                <input type="date" id="inputDate" class="form-control" placeholder="Select Date">
                                                <label data-error="wrong" data-success="right" for="inputDate"></label>
                                              </div>
                                  
                                              <div class="md-form mb-5">
                                                <input type="text" id="userTelephoneEdit" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="userTelephoneEdit" >Número de contacto</label>
                                              </div>

                                              <div class="md-form mb-5">
                                                <input type="text" id="userEmail" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="userEmail" >Correo electrónico</label>
                                              </div>

                                              <div class="md-form mb-5">
                                                <input type="text" id="userUsername" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="userUsername" >Usuario</label>
                                              </div>

                                              <div class="md-form mb-5">
                                                <input type="text" id="userPassword" class="form-control validate">
                                                <label data-error="wrong" data-success="right" for="userPassword" >Contraseña</label>
                                              </div>
                                  
                                  
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center editInsideWrapper">
                                              <button class="btn btn-outline-secondary btn-block editInside" data-dismiss="modal">Editar registro
                                        
                                                <i class="fas fa-paper-plane-o ml-1"></i>
                                              </button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  
                                      <!--Eliminar usuario-->
                                      <div class="text-center buttonEditWrapper">
                                        <button class="btn btn-info btn-rounded btn-sm buttonEdit" data-toggle="modal" data-target="#modalEdit"
                                          disabled>Editar registro<i class="fas fa-pencil-square-o ml-1"></i></a>
                                      </div>
                                  
                                      <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header text-center">
                                              <h4 class="modal-title w-100 font-weight-bold ml-5 text-danger">Eliminar</h4>
                                              <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body mx-3">
                                              <p class="text-center h4">¿Está seguro de que desea eliminar el registro del usuario xxxxx?</p>
                                  
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center deleteButtonsWrapper">
                                              <button type="button" class="btn btn-danger btnYesClass" id="btnYes" data-dismiss="modal">Sí</button>
                                              <button type="button" class="btn btn-primary btnNoClass" id="btnNo" data-dismiss="modal">No</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  
                                      <div class="text-center">
                                        <button class="btn btn-danger btn-sm btn-rounded buttonDelete" data-toggle="modal" disabled data-target="#modalDelete"
                                          disabled>Eliminar<i class="fas fa-times ml-1"></i></a>
                                      </div>

                                      <div class="text-center">
                                        <button class="btn btn-danger btn-sm btn-rounded buttonView" data-toggle="modal" disabled data-target="#modalDelete"
                                          disabled>Ver Registro<i class="fas fa-times ml-1"></i></a>
                                      </div>
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
                                        <td align="center"><a href="viewUserRegister.php?us_id=<?php echo $user->us_id?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                      </svg></td>
                                        <td align="center"><a href="updateUser.php?us_id=<?php echo $user->us_id?>">
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

        </div>


    </div>
>
<script>
    $('#dtBasicExample').mdbEditor({
  mdbEditor: true
});
$('.dataTables_length').addClass('bs-select');
</script>
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
      <script src="viewUsers.js"></script>
</body>
</html>