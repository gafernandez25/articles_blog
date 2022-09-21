<?php

namespace App\Repositories;

use App\Interfaces\ArticleRepositoryInterface;
use App\Interfaces\DBInterface;
use PDO;
use PDOException;

class ArticlePdoArticleRepository implements ArticleRepositoryInterface
{
    private $conn;

    public function __construct(DBInterface $db)
    {
        $this->conn = $db->getConn();
    }

    public function getArticles(int $limit, int $offset)
    {
        try {
            $sql = "SELECT * FROM articles";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            file_put_contents('./logs/log_' . date("Y-m-d") . '.log', "H:i:s -- " . $e->getMessage(), FILE_APPEND);
            die;
        }
    }
}