<?php 

class AdminController extends AbstractController implements AdminInterface
{
	protected function allAction()
	{
		$all_articles = ArticlesModel::findAll();
		$view = new View();
		$view->all_articles = $all_articles;
		$view->display('AdminView.php');
	}

	public function editShowAction($id) //можно переделать с помощью $_SERVER['REQUEST_METHOD'] === POST/GET ?
	{	
		try {
			$single_article = ArticlesModel::findOne($id);
			$view = new View();
			$view->single_article = $single_article;
			$view->display('EditArticle.php');	
		} catch (Exception $e) {
			// echo $e->getMessage();
			$view = new ErrorController;
			$view->error();
		}
	}

	public function editAction($id)
	{	
		try {
			if ('' !== $_POST['title'] && '' !== $_POST['content']) {
				$article = ArticlesModel::findOne($id);
				$article->id = intval($_POST['id']);
				$article->title = htmlspecialchars($_POST['title']);
				$article->content = htmlspecialchars($_POST['content']);
				$article->save();
				$view = new View;
				$view->title = $article->title;
				$view->content = $article->content;
				$view->display('EditedArticle.php');
				// $view->display('EditArticle.php');
			} else {
				echo '<p>Вы не заполнили поля заголовка и/или контента.</p>';
			}	
		} catch (Exception $e) {
			// echo $e->getMessage();
			$view = new ErrorController;
			$view->error();
		}
		
	}

	public function deleteShowAction($id)
	{	
		try {
			$single_article = ArticlesModel::findOne($id);
			$view = new View();
			$view->single_article = $single_article;
			$view->display('DeleteArticle.php');
		} catch (Exception $e) {
			// echo $e->getMessage();
			$view = new ErrorController;
			$view->error();
		}
	}

	public function deleteAction()
	{
		try {
			$article = new ArticlesModel();
			$article->id = intval($_POST['id']);
			$article->delete();
			$view = new View();
			$view->display('DeletedArticle.php');
		} catch (Exception $e) {
			// echo $e->getMessage();
			$view = new ErrorController;
			$view->error();
		}
	}

}