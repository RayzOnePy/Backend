<?php


namespace Controllers;

use Exceptions\InvalidArgumentException;
use Models\Users\User;
use Models\Users\UsersAuthService;
use View\View;

class UsersController
{
    private View $view;

    public function signUp(): void
    {
        if (!empty($_POST)) {
            $user = null;
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
            } catch (\Exception $e) {
            }

            if ($user instanceof User) {
                $this->view->renderHtml('users/signUpSuccessful.php');
                return;
            }
        }
        else {
            $this->view->renderHtml('users/signUp.php');
        }
    }

    public function login(): void
    {
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /');
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }
        $this->view->renderHtml('users/login.php');
    }

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../templates');
    }
}