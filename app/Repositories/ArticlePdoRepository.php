<?php

namespace App\Repositories;

use App\Interfaces\ArticleRepositoryInterface;
use App\Interfaces\DBPdoInterface;
use PDO;
use PDOException;

class ArticlePdoRepository implements ArticleRepositoryInterface
{
    private PDO $conn;

    public function __construct(DBPdoInterface $db)
    {
        $this->conn = $db->getConn();
    }

    public function getArticles(int $limit, int $offset)
    {
        try {
            $sql = "SELECT 
            a.id,a.title,a.user_id,a.created_at,
            u.id as user_id,u.email,u.first_name,u.last_name 
            FROM articles as a
            JOIN users as u ON a.user_id=u.id 
            LIMIT :limit OFFSET :offset";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
//            file_put_contents('./logs/log_' . date("Y-m-d") . '.log', "H:i:s -- " . $e->getMessage(), FILE_APPEND);
            throw new \Exception();
        }
    }

    public function getById(int $id)
    {
        try {
            $sql = "SELECT id,title,user_id,created_at FROM articles WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            return $stmt->fetchObject();
        } catch (PDOException $e) {
//            file_put_contents('./logs/log_' . date("Y-m-d") . '.log', "H:i:s -- " . $e->getMessage(), FILE_APPEND);
            throw new \Exception();
        }
    }

    public function create(array $data): int
    {
        try {
            $sql = "INSERT INTO articles (user_id,title) VALUES (:user_id,:title)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":user_id", $data["userId"]);
            $stmt->bindValue(":title", $data["title"]);
            $stmt->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            //            file_put_contents('./logs/log_' . date("Y-m-d") . '.log', "H:i:s -- " . $e->getMessage(), FILE_APPEND);
            throw new \Exception();
        }
    }
}