src="jquery-3.6.0.min.js"
"use strict"

document.getElementById('pageName').addEventListener('click',()=>{
    location.href='./index.html'
})

document.getElementById('login').addEventListener('click',()=>{
    location.href='./login.html'
})

//contraseña aleatoria

var el_down = document.getElementById("passwordadmin");
  
/* Function to generate combination of password */
function generateP() {
    var pass = '';
    var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' + 
            'abcdefghijklmnopqrstuvwxyz0123456789@#$';
      
    for (var i = 1; i <= 5; i++) {
        var char = Math.floor(Math.random()
                    * str.length + 1);
          
        pass += str.charAt(char)
    }
      
    return pass;
}

function gfg_Run() {
    saveLocalStorage("password", generateP());
}


function logSubmit(event) {
    //debugger
    event.preventDefault(); //Para no recargar la página
    localStorage.clear();

    var nit = document.getElementById('nit').value;
    console.log(nit)
    saveLocalStorage('nit',nit)

    var companyName = document.getElementById("companyName").value;
    console.log(companyName)
    saveLocalStorage("companyName",companyName)

    saveLocalStorage("user","admin" + companyName.substr(0,3));

    var companyTelephone = document.getElementById("companyTelephone").value;
    console.log(companyTelephone)
    saveLocalStorage("companyTelephone",companyTelephone)
    
    var companyDirection = document.getElementById("companyDirection").value;
    console.log(companyDirection)
    saveLocalStorage("companyDirection",companyDirection)
    
    var companyCity = document.getElementById("companyCity").value;
    console.log(companyCity)
    saveLocalStorage("companyCity",companyCity)

    var companyEmail = document.getElementById("companyEmail").value;
    console.log(companyEmail)
    saveLocalStorage("companyEmail",companyEmail)


    //generateP()
    gfg_Run()
    valLogin()
  
  }

  
  const form = document.getElementById('form_create_empresa');


  
  form.addEventListener('submit', logSubmit);

  function saveLocalStorage(key, value){
      localStorage.setItem(key,value)
  }

const div =document.getElementById("loginData");
div.addEventListener("login",valLogin);

  //funciones para el modal de registro de empresa
  // Get the modal
var modal = document.getElementById("myModal");

// genera el botón que abre el modal
var btn = document.getElementById("myBtn");

// span que cierra el modal
var span = document.getElementsByClassName("close")[0];

// cuando se da clic en el botón, se abre el modal
btn.onclick = function() {
  modal.style.display = "block";
}

// cuando el usuario de clic en "x" cierra el modal
span.onclick = function() {
  modal.style.display = "none";
}

// cerrar el modal cuando el usuario da click fuera del modal
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}



function valLogin(_event) {
   
    let user=localStorage.getItem("user");
    document.getElementById("myP").innerHTML= user;

    let password=localStorage.getItem("password");
    document.getElementById("passwordadmin").innerHTML= password;

    

}
