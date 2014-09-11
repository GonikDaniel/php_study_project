<?php require_once 'auth.php'; ?>

<!-- delete.php – удаление одной записи -->

<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$page_title = "Удаление статьи";
require_once '../../../tpl/header.php';

$id = intval($_GET['id']);
function __autoload($class)
{
	require_once __DIR__ . '/classes/' . $class . '.php';
}

$dbc = new DbClass();
$one_article = $dbc->selectOne($id);

?>

<h1>Вы уверены что хотите удалить эту статью?</h1>
<div class="article">
	<h2><?php echo $one_article['title']; ?></h2>
	<p><?php echo $one_article['content']; ?></p>
	<p><?php echo $one_article['posted_date']; ?></p>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="hidden" name="id" id="" value="<?php echo $id; ?>">
		<p><input type="submit" value="Удалить" name="submit"></p>
	</form>
</div>
<p><a href="admin.php">&lt;&lt; Назад к списку статей</a></p>

<?php 
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$dbc = new DbClass();
	$dbc->delete($id);
	echo "Вы всё-таки удалили эту статью..:((";
}

//Закрытие соединения
$dbc = null;

require_once 'tpl/footer.php'; 
?>