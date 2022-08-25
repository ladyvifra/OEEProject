<?php
session_start();
require "../connectiondb.php";
extract($_REQUEST);
$objConnection=Connect();

$sql ="INSERT INTO machine_has_product (mach_id, prod_id, units, minutes)
VALUES('$_REQUEST[machine]','$_REQUEST[product]','$_REQUEST[units]', '$_REQUEST[minutes]')";
echo ($sql);
$result = $objConnection->query($sql);

if($result){
   // echo "<script>alert('El usuario se ha registrado correctamente')</script>";
   header('location:../mainMenu.php?user=true');
}else
{
    //echo "<script>alert('Se ha presentado un problema al registrar usuario') </sript>";
    header('locaction:registerVelocity.php?user=fail');
}

?>

