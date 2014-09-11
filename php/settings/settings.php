<?php 

session_start();
$last_visited = 'http://localhost:8888' . $_SERVER['REQUEST_URI'];
setcookie('last_visited',$last_visited,time()+3600*24*7, '/');