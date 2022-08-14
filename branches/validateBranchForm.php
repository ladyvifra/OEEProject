<?php
session_start();
require "../connectiondb.php";
extract($_REQUEST);
$objConnection=Connect();



$sql ="INSERT INTO branch (bran_name, bran_address, bran_telephone, comp_nit)
VALUES('$_REQUEST[branch_name]','$_REQUEST[branch_address]','$_REQUEST[branch_telephone]','$_SESSION[companyNit]')";
echo ($sql);
$result = $objConnection->query($sql);

if($result){
   echo "<script>alert('La sucursal se ha registrado correctamente')</script>";
    header('location:../mainMenu.php?user=true');
}else
{
    echo "<script>alert('Se ha presentado un problema al registrar la sucursal') </sript>";
    header('location:registerFault.php?user=fail');
}

?>