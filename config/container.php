<?php

return [
    'App\Interfaces\ArticleRepositoryInterface' => DI\autowire('App\Repositories\ArticlePdoRepository'),
    'App\Interfaces\DBPdoInterface' => DI\autowire("App\DBPdo"),
    "App\Interfaces\UserRepositoryInterface"=>DI\autowire("App\Repositories\UserPdoRepository")
];