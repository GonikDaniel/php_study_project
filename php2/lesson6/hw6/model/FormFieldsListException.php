<?php
class FormFieldsListException extends Exception implements ArrayAccess, Iterator {
  protected $_list = array();
  
  public function __construct()
  { }

  //собственно необязательный метод для записи в лог
  // скорее ради эксперимента для дальнейшего применения
  public static function logWriter($data)
  {
      $dir = dirname(__FILE__) .'/../Log/Log.txt';
      $file = fopen($dir, 'a');
      flock($file, LOCK_EX);
      fwrite($file, ('║' .$data .'=>' .date('d.m.Y H:i:s') .' ║ ' .PHP_EOL));
      flock($file, LOCK_UN);
      fclose ($file);
  }
  
  public function offsetExists($index) 
  {
    return isset($this->_list[$index]);
  }
  
  public function offsetGet($index) 
  {
    return $this->_list[$index];
  }
  
  public function offsetSet($index, $value) 
  {
    if (isset($index)) {
      $this->_list[$index] = $value;
    }
    else {
      $this->_list[] = $value;
    }
  }
  
  public function offsetUnset($index) 
  {
    unset($this->_list[$index]);
  }
  
  public function current() 
  {
    return current($this->_list);
  }
  
  public function key() 
  {
    return key($this->_list);
  }
  
  public function next() 
  {
    return next($this->_list);
  }
  
  public function rewind() 
  {
    return reset($this->_list);
  }
  
  public function valid() 
  {
    return (bool) $this->current();
  }
}