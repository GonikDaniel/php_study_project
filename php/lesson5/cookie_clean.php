<?php 

session_start();

setcookie('username', '', time()-3600);
session_destroy();
header('Location: index.php');

 ?>