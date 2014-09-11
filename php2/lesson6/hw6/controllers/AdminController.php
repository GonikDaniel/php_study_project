<?php 

class AdminController extends AbstractController implements AdminInterface
{
	protected function allAction()
	{
		$all_articles = ArticlesModel::findAll();
		include __DIR__ . '/../views/AdminView.php';
	}

	public function editShowAction($id)
	{	
		$single_article = ArticlesModel::findOne($id);
		include __DIR__ . '/../views/EditArticle.php';
	}

	public function editAction()
	{	
		$id = $_POST['id'];
		$new_title = $_POST['title'];
		$new_content = $_POST['content'];

		if ('' !== $new_title && '' !== $new_content) {
			ArticlesModel::edit($id, $new_title, $new_content);
			$view = new View;
			$view->title = $new_title;
			$view->content = $new_content;
			$view->display('EditedArticle.php');
		} else {
			echo '<p>Вы не заполнили поля заголовка и/или контента.</p>';
		}
	}

	public function deleteShowAction($id)
	{	
		$single_article = ArticlesModel::findOne($id);
		include __DIR__ . '/../views/DeleteArticle.php';
	}

	public function deleteAction()
	{
		$article = new ArticlesModel();
		$article->id = intval($_POST['id']);
		var_dump($article);
		$article->delete();

		include __DIR__ . '/../views/DeletedArticle.php';
	}

}