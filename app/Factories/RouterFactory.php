<?php

namespace App\Factories;

use App\Container;
use App\Router;

class RouterFactory
{
    public static function create()
    {
        return new Router(new Container());
    }
}