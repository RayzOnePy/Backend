<?php

namespace Controllers;

use View\View;
use Models\Articles\Article;

class ArticlesController
{
    private View $view;

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
    }
}