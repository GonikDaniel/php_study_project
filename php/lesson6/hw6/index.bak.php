<?php

define("GW_MAXFILESIZE", "5000000");
require_once 'super_function.php';

//функция загрузки файлов
function upload_file($file) {
	if ($file['name'] == '') {
		echo 'Файл не выбран!';
		return; 
	}
	//Проверяем расширения изображений, их размер и процесс копирования из временной директории
	if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/png' || $file['type'] == 'image/pjpeg' || $file['type'] == 'image/gif') {
		if ($file['size'] <= GW_MAXFILESIZE) {
			if (copy($file['tmp_name'], 'img/'.$file['name'])) {
				echo 'Файл успешно загружен';
				img_resize('img/' . $file['name'], 'thumbs/thumb_' . $file['name'], '250', '150');
			} else { echo 'Ошибка загрузки файла'; return;}	
		} else {
			echo "Файл не должен превышать размер в 5 Мб!"; return;	}
	} else {
		echo "Файл должен иметь одно из известных расширений графических изображений (gif, jpeg или png)!";
		return;
	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Загрузка файла на сервер</title> 
</head>
<body>

	<h3>Здесь Вы можете добавить свои чудесные изображения на наш сайт!</h3>

	<?php 
		if (isset($_FILES['file'])) {
			upload_file($_FILES['file']);
		}
	 ?>

	<form method="post" enctype="multipart/form-data"> 
		<input type="file" name="file">
		<input type="submit" value="Загрузить файл!">
	</form>


	<?php

	$current_page = mb_substr($_SERVER['REQUEST_URI'], 0, 29);

	//Вывод миниатюр на экран
	$handle = opendir('thumbs');
	if ($handle != false) {
		// echo "Дескриптор каталога: $handle<br/>"; 
		echo "Галерея:<br/>";
		
	    while (false !== ($file = readdir($handle))) {
	        if ($file != '.' && $file != '..' && $file != '.DS_Store') {
	        	$full_size = mb_substr($file, 6);
				echo "<a href=\"$current_page/img/$full_size\" class=\"flipLightBox\" target=\"_blank\"><img src=\"thumbs/$file\" alt=\"\"><span>Очень даже классная галерея на js и php!</span></a>";
			}
	    }
	    closedir($handle);
	}

	?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="fliplightbox/fliplightbox.min.js"></script>
<script type="text/javascript">$('body').flipLightBox()</script>

</body>
</html>
<!-- 
Базовый блок
Создайте галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все картинки в уменьшенном виде и форму для загрузки нового изображения. При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width.
При загрузке изображения необходимо делать проверку на тип и размер файла.

Продвинутый блок
При загрузке изображения на сервер должна создаваться его уменьшенная копия. А на странице index.php должны выводиться именно копии. На реальных сайтах это активно используется для экономии трафика. При клике на уменьшенное изображение в браузере в новой вкладке должен открываться оригинал изображения.
Функция изменения размера картинок дана в исходниках. Вам необходимо суметь встроить её в систему. -->
