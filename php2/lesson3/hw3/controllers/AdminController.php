<?php 

class AdminController extends AbstractController implements AdminInterface
{
	protected function AllAction()
	{
		$all_articles = ArticlesModel::findAll();
		include __DIR__ . '/../views/AdminView.php';
	}

	public function EditShowAction()
	{	
		$id = intval($_GET['id']);
		$single_article = ArticlesModel::findOne($id);
		include __DIR__ . '/../views/EditArticle.php';
	}

	public function EditAction($id, $title, $content)
	{	
		ArticlesModel::edit($id, $title, $content);
		include __DIR__ . '/../views/EditedArticle.php';
	}

	public function DeleteShowAction()
	{	
		$id = intval($_GET['id']);
		$single_article = ArticlesModel::findOne($id);
		include __DIR__ . '/../views/DeleteArticle.php';
	}

	public function DeleteAction()
	{
		$id = intval($_GET['id']);
		ArticlesModel::delete($id);
		include __DIR__ . '/../views/DeletedArticle.php';
	}

}