<?php


namespace Controllers;

use Exceptions\InvalidArgumentException;
use Models\Users\User;
use View\View;

class UsersController
{
    private View $view;

    public function signUp(): void
    {
        if (!empty($_POST)) {
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
        $this->view->renderHtml('users/signUp.php');
    }

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../templates');
    }
}