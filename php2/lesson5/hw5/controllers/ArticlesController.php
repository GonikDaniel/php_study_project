<?php 

class ArticlesController extends AbstractController
{
	protected function allAction()
	{
		$all_articles = ArticlesModel::findAll();
		$view = new View;
		$view->items = $all_articles;
		$view->display('AllArticles.php');
	}

	protected function oneAction()
	{
		$id = intval($_GET['id']);
		$single_article = ArticlesModel::findOne($id);
		$view = new View;
		$view->item = $single_article;
		$view->display('SingleArticle.php');
	}

	protected function newAction()
	{
		$view = new View;
		$view->display('NewArticle.php');
	}

	protected function addedAction()
	{	
		$title = $_POST['title'];
		$content = $_POST['content'];

		if ('' !== $title && '' !== $content) {
			ArticlesModel::add($title, $content);
			$view = new View;
			$view->title = $title;
			$view->content = $content;
			$view->display('NewAddedArticle.php');
			echo "Вы успешно добавили статью. ";
			echo "Хотите опубликовать <a href='?ctrl=Articles&action=New'>еще одну</a>?";
		} else {
			echo '<p>Вы не заполнили поля заголовка и/или контента.</p>';
		}
	}
}