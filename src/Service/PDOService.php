<?php

namespace App\Service;

use App\Models\Movie;
use PDO;

class PDOService
{
    private PDO $PDO;

    private string $dsn = 'mysql:host=127.0.0.1:3306;dbname=movie';
    private string $user = 'root';
    private string $password = '';

    public function __construct()
    {
        $this->PDO = new PDO($this->dsn, $this->user, $this->password );
    }

    public function getPDO(): PDO
    {
        return $this->PDO;
    }

    public function getDsn(): string
    {
        return $this->dsn;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
