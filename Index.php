<?php

session_start();

include_once('init.php');

$currentUserInfo = (array) json_decode($_COOKIE['user_info']);

$uri = $_SERVER['REQUEST_URI'];
$badUrl = BASE_URL . 'index.php';


if(strpos($uri, $badUrl) === 0){
    $cname = 'errors/e404';
} else {
    $routes = include('routes.php');
    $url = $_GET['mvcsystemurl'] ?? '';
    $routerRes = parseUrl($url, $routes);
    $cname = $routerRes['controller'];
    $urlLen = strlen($url);
    if($urlLen > 0 && $url[$urlLen - 1] == '/'){
        $url = substr($url, 0, $urlLen - 1);
    }
}
$path = "Controller/$cname.php";

include_once($path);

$arr = explode("/", $cname);
$controllerName = $arr[count($arr)-1];

$controller = new $controllerName($routerRes, $currentUserInfo);
$controller->toHtml();
