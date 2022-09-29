<?php 
//a qui iniciamos la sesion, luego la destruimos, y redireccionamos
session_start();
session_destroy();
header("location:login.php");
 ?>
