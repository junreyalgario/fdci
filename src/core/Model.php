<?php

namespace Fdci\Core;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }
}
