<?php

namespace App;

use App\Interfaces\DBInterface;
use Dotenv\Dotenv;

class DB implements DBInterface
{
    private $conn = null;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();

        $params = [
            "host" => $_ENV["DB_HOST"],
            "port" => $_ENV["DB_PORT"],
            "user" => $_ENV["DB_USERNAME"],
            "password" => $_ENV["DB_PASSWORD"],
            "dbname" => $_ENV["DB_NAME"],
            "driver" => $_ENV["DB_DRIVER"]
        ];
    }

    public function getConn()
    {
        return $this->conn;
    }
}