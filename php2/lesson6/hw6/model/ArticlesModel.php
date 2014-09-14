<?php 

class ArticlesModel
	extends AbstractModel
{
	static protected $table = 'articles';
	static public $cols = ['title', 'content'];
	public $title;
	public $content;
}

?>