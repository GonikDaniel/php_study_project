<?php

define('IMAGE_PATH', '../../lesson6/hw6/img/');
define('THUMB_PATH', '../../lesson6/hw6/thumbs/');

function dbconfig()
{
	// Настройки подключения к БД.
	$hostname = 'localhost';
	$username = 'root';
	$password = 'root';
	$dbName   = 'php2';
	
	// Языковая настройка.
	setlocale(LC_ALL, 'ru_RU.utf8');	
	
	// Подключение к БД.
	global $dbc;
	$dbc = mysqli_connect($hostname, $username, $password, $dbName) or die('No connect with data base'); 
	mysqli_query($dbc, 'SET NAMES utf8');

	// Открытие сессии.
	// session_start();		
}