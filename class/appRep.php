<?php
class appRep
{
    private $db = null;
    private $table = 'applicants';

    public function __construct()
    {
        $this->db = connexionBd::getInstance();
    }

    public function apply($uid, $jid)
    {
        $query = "SELECT * FROM {$this->table} WHERE jobid = :jid AND userid = :uid";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':jid', $jid);
        $stmt->bindParam(':uid', $uid);
        $stmt->execute();
        $apps = $stmt->fetch(PDO::FETCH_OBJ);
        if ($apps === false) {
            $query = "INSERT INTO {$this->table} (jobid, userid) VALUES (:jid, :uid)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':jid', $jid);
            $stmt->bindParam(':uid', $uid);
            $stmt->execute();
            return 'true';
        }
        return 'false';
    }

    public function remove($id)
    {
        $query = "DELETE FROM {$this->table} WHERE jobid = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getappsbyid($id)
    {
        $query = "SELECT userid FROM {$this->table} WHERE jobid = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $apps = $stmt->fetchAll(PDO::FETCH_OBJ);
        $arr = array();
        foreach ($apps as $app) {
            array_push($arr, $app->userid);
        }
        return $arr;
    }
}