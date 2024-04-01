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
    public function new($name, $years)
    {
        $query = "select id from {$this->table} where name = '{$name}' and years = {$years};";
        $res = $this->db->query($query);
        $id = $res->fetch(PDO::FETCH_OBJ);
        if ($id != null) {
            return $id->id;
        } else {
            $query = "select id from {$this->table} order by id desc ;";
            $res = $this->db->query($query);
            $id = $res->fetch(PDO::FETCH_OBJ);
            $id = $id->id + 1;
            $query = "insert into {$this->table} values ({$id}, '{$name}', {$years});";
            $res = $this->db->query($query);
            return $id;
        }
    }
    public function getnameyears($id)
    {
        $query = "select * from {$this->table} where id = {$id};";
        $res = $this->db->query($query);
        $name = $res->fetch(PDO::FETCH_OBJ);
        return array($name->name, $name->years);
    }
}