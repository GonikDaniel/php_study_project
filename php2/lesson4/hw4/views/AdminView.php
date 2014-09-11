<table>
    <?php foreach ($all_articles as $article): ?>
        <tr class="article">
            <td><strong><?php echo $article['title']; ?></td>
            <td><?php echo substr($article['content'], 0, 300); ?>...</td>
            <td><?php echo $article['posted_date']; ?></td>
            <td><a href="?ctrl=Admin&action=DeleteShow&id=<?php echo $article['id']; ?>">Удалить</a></td>
            <td><a href="?ctrl=Admin&action=EditShow&id=<?php echo $article['id']; ?>">Изменить</a></td>
        </tr>
    <?php endforeach; ?>
</table>