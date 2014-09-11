<?php 

abstract class AbstractController
{
	public function action($action, $id = null)
	{
		$method = $action . 'Action';
		if (method_exists($this, $method)) {
			if ($id !== null) {
				$this->$method($id);	
			} else {
				$this->$method();
			}
		} else {
			throw new \LogicException(sprintf('Class "%s" not found in "%s"', $ctrlClass, $method));
		}
	}
}

?>