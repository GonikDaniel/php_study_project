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

	protected function oneAction($id)
	{
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
		if ('' !== $_POST['title'] && '' !== $_POST['content']) {
			$article = new ArticlesModel();
			$article->title = htmlspecialchars($_POST['title']);
			$article->content = htmlspecialchars($_POST['content']);
			$article->save();
			// ArticlesModel::add($title, $content);
			$view = new View;
			$view->title = $article->title;
			$view->content = $article->content;
			$view->display('NewAddedArticle.php');
			echo "Вы успешно добавили статью. ";
			echo "Хотите опубликовать <a href='../Articles/new'>еще одну</a>?";
		} else {
			echo '<p>Вы не заполнили поля заголовка и/или контента.</p>';
		}
	}
}