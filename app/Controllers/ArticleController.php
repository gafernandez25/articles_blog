<?php

namespace App\Controllers;

use App\DBPdo;
use App\FormValidators\ArticleControllerValidator;
use App\Interfaces\ArticleRepositoryInterface;
use App\Interfaces\DBPdoInterface;
use App\Services\ArticleService;

class ArticleController
{
    public function __construct(
//        private DBPdo $db,     //change to interface and bind param somewhere else
//        private ArticleRepositoryInterface $articleRepository,
        private ArticleService $articleService,
        private ArticleControllerValidator $validator
    ) {
    }

    public function index()
    {
        //check for paginator params

        //get articles
        $articles = $this->articleService->getArticles(3, 0);

        //return to view
        echo "<pre>";
        print_r($articles);
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