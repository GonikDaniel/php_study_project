<?php 
	require_once 'auth.php';
	$page_title = "Администрирование статей";
	require_once '../../../tpl/header.php';

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	require_once 'config.php';

    $query = "SELECT * FROM `articles`";
    $data = mysqli_query($dbc,$query);
    echo '<table>';
    while ($row = mysqli_fetch_array($data)) {
    	echo '<tr class="article"><td><strong>' . $row['title'] . '</strong></td>';
    	echo '<td>' . substr($row['content'], 0, 300) . '...</td>';
    	echo '<td>' . $row['posted_date'] . '</td>';
    	
    	echo '<td><a href="delete.php?id=' . $row['id'] . '&amp;posted_date=' . $row['posted_date'] . '&amp;title=' . 
    	$row['title'] . '&amp;content=' . $row['content'] . '">Удалить</a>';
    	echo '<td><a href="edit.php?id=' . $row['id'] . '">Изменить</a>';
    	echo '</td></tr>';
    	
    }
    echo '</table>';
    mysqli_close($dbc);
	require_once 'tpl/footer.php';
?>