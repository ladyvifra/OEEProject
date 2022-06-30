<?php

function connect()
{
    $connection =new MySQLi("localhost","root","","dboeesystem");

    if($connection->connect_errno)
        echo "Problemas en la conexión". $connection->connect_error;
    else
        return $connection;
}

?>