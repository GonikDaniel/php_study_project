<?php 

class AdminController extends AbstractController implements AdminInterface
{
	protected function allAction()
	{
		$all_articles = ArticlesModel::findAll();
		include __DIR__ . '/../views/AdminView.php';
	}

	public function editShowAction()
	{	
		$id = intval($_GET['id']);
		$single_article = ArticlesModel::findOne($id);
		include __DIR__ . '/../views/EditArticle.php';
	}

	public function editAction($id, $title, $content)
	{	
		ArticlesModel::edit($id, $title, $content);
		include __DIR__ . '/../views/EditedArticle.php';
	}

	public function deleteShowAction()
	{	
		$id = intval($_GET['id']);
		$single_article = ArticlesModel::findOne($id);
		include __DIR__ . '/../views/DeleteArticle.php';
	}

	public function deleteAction()
	{
		$id = intval($_GET['id']);
		ArticlesModel::delete($id);
		include __DIR__ . '/../views/DeletedArticle.php';
	}

}