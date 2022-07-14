<?php

session_start();

extract($_REQUEST);
require "../connectiondb.php";
$objConnection = Connect();

$sql="SELECT u.us_id, u.us_nickname, u.us_password, c.comp_name, u.comp_nit
FROM user u
INNER JOIN company c ON u.comp_nit= c.comp_nit
WHERE u.us_nickname= '$_REQUEST[user]' AND u.us_password = '$_REQUEST[password]'";



$result=$objConnection->query($sql);
$exist = $result->num_rows;





if($exist==1)

{
    $user=$result->fetch_object();
    $_SESSION['user']=$user->us_nickname;
    $_SESSION['company']=$user->comp_name;
    $_SESSION['companyNit']=$user->comp_nit;
    header("location:../mainMenu.php?");
    $idUser = $user->us_id;
    $sql2 ="INSERT INTO login (us_id) VALUES($idUser)";

$result2=$objConnection->query($sql2);

}

else
{
    header("location:login.php?x=1");
}




?>