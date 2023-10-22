<?php

namespace Controllers;
use View\View;
use Services\Db;
use Models\Articles\Article;

class MainController
{
    private View $view;
    private Db $db;
    public function main() : void
    {
        $articles = $this->db->query('SELECT * FROM articles;', [], Article::class);
        // echo '<pre>';
        // var_dump($articles);
        // echo '</pre>';
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name) : void
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
        $this->db = new Db();
    }
}