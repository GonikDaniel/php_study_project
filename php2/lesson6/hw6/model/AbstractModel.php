<?php
/**
* 
*/
abstract class AbstractModel
{
	const DB_DSN = 'mysql:host=localhost;dbname=php2';
	const DB_USER = 'root';
	const DB_PASSWORD = 'root';

	static protected $table;
	public $isNew = true; //используем флаг в рамках концепции ORM & Active Record
	public $isDeleted = false;

	static protected function getDbh()
	{	
		try {
			$dbh = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASSWORD);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  	$dbh->exec("set names utf8");
		  	return $dbh;
		} catch (PDOException $e) {
			die('Подключение не удалось: ' . $e->getMessage());
		}
	}

	static public function findAll($where = '')
	{
		$sql = "SELECT * FROM " . static::$table;
		$sql = !empty($where) ? $sql : ($sql . " " . $where);

		$sth = self::getDbh()->prepare($sql);
		$sth->execute();
		//просим вернуть нам данные в виде объектов, при этом ссылаемся на тот класс, 
		//который вызвал данный метод, используя позднее статич.связывание
		$sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
		$result = $sth->fetchAll();
		if (count($result) == 0) {
			throw new Exception('В базе нет статей!');
		}
		foreach ($result as $res) {
			$res->isNew = false;
		}
		return $result;
	}


	//выбираем одну из статей по id
	static public function findOne($id)
	{
		try {
			$sql = "SELECT * FROM " . static::$table . " WHERE `id` = ? LIMIT 1";
			$sth = self::getDbh()->prepare($sql);
			$sth->bindParam(1, $id);
			$sth->execute();
			$sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
			
			$result = $sth->fetch();
			$result->isNew = false;
			return $result;
		}
		catch (PDOException $e) {
		    echo $e->getMessage();
		}
	}


	public function save()
	{
		if ($this->isNew) {
			$sql = "INSERT 
					INTO " . static::$table . "
					 (title, content) 
					 VALUES (:title, :content)";
			$dbh = self::getDbh();
			$sth = $dbh->prepare($sql);
			$sth->execute(array(
					':title' => $this->title, 
					':content' => $this->content,
			));
			$this->isNew = false;
			$this->id = $dbh->lastInsertId();
		} else {
			$sql = "UPDATE 
					" . static::$table . "
					 SET title=:title, content=:content 
					 WHERE id=:id";
			$dbh = self::getDbh();
			$sth = $dbh->prepare($sql);
			$sth->execute(array(
					':title' => $this->title, 
					':content' => $this->content,
					':id' => $this->id,
			));
		}
	}

	//удаляем статью
	static public function delete()
	{
		if ($this->isDeleted) {
			throw new Exception("Статьи уже удалена (либо ее никогда и не было вовсе)");
		} else {
			$sth = self::getDbh()->prepare("DELETE FROM " . static::$table . " WHERE id = ?");
			$sth->execute(array(
					':id' => $this->id,
			));
		}
	}

	//добавляем статью
	static public function add($title, $content)
	{
		// После окончания процедуры валидации проверяем были ли занесены какие-то сообщения об ошибках. Если да то «бросаем» подготовленный объект исключения.
		// Для отлова исключения используем два блока catch: для FormFieldsListException и для всех остальных исключений. Это позволяет задать различные виды действий при возникновении различных типов исключений.
		function validateForm($title, $content) {
		   $e = new FormFieldsListException();
		   if (strlen($title) < 5) {
		      $e[] = 'Слишком короткий заголовок!';
		   }
		   if (strlen($content) < 100) {
		      $e[] = 'Слишком короткое содержание!';
		   }
		   if ((bool)$e->current()) {
		      throw $e;
		   }
		}
		 
		try {
		   validateForm($title, $content);
		}
		catch (FormFieldsListException $error) {
		   	echo '<b>Что-то пошло не так...</b>:<br />';
		   	foreach ($error as $e) {
		    	echo $e.'<br />';
		    	$error::logWriter($e);
		   	}
		   	die('<a href="../Articles/new">Попробуйте заново, сэр!</a>');
		}
		catch (Exception $error) {
		   echo 'Not validation error! '.$error->getMessage();
		}
		$sth = self::getDbh()->prepare('INSERT INTO ' . static::$table . ' (`title`, `content`) VALUES (:title, :content)');
		$sth->bindParam(':title', $title);
		$sth->bindParam(':content', $content);
		$sth->execute();
	}


	//редактируем
	static public function edit($id, $title, $content)
	{
		try {
			$sth = self::getDbh()->prepare('UPDATE ' . static::$table . ' SET `title`=:title, `content` = :content WHERE `id` = :id');
			$sth->bindParam(':title', $title);
			$sth->bindParam(':content', $content);
			$sth->bindParam(':id', $id);
			$sth->execute();
		}
		catch (PDOException $e) {
		    echo $e->getMessage();
		}
	}

}