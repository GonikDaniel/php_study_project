<?php require_once '../../../tpl/header.php'; ?>

	<div class="homework8">
	<p>
		Создать галерею изображений, состоящую из двух страниц:
		index.php – просмотр всех фотографий (уменьшенных копий);
		photo.php – просмотр конкретной фотографии (изображение оригинального размера).
		В базе данных создать таблицу, в которой будет храниться информация о картинках.
	</p>
	<p>
		На странице просмотра фотографии полного размера под картинкой должно быть указано число ее просмотров.
		На странице просмотра галереи список фотографий должен быть отсортирован по популярности. 
		Популярность - число кликов по фотографии.
	</p>


	<!-- Подключаем базу данных -->
	<?php 
	require 'dbconfig.php';
	dbconfig();

	define('IMAGE_PATH', '../../lesson6/hw6/img/');
	define('THUMB_PATH', '../../lesson6/hw6/thumbs/');
	

	$query = "SELECT * FROM `images` ORDER BY `views` DESC, `likes` ";
	$result = mysqli_query($dbc, $query)
	      or die("Ошибка при отправке запроса<br>" . mysql_error());

	echo '<div id="hw7_gallery">';

	while ($row = mysqli_fetch_array($result)) {
		echo '<div class="img_item">';
		echo '<img src=" ' . THUMB_PATH . $row['thumb_name'] . ' " alt="миниатюра">';
		echo '<p>';
		echo '<span class="views" onclick="alert(\'Привет!\')"></span>';
		echo '<b>' . $row['views'] . '</b>';
		echo '<span class="likes"></span>';
		echo '<b>' . $row['likes'] . '</b>';
		echo '</p>';
		echo '</div>';
	}

	echo '</div>';

	mysqli_close();

	?>


	</div>

</body>
</html>