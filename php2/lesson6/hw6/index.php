<?php 

//Подключаем автозагрузчик
include __DIR__ . '/autoloader.php';

//ну собственно воспользуемся лучшими практиками;))
try {
	Bootstrap::start();	
} catch (Exception $e) {
	$e->getMessage();
}