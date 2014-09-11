<?php 

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$new_title = $_POST['title'];
	$new_content = $_POST['content'];

	if ('' !== $new_title && '' !== $new_content) {
		$ctrl = new AdminController();
		$ctrl->EditAction($id, $new_title, $new_content);
	} else {
		echo '<p>Вы не заполнили поля заголовка и/или контента.</p>';
	}
}

?>

<h1>Вы уверены что хотите редактировать эту статью?</h1>
<form action="" method="post">
		<label for="title">Заголовок:</label>
		<input type="text" id="article_title" name="title" value="<?php echo(!empty($new_title)) ? $new_title : $single_article['title']; ?>" style="margin-left:18px; resize: horizontal; width: 200px;"><br>

		<label for="content">Текст статьи:</label>
		<textarea id="article_content" name="content" cols="100" rows="20"><?php echo(!empty($new_content)) ? $new_content : $single_article['content']; ?></textarea><br><br>
		
		<input type="hidden" name="id" value="<?php echo $single_article['id']; ?>">
		<input type="submit" name="submit" id="submit" value="Редактировать">
</form>
<p><a href="admin.php">&lt;&lt; Назад к списку статей</a></p>