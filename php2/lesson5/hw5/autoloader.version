<!-- Альтернативная версия для загрузки
Но так как использование spl_autoload_register предпочтительнее,
то будет использовать ее! -->
<?php
    
function __autoload($class_name) 
{
    //class directories
    $directories = array(
        'controllers/',
        'model/',
        'views/'
    );
    
    foreach($directories as $directory)
    {
        if(file_exists($directory.$class_name . '.php'))
        {
            require_once($directory.$class_name . '.php');
            return;
        }            
    }
}