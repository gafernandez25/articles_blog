<?php

namespace App;

use App\Interfaces\DBPdoInterface;
use Dotenv\Dotenv;
use PDO;
use PDOException;

class DBPdo implements DBPdoInterface
{
    private PDO $conn;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 1));
        $dotenv->load();

        $params = [
            "host" => $_ENV["DB_HOST"],
            "port" => $_ENV["DB_PORT"],
            "user" => $_ENV["DB_USERNAME"],
            "password" => $_ENV["DB_PASSWORD"],
            "dbname" => $_ENV["DB_NAME"],
            "driver" => $_ENV["DB_DRIVER"]
        ];

        try {
            $dsn = $params["driver"] . ":host=" . $params["host"] . ";port=" . $params["port"] . ";dbname=" . $params["dbname"] . ";";
            $this->conn = new PDO(
                $dsn,
                $params["user"],
                $params["password"],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
//            file_put_contents('./logs/log_' . date("Y-m-d") . '.log', "H:i:s -- " . $e->getMessage(), FILE_APPEND);
            throw new \Exception("DB not connected");
        }
    }

    public function getConn(): PDO
    {
        return $this->conn;
    }
}