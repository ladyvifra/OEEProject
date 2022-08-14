<?php
session_start();
require "../connectiondb.php";
extract($_REQUEST);
$objConnection=Connect();



$sql ="INSERT INTO shift (sh_name, sh_start, sh_finish, comp_nit)
VALUES('$_REQUEST[shift_name]','$_REQUEST[start_time]','$_REQUEST[finish_time]','$_SESSION[companyNit]')";
echo ($sql);
$result = $objConnection->query($sql);

if($result){
   echo "<script>alert('El horario se ha registrado correctamente')</script>";
    header('location:../mainMenu.php?user=true');
}else
{
    echo "<script>alert('Se ha presentado un problema al registrar este horario') </sript>";
    header('location:registerFault.php?user=fail');
}

?>