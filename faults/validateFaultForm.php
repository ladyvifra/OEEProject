<?php
session_start();
require "../connectiondb.php";
extract($_REQUEST);
$objConnection=Connect();



$sql ="INSERT INTO fault_production (fault_name, fault_description, comp_nit)
VALUES('$_REQUEST[fault_name]','$_REQUEST[description]','$_SESSION[companyNit]')";
echo ($sql);
$result = $objConnection->query($sql);

if($result){
   echo "<script>alert('El tipo de falla se ha registrado correctamente')</script>";
    header('location:../mainMenu.php?user=true');
}else
{
    echo "<script>alert('Se ha presentado un problema al registrar usuario') </sript>";
    header('location:registerFault.php?user=fail');
}

?>