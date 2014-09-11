<?php

class DbModel
{
	//заносим все, что нам понадобится в константы для удобной работы внутри класса
	const DB_DSN = 'mysql:host=localhost;dbname=php2';
	const DB_USER = 'root';
	const DB_PASSWORD = 'root';
	public $dbc;

	//строим наше соединение с БД
	public function __construct()
	{
		try {
		  $this->dbc = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASSWORD);
		  $this->dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $this->dbc->exec("set names utf8");
		}
		catch (PDOException $e) {
		    echo $e->getMessage();
		}
	}

	//вывод всех статей
	public function findAll()
	{
		try {
			$stm = $this->dbc->prepare("SELECT * FROM `articles`");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
		    echo $e->getMessage();
		}
	}

	//выбираем одну из статей по id
	public function findOne($id)
	{
		try {
			$stm = $this->dbc->prepare("SELECT * FROM `articles` WHERE `id` = ? LIMIT 1");
			$stm->bindParam(1, $id);
			$stm->execute();
			
			return $stm->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
		    echo $e->getMessage();
		}
	}

	//добавляем статью
	public function add($title, $content)
	{
		try {
			$stm = $this->dbc->prepare('INSERT INTO `articles` (`title`, `content`) VALUES (:title, :content)');
			$stm->bindParam(':title', $title);
			$stm->bindParam(':content', $content);
			$stm->execute();
		}
		catch (PDOException $e) {
		    echo $e->getMessage();
		}
	}

	//удаляем статью
	public function delete($id)
	{
		try {
			$stm = $this->dbc->prepare("DELETE FROM `articles` WHERE id = ?");
			$stm->bindParam(1, $id);
			$stm->execute();
		}
		catch (PDOException $e) {
		    echo $e->getMessage();
		}
	}

	//редактируем
	public function edit($id, $title, $content)
	{
		try {
			$stm = $this->dbc->prepare('UPDATE `articles` SET `title`=:title, `content` = :content WHERE `id` = :id');
			$stm->bindParam(':title', $title);
			$stm->bindParam(':content', $content);
			$stm->bindParam(':id', $id);
			$stm->execute();
		}
		catch (PDOException $e) {
		    echo $e->getMessage();
		}
	}

}
