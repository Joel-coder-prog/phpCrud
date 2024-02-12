<?php

$mysqlConexion = new mysqli("localhost", "root", "root", "personas_bbdd");
if($mysqlConexion->connect_error){
    die("error de conexion".$mysqlConexion->connect_error);
}
//printf("servidor conectado con personas_bbdd");

?>