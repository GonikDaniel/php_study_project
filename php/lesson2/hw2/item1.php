<?php 
	$a = htmlspecialchars(trim($_POST['first_number']));
	$b = htmlspecialchars(trim($_POST['second_number']));

	if (($a >= 0) && ($b >= 0))  {
		echo "Разность чисел равна " . ($a - $b);
	}
	elseif (($a < 0) && ($b < 0))  {
		echo "Произведение чисел равно " . ($a * $b);
	}
	elseif (($a * $b) < 0)  {
		echo "Сумма чисел равна " . ($a + $b);
	}

?>