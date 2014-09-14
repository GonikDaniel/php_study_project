<?php 

//Подключаем автозагрузчик
include __DIR__ . '/autoloader.php';

//Подключаем автозагрузку зависимостей composer
require __DIR__ . '/vendor/autoload.php';

//Класс MyCompanyNamespace\SuperLogger определён в Composer-пакете mycompany/superlogger
$logger = new MyCompanyNamespace\SuperLogger();
//$logger->writeLog('log.txt', 'Someone visited the page');

//ну собственно воспользуемся лучшими практиками;))
try {
	Bootstrap::start();	
} catch (Exception $e) {
	$e->getMessage();
}