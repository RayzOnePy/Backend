<?php

namespace Models\Articles;

use Models\ActiveRecordEntity;
use Models\Users\User;

class Article extends ActiveRecordEntity
{
    protected string $articleName;

    protected string $text;

    protected int $authorId;

    protected string $createdAt;

    public function getAuthorId() : int
    {
        return (int) $this->authorId;
    }

    public function getAuthor() : User
    {
        return User::getById($this->authorId);
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getName(): string
    {
        return $this->articleName;
    }

    protected static function getTableName() : string
    {
        return 'articles';
    }
}