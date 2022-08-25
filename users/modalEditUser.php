<!--Modal editar usuario-->

<div class="modal fade modalEditClass" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
<script>

var branch = <?php echo json_encode($arrayBranch); ?>
        // Justo aquí estamos pasando la variable ----^
        
        console.log("Las sucursales son: ", branch);

const role = <?php echo json_encode($arrayRole); ?>
        // Justo aquí estamos pasando la variable role----^
        
        console.log("Los roles son: ", role);


window.addEventListener("load", function(event) {
    //console.log("'Todos los recursos terminaron de cargar!");

   
     
  const edit_user = Array.from(document.getElementsByClassName('edit_user'));
//Convierte lo que trae la clase "view user" en array para manejarlo mejor
  edit_user.forEach(user => { //se le asigna el evento clic a todos los elemntos del array con un for each
      user.addEventListener('click', (event)=>{
          var userEdit=user.getAttribute('user')  //guarda en el array lo que tra el atributo de html 2user"
          
          console.log(userEdit)
          e=userEdit.split('//');
        
          
          $("#idUser").val(e[0]);
          $("#formIdEdit").val(e[3]);
          $("#formNameEdit").val(e[1]);
          $("#formLastNameEdit").val(e[2]);
          $("#formTelephoneEdit").val(e[7]);
          $("#formEmailEdit").val(e[6]);
          $("#formUsernameEdit").val(e[8]);
          $("#formPasswordEdit").val(e[9]);
          //$("#flexRadioDefault").val(e[4]);
          
          document.querySelector('#idUser').value=e[0];

          console.log(e[4]);
          var roleUser = e[11];
          console.log(roleUser);
          console.log(typeof roleUser);

        //función para seleccionar role por defecto
        function setRadio(name, value) {
            document.querySelectorAll(`input[name="${name}"]`).forEach(element => {
                if(element.value === value ){
                    element.checked = true;
                }
            });
        }

        cargar_sucursales();
        debugger
        cargarRol();
        setRadio('flexRadioDefault', roleUser)
        document.getElementById("branch").value = e[12];
      }) 
     
    });

   
  //  document.ready = 
    //
});


function cargarRol(){


    document.getElementById('select-rol').innerHTML=
    ` <label data-error="wrong" data-success="right" for="formPositionEdit">Rol</label> `;
let valorString="";

    Object.values(role).forEach(function(elm) {
        
       let dataRol= ` <div class="form-check" >
                    <input class="form-check-input" id="flexRadioDefault" value="${elm.rol_id}" type="radio" name="flexRadioDefault">
                    <label class="form-check-label" for="flexRadioDefault" >${elm.rol_name}</label> 
            </div>`
     
            valorString+=dataRol;
    })
    document.getElementById('select-rol').innerHTML=valorString
 
}



// funcion para Cargar sucursales al campo <select>
function cargar_sucursales() {
 addOptions("branch", branch);
}

//  agregar opciones a un <select> sucursales
function addOptions(domElement, json) {
    
//removeElement(domElement)
$('#'+domElement).empty();

 var select = document.getElementById(domElement);
 
 Object.values(json).forEach(function(elm) {
  var option = document.createElement("option");
  option.text = elm.bran_name;
  option.value= elm.bran_id;
  select.add(option);
 })

 function removeElement(id) {
    var elem = document.getElementById(id);
    return elem.parentNode.removeChild(elem);
}
}

 



    </script>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form role="form" name="formEditUser" method="post" action = "updateUser.php">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold text-secondary ml-5">Editar registro</h4>
                        <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                                            
                <div class="modal-body mx-3">
                    <form role="form" name="formUser" method="post" action = "validateUserForm.php">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="formNameEdit">Identificación</label>
                        <input name="formIdEdit" type="text" id="formIdEdit" class="form-control validate" value="">
                        
                            
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="formNameEdit">Nombres</label>
                        <input name="formNameEdit" type="text" id="formNameEdit" class="form-control validate"value="">
                        
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="formNameEdit">Apellidos</label>
                        <input name="formLastNameEdit" type="text" id="formLastNameEdit" class="form-control validate">
                            
                    </div>
                                  
                    <div class="md-form mb-5" id="select-rol">
                      
                       

                      

                       
                    </div>
                                  
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="formOfficeEdit">Planta</label>
                            <select class="Branch" name="branch" id="branch">
                                
                            </select>
                    </div>
                                  
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="userTelephoneEdit" >Número de contacto</label>
                        <input name= "formTelephoneEdit" type="text" id="formTelephoneEdit" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="userEmail" >Correo electrónico</label>
                        <input type="text" name="formEmailEdit" id="formEmailEdit" class="form-control validate">  
                    </div>

                    <div class="md-form mb-5">
                      <label data-error="wrong" data-success="right" for="userUsername" >Usuario</label>
                      <input type="text" name="formUsernameEdit" id="formUsernameEdit" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                       <label data-error="wrong" data-success="right" for="userPassword" >Contraseña</label>
                       <input type="text" name="formPasswordEdit" id="formPasswordEdit" class="form-control validate">
                    </div>
                </div>
                
                <div class="modal-footer d-flex justify-content-center editInsideWrapper">
                    
                    <button name= "submit" type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <input id= "idUser" name="idUser" type="hidden" value=""/>

            </form>
            </div>
        </div>
    </div>