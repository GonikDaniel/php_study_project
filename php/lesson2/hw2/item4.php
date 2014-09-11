<?php
	
	$arg1 = htmlspecialchars(trim($_POST['arg1']));
	$arg2 = htmlspecialchars(trim($_POST['arg2']));
	$operation = htmlspecialchars(trim($_POST['operation']));


	function adding($a, $b) {
			return $a + $b;
		}

	function substracting($a, $b) {
			return $a - $b;
		}
 
	function multiply($a, $b) {
			return $a * $b;
		}
 
	function divide($a, $b) {
			return $a / $b;
		}

	function mathOperation($arg1, $arg2, $operation) {
		switch ($operation) {
			case 'add':
				echo adding($arg1, $arg2);
				break;
			
			case 'substract':
				echo substracting($arg1, $arg2);
				break;

			case 'multiply':
				echo multiply($arg1, $arg2);
				break;

			case 'divide':
				echo divide($arg1, $arg2);
				break;

			default:
				echo "Вы не корректно определили параметры!";
				break;
		}
	}

	echo mathOperation ($arg1, $arg2, $operation);

 ?>