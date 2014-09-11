<?php

/**
* логический класс исключений для проверки запрашиваемых пользователем де
*/
class LogicException extends Exeptions
{
	
	function __construct()
	{
		parent::__construct("Файл не найден");
	}
}