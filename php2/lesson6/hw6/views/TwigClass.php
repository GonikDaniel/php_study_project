<?php

/**
* Twig templates rendering
* Creating by Gonik Daniel 14/09/14
*/
class TwigClass
{

	private $tpl;
    public $data;
 
    public  function __construct($view){
 
        Twig_Autoloader::register();
        try {
            $loader = new Twig_Loader_Filesystem('views');
            $twig = new Twig_Environment($loader, array(
            		    'cache' 			=> 'twig_cache',
            		    'debug'				=> true,
            		    'strict_variables'  => true
            		));
            $this->tpl = $twig->loadTemplate($view);
        } catch (Twig_Error $e) {
            die ('ERROR: ' . $e->getMessage());
 
        }
    }
 
	public function display($template){
		try {
		    echo $this->tpl->render(array('template' => $template));
		} catch (Twig_Error $e) {
		    die ('ERROR: ' . $e->getMessage());
		}
	}

}