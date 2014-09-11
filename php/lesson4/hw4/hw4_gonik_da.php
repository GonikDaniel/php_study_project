<!-- Галерея изображений -->

<?php $id = $_GET['id']; ?>

<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Просмотр изображения № <?php echo $id; ?></title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<h2>Чудо-галерея</h2>
<?php 
	for ($i=1; $i <= 5; $i++) { 
		echo "<a href=\"item1.php?id=$i\">Картинка № $i</a><br>";
	}

	if ($id > 0 && $id <= 5) {
		echo "<img src=\"img/$id.jpg\" alt=\"Pic\" width=\"400\">";
	}
?>


<h2>Чудо-калькулятор</h2>
<?php
	if(isset($_POST['a']) && isset($_POST['b'])) {
		$a = $_POST['a'];
		$b = $_POST['b'];
		$result1 = $a +$b;
	}
	else
		$result1 = "";
?>
		<form method="post">
			<input type="text" name="a" value="<?php echo $a; ?>">
			+
			<input type="text" name="b" value="<?php echo $b; ?>"> 
			<input type="submit" value="="> <?php echo $result1; ?>
        </form>



<h2>Усовершенствованный чудо-калькулятор</h2>
<?php

	if(isset($_POST['new_a']) && isset($_POST['new_b'])) {
		$new_a = $_POST['new_a'];
		$new_b = $_POST['new_b'];
		$operand = $_POST['operand'];
		switch ($operand) {
			case 'add':
				$result2 = $new_a + $new_b;
				break;
			case 'sub':
				$result2 = $new_a - $new_b;
				break;
			case 'multiply':
				$result2 = $new_a * $new_b;
				break;
			case 'divide':
				if ($new_b == 0) {
					echo "Делить на ноль? Ай-я-яй!";
				}
				else
					$result2 = $new_a / $new_b;
				break;
		}
	}
	else
		$result2 = "Не хватает данных!";
?>

		<form method="post">
			<input type="text" name="new_a" value="<?php echo $new_a; ?>">
			<select name="operand">
				<option value="add">+</option>
				<option value="sub">-</option>
				<option value="multiply">*</option>
				<option value="divide">/</option>
			</select>
			<input type="text" name="new_b" value="<?php echo $new_b; ?>"> 
			<input type="submit" value="="> <?php echo $result2; ?>
        </form>

<h2>Гипер-усовершенствованный чудо-калькулятор</h2>
<?php

	if(isset($_POST['super_a']) && isset($_POST['super_b'])) {
		$super_a = $_POST['super_a'];
		$super_b = $_POST['super_b'];
		if (isset($_POST['add'])) {
			$result3 = $super_a + $super_b;
		}
		elseif (isset($_POST['substr'])) {
			$result3 = $super_a - $super_b;
		}
		elseif (isset($_POST['multiply'])) {
			$result3 = $super_a * $super_b;
		}
		elseif (isset($_POST['divide'])) {
			if ($super_b == 0) {
				echo "Делить на ноль? Ай-я-яй!";
			}
			else
				$result3 = $super_a / $super_b;
		}

	}
	else
		$result3 = "Не хватает данных!";
?>

		<form method="post">
			<input type="text" name="super_a" value="<?php echo $super_a; ?>">
			<input type="text" name="super_b" value="<?php echo $super_b; ?>">
			= <?php echo $result3; ?>
			<p>
			<input type="submit" value="+" name="add"> 
			<input type="submit" value="-" name="substr"> 
			<input type="submit" value="*" name="multiply"> 
			<input type="submit" value="/" name="divide"> 
			</p>
        </form>

</body>
</html>



