<?php require_once '../../../tpl/header.php'; ?>
<div class="homework3">
	<h1>Домашнее задание №4</h1>

		<div class="items item1">
			<!-- Галерея изображений -->

			<?php $id = $_GET['id']; ?>

			<h2>Чудо-галерея</h2>
			<?php 
				if ($id > 0 && $id <= 5) {
					echo "<img  class=\"gallery_img\" src=\"img/$id.jpg\" alt=\"Pic\" width=\"400\">";
				}
				for ($i=1; $i <= 5; $i++) { 
					echo "<a class=\"gallery\" href=\"index.php?id=$i\">Картинка № $i</a><br>";
				}
			?>
		</div>

		<div class="items item2">
			<h2>Чудо-калькулятор</h2>
			<?php
				if(isset($_POST['a']) && isset($_POST['b'])) {
					$a = $_POST['a'];
					$b = $_POST['b'];
					$result1 = $a +$b;
				} else $result1 = "";
			?>
			<form method="post">
				<input type="text" name="a" value="<?php echo $a; ?>">
				+
				<input type="text" name="b" value="<?php echo $b; ?>"> 
				<input type="submit" value="="> <?php echo $result1; ?>
	        </form>
		</div>

		<div class="items item3">
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
				}	else
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
		</div>

		<div class="items item4">
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
						}	else
							$result3 = $super_a / $super_b;
					}

				}	else
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
		</div>
</div>

<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../../js/global.js"></script>
</body>
</html>