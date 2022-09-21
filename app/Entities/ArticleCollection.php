<?php

namespace App\Entites;

use App\Factories\UserFactory;
use Exception;
use JetBrains\PhpStorm\Internal\TentativeType;
use Traversable;

class ArticleCollection implements \IteratorAggregate
{
    private array $articles;

    /**
     * @param array $data result of pdo query
     */
    public function __construct(array $data)
    {
        $this->articles = array_map(function ($elem) {
            return new ArticleEntity(
                $elem->id,
                $elem->title,
                new UserFactory($elem->user),
                $elem->created_at
            );
        }, $data);
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->articles);
    }
}