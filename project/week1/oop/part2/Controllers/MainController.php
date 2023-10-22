<?php

namespace Controllers;
use View\View;

class MainController
{
    private View $view;
    public function main() : void
    {
        $articles = [
            ['name' => 'Статья 1', 'text' => 'Текст статьи 1'],
            ['name' => 'Статья 2', 'text' => 'Текст статьи 2'],
        ];
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name)
    {
        $this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => 'Страница приветствия']);
    }

    public function sayBye(string $name) : void
    {
        echo('Пока, ' . $name);
    }

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../templates');
    }
}
