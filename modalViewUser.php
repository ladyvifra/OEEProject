<!--Modal ver usuario-->

<link rel="stylesheet" type="text/css" href="../modals.css">  

<div class="modal fade addNewInputs" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
  aria-hidden="true">
  <script>
    window.onload = function() {
  
  const view_user = Array.from(document.getElementsByClassName('view_user'));
//Convierte lo que trae la clase "view user" en array para manejarlo mejor
  view_user.forEach(user => { //se le asigna el evento clic a todos los elemntos del array con un for each
      user.addEventListener('click', (event)=>{
          var userSelect=user.getAttribute('user')  //guarda en el array lo que tra el atributo de html 2user"
          
          console.log(userSelect)
          d=userSelect.split('//');
          console.log(d);
          console.log(d[1]);

          var status;
          if(d[10]=='1'){
            status='Activo'
          }else{
            status= 'Inactivo'
          }

          document.getElementById("us_name").innerHTML = d[1];
          document.getElementById("us_lastname").innerHTML = d[2];
          document.getElementById("us_document").innerHTML = d[3];
          document.getElementById("us_role").innerHTML = d[4];
          document.getElementById("us_branch").innerHTML = d[5];
          document.getElementById("us_email").innerHTML = d[6];
          document.getElementById("us_telephone").innerHTML = d[7];
          document.getElementById("us_nick").innerHTML = d[8];
          document.getElementById("us_password").innerHTML = d[9];
          document.getElementById("us_status").innerHTML = status;
   
      }) 
    });
  }

    </script>
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
                        <h5 class="f-w-600 user_name"id = "us_name" >Nombre del usuario</h5>
                        <h5 class="f-w-600 user_lastname"id= "us_lastname" >Apellido del usuario</h5>
                        
                          <p class = "us_document" id="us_document">ID</p>
                          <p class = "us_rol" id="us_role">Rol</p>
                          <p class = "us_branch"id="us_branch">Sucursal</p>
                         
                          <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                      </div>
                    </div>
                    <div class="col-sm-8">
                     <div class="card-block">
                      <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Información de contacto</h6>
                      <div class="">
                        <div class="col-12">
                          <p class="m-b-10 f-w-600 us_email" >Email</p>
                            <h6 class="text-muted f-w-400" id="us_email">rntng@gmail.com</h6>
                        </div>
                        <div class="col-12">
                          <p class="m-b-10 f-w-600 us_telephone">Teléfono de contacto</p>
                            <h6 class="text-muted f-w-400" id="us_telephone">98979989898</h6>
                        </div>
                      </div>
                      <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Datos de acceso</h6>
                      <div class="">
                        <div class="col-12">
                          <p class="m-b-10 f-w-600 ">Usuario</p>
                            <h6 class="text-muted f-w-400 us_nick" id= "us_nick" >Sam Disuja</h6>
                        </div>
                        <div class="col-12">
                          <p class="m-b-10 f-w-600">Contraseña</p>
                          <h6 class="text-muted f-w-400 us_password" id= "us_password">******</h6>
                        </div>
                      </div>
                      <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Estado</h6>
                      <p class= "text-success us_status" id= "us_status"> Activo </p>
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



    <!--Eliminar usuario-->
                                      
                                  
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