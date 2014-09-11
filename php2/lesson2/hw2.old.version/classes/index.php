<?php 
class Article
{
    var $id;
    var $title;
    var $content;
	
	function __construct($id, $title, $content) {
		$this->id = $id; 
		$this->title = $title; 
		$this->content = $content;
	}
	// Функция для вывода статьи 
	public function view() {
		echo "<h1>$this->title</h1><p>$this->content</p>";
	}
}

$a = new Article(1, 'Новая статья', 'Какой-то текст!'); 
$a->view();

// Класс новости
class NewsArticle extends Article {
    var $datetime;
	function __construct($id, $title, $content) {
		parent::__construct($id, $title, $content);
		$this->datetime = time();
	}
}
// Класс статьи с указанием источника 
class CrossArticle extends Article 
{
	var $source;
	function __construct($id, $title, $content, $source) {
		parent::__construct($id, $title, $content);
		$this->source = $source; 
	}
	public function view() {
		echo "<h1>$this->title</h1><p>$this->content</p><p>$this->source</p>";
	}
}

$b = new CrossArticle (1, 'Новая статья', 'Какой-то текст!', 'Улица'); 
$b->view();
?>