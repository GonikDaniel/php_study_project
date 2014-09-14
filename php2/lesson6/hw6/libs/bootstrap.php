<?php
  class Bootstrap {
    public static function start() {
      $url = !empty($_GET['url']) ? $_GET['url'] : 'Articles/all';
      $url = rtrim($url, '/');
      $url = explode('/', $url);

      $ctrlClass = $url[0] . 'Controller';
      $action = !empty($url[1]) ? $url[1] : 'all';
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
    }
  }