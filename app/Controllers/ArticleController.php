<?php

namespace App\Controllers;

use App\DBPdo;
use App\FormValidators\ArticleControllerValidator;
use App\Services\ArticleService;
use App\View;

class ArticleController
{
    public function __construct(
        private ArticleControllerValidator $validator,
        private ArticleService $articleService
    ) {
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