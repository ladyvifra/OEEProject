<!--Modal reportar fallas de calidad-->

<div class="modal fade modalEditClass" id="modalFault" tabindex="-1" role="dialog" aria-hidden="true">
<script>

var faults = <?php echo json_encode($arrayFaults); ?>
        // Justo aquí estamos pasando la variable ----^
        
        console.log("Las tipos de falla son: ", faults);




window.addEventListener("load", function(event) {
    //console.log("'Todos los recursos terminaron de cargar!");
         cargar_fallas();
         

});


// funcion para Cargar sucursales al campo <select>
function cargar_fallas() {
 addOptions("faults", faults);
}

//  agregar opciones a un <select> sucursales
function addOptions(domElement, json) {
    
//removeElement(domElement)
$('#'+domElement).empty();

 var select = document.getElementById(domElement);
 
 Object.values(json).forEach(function(elm) {
  var option = document.createElement("option");
  option.text = elm.fault_name;
  option.value= elm.fault_id;
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
            
            <form role="form" name="repoFault" method="post" action = "validateReporFault.php">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold text-secondary ml-5">  Reportar falla de calidad</h4>
                        <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                                            
                <div class="modal-body mx-3">
                    <form role="form" name="formUser" method="post" action = "validateReporFault.php">
                    
                                  
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="formOfficeEdit">Tipo de falla</label>
                            <select class="Faults" name="faults" id="faults">
                                
                            </select>
                    </div>
                                  
                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="userTelephoneEdit" >Cantidad de productos con esta falla</label>
                        <input name= "amount" type="text" id="formTelephoneEdit" class="form-control validate">
                    </div>

                    

            

                    
                </div>
                
                <div class="modal-footer d-flex justify-content-center editInsideWrapper">
                    
                    <button name= "submit" type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <input id= "ordId" name="ordId" type="hidden" value="<?php echo $ordId?>"/>
              

            </form>
            </div>
        </div>
    </div>