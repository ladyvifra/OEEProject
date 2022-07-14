<?php
session_start();
require "../connectiondb.php";
extract($_REQUEST);
$objConnection=Connect();


$idBranch='';

if($_REQUEST['branch']=='0'){
$idBranch='NULL';
}else{
    $idBranch=$_REQUEST['branch'];
}




$sql ="INSERT INTO user (us_name, us_lastName, us_document, us_email, us_contactNumber, us_nickname, us_password,
comp_nit, us_role, bran_id)
VALUES('$_REQUEST[name]','$_REQUEST[lastName]','$_REQUEST[identification]','$_REQUEST[email]',
'$_REQUEST[telephone]','$_REQUEST[username]','$_REQUEST[password]','$_SESSION[companyNit]',
'$_REQUEST[role]',$idBranch)";

$result = $objConnection->query($sql);

if($result){
   // echo "<script>alert('El usuario se ha registrado correctamente')</script>";
    header('location:../mainMenu.php?user=true');
}else
{
    //echo "<script>alert('Se ha presentado un problema al registrar usuario') </sript>";
    header('locaction:userSignup.php?user=fail');
}

?>