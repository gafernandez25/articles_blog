<?php

namespace App\Entites;

class ArticleCommentEntity
{
    public function __construct(
        private int $id,
        private UserEntity $userEntity,
        private ArticleEntity $articleEntity,
        private string $url,
        private string $text
    ) {
    }
}