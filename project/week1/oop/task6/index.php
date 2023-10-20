<?php

class User
{
    private string $role;
    private string $name;

    public function __construct(string $role, string $name)
    {
        $this->role = $role;
        $this->name = $name;
    }

    public static function createAdmin(string $name): User
    {
        return new self('admin', $name);
    }
}

class Human
{
    private static int $count = 0;

    public static function getCount(): int
    {
        return self::$count;
    }

    public function __construct()
    {
        self::$count++;
    }
}

$admin = User::createAdmin('Иван');
var_dump($admin);
echo('<br>');

$human1 = new Human();
$human2 = new Human();
$human3 = new Human();

echo('Людей уже ' . Human::getCount());