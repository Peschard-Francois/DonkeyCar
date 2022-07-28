<?php
namespace Models;
abstract class Model{
    protected $pdo;
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    public function find(): bool|array
    {
        $results = $this->pdo->query("SELECT * FROM {$this->table};");
        $vehicules=$results->fetchAll();
        return $vehicules;
    }
}
