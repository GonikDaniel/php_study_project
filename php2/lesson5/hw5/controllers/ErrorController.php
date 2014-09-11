<?php 

class ErrorController extends AbstractController
{
	public function error()
	{
		$view = new View;
		$view->display('404.php');
	}
}