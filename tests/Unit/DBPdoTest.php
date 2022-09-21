<?php

namespace Tests\Unit;

use App\DBPdo;
use PDO;
use PHPUnit\Framework\TestCase;

class DBPdoTest extends TestCase
{
    public function testConnection()
    {
        $db = new DBPdo();

        $conn = $db->getConn();

        $this->assertInstanceOf(PDO::class, $conn);
    }

}