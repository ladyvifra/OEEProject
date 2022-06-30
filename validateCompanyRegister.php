<?php
require "connectiondb.php";
extract ($_REQUEST);
//header('location: userAdmin.php?usu=$userAdmin');

$objConnection = Connect();

$sql="INSERT INTO Company(comp_nit, comp_name, comp_telephone, comp_address, comp_email)
VALUES
('$_REQUEST[identification]', '$_REQUEST[companyName]','$_REQUEST[companyTelephone]',
'$_REQUEST[companyAddress]','$_REQUEST[companyEmail]' )";

$result= $objConnection->query($sql);

//generar contraseña
function generatePassword()
{
    $key = "";
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $max = strlen($pattern)-1;
    for($i = 0; $i < 5; $i++){
        $key .= substr($pattern, mt_rand(0,$max), 1);
    }
    return $key;
}




// crea el usuario administrador

 $companyName=$_REQUEST['companyName'];;
 


function generateUser($companyName){

    $user = "admin".$companyName;
    return $user;
}

$passwordAdmin=generatePassword();
$userAdmin=generateUser($companyName);

echo $passwordAdmin." ".$userAdmin;



//insert de usuario administrador

$sql2="INSERT INTO User (us_email, us_contactNumber, us_nickname, us_password, comp_nit, us_role)
VALUES
('$_REQUEST[companyEmail]', '$_REQUEST[companyTelephone]','$userAdmin',
'$passwordAdmin','$_REQUEST[identification]',  '3')";
$result2= $objConnection->query($sql2);


//validar error exitoso retorne a la página anterior

if 




       
            

echo "<script>";
echo "alert('Datos no encontrados de la fecha');";
echo "window.close();";
echo "</script>";
?>