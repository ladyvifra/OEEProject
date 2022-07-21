window.onload = function() {
  
    const view_user = Array.from(document.getElementsByClassName('view_user'));
//Convierte lo que trae la clase "view user" en array para manejarlo mejor
    view_user.forEach(user => { //se le asigna el evento clic a todos los elemntos del array con un for each
        user.addEventListener('click', (event)=>{
            var userSelect=user.getAttribute('user')  //guarda en el array lo que tra el atributo de html 2user"

            console.log(userSelect)
            $('.modal').fadeIn();

            
        }) 
    

    });

}


if(document.getElementById("modal_view_user ")){
    var modal = document.getElementById("modalAdd");
    var btn = document.getElementById("modal_view_user ");
    var span = document.getElementsByClassName("close_modal")[0];
    var body = document.getElementsByTagName("body")[0];

    btn.onclick = function() {
        modal.style.display = "block";

        body.style.position = "static";
        body.style.height = "100%";
        body.style.overflow = "hidden";
    }

    span.onclick = function() {
        modal.style.display = "none";

        body.style.position = "inherit";
        body.style.height = "auto";
        body.style.overflow = "visible";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";

            body.style.position = "inherit";
            body.style.height = "auto";
            body.style.overflow = "visible";
        }
    }
}




