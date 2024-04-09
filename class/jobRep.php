<?php
class jobRep
{
    private $db = null;
    private $table = 'jobs';
    public function __construct()
    {
        $this->db = connexionBd::getInstance();
    }
    public function getjobs()
    {
        $query = "select * from {$this->table} limit 30;";
        $res = $this->db->query($query);
        $jobs = $res->fetchAll(PDO::FETCH_OBJ);
        return $jobs;
    }
    public function formatdesc($desc)
    {
        $a = strpos(substr($desc, 90, max(0, strlen($desc) - 90)), ' ');
        return ($a < 20 ? substr($desc, 0, 90 + $a) : substr($desc, 0, 100)) . '...';
    }
    public function getjobswfilter($filters)
    {
        $query = "select * from {$this->table} where 1 and ";
        $addid = false;
        $poss_exp = array();
        foreach ($filters as $filter) {
            $temp = strtolower(trim(substr($filter, strpos($filter, ':') + 1, strlen($filter))));
            $exp = strtolower(trim(substr($filter, 0, strpos($filter, ':'))));
            if ($exp != 'description' && $exp != 'price') {
                $addid = true;
                $exps = new expRep();
                $exp = " name = '" . $exp . "' and ";
                if (strpos($temp, 'and')) {
                    $exp = $exp . "(years " . substr($temp, 0, strpos($temp, 'and') + 3) . " years " . substr($temp, strpos($temp, 'and') + 3, strlen($temp)) . ')';
                } else if (strpos($temp, 'or')) {
                    $exp = $exp . '(years ' . substr($temp, 0, strpos($temp, 'or') + 2) . ' years ' . substr($temp, strpos($temp, 'or') + 3, strlen($temp)) . ')';
                } else {
                    $exp = $exp . 'years ' . ' ' . $temp;
                }
                $getids = $exps->getids($exp);
                foreach ($getids as $id) {
                    array_push($poss_exp, $id->id);
                }
            } else if ($exp == 'description') {
                $query = $query . " description like :desc and ";
            } else {
                if (strpos($temp, 'and')) {
                    $exp = "(price " . substr($temp, 0, strpos($temp, 'and')) . ' and ' . " price " . substr($temp, strpos($temp, 'and') + 3, strlen($temp)) . ')';
                } else if (strpos($temp, 'or')) {
                    $exp = '(price ' . substr($temp, 0, strpos($temp, 'or')) . ' or ' . ' price ' . substr($temp, strpos($temp, 'or') + 3, strlen($temp)) . ')';
                } else {
                    $exp = 'price ' . ' ' . $temp;
                }
                $query = $query . $exp . " and ";
            }
        }
        if ($addid) {
            if (count($poss_exp) == 0) {
                return null;
            } else {
                $temp2 = "(";
                foreach ($poss_exp as $id) {
                    $temp2 = $temp2 . $id . ', ';
                }
                $temp2 = substr($temp2, 0, strlen($temp2) - 2) . ')';
                $query = $query . "(req1 in " . $temp2 . " or req2 in " . $temp2 . ") and ";
            }
        }
        $query = $query . ' 1 limit 30;';
        $query = strtolower($query);
        $stmt = $this->db->prepare($query);
        if (strpos($query, ":desc")) {
            $stmt->bindValue(':desc', '%' . $temp . '%');
        }
        $stmt->execute();
        $jobs = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $jobs;
    }
    public function getjobbyid($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $job = $stmt->fetch(PDO::FETCH_OBJ);
        return $job;
    }
    public function remove($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function getjobbymaster($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE master = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $job = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $job;
    }
    public function done($jid, $uid)
    {
        $query = "UPDATE {$this->table} SET state='inactive', employee = :uid WHERE id = :jid ";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':uid', $uid);
        $stmt->bindParam(':jid', $jid);
        $stmt->execute();
    }

    public function new($name, $price, $desc, $req1, $req2, $master)
    {
        $query = "select id from {$this->table} order by id desc ;";
        $res = $this->db->query($query);
        $job = $res->fetch(PDO::FETCH_OBJ);
        $id = $job->id + 1;
        $query = "INSERT INTO {$this->table} (id, name, description, price, req1, req2, state, master, employee) 
                  VALUES (:id, :name, :desc, :price, :req1, :req2, 'active', :master, 0)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':req1', $req1);
        $stmt->bindParam(':req2', $req2);
        $stmt->bindParam(':master', $master);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}