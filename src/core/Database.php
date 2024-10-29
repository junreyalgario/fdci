<?php

namespace Fdci\Core;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database
{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;
    private $pdo;

    public function __construct()
    {
        // Load .env file
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        // Assign db values from .env config
        $this->host = $_ENV['DB_HOST'];
        $this->db = $_ENV['DB_DATABASE'];
        $this->user = $_ENV['DB_USERNAME'];
        $this->pass = $_ENV['DB_PASSWORD'];
        $this->charset = $_ENV['DB_CHARSET'];
        $this->connect();
    }

    private function connect()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
