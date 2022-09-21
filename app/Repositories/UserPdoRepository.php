<?php

namespace App\Repositories;

use App\Interfaces\DBPdoInterface;
use App\Interfaces\UserRepositoryInterface;
use PDO;
use PDOException;

class UserPdoRepository implements UserRepositoryInterface
{
    private PDO $conn;

    public function __construct(DBPdoInterface $db)
    {
        $this->conn = $db->getConn();
    }

    public function getUsers()
    {
        // TODO: Implement getUsers() method.
    }

    public function getById(int $id)
    {
        try {
            $sql = "SELECT id,email,first_name,last_name FROM users WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            return $stmt->fetchObject();
        } catch (PDOException $e) {
//            file_put_contents('./logs/log_' . date("Y-m-d") . '.log', "H:i:s -- " . $e->getMessage(), FILE_APPEND);
            throw new \Exception();
        }
    }
}