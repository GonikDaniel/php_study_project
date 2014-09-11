<?php 

if (isset($_POST['submit'])) {
	$new_title = $_POST['title'];
	$new_content = $_POST['content'];

	if ('' !== $new_title && '' !== $new_content) {
		$ctrl = new ArticlesController();
		$ctrl->AddedAction($new_title, $new_content);
		echo "Вы успешно добавили статью. ";
		echo "Хотите опубликовать <a href='?ctrl=Articles&action=New'>еще одну</a>?";
	} else {
		echo '<p>Вы не заполнили поля заголовка и/или контента.</p>';
	}
} else {

?>

<form action="" method="post">
		<label for="title">Заголовок:</label>
		<input type="text" id="title" name="title" value="<?php if(!empty($title)) echo $title; ?>" style="resize: horizontal; width: 200px;"><br>

		<label for="content">Текст статьи:</label>
		<textarea id="content" name="content" cols="100" rows="20" value="<?php if(!empty($content)) echo $content; ?>"></textarea><br><br>

		<input type="submit" name="submit" id="submit" value="Опубликовать">
</form>

<?php } ?>