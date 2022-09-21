<?php

session_start();
require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\ArticleController;
use App\Factories\RouterFactory;

$router = RouterFactory::create();

$router
    ->get("/", [ArticleController::class, "index"])
    ->get("/index", [ArticleController::class, "index"])
    ->get("/show", [ArticleController::class, "show"],["id"=>1])
    ->get("/create", [ArticleController::class, "create"])
    ->post("/store", [ArticleController::class, "store"])
    ->get("/edit", [ArticleController::class, "edit"])
    ->put("/update", [ArticleController::class, "update"])
    ->resolve($_SERVER["REQUEST_URI"], strtolower($_SERVER["REQUEST_METHOD"]));
