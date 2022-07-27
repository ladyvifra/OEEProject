

<!--Modal editar usuario-->

<div class="modal fade modalEditClass" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
<script>



const branch = <?php echo json_encode($arrayBranch); ?>
        // Justo aquí estamos pasando la variable ----^
        console.log(typeof branch);
        console.log("Los datos son: ", branch);


window.addEventListener("load", function(event) {
    console.log("'Todos los recursos terminaron de cargar!");

   
     
  const edit_user = Array.from(document.getElementsByClassName('edit_user'));
//Convierte lo que trae la clase "view user" en array para manejarlo mejor
  edit_user.forEach(user => { //se le asigna el evento clic a todos los elemntos del array con un for each
      user.addEventListener('click', (event)=>{
          var userEdit=user.getAttribute('user')  //guarda en el array lo que tra el atributo de html 2user"
          
          console.log(userEdit)
          e=userEdit.split('//');
          console.log(e);
          console.log(e[1]);
          $("#formIdEdit").val(e[3]);
          $("#formNameEdit").val(e[1]);
          $("#formLastNameEdit").val(e[2]);
          $("#formTelephoneEdit").val(e[7]);
          $("#formEmailEdit").val(e[6]);
          $("#formUsernameEdit").val(e[8]);
          $("#formPasswordEdit").val(e[9]);
          console.log(e[4]);
            var role = e[4];

            console.log(typeof role);

          setRadio('flexRadioDefault', role)

          function setRadio(name, value) {
            document.querySelectorAll(`input[name="${name}"]`).forEach(element => {
                if(element.value === value) {
                    element.checked = true;
                }
            });
        }

// valor por defecto <select>
        document.ready = document.getElementById("branch").value = e[5];

      }) 
      
    });

    cargar_sucursales()

});



// funcion para Cargar sucursales al campo <select>
function cargar_sucursales() {
 

 addOptions("branch", branch);
}

// Rutina para agregar opciones a un <select>
function addOptions(domElement, json) {
 var select = document.getElementsByName(domElement)[0];

 Object.values(json).forEach(function(elm) {
  var option = document.createElement("option");
  option.text = elm.bran_name;
  var idBranch= document.getElementById("branch").value = elm.bran_id;

  console.log(elm);
  console.log(idBranch);
  select.add(option);
 })
}








  
    </script>
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
                        <label data-error="wrong" data-success="right" for="formNameEdit">Identificación</label>
                        <input name="identification" type="text" id="formIdEdit" class="form-control validate" value="">
                        
                            
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="formNameEdit">Nombres</label>
                        <input name="name" type="text" id="formNameEdit" class="form-control validate"value="">
                        
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="formNameEdit">Apellidos</label>
                        <input name="lastname" type="text" id="formLastNameEdit" class="form-control validate">
                            
                    </div>
                                  
                    <div class="md-form mb-5">
                      <label data-error="wrong" data-success="right" for="formPositionEdit">Rol</label>
                       

                        <div class="form-check" value=>
                        <input class="form-check-input" id="flexRadioDefault1" value="Operario" type="radio" name="flexRadioDefault">
                            <label class="form-check-label" for="flexRadioDefault" >Operario</label> 
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" id="flexRadioDefault2" value="Supervisor" type="radio" name="flexRadioDefault">
                            <label class="form-check-label" for="flexRadioDefault" >Supervisor</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" id="flexRadioDefault3" value="Administrador" type="radio" name="flexRadioDefault">
                            <label class="form-check-label" for="flexRadioDefault" >Administrador</label>
                        </div>
                       
                    </div>
                                  
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="formOfficeEdit">Planta</label>
                            <select class="Branch" name="branch" id="branch">
                                <option value=""></option>
                                
                            </select>
                    </div>
                                  
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="userTelephoneEdit" >Número de contacto</label>
                        <input type="text" id="formTelephoneEdit" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="userEmail" >Correo electrónico</label>
                        <input type="text" id="formEmailEdit" class="form-control validate">  
                    </div>

                    <div class="md-form mb-5">
                      <label data-error="wrong" data-success="right" for="userUsername" >Usuario</label>
                      <input type="text" id="formUsernameEdit" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                       <label data-error="wrong" data-success="right" for="userPassword" >Contraseña</label>
                       <input type="text" id="formPasswordEdit" class="form-control validate">
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