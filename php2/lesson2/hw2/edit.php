<?php require_once 'auth.php'; ?>
<!-- edit.php – изменений одной записи -->
<?php

$page_title = "Редактирование статьи";
require_once '../../../tpl/header.php';
$id = intval($_GET['id']);
function __autoload($class) { require_once __DIR__ . '/classes/' . $class . '.php'; }

$dbc = new DbClass();
$editing_article = $dbc->selectOne($id);

?>

<h1>Вы уверены что хотите редактировать эту статью?</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<label for="title">Заголовок:</label>
		<input type="text" id="title" name="title" value="<?php echo(!empty($new_title)) ? $new_title : $editing_article['title']; ?>" style="margin-left:18px;"><br>

		<label for="content">Текст статьи:</label>
		<textarea id="content" name="content"><?php echo(!empty($new_content)) ? $new_content : $editing_article['content']; ?></textarea><br><br>
		
		<input type="hidden" name="id" id="" value="<?php echo $editing_article['id']; ?>">
		<input type="submit" name="submit" id="submit" value="Редактировать">
</form>
<p><a href="admin.php">&lt;&lt; Назад к списку статей</a></p>

<?php
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$new_title = $_POST['title'];
	$new_content = $_POST['content'];

	if ('' !== $new_title && '' !== $new_content) {
		$dbc->edit($id, $new_title, $new_content);
		echo "Вы успешно отредактировали статью";
	} else {
		echo '<p>Вы не заполнили поля заголовка и/или контента.</p>';
	}
}

$dbc = null;

?>