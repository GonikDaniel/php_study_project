<?php

class Article
{
	public $id;
	public $title;
	public $content;
	public $preview;
	
	public function __construct($id, $title, $content)
	{
		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
		$this->preview = mb_substr($this->content, 0, 15);
	}

	//  Функция для вывода статьи
	public function view()
	{
		echo "<div class='article'><h1>$this->title</h1><p>$this->preview...</p></div>";
	}
}

class NewsArticle extends Article
{
	public $source;

	public function __construct($id, $title, $content, $source)
	{
		parent::__construct($id, $title, $content);
		date_default_timezone_set('UTC');
		$this->source = $source;
	}
	
	//  Функция для вывода статьи
	public function view()
	{
		echo "<div class='article'><h1>$this->title</h1><span style='color: red'>" .
			 "<b>Новость</b> от $this->source</span><p>$this->preview...</p></div>";
	}
}

