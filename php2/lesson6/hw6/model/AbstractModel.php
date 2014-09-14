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
		$sql = "SELECT * FROM " . static::$table . " WHERE `id` = ? LIMIT 1";
		$sth = self::getDbh()->prepare($sql);
		$sth->bindParam(1, $id);
		$sth->execute();
		$sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
		
		$result = $sth->fetch();
		$result->isNew = false;
		$rows = $sth->rowCount();
		if ($rows === 0) {
			throw new Exception("Статьи уже удалена (либо ее никогда и не было вовсе)");
		} else {
			return $result;
		}
	}

	// в зависимости от того новая у нас статья или мы ее редактируем выбираем один из двух
	// путей, используя флаг isNew
	public function save()
	{
		if ($this->isNew) {
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
			  // validateForm($this->title, $this->content);
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
			foreach (static::$cols as $col) {
				$data[':' . $col] = $this->{$col};
			}

			$sql = "INSERT 
					INTO " . static::$table . " (" .
					implode(', ', static::$cols) . 
					") VALUES (:" . implode(', :', static::$cols) . ")";
			$dbh = self::getDbh();
			$sth = $dbh->prepare($sql);
			$sth->execute($data);
			$this->isNew = false;
			$this->id = $dbh->lastInsertId();
		} else {
			foreach (static::$cols as $col) {
				$data[':' . $col] = $this->{$col};
				$columns[] = $col . '=:' . $col;
			}
			$data[':id'] = $this->id;
			$sql = "UPDATE 
					" . static::$table . "
					 SET " . implode(', ', $columns) .
					 " WHERE id=:id";
			$dbh = self::getDbh();
			$sth = $dbh->prepare($sql);
			$sth->execute($data);
		}
	}

	//удаляем статью
	public function delete()
	{
		if (!empty($this->id)) {
			$sql = "DELETE FROM " . static::$table . " WHERE id = :id";
			$dbh = self::getDbh();
			$sth = $dbh->prepare($sql);
			$sth->bindParam(':id', $this->id);
			$sth->execute();
			$this->isDeleted = true;
		} else {
			throw new Exception("Статьи уже удалена (либо ее никогда и не было вовсе)");
		}
	}

}