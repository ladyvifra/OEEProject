<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../style.css">    
<title>Document</title>
    
</head>
<body>

<!--Modal-->
<div class="row d-flex justify-content-center modalWrapper">
    <!--Modal añadir usuario-->
    <div class="modal fade addNewInputs" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"aria-hidden="true">
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
        <a class="btn btn-info btn-rounded btn-sm" data-toggle="modal" data-target="#modalAdd">Nuevo usuario<i
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
                                  
    <div class="text-center buttonEditWrapper">
        <button class="btn btn-info btn-rounded btn-sm buttonEdit" data-toggle="modal" data-target="#modalEdit"
        >Editar registro<i class="fas fa-pencil-square-o ml-1"></i></a>
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
    
</body>
</html>

