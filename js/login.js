"use strict"

document.getElementById('pageName').addEventListener('click',()=>{
    location.href='./index.html'
})

function validar()
{
    let usuario = document.getElementById("user").value;
    let pass = document.getElementById("password").value;

    if(usuario==localStorage.getItem("user")&& pass== localStorage.getItem("password"))
    {
        location.href='./menu1.html'
    }
    else{
        alert("Señor usuario, verifique sus datos")
    }
}