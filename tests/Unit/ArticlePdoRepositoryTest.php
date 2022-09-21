<?php

namespace Tests\Unit;

use App\DBPdo;
use App\Repositories\ArticlePdoRepository;
use PHPUnit\Framework\TestCase;

class ArticlePdoRepositoryTest extends TestCase
{
    public function testCountGetArticles()
    {
        $repository = new ArticlePdoRepository(new DBPdo());

        $articles = $repository->getArticles(3, 0);

        $this->assertLessThanOrEqual(3, count($articles));
    }


}