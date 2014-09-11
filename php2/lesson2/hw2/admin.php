<?php 
header('Content-type: text/html; charset=UTF-8');
require_once 'auth.php';

$page_title = "Администрирование статей";
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
<table>
    <?php foreach ($all_articles as $article): ?>
        <tr class="article">
            <td><strong><?php echo $article['title']; ?></td>
            <td><?php echo substr($article['content'], 0, 300); ?>...</td>
            <td><?php echo $article['posted_date']; ?></td>
            <td><a href="delete.php?id=<?php echo $article['id']; ?>">Удалить</a></td>
            <td><a href="edit.php?id=<?php echo $article['id']; ?>">Изменить</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'tpl/footer.php'; ?>