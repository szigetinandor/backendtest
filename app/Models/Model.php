<?php
namespace App\Models;

use App\DB\PDOConnector;
use Exception;
use PDO;

class Model {

    private PDO $db;
    protected $table;
    protected $required;

    public function __construct() {
        $this->db = PDOConnector::getInstance();
    }

    public function get($id) {
        return $this->getResultFor("SELECT * FROM $this->table WHERE id = ?", [$id]);
    }

    public function all() {
        return $this->getResultFor("SELECT * FROM $this->table");
    }

    /**
     * @throws Exception
     */
    public function add($attributes) {
        if(!is_array($attributes))
            throw new Exception("Wrong data format");
        if(count(array_diff($this->required, array_keys($attributes))) > 0)
            throw new Exception(implode(', ', $this->required)." fields are required.");
        $keys = implode(',', array_keys($attributes));
        $values = array_values($attributes);
        $placeholders = str_repeat('?,', count($values)-1) . '?';
        $statement = $this->db->prepare("INSERT INTO $this->table ($keys) VALUES ($placeholders)");
        $statement->execute($values);
        return $this->get($this->db->lastInsertId());
    }

    /**
     * @throws Exception
     */
    public function update($id, $attributes) {
        $tmp = [];
        if(!is_array($attributes))
            throw new Exception("Wrong data format");
        foreach(array_keys($attributes) as $attribute)
            $tmp[] = "`$attribute` = ?";
        $params = implode(', ', $tmp);
        $statement = $this->db->prepare("UPDATE $this->table SET $params WHERE id = ?");
        $values = array_values($attributes);
        $values[] = intval($id);
        return $statement->execute($values);

    }

    private function getResultFor($statement, $variables = null) {
        $statement = $this->db->prepare($statement);
        $statement->execute($variables);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}