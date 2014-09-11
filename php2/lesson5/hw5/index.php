<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Подключаем автозагрузчик
include __DIR__ . '/autoloader.php';

// if ($ctrl == 'Admin') {
// 	header('Location: ?ctrl=User&action=SignIn');
// }

//выводим шапку
require_once dirname(__FILE__) . '/../../../tpl/header.php';


//с роутингом нужно еще поработать, но в целом это уже функционирует
$url = !empty($_GET['url']) ? $_GET['url'] : 'Articles/all';
$url = rtrim($url, '/');
$url = explode('/', $url);

$ctrlClass = $url[0] . 'Controller';
$action = $url[1];
$param = isset($url[2]) ? $url[2] : '';
if (!class_exists($ctrlClass)) {
	$ctrl = new ErrorController;
	$ctrl->error();
} else {
	$controller = new $ctrlClass;
	if(!empty($param)) {
		$controller->action($action($param));
	} else {
		$controller->action($action);
	}
}

////////// Старая версия ///////////////
//создаем новый контроллер и вызываем у него действие
// $ctrlClass = $ctrl . 'Controller';
// if (!class_exists($ctrlClass)) {
// 	$ctrl = new ErrorController;
// 	$ctrl->error();
// } else {
// 	//обрабатываем запрос
// 	$ctrl = new $ctrlClass;
// 	$ctrl->action($action);
// }

require_once dirname(__FILE__) . '/../../../tpl/footer.php';
?>
