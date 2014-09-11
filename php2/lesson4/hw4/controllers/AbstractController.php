<?php 

abstract class AbstractController
{
	public function action($action)
	{
		$method = $action . 'Action';
		if (method_exists($this, $method)) {
			$this->$method();
		}
	}
}

?>