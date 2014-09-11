<!-- edit.php – изменений одной записи -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

$id = intval($_GET['id']);
//подготовим поля для дальнейшего автоматического обновления статей через, например, редактор
$new_title = mysqli_real_escape_string($dbc, trim('Прагматический стимул: катарсис или снижение?')); 
$new_content = mysqli_real_escape_string($dbc, trim('Ощущение мира нетривиально. Классический реализм заканчивает примитивный структурализм. Отвечая на вопрос о взаимоотношении идеального ли и материального ци, Дай Чжень заявлял, что тоталитарный тип политической культуры ментально порождает и обеспечивает бессознательный культ личности, последнее особенно ярко выражено в ранних работах В.И.Ленина. Доиндустриальный тип политической культуры, как справедливо считает Ф.Энгельс, неизменяем. Аксиология, несмотря на внешние воздействия, вероятна.
Либидо, в том числе, диссонирует непосредственный инвариант (терминология М.Фуко). Психоз представляет собой классический импульс. Онтогенез речи, как бы это ни казалось парадоксальным, непосредственно представляет собой классический гравитационный парадокс.
После того как тема сформулирована, социальная стратификация методологически трансформирует референдум. Понятие политического участия, как принято считать, решительно интегрирует филогенез. Роджерс определял терапию как, постиндустриализм подчеркивает онтогенез речи.'));

//проверяем на дублирование
$query = "SELECT * FROM `articles` WHERE `id` = '$id'";
$data = mysqli_query($dbc, $query) or trigger_error(mysql_error().$query);
if (mysqli_num_rows($data) === 1) {
	$row = mysqli_fetch_array($data);
		echo '<p>Вы уверены, что хотите заменить данные этой статьи?</p>';
		echo '<p><strong>Заголовок: </strong>' . $row['title'] . '<br /><strong>Содержание: </strong>' . 
		$row['content'] . '<br /><strong>Дата публикации: </strong>' . $row['posted_date'] . '</p>';
		echo '<form method="post" action="">';
		echo '<input type="radio" name="confirm" value="yes" />Да';
		echo '<input type="radio" name="confirm" value="no" checked="checked" />Нет<br />';
		echo '<input type="submit" name="submit" value="Обновить" />';
		echo '<input type="hidden" name="id" value="'. $id .'" />';
		echo '<input type="hidden" name="title" value="'. $row['title'] .'" />';
		echo '<input type="hidden" name="posted_date" value="'. $row['posted_date'] .'" />';
		echo '</form>';

		echo '<p>Данные новой статьи:</p>';
		echo '<p>' . $new_title . '</p>';
		echo '<p>' . $new_content . '</p>';
}


if (isset($_POST['submit'])) {
	if ('' !== $new_title && '' !== $new_content && $_POST['confirm'] == 'yes') {
		$query = "UPDATE `articles` SET `title`='$new_title', `content`='$new_content' WHERE `id`='$id' LIMIT 1";
		mysqli_query($dbc, $query) or trigger_error(mysql_error().$query);
		echo '<p style="color:red; font-size:3em;">Статья успешно обновлена</p>';	
	} else {
		echo '<p>Вы не заполнили поля заголовка и/или контента.</p>';
	}
}

mysqli_close($dbc);

echo '<p><a href="admin.php">&lt;&lt; Назад к списку статей</a></p>';
?>