<?php 

session_start();

if (isset($_POST['password']) && $_POST['password'] == 123) {
	$_SESSION['logged'] = true;
}

if (isset($_SESSION['logged']) && $_SESSION['logged']) {
	header('Location: index.php');
	exit();
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
	  <script src="http://html5shiv.googcom/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
<form method="post" id="login_form">
	<table>
		<tr>
			<td><label for="password">Пароль:</label></td>
			<td><input type="password" id="password" name="password"></td>
			<td><input type="submit" name="submit" id="submit" value="submit"></td>
		</tr>
	</table>
</form>

</body>
</html>