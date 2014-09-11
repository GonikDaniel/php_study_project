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

	static public function getDbh()
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

	static public function findAll()
	{
		try {
			$sql = "SELECT * FROM " . static::$table;
			$sth = self::getDbh()->prepare($sql);
			$sth->execute();
			return $sth->fetchAll();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	//выбираем одну из статей по id
	static public function findOne($id)
	{
		try {
			$sql = "SELECT * FROM " . static::$table . " WHERE `id` = ? LIMIT 1";
			$sth = self::getDbh()->prepare($sql);
			$sth->bindParam(1, $id);
			$sth->execute();
			
			return $sth->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
		    echo $e->getMessage();
		}
	}

	//добавляем статью
	static public function add($title, $content)
	{
		try {
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
			   	die('<a href="?ctrl=Articles&action=new">Попробуйте заново, сэр!</a>');
			}
			catch (Exception $error) {
			   echo 'Not validation error! '.$error->getMessage();
			}
			$sth = self::getDbh()->prepare('INSERT INTO ' . static::$table . ' (`title`, `content`) VALUES (:title, :content)');
			$sth->bindParam(':title', $title);
			$sth->bindParam(':content', $content);
			$sth->execute();
		}
		catch (PDOException $e) {
		    echo $e->getMessage();
		}
	}

	//удаляем статью
	static public function delete($id)
	{
		try {
			$sth = self::getDbh()->prepare("DELETE FROM " . static::$table . " WHERE id = ?");
			$sth->bindParam(1, $id);
			$sth->execute();
		}
		catch (PDOException $e) {
		    echo $e->getMessage();
		}
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