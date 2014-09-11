<?php 

abstract class AbstractController
{
	public function action($action)
	{
		$method = $action . 'Action';
		if (method_exists($this, $method)) {
			$this->$method();
		} else {
			// здесь по-хорошему нужно бы бросить исключение (но нужно сначала написать его)
			// throw new NotFoundException('Method \''.$ctrlClass.'::'.$method.'\' not found');
			// или так
			// throw new \LogicException(sprintf('Class "%s" not found in "%s"', $ctrlClass, $method));
		}
	}
}

?>