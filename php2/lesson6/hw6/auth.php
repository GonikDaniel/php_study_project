<?php 
$username = 'admin';
$password = 'admin';

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || 
	($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: Basic realm="Php. Level 2"');
	exit('<h2 class="error">Судя по всему Вы ввели неправильный пароль или имя пользователя. Попробуйте сызнова!</h2>');
}

?>