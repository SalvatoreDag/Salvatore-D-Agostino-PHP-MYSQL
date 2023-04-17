<?php
//file per collegarsi al database

namespace App\DB;

use PDO;

class DbPdo
{
    protected $conn;

    protected static $instance;

    //uso il pattern singleton per far si che questa classe abbia una sola instanza
    public static function getInstance(array $options): static
    {
        if (!static::$instance) {
            static::$instance = new DbPdo($options); //instanzia la classe se non è instanziata
        }
        return self::$instance;
    }

    private function __construct(array $options)
    {
        $this->conn = new PDO($options['dsn'], $options['user'], $options['password'], $options['pdooptions']);
    }

    public function getConn()
    {
        return $this->conn;
    }
}
