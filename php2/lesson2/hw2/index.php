<?php
header('Content-type: text/html; charset=UTF-8');

$page_title = "Главная";
require_once '../../../tpl/header.php';

function __autoload($class)
{
	require_once __DIR__ . '/classes/' . $class . '.php';
}

$dbc = new DbClass();
$all_articles = $dbc->selectAll();
// $articles = new Article($dbc);

//Закрытие соединения
$dbc = null;
?>

<?php foreach ($all_articles as $article): ?>
	<div class="article">
		<h2><?php echo $article['title']; ?></h2>
		<p><?php echo $article['content']; ?></p>
		<p><?php echo $article['posted_date']; ?></p>
	</div>
<?php endforeach; ?>

<?php require_once 'tpl/footer.php'; ?>