<?php

	$a = htmlspecialchars(trim($_POST['number']));

	switch($a)
	{
		case 1:
	      echo ("1 ");
		case 2: 
			echo ("2 ");
		case 3:
	      echo ("3 ");
		case 4: 
	      echo ("4 ");
		case 5:
	      echo ("5 ");
		case 6: 
	      echo ("6 ");
		case 7:
	      echo ("7 ");
		case 8: 
	      echo ("8 ");
		case 9:
	      echo ("9 ");
	    case 10:
	      echo ("10 ");
	    case 11:
	      echo ("11 ");
	    case 12:
	      echo ("12 ");
	    case 13:
	      echo ("13 ");
	    case 14:
	      echo ("14 ");
	    case 15:
	      echo ("15!");
		break;
		default:		 
	      echo ("This isn't number or number is > 15 or < 1");
	} 
?>