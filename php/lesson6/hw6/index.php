<?php require_once '../../../tpl/header.php'; require_once 'functions.php'; ?>

	<div class="homework6">
	<p>
		Создайте галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все картинки в уменьшенном виде и форму для загрузки нового изображения. При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width.
		При загрузке изображения необходимо делать проверку на тип и размер файла.
	</p>
	<p>
		При загрузке изображения на сервер должна создаваться его уменьшенная копия. А на странице index.php должны выводиться именно копии. На реальных сайтах это активно используется для экономии трафика. При клике на уменьшенное изображение в браузере в новой вкладке должен открываться оригинал изображения.
		Функция изменения размера картинок дана в исходниках. Вам необходимо суметь встроить её в систему.
	</p>
		<h2>Здесь Вы можете добавить свои чудесные изображения на наш сайт!</h2>

		<?php 
			if (isset($_FILES['file'])) {
				upload_file($_FILES['file']);
			}
		 ?>

		<form method="post" enctype="multipart/form-data"> 
			<input type="file" name="file" class="gallery_input">
			<input type="submit" value="Загрузить файл!" class="gallery_button">
		</form>


		<?php

		$current_page = mb_substr($_SERVER['REQUEST_URI'], 0, 29);

		//Вывод миниатюр на экран
		$handle = opendir('thumbs');
		if ($handle != false) {
			echo "<div class=\"hw6_gallery\"><h1>Галерея:</h1><br>";
			
		    while (false !== ($file = readdir($handle))) {
		        if ($file != '.' && $file != '..' && $file != '.DS_Store') {
		        	$full_size = mb_substr($file, 6);
					echo "<a href=\"$current_page/img/$full_size\" class=\"flipLightBox\" target=\"_blank\"><img src=\"thumbs/$file\" alt=\"\"><span>Очень даже классная галерея на js и php!</span></a>";
				}
		    }
		    echo "</div>";
		    closedir($handle);
		}

		?>

		<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="fliplightbox/fliplightbox.min.js"></script>
		<script type="text/javascript">$('body').flipLightBox()</script>

	</div>

</body>
</html>