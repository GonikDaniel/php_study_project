<?php 

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['logged'])) {
	header('Location: login.php');
	exit();
}


if  (isset($_COOKIE['username']))
{
	$last_visited = $_COOKIE['username'];
    header("Location: $last_visited");
    exit (); 
} else {
	echo "Hello, darling! Seems like you never visited our site! :(";
}


?>

<p><a href="logout.php">Log out!</a></p> 
<p><a href="a.php">Page A</a></p> 
<p><a href="b.php">Page B</a></p>