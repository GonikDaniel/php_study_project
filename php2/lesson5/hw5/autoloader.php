<?php
class autoloader {

    public static $loader;

    public static function init()
    {
        if (self::$loader == NULL)
            self::$loader = new self();

        return self::$loader;
    }

    public function __construct()
    {
        spl_autoload_register(array($this,'model'));
        spl_autoload_register(array($this,'controllers'));
        spl_autoload_register(array($this,'views'));
    }

    public function model($class)
    {
        set_include_path(get_include_path().PATH_SEPARATOR.'model/');
        spl_autoload_extensions('.php');
        spl_autoload($class);
    }

    public function controllers($class)
    {
        set_include_path(get_include_path().PATH_SEPARATOR.'controllers/');
        spl_autoload_extensions('.php');
        spl_autoload($class);
    }

    public function views($class)
    {
        set_include_path(get_include_path().PATH_SEPARATOR.'views/');
        spl_autoload_extensions('.php');
        spl_autoload($class);
    }

}

//вызываем
autoloader::init();
?>