<?php

namespace Models\Articles;
use Models\Users\User;

class Article
{
    private int $id;

    private string $article_name;

    private string $text;

    private int $authorId;

    private string $createdAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getName(): string
    {
        return $this->article_name;
    }

    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }
}