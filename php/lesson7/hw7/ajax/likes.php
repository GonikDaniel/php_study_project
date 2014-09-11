<?php 
	require '../dbconfig.php';
	dbconfig();

	if (isset($_GET['img_id'])) $img_id = $_GET['img_id'];

	$query = "SELECT * FROM `images` WHERE `id` = $img_id LIMIT 1";
	$result = mysqli_query($dbc, $query)
	      or die("Ошибка при отправке запроса<br>" . mysql_error());
	while ($row = mysqli_fetch_array($result)) {
		$new_like = $row['likes']+1;
		mysqli_query($dbc, "UPDATE `images` SET likes = '$new_like' WHERE id = '$img_id'") 
			or die('Запрос к БД не выполнен! Количество лайков осталось прежним...');
		echo $row['likes'];
	}
	mysqli_close($dbc);
?>