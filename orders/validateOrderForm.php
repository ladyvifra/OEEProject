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

echo $sql="SELECT us_id  FROM user WHERE us_nickname='$_SESSION[user]' ";
$result=$objConnection->query($sql);
$user=$result->fetch_object();
$usId=$user->us_id;
 echo $usId;

$sql1="SELECT machxid_id, mach_id, prod_id, units, minutes  FROM machine_has_product  
WHERE mach_id='$_REQUEST[machine]' AND prod_id='$_REQUEST[product]'";
 
$result1=$objConnection->query($sql1);
$velocity=$result1->fetch_object();

//echo $velocity->units;
//echo $_REQUEST['quantity'];


//calcular el tiempo estimado

$estTime=($velocity->minutes*$_REQUEST['quantity'])/$velocity->units;
echo $estTime;



echo $sql2 ="INSERT INTO order_production (comp_nit, us_id, bran_id, ord_num, ord_date,mach_id, prod_id, 
ord_quantityProg , ord_timeEst)
VALUES('$_SESSION[companyNit]',$usId, '$_REQUEST[branch]','$_REQUEST[order_num]','$_REQUEST[date]','$_REQUEST[machine]', 
'$_REQUEST[product]','$_REQUEST[quantity]',$estTime)";
echo ($sql2);
$result2 = $objConnection->query($sql2);

if($result){
   // echo "<script>alert('El usuario se ha registrado correctamente')</script>";
   header('location:../mainMenu.php?user=true');
}else
{
    //echo "<script>alert('Se ha presentado un problema al registrar usuario') </sript>";
    header('locaction:registerOrder.php?user=fail');
}

?>
