<?php
session_start();
require "../connectiondb.php";
extract($_REQUEST);
$objConnection=Connect();



$sql ="INSERT INTO product (prod_name, prod_description, comp_nit)
VALUES('$_REQUEST[product_name]','$_REQUEST[description]','$_SESSION[companyNit]')";
echo ($sql);
$result = $objConnection->query($sql);

if($result){
   // echo "<script>alert('El usuario se ha registrado correctamente')</script>";
    header('location:../mainMenu.php?user=true');
}else
{
    //echo "<script>alert('Se ha presentado un problema al registrar usuario') </sript>";
    header('locaction:registerProduct.php?user=fail');
}

?>