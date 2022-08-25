<?php

session_start();
require "../connectiondb.php";
extract($_REQUEST);
$objConnection=Connect();

echo $_REQUEST['ordId'];
echo $sql="SELECT capt_id  FROM capture_production WHERE ord_id='$_REQUEST[ordId]' ";
$result=$objConnection->query($sql);
$capture=$result->fetch_object();
$captId=$capture->capt_id;
 echo $captId;


//guardar parada de máquina

echo $sql2 ="INSERT INTO capture_production_has_faults(fault_id, capt_id, amount)
VALUES('$_REQUEST[faults]',$captId,'$_REQUEST[amount]')";
echo ($sql2);
$result2 = $objConnection->query($sql2);

//if($result){
    //echo "<script> alert('El usuario se ha actualizado correctamente')</script>";
    //header('location:selectCapture.php');
     
 //}else
 //{
     //echo "<script>alert('Se ha presentado un problema al actualizar el usuario') </script>";
     //header('location:../mainMenu.php?user=false');
 //}
	

?>
