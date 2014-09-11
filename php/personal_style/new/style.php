<?php 

$_COOKIE['personal_style'] = $_POST['personal_style'];
setcookie('personal_style', $_COOKIE['personal_style'], time() + 365*24*60*60, '/');
require_once '../../../tpl/header.php';
?>

	
	<form method="post" id="style_form">
	<h3>Выберите Ваш стиль оформления:</h3>
		<select name="personal_style" id="">
			<option value="style" checked>Стиль</option>
			<option value="style">style</option>
			<option value="rightstyle">rightstyle</option>
			<option value="deadstyle">deadstyle</option>
			<option value="habrastyle">habrastyle</option>
		</select>
		<input type="submit" name="submit" id="submit" value="Ok">
	</form>
</body>
</html>