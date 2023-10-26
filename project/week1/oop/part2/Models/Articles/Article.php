<?php

namespace Models\Articles;

use Exceptions\InvalidArgumentException;
use Models\ActiveRecordEntity;
use Models\Users\User;

class Article extends ActiveRecordEntity
{
    protected string $articleName;

    protected string $text;

    protected int $authorId;

    protected ?string $createdAt = null;

    public function getAuthorId(): int
    {
        return (int)$this->authorId;
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getName(): string
    {
        return $this->articleName;
    }

    public function setName(string $name): void
    {
        $this->articleName = $name;
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function create(array $fields, User $author): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $article = new Article();

        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);

        $article->save();

        return $article;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function updateFromArray(array $fields): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $this->setName($fields['name']);
        $this->setText($fields['text']);

        $this->save();

        return $this;
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }
}