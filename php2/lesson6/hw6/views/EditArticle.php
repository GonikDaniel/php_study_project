<h1>Вы уверены что хотите редактировать эту статью?</h1>
<form action="../../Admin/edit/<?php echo $single_article->id; ?>" method="post">
		<label for="title">Заголовок:</label>
		<input type="text" id="article_title" name="title" value="<?php echo(!empty($title)) ? $title : $single_article->title; ?>" style="margin-left:18px; resize: horizontal; width: 200px;"><br>

		<label for="content">Текст статьи:</label>
		<textarea id="article_content" name="content" cols="100" rows="20"><?php echo(!empty($content)) ? $content : $single_article->content; ?></textarea><br><br>
		
		<input type="hidden" name="id" value="<?php echo $single_article->id; ?>">
		<input type="submit" name="submit" id="submit" value="Редактировать">
</form>
<p><a href="../../Admin/all">&lt;&lt; Назад к списку статей</a></p>