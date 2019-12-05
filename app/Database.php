<?php

namespace App;

class Database
{
    private static $instance = null;
    private $connection;
    
    public function __construct()
    {
        $this->connection = new \MySQLi(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME'));
        $this->connection->select_db(getenv('DB_NAME')) or die('Unable to connect to database');
    }

    public function __destruct()
    {
        $this->connection->close();
    }

    public function getActors()
    {
        $actors = [];
        if ($result = $this->connection->query("SELECT * from actors")) {
            while($row = $result->fetch_assoc()) {
                $actors[] = $row;
            }
        }
        $result->free();

        return $actors;
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}