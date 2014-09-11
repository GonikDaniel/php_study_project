<?php require_once '../../../tpl/header.php'; ?>

<div class="homework7">
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
	
	$query = "SELECT * FROM `images` ORDER BY `views` DESC, `likes` DESC ";
	$result = mysqli_query($dbc, $query)
	      or die("Ошибка при отправке запроса<br>" . mysql_error());
	$img_id = 33;

	echo '<div id="hw7_gallery">';
	while ($row = mysqli_fetch_array($result)) {
		echo '<div class="img_item">';
		echo '<img id="'. $row['id'] .'" src=" ' . THUMB_PATH . $row['thumb_name'] . ' " alt="миниатюра">';
		echo '<p>';
		echo '<span class="views" onclick="alert(\'Это количество просмотров, спасибо и Вам, если посмотрели!\')"></span>';
		echo '<i>' . $row['views'] . '</i>';
		echo '<span class="likes" id="like_' . $row['id'] . '" onclick="like_plus(' . $row['id'] . ')"></span>';
		echo '<i>' . $row['likes'] . '</i>';
		echo '</p>';
		echo '</div>';
		echo '<div class="hw7_wrapper"><div id="hw7_full_size_show"></div></div>';
	}
	echo '</div>';

	mysqli_close($dbc);
	?>


</div>

<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/global.js"></script>

</body>
</html>