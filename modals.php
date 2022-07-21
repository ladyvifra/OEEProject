<!--Modal ver usuario-->

<link rel="stylesheet" type="text/css" href="../modals.css">  
<script src="../js/functions.js"></script>
<div class="modal fade addNewInputs" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
  aria-hidden="true">
  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Datos de usuario </h4>
        <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="page-content page-container" id="page-content">
          
            <div class="">
              <div class="col-xl-12 col-md-12">
                <div class="card user-card-full">
                  <div class="row m-l-0 m-r-0">
                    <div class="col-sm-4 bg-c-lite-green user-profile">
                      <div class="card-block text-center text-white">
                        <div class="m-b-25">
                          <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                        </div>
                        <h6 class="f-w-600 user_name">Nombre del usuario</h6>
                        <h6 class="f-w-600 user_lastname">Apellido del usuario</h6>
                          <p class = "us_rol" >Rol</p>
                          <p class = "us_branch">Sucursal</p>
                          <p class = "us_document">ID</p>
                         
                          <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                      </div>
                    </div>
                    <div class="col-sm-8">
                     <div class="card-block">
                      <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Información de contacto</h6>
                      <div class="">
                        <div class="col-12">
                          <p class="m-b-10 f-w-600 us_email">Email</p>
                            <h6 class="text-muted f-w-400">rntng@gmail.com</h6>
                        </div>
                        <div class="col-12">
                          <p class="m-b-10 f-w-600 us_telephone">Teléfono de contacto</p>
                            <h6 class="text-muted f-w-400">98979989898</h6>
                        </div>
                      </div>
                      <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Datos de acceso</h6>
                      <div class="">
                        <div class="col-12">
                          <p class="m-b-10 f-w-600 ">Usuario</p>
                            <h6 class="text-muted f-w-400 us_nick">Sam Disuja</h6>
                        </div>
                        <div class="col-12">
                          <p class="m-b-10 f-w-600">Contraseña</p>
                          <h6 class="text-muted f-w-400 us_password">******</h6>
                        </div>
                      </div>
                      <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Estado</h6>
                      <p class= "text-success us_status" > Activo </p>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center buttonAddFormWrapper">
       <button class="btn btn-outline-primary btn-block close_modal"  data-dismiss="modal">Aceptar
        <i class="fas fa-paper-plane-o ml-1"></i>
       </button>
       <button class="btn btn-outline-primary btn-block buttonAdd" data-dismiss="modal">Editar
        <i class="fas fa-paper-plane-o ml-1"></i>
       </button>
      </div>
    </div>
  </div>
</div>