<?php

namespace App\Interfaces;

interface ArticleRepositoryInterface
{
    public function getArticles(int $limit, int $offset);
}