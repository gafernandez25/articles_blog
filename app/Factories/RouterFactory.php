<?php

namespace App\Factories;

use App\Router;
use DI;

class RouterFactory
{
    public static function create()
    {
        $builder = new DI\ContainerBuilder();
        $builder->addDefinitions(dirname(__DIR__, 2) . "/config/container.php");

        $container = $builder->build();

        return new Router($container);
    }
}