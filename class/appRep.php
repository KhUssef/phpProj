<?php
class appRep{
    private $db = null;
    private $table='applicants';
    public function __construct(){
        $this->db = connexionBd::getInstance();
    }
    public function apply($uid, $jid){
        $query = "select * from {$this->table} where jobid={$jid} and userid={$uid}";
        $result = $this->db->query($query);
        $apps = $result->fetch(PDO::FETCH_OBJ);
        if($apps==null){
            $query = "insert into {$this->table} values({$jid}, {$uid})";
            $result = $this->db->query($query);
            $apps = $result->fetch(PDO::FETCH_OBJ);
            return 'true';
        }
        return 'false';
    }
    public function remove($id){
        $query = "delete from {$this->table} where jobid={$id}";
        $res = $this->db->query($query);
    }
}
?>