<!-- article.php – выборка одной записи -->
<?php 
$page_title = "Случайно выбранная статья";
require_once '../../../tpl/header.php';

$id = intval($_GET['id']);
function __autoload($class)
{
	require_once __DIR__ . '/classes/' . $class . '.php';
}

$dbc = new DbClass();
$one_article = $dbc->selectOne($id);

//Закрытие соединения
$db = null;
?>

<div class="article">
	<h2><?php echo $one_article['title']; ?></h2>
	<p><?php echo $one_article['content']; ?></p>
	<p><?php echo $one_article['posted_date']; ?></p>
</div>


<?php require_once 'tpl/footer.php'; ?>