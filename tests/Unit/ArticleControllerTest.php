<?php

namespace Tests\Unit;

use App\DBPdo;
use App\Entities\ArticleEntity;
use App\Repositories\ArticlePdoRepository;
use App\Repositories\UserPdoRepository;
use App\Services\ArticleService;
use App\Services\UserService;
use PHPUnit\Framework\TestCase;

class ArticleControllerTest extends TestCase
{
    public function testStoreArticle()
    {
        $service = new ArticleService(
            new ArticlePdoRepository(new DBPdo()),
            new UserService(new UserPdoRepository(new DBPdo()))
        );

        $data = [
            "userId" => "1",
            "title" => "Test article 1"
        ];

        $article = $service->createArticle($data);

        $this->assertInstanceOf(ArticleEntity::class, $article);
        $this->assertEquals(1, $article->getUser()->getId());
        $this->assertEquals("Test article 1", $article->getTitle());
    }
}