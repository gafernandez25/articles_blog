<?php

namespace App\Entities;

class ArticleCommentEntity
{
    public function __construct(
        private int $id,
        private UserEntity $userEntity,
        private string $url,
        private string $text
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserEntity(): UserEntity
    {
        return $this->userEntity;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getText(): string
    {
        return $this->text;
    }


}