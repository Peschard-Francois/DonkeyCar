<?php

namespace Models;
require_once ('Model.php');
class Type extends Model {
    public function findType(): bool|array
    {
        $results = $this->pdo->query("SELECT * FROM type;");
        $vehicules=$results->fetchAll();
        return $vehicules;
    }
}