<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['logged'])) {
	header('Location: login.php');
	exit();
}

else if (isset($_SESSION['logged'])) {
	if (isset($_COOKIE['last_visited'])) {
		$last_visited = $_COOKIE['last_visited'];
	    header("Location: $last_visited");
	    exit (); 
		} 
	else {
			echo "Hello, darling! Seems like you never visited our site! :(";
		}
	}		

?>

<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>PHP Level1. Homeworks</title>
  <link rel="shortcut icon" href="favicon.ico">
  <link href='http://fonts.googleapis.com/css?family=Jura&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/style.css">
												  
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!--[if lt IE 9]>
	  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
	<div id="menu">
		<ul>
			<li><a href="lesson1/hw1/index.php">Homework1</a></li>
			<li><a href="lesson2/hw2/index.php">Homework2</a></li>
			<li><a href="lesson3/hw3/index.php">Homework3</a></li>
			<li><a href="lesson4/hw4/index.php">Homework4</a></li>
			<li><a href="lesson5/hw5/index.php">Homework5</a></li>
			<li><a href="lesson6/hw6/index.php">Homework6</a></li>
			<li class="personal_style">
				<div class="dop_menu">
					<a href="../../logout.php">logout</a>
					<a href="../../cookie_clean.php">!cookie</a>
					<a href="../../style.php">style</a>
				</div>
			</li>
		</ul>
	</div>

	<div class="howework1">

	</div>

</body>
</html>