<?php

namespace Models\Users;
class User
{
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}