<?php

namespace App\Controllers;

use App\DBPdo;
use App\FormValidators\ArticleControllerValidator;
use App\Repositories\ArticlePdoRepository;
use App\Repositories\UserPdoRepository;
use App\Services\ArticleService;
use App\Services\UserService;
use App\View;

class ArticleController
{
    private ArticleService $articleService;

    public function __construct(
        private ArticleControllerValidator $validator
    ) {
        //todo: improve the dependency injection container to get Reflection classes
        // and binding interfaces to concrete classes
        $this->articleService = new ArticleService(
            new ArticlePdoRepository(new DBPdo()),
            new UserService(
                new UserPdoRepository(new DBPdo())
            )
        );
    }

    public function index()
    {
        //check for paginator params

        //get articles
        $articles = $this->articleService->getArticles(3, 0);

        //return to view
        return View::make("article/index", [
            "articles" => $articles,
        ])->render();
    }

    public function show()
    {
        echo "Article " . $_GET["id"];
    }

    public function create()
    {
    }

    public function store()
    {
        $validatedData = $this->validator->storeData($_POST);

        $data = [
            "userId" => $validatedData["user"],
            "title" => $validatedData["title"]
        ];

        $article = $this->articleService->createArticle($data);
    }

    public function edit()
    {
    }

    public function update()
    {
    }
}