<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Подключаем автозагрузчик
include __DIR__ . '/autoloader.php';

//Регистрируем автозагрузчик
spl_autoload_register(array('Autoloader' , 'load'));

//Добавляем путь к библиотекам
Autoloader::registerPath(dirname(__FILE__).'/controllers');
Autoloader::registerPath(dirname(__FILE__).'/model');
Autoloader::registerPath(dirname(__FILE__).'/views');

//Определяем были ли заданы контроллер и действие и считываем их, либо берем дефолтные
$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'Articles';
$action = !empty($_GET['action']) ? $_GET['action'] : 'All';

if ($_GET['ctrl'] = 'Admin') {
	require_once 'auth.php';
}

//выводим шапку
$page_title = "Главная";
require_once '../../../tpl/header.php';

//создаем новый контроллер и вызываем у него действие
$ctrlClass = $ctrl . 'Controller';
$ctrl = new $ctrlClass;
$ctrl->action($action);

require_once '../../../tpl/footer.php';
?>