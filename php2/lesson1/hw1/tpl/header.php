<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href='http://fonts.googleapis.com/css?family=Jura&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
	<title>Php-2.0 <?php echo $page_title; ?></title>
</head>
<body>
	<h3>Php-2.0 <?php echo $page_title; ?></h3>
	<div id="menu">
		<ul>
			<li><a href="index.php">Главная</a></li>
			<li><a href="admin.php">Администрирование статей</a></li>
			<li><a href="add.php">Добавление статьи</a></li>
			<li><a href="article.php?id=<?php echo rand(1,4); ?>">Одна из статей</a></li>
		</ul>
	</div>