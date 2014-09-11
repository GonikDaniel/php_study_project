<?php
/**
 * Autoloader class
 * @author Sam. Special for http://www.freehabr.ru , 2011
 */
class Autoloader
{
    static protected $_paths = array();
    static protected $_classMap = array();
    /**
     * Регистрируем путь к библиотекам
     * @param string $path
     * @return void
     */
    static public function registerPath($path)
    {
        if(!in_array($path , self::$_paths))
             self::$_paths[] = $path;
    }
    /**
     * Загружаем класс  (spl_autoload_register вызывается если класс не загружен, 
     * проверять на существование класс или интерфейс нет смысла)
     * @param string $class
     * @return boolean
     */
    public static function load($class)
    {   
        if(!empty(self::$_classMap) && array_key_exists($class,self::$_classMap[$class])){                      
            require self::$_classMap[$class];           
            return true;
        }
                    
        $file = implode(DIRECTORY_SEPARATOR , array_map('ucfirst',explode('_', $class))) . '.php';
            
        foreach(self::$_paths as $path){                
           if(file_exists($path . DIRECTORY_SEPARATOR . $file)){
                include $path . DIRECTORY_SEPARATOR . $file;
                return true;
           }
        }
        return false;
    }
   /**
    * Подключить карту расположения классов
    * @property string $path
    * @return array
    */ 
   static public function loadMap($path)
   {
        if(!file_exists($path)){
                self::$_classMap =  array();
                return;
        }
        self::$_classMap = include($path);
   } 
}