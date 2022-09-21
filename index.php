<?php

session_start();
require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\ArticleController;
use App\Controllers\AuthController;
use App\Factories\RouterFactory;

define('VIEW_PATH', __DIR__ . "/views");

$router = RouterFactory::create();

$router
    ->get("/", [ArticleController::class, "index"]);

$router
    ->get("/articles", [ArticleController::class, "index"])
    ->get("/articles/index", [ArticleController::class, "index"])
    ->get("/articles/show", [ArticleController::class, "show"])
    ->get("/articles/create", [ArticleController::class, "create"])
    ->post("/articles/store", [ArticleController::class, "store"])
    ->get("/articles/edit", [ArticleController::class, "edit"])
    ->put("/articles/update", [ArticleController::class, "update"]);

$router->get("/login", [AuthController::class, "index"])
    ->post("/login", [AuthController::class, "login"])
    ->get("/logout", [AuthController::class, "logout"]);


$router->resolve($_SERVER["REQUEST_URI"], strtolower($_SERVER["REQUEST_METHOD"]));
