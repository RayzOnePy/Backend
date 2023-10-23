<?php

namespace Controllers;

use Services\Db;
use View\View;
use Models\Articles\Article;
use Models\Users\User;

class ArticlesController
{
    private View $view;
    private Db $db;

    public function View(int $articleId) : void
    {
        $article = Article::getById($articleId);
        if ($article == null)
        {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $this->view->renderHtml('articles/view.php', ['article' => $article]);
    }

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../templates');
        $this->db = new Db();
    }
}