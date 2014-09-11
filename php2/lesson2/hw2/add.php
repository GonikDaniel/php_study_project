<!-- add.php – добавление записи -->
<?php
$page_title = "Добавление статьи";
require_once '../../../tpl/header.php';
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<label for="title">Заголовок:</label>
		<input type="text" id="title" name="title" value="<?php if(!empty($title)) echo $title; ?>" style="margin-left:18px;"><br>

		<label for="content">Текст статьи:</label>
		<textarea id="content" name="content" value="<?php if(!empty($content)) echo $content; ?>"></textarea><br><br>

		<input type="submit" name="submit" id="submit" value="Опубликовать">
</form>

<?php

///////////////////Доделать со всеми проверками!!!!!//////////////////////

if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$content = $_POST['content'];
	function __autoload($class)	{ require_once __DIR__ . '/classes/' . $class . '.php';	}

	$dbc = new DbClass();
	$all_articles = $dbc->addArticle($title, $content);
	echo "Ваша статья была успешно добавлена в базу!";
}
//проверяем на дублирование
// $query = "SELECT * FROM `articles` WHERE `title` = '$title'";
// $data = mysqli_query($dbc, $query) or trigger_error(mysql_error().$query);
// if (mysqli_num_rows($data) > 0) {
// 	echo '<p>Вы уже добавляли статью с таким заголовком.</p>';
// 	exit();
// }

// if ('' !== $title && '' !== $content) {
// 	$query = "INSERT INTO `articles` (`title`, `content`) VALUES ('$title', '$content')";
// 	mysqli_query($dbc, $query) or trigger_error(mysql_error().$query);
// 	echo '<p>Статья успешно добавлена</p>';	
// } else {
// 	echo '<p>Вы не заполнили поля заголовка и/или контента.</p>';
// }

//Закрытие соединения
$dbc = null;
require_once 'tpl/footer.php'; 
?>