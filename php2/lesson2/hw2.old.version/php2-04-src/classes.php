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
		echo "<h1>$this->title</h1><p>$this->preview...</p>";
	}
}

class ArticleWithPic extends Article
{
	public $picture_name;

	const PATH = 'img/';

	public function __construct($id, $title, $content, $picture_name)
	{
		parent::__construct($id, $title, $content);
		$this->picture_name = $picture_name;
	}
	
	//  Функция для вывода статьи
	public function view()
	{
		echo "<h1>$this->title</h1><img src='".
				self::PATH . $this->picture_name .
				"' alt='картинка'><p><b>Новость</b></p><p>$this->preview...</p>";
	}
}


class NewsArticle extends Article
{
	public $datetime;

	public function __construct($id, $title, $content)
	{
		parent::__construct($id, $title, $content);
		date_default_timezone_set('UTC');
		$this->datetime = time();
	}
	
	//  Функция для вывода статьи
	public function view()
	{
		echo "<h1>$this->title</h1><span style='color: red'>".
				strftime('%d.%m.%y', $this->datetime). ' ' .
				"<b>Новость</b></span><p>$this->preview...</p>";
	}
}

class CrossArticle extends Article
{
	public $source;
	
	public function __construct($id, $title, $content, $source)
	{
		parent::__construct($id, $title, $content);
		$this->source = $source;
	}

	public function view()
	{
		parent::view();
		echo '<small>'.$this->source.'</small>';
	}
}

class ArticleList
{
	public $alist;
	
	public function add(Article $article)
	{
		$this->alist[] = $article;
	}
	
	//  Вывод статей
	public function view()
	{
		foreach($this->alist as $article)
		{
			$article->view();
			echo '<hr>';
		}
	}

	// public function __clone()
 //    {
 //        // Принудительно копируем this->object, иначе
 //        // он будет указывать на один и тот же объект.
 //        $this->object1 = clone $this->object1;
 //    }

	//Удаление статьи по id
	// public function delete(Article $id)
	// {
	// 	function __destruct($id)
	// 		{
	// 			parent::__destruct();
	// 			destroy
	// 			unset($article);
	// 		}
	// }
}

class ArticleListReverse extends ArticleList
{
	public $alist_reverse;
	// public $alist = $this->alist[];
	
		public function add(ArticleList $article)
	{
		$this->alist_reverse[] = $article;
	}

	private function reverse()
	{	
		$this->alist_reverse[] = array_reverse($alist_reverse);
	}
	
	//  Вывод статей
	public function view()
	{	
		self::reverse();
		foreach($this->alist_reverse as $article)
		{
			$article->view();
			echo '<hr>';
		}
	}
}

?>