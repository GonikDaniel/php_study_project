<?php foreach ($items as $article): ?>
	<div class="article">
		<h2><?php echo $article['title']; ?></h2>
		<p><?php echo $article['content']; ?></p>
		<p><?php echo $article['posted_date']; ?></p>
	</div>
<?php endforeach; ?>