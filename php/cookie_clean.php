<?php 

session_start();

setcookie('last_visited', '', time()-3600);
unset($_COOKIE['last_visited']);
session_destroy();
header('Location: index.php');

 ?>