<?php 

class ArticlesController extends AbstractController
{
	protected function AllAction()
	{
		$all_articles = ArticlesModel::findAll();
		include __DIR__ . '/../views/AllArticles.php';
	}

	protected function OneAction()
	{
		$single_article = ArticlesModel::findOne();
		include __DIR__ . '/../views/SingleArticle.php';
	}

	protected function RandomAction()
	{
		$single_article = ArticlesModel::random();
		include __DIR__ . '/../views/SingleArticle.php';
	}

	protected function NewAction()
	{
		include __DIR__ . '/../views/NewArticle.php';
	}

	protected function AddedAction($title, $content)
	{	
		ArticlesModel::add($title, $content);
		include __DIR__ . '/../views/NewAddedArticle.php';
	}
}