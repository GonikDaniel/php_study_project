<?php 

class View
	implements Iterator
{
	//отображаем шаблоны из view
	public function display($template)
	{
		foreach ($this as $key => $value) {
			$$key = $value;
		}
		include __DIR__ . '/../views/' . $template;
	}

	//отсюда начинается магия с сетом и гетом + реализация интерфейса Iterator
	protected $data = array();

	public function __set($key, $val)
	{
		$this->data[$key] = $val;
	}

	public function __get($key)
	{
		return $this->data[$key];
	}

	public function current()
	{
		return current($this->data);
	}

	public function key()
	{
		return key($this->data);
	}

	public function rewind()
	{
		reset($this->data);
	}

	public function next()
	{
		next($this->data);
	}

	public function valid()
	{
		return false !== current($this->data);
	}
}

?>