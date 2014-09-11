<?php require_once 'auth.php'; ?>

<!-- delete.php – удаление одной записи -->

<?php 

	if (isset($_GET['id']) && isset($_GET['title']) && isset($_GET['content']) && isset($_GET['posted_date'])) {
		$id = $_GET['id'];
		$title = $_GET['title'];
		$content = $_GET['content'];
		$posted_date = $_GET['posted_date'];
	} elseif (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['score'])) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$posted_date = $_POST['posted_date'];
	} else {
		echo '<p class="error">Вы не выбрали ни одной статьи для удаления. Перейдите на страницу <a href="admin.php">администрирования</a></p>';
	}

	if (isset($_POST['submit'])) {
		if ($_POST['confirm'] == 'yes') {
			require_once 'config.php';

	        $query = "DELETE FROM `articles` WHERE id = $id LIMIT 1";
	        mysqli_query($dbc,$query) or trigger_error(mysql_error().$query);

	        mysqli_close($dbc);
	        echo '<p>Запись с названием ' .$title. ' была удалена.</p>';
		} else {
			echo '<p class="error">Статья по каким-то причинам не была удалена. Попробуйте еще раз.</p>';
		}
	} elseif (isset($id) && isset($title) && isset($content) && isset($posted_date)){

		echo '<p>Вы уверены, что хотите удалить данные этой статьи?</p>';
		echo '<p><strong>Заголовок: </strong>' . $title . '<br /><strong>Содержание: </strong>' . 
		$content . '<br /><strong>Дата публикации: </strong>' . $posted_date . '</p>';
		echo '<form method="post" action="delete.php">';
		echo '<input type="radio" name="confirm" value="yes" />Да';
		echo '<input type="radio" name="confirm" value="no" checked="checked" />Нет<br />';
		echo '<input type="submit" name="submit" value="Удалить" />';
		echo '<input type="hidden" name="id" value="'. $id .'" />';
		echo '<input type="hidden" name="title" value="'. $title .'" />';
		echo '<input type="hidden" name="posted_date" value="'. $posted_date .'" />';
		echo '</form>';
	}

	echo '<p><a href="admin.php">&lt;&lt; Назад к списку статей</a></p>';
 ?>	