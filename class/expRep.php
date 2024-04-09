<?php
class expRep
{
    private $db = null;
    private $table = 'experience';

    public function __construct()
    {
        $this->db = connexionBd::getInstance();
    }

    public function getfields()
    {
        $query = "SELECT DISTINCT(name) FROM {$this->table} LIMIT 50;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $fields = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $fields;
    }

    public function getexpname($id)
    {
        $query = "SELECT name FROM {$this->table} WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $name = $stmt->fetch(PDO::FETCH_OBJ);
        return $name->name;
    }

    public function getexp($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $experience = $stmt->fetch(PDO::FETCH_OBJ);
        $result = $experience->name . ':>= ' . $experience->years;
        return $result;
    }

    public function getids($cond)
    {
        $query = "SELECT id FROM {$this->table} WHERE {$cond};";
        $query = strtolower($query); // Not necessary, but can be used for consistency
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $ids = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $ids;
    }

    public function new($name, $years)
    {
        $query = "SELECT id FROM {$this->table} WHERE UPPER(name) = UPPER(:name1) AND years = :years ;";
        $stmt = $this->db->prepare($query);
        $name = trim($name);
        $stmt->bindParam(':name1', $name);
        $stmt->bindParam(':years', $years);
        $stmt->execute();
        $id = $stmt->fetch(PDO::FETCH_OBJ);
        if ($id != false) {
            return $id->id;
        } else {
            $query = "SELECT id FROM {$this->table} ORDER BY id DESC LIMIT 1;";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $id = $stmt->fetch(PDO::FETCH_OBJ);
            $id = $id->id + 1;

            $query = "INSERT INTO {$this->table} VALUES (:id, :name, :years);";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':years', $years);
            $stmt->execute();

            return $id;
        }
    }

    public function getnameyears($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $name = $stmt->fetch(PDO::FETCH_OBJ);
        return array($name->name, $name->years);
    }
    public function test($name, $years)
    {
        $query = "SELECT id FROM {$this->table} WHERE UPPER(name) = UPPER(:name1) AND years = :years ;";
        $stmt = $this->db->prepare($query);
        $name = trim($name);
        $stmt->bindParam(':name1', $name);
        $stmt->bindParam(':years', $years);
        $stmt->execute();
        $id = $stmt->fetch(PDO::FETCH_OBJ);
        return $id;
    }
}