<?php

function myAutoLoader(string $className) : void
{

    require_once str_replace('\\', '/', $className) . '.php';
}

spl_autoload_register('myAutoLoader');

// $route = $_GET['route'] ?? '';
var_dump($_GET);
// var_dump($route);

// $pattern = '~^/hello/(.*)$~';
// preg_match($pattern, $route, $matches);

// var_dump($matches);

// $author = new \models\users\User('Иван');
// $article = new \models\articles\Article('Заголовок', 'Текст', $author);
//var_dump($article);

$controller = new \Controllers\MainController();
if(!empty($_GET['name'])) {
    $controller->sayHello($_GET['name']);
} else {
    $controller->main();
}