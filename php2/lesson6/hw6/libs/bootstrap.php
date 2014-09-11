<?php
  class Bootstrap {
    public static function start() {
      error_reporting(E_ALL);
      ini_set('display_errors', 1);

      $view = new View;
      $view->display('../../../../tpl/header.php');
      $url = !empty($_GET['url']) ? $_GET['url'] : 'Articles/all';
      $url = rtrim($url, '/');
      $url = explode('/', $url);

      $ctrlClass = $url[0] . 'Controller';
      $action = $url[1];
      $param = isset($url[2]) ? $url[2] : '';
      if (!class_exists($ctrlClass) || !method_exists($ctrlClass, $action . 'Action')) {
        $ctrl = new ErrorController;
        $ctrl->error();
      } else {
        $controller = new $ctrlClass;
        
        if(!empty($param)) {
          $controller->action($action, $param);
        } else {
          // if ($url[0] === 'Admin') {
          //   header('Location: ../User/SignIn');
          // }
          $controller->action($action);
        }
      }
      $view = new View;
      $view->display('../../../../tpl/footer.php');
    }
  }