<!-- Выборка всех записей -->
<?php
$page_title = "Главная";
require_once '../../../tpl/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

$query = "SELECT * FROM `articles`";
$data = mysqli_query($dbc, $query) or trigger_error(mysql_error().$query);
while ($row = mysqli_fetch_array($data)) {
	echo '<div class="article">';
	echo $row['title'] . '<br><br>';
	echo $row['content'] . '<br><br>';
	echo $row['posted_date'] . '<br>';
	echo '</div>';
}
mysqli_close($dbc);
require_once 'tpl/footer.php';
?>