<?php

namespace App\Entities;

use App\Entities\ArticleEntity;
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
                UserFactory::create([
                    "id" => $elem->user_id,
                    "email" => $elem->email,
                    "first_name" => $elem->first_name,
                    "last_name" => $elem->last_name
                ]),
                \DateTime::createFromFormat("Y-m-d H:i:d", $elem->created_at)
            );
        }, $data);
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->articles);
    }
}