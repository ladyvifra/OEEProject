<!--Modal reportar parada-->

<div class="modal fade modalEditClass" id="modalRepStop" tabindex="-1" role="dialog" aria-hidden="true">
<script>

var stops = <?php echo json_encode($arrayStops); ?>
        // Justo aquí estamos pasando la variable ----^
        
        console.log("Las tipos de parada son: ", stops);




window.addEventListener("load", function(event) {
    //console.log("'Todos los recursos terminaron de cargar!");
         cargar_paradas();
         

});


// funcion para Cargar paradas al campo <select>
function cargar_paradas() {
 addOptions("stops", stops);
}

//  agregar opciones a un <select> sucursales
function addOptions(domElement, json) {
    
//removeElement(domElement)
$('#'+domElement).empty();

 var select = document.getElementById(domElement);
 
 Object.values(json).forEach(function(elm) {
  var option = document.createElement("option");
  option.text = elm.stop_name;
  option.value= elm.stop_id;
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
            
            <form role="form" name="repoStop" method="post" action = "validateReporStop.php">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold text-secondary ml-5">  Reportar parada</h4>
                        <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                                            
                <div class="modal-body mx-3">
                    <form role="form" name="formUser" method="post" action = "validateReporStop.php">
                    
                                  
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="formOfficeEdit">Tipo de parada</label>
                            <select class="stops" name="stops" id="stops">
                                
                            </select>
                    </div>
                                  
                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="userTelephoneEdit" >Hora de nicio</label>
                        <input name= "startTime" type="time" id="formTelephoneEdit" class="form-control validate">
                    </div>

                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="userEmail" >Hora de finalización</label>
                        <input type="time" name="finishTime" id="formEmailEdit" class="form-control validate">  
                    </div>

                    <div class="md-form mb-5">
                      <label data-error="wrong" data-success="right" for="userUsername" >Descripción</label>
                      <textarea cols="46" rows="3" name="description" id="formUsernameEdit" class="form-control validate"></textarea>
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