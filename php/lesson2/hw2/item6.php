<?php 
	
	date_default_timezone_set("Europe/Moscow");
	$hours = date("H");
	$minutes = date("i");

	if ($hours == 1 || $hours == 21) {
		$hours_specify = "час";
	}
	elseif ($hours == 2 || $hours == 3 || $hours == 4 || $hours == 22 ||  $hours == 23) {
		$hours_specify = "часа";
	}
	else {
		$hours_specify = "часов";
	}

	if (($minutes != 11) && ($minutes%10 == 1)) {
		$minutes_specify = "минута";
	}
	elseif ($minutes != 12 && $minutes != 13 && $minutes != 14 && (($minutes%10 == 2) || ($minutes%10 == 3) || ($minutes%10 == 4))) {
		$minutes_specify = "минуты";
	}
	else {
		$minutes_specify = "минут";
	}

	echo date("H ") . $hours_specify;
	echo date(" i ") . $minutes_specify;

 ?>