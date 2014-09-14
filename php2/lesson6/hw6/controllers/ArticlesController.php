<?php 

class ArticlesController extends AbstractController
{
	protected function allAction()
	{
		$all_articles = ArticlesModel::findAll();
		try {
			$twig = new TwigClass('AllArticles.twig');
			$twig->display($all_articles);
		} catch (Twig_Error $e) {
			echo $e->getMessage();
		}
	}

	protected function oneAction($id)
	{
		try {
			$single_article = ArticlesModel::findOne($id);
			$twig = new TwigClass('SingleArticle.twig');
			$twig->display($single_article);
			// var_dump($single_article);
		} catch (Twig_Error $e) {
			echo $e->getMessage();
		} catch (Exception $e) {
			// echo $e->getMessage();
			$view = new ErrorController;
			$view->error();
		}
	}

	protected function newAction()
	{
		$view = new View;
		$view->display('NewArticle.php');
	}

	protected function addAction()
	{	
		if ('' !== $_POST['title'] && '' !== $_POST['content']) {
			$article = new ArticlesModel();
			$article->title = htmlspecialchars($_POST['title']);
			$article->content = htmlspecialchars($_POST['content']);
			$article->save();
			header('Location: ../Articles/added');
		} else {
			echo '<p>Вы не заполнили поля заголовка и/или контента.</p>';
		}
	}

	protected function addedAction()
	{	
		$view = new View;
		$view->display('NewAddedArticle.php');
	}
}