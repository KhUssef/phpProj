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
        $query = "select * from {$this->table} limit 15;";
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
                $query = $query . " description like '%{$temp}%' and ";
            } else {
                if (strpos($temp, 'and')) {
                    $exp = "(price " . substr($temp, 0, strpos($temp, 'and') + 3) . " price " . substr($temp, strpos($temp, 'and') + 3, strlen($temp)) . ')';
                } else if (strpos($temp, 'or')) {
                    $exp = '(price ' . substr($temp, 0, strpos($temp, 'or') + 2) . ' price ' . substr($temp, strpos($temp, 'or') + 3, strlen($temp)) . ')';
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
                $query = $query . "req1 in " . $temp2 . " and req2 in " . $temp2 . " and ";
            }
        }
        $query = $query . ' 1 limit 15;';
        $query = strtolower($query);
        $res = $this->db->query($query);
        $jobs = $res->fetchAll(PDO::FETCH_OBJ);
        return $jobs;
    }
    public function getjobbyid($id)
    {
        $query = "select * from {$this->table} where id = {$id};";
        $res = $this->db->query($query);
        $job = $res->fetch(PDO::FETCH_OBJ);
        return $job;
    }
    public function remove($id)
    {
        $query = "delete from {$this->table} where id = {$id}";
        $res = $this->db->query($query);
    }
    public function getjobbymaster($id)
    {
        $query = "select * from {$this->table} where master = {$id};";
        $res = $this->db->query($query);
        $job = $res->fetchAll(PDO::FETCH_OBJ);
        return $job;
    }
}