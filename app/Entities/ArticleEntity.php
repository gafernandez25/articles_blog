<?php

namespace App\Entites;

class ArticleEntity
{
    public function __construct(
        private int $id,
        private string $title,
        private UserEntity $user,
        private \DateTime $dateTime
    ) {
    }
}