<?php

namespace Controllers;

use Services\Db;
use View\View;
use Models\Articles\Article;

class ArticlesController
{
    private View $view;
    private Db $db;

    public function View(int $articlesId)
    {
        $article = $this->db->query("Select article_name, text, author_id  from articles where id = {$articlesId}", [], Article::class);
        if ($article == null)
        {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $this->view->renderHtml('articles/view.php', ['article' => $article[0]]);
    }

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../templates');
        $this->db = new Db();
    }
}