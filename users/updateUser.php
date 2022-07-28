<?php

session_start();
require "../connectiondb.php";
extract($_REQUEST);
$objConnection=Connect();

$idBranch='';

if($_REQUEST['branch']){
    $idBranch=$_REQUEST['branch'];
}else{
    $idBranch='NULL';
}
echo $idBranch;
//Agregamos la sentencia sql que permite ingresar un registro a la tabla empleados
 echo $sql ="UPDATE user SET us_document = '$_REQUEST[formIdEdit]', us_name='$_REQUEST[formNameEdit]', 
 us_lastName= '$_REQUEST[formLastNameEdit]', us_email='$_REQUEST[formEmailEdit]', us_contactNumber='$_REQUEST[formTelephoneEdit]', 
 us_nickname= '$_REQUEST[formUsernameEdit]' , us_password='$_REQUEST[formPasswordEdit]', us_role='$_REQUEST[flexRadioDefault]'
 , bran_id=$idBranch WHERE us_id ='$_REQUEST[idUser]'";



$result = $objConnection->query($sql);
if($result){
    echo "<script> alert('El usuario se ha registrado correctamente')</script>";
     
 }else
 {
     echo "<script>alert('Se ha presentado un problema al registrar usuario') </script>";
  
 }
	

?>


