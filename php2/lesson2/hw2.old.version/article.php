<!-- article.php – выборка одной записи -->
<?php 
$page_title = "Случайно выбранная статья";
require_once '../../../tpl/header.php';
require_once 'config.php';

$id = intval($_GET['id']);
$query = "SELECT * FROM `articles` WHERE `id` = $id";
$data = mysqli_query($dbc, $query) or trigger_error(mysql_error().$query);
while ($row = mysqli_fetch_array($data)) {
	echo '<strong>' . $row['title'] . '</strong><br><br>';
	echo $row['content'] . '<br><br>';
	echo $row['posted_date'];
}
mysqli_close($dbc);
require_once 'tpl/footer.php';
?>