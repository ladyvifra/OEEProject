"use strict"

document.getElementById('pageName').addEventListener('click',()=>{
    location.href='./index.html'
})

document.getElementById('rounded-circle info').addEventListener('click',()=>{
    location.href='./info.html'
})

function logSubmit(event) {
    debugger
    event.preventDefault(); //Para no recargar la página

    var nit = document.getElementById('nit').value;
    console.log(nit)
    saveLocalStorage('nit',nit)

    var companyName = document.getElementById("companyName").value;
    console.log(companyName)
    saveLocalStorage("companyName",companyName)

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
  
  }
  
  const form = document.getElementById('form_create_empresa');
  
  form.addEventListener('submit', logSubmit);

  function saveLocalStorage(key, value){
      localStorage.setItem(key,value)
  }


  