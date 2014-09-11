<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Просмотр фото</title>
	<style>
		#hw7_full_image {
			text-align: center;
		}
	</style>
</head>
<body>
	
</body>
</html>
<?php 
	require 'dbconfig.php';
	dbconfig();

	if (isset($_GET['img_id'])) $img_id = $_GET['img_id'];
	$query = "SELECT * FROM `images` WHERE `id` = $img_id LIMIT 1";
	$result = mysqli_query($dbc, $query)
	      or die("Ошибка при отправке запроса<br>" . mysql_error());

	while ($row = mysqli_fetch_array($result)) {
		$new_counter = $row['views']+1;
		mysqli_query($dbc, "UPDATE `images` SET views = '$new_counter' WHERE id = '$img_id'") 
			or die('Запрос к БД не выполнен! Количество просмотров осталось прежним..');
		}
	$result = mysqli_query($dbc, $query)
	      or die("Ошибка при отправке запроса<br>" . mysql_error());

	echo '<div id="hw7_gallery">';
	while ($row = mysqli_fetch_array($result)) {
		echo '<div id="hw7_full_image">';
		echo '<img src=" ' . IMAGE_PATH . $row['image_name'] . ' " alt="полное изображение">';
		echo '<p>';
		echo '<span class="views" onclick="alert(\'Это количество просмотров, спасибо и Вам, что посмотрели!\')"></span>';
		echo '<b>' . $row['views'] . '</b>';
		echo '<span class="likes"></span>';
		echo '<b>' . $row['likes'] . '</b>';
		echo '</p>';
		echo "</div>";

	}
	echo '</div>';

	mysqli_close($dbc);
 ?>