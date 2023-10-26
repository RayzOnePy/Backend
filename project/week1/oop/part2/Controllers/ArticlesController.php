<?php

namespace Controllers;

use Exceptions\InvalidArgumentException;
use Exceptions\ForbiddenException;
use Exceptions\NotFoundException;
use Exceptions\UnauthorizedException;
use Models\Users\UsersAuthService;
use View\View;
use Models\Articles\Article;
use Models\Users\User;

class ArticlesController extends AbstractController
{
    /**
     * @throws NotFoundException
     */
    public function view(int $articleId): void
    {
        $article = Article::getById($articleId);
        if ($article == null) {
            throw new NotFoundException();
        }

        $this->view->renderHtml('articles/view.php', ['article' => $article]);
    }

    /**
     * @throws UnauthorizedException
     * @throws ForbiddenException
     */
    public function add(): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if ($this->user->getRole() !== "admin") {
            throw new ForbiddenException();
        }

        if (!empty($_POST)) {
            try {
                $article = Article::create($_POST, $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/add.php');
    }

    /**
     * @throws NotFoundException
     * @throws UnauthorizedException
     * @throws ForbiddenException
     */
    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if ($this->user->getRole() !== 'admin') {
            throw new ForbiddenException();
        }

        if (!empty($_POST)) {
            try {
                $article->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/edit.php', ['error' => $e->getMessage(), 'article' => $article]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }

    /**
     * @throws NotFoundException
     */
    public function delete(int $id): void
    {
        $article = Article::getById($id);
        if ($article) {
            $article->delete();
            var_dump($article);
        } else {
            throw new NotFoundException();
        }
    }
}