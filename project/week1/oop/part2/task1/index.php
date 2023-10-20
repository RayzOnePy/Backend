<?php

function myAutoLoader(string $className)
{

    require_once str_replace('\\', '/', $className) . '.php';
}

spl_autoload_register('myAutoLoader');

$author = new \models\users\User('Иван');
$article = new \models\articles\Article('Заголовок', 'Текст', $author);
var_dump($article);