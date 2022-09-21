<?php

namespace App\Entities;

class ArticleEntity
{
    public function __construct(
        private int $id,
        private string $title,
        private UserEntity $user,
        private \DateTime $dateTime
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUser(): UserEntity
    {
        return $this->user;
    }

    public function getDateTime(): \DateTime
    {
        return $this->dateTime;
    }

    public function getFirstComment(): ArticleCommentEntity
    {
        return new ArticleCommentEntity(
            1,
            $this->getUser(),
            "",
            "First comment of article"
        );
    }

}