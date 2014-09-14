<table>
    <?php foreach ($this->all_articles as $article): ?>
        <tr class="article">
        	<td><strong><?php echo $article->title; ?></strong></td>
            <td><?php echo substr($article->content, 0, 300); ?>...</td>
            <td><?php echo $article->posted_date; ?></td>
            <td><a href="../Admin/DeleteShow/<?php echo $article->id; ?>">Удалить</a></td>
            <td><a href="../Admin/EditShow/<?php echo $article->id; ?>">Изменить</a></td>
        </tr>
    <?php endforeach; ?>
</table>