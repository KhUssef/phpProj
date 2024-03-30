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
        $query = "select distinct(name) from {$this->table} limit 15;";
        $res = $this->db->query($query);
        $fields = $res->fetchAll(PDO::FETCH_OBJ);
        return $fields;
    }
    public function getexpname($id)
    {
        $query = "select name from {$this->table} where id = {$id};";
        $res = $this->db->query($query);
        $name = $res->fetch(PDO::FETCH_OBJ);
        return $name->name;
    }
    public function getexp($id)
    {
        $query = "select * from {$this->table} where id = {$id};";
        $res = $this->db->query($query);
        $experience = $res->fetch(PDO::FETCH_OBJ);
        $result = $experience->name . ':>= ' . $experience->years;
        return $result;
    }
    public function getids($cond)
    {
        $query = "select id from {$this->table} where {$cond};";
        $query = strtolower($query);
        $res = $this->db->query($query);
        $ids = $res->fetchAll(PDO::FETCH_OBJ);
        return $ids;
    }
}