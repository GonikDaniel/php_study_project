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

<form method="post">
	<table>
		<tr>
			<td><label for="login">Логин:</label></td>
			<td><input type="text" id="login" name="login"></td>
		</tr>
		<tr>
			<td><label for="password">Пароль:</label></td>
			<td><input type="password" id="password" name="password"></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" id="submit" value="submit"></td>
		</tr>
	</table>
</form>