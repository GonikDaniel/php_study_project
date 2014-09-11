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
		$single_article = ArticlesModel::findOne();

		$view = new View;
		$view->item = $single_article;
		$view->display('SingleArticle.php');
	}

	protected function randomAction()
	{
		$single_article = ArticlesModel::random();

		$view = new View;
		$view->item = $single_article;
		$view->display('SingleArticle.php');
	}

	protected function newAction()
	{
		$view = new View;
		$view->display('NewArticle.php');
	}

	protected function addedAction($title, $content)
	{	
		ArticlesModel::add($title, $content);

		$view = new View;
		$view->item = $single_article;
		$view->display('NewAddedArticle.php');
	}
}