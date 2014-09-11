<?php 

class ArticlesModel
{
	static public function findAll()
	{
		$dbc = new DbModel();
		$all_articles = $dbc->findAll();
		return $all_articles;
		$dbc=null;
	}

	static public function findOne($id)
	{
		$dbc = new DbModel();
		$single_article = $dbc->findOne($id);
		return $single_article;
		$dbc=null;
	}

	static public function Random()
	{
		$id = intval($_GET['id']);
		$dbc = new DbModel();
		$single_article = $dbc->findOne($id);
		return $single_article;
		$dbc=null;
	}

	static public function edit($id, $title, $content)
	{
		$dbc = new DbModel();
		$dbc->edit($id, $title, $content);
		$dbc=null;
	}

	static public function add($title, $content)
	{
		$dbc = new DbModel();
		$dbc->add($title, $content);
		$dbc=null;
	}

	static public function delete($id)
	{
		$dbc = new DbModel();
		$dbc->delete($id);
		$dbc=null;
	}
}

?>