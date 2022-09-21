<?php

namespace App\Services;

use App\Entities\ArticleEntity;
use App\Interfaces\ArticleRepositoryInterface;

class ArticleService
{
    public function __construct(
        private ArticleRepositoryInterface $articleRepository,
        private UserService $userService
    ) {
    }

    public function createArticle($data): ArticleEntity
    {
        $insertedId = $this->articleRepository->create($data);

        $article = $this->articleRepository->getById($insertedId);

        $user = $this->userService->getById($article->user_id);

        return new ArticleEntity(
            $article->id,
            $article->title,
            $user,
            \DateTime::createFromFormat('Y-m-d H:i:s', $article->created_at)
        );
    }

}