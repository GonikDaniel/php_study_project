<h1>Вы уверены что хотите удалить эту статью?</h1>
<div class="article">
	<h2><?php echo $single_article->title; ?></h2>
	<p><?php echo $single_article->content; ?></p>
	<p><?php echo $single_article->posted_date; ?></p>
	<form action="../../Admin/delete" method="post">
		<input type="hidden" name="id" value="<?php echo $single_article->id; ?>">
		<p><input type="submit" value="Удалить" name="submit"></p>
	</form>
</div>
<p><a href="../../Admin/all">&lt;&lt; Назад к списку статей</a></p>