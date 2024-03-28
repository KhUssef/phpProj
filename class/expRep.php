<?php
    class expRep{
        private $db = null;
        private $table='experience';
        public function __construct(){
            $this->db = connexionBd::getInstance();
        }
        public function getfields(){
            $query = "select distinct(name) from {$this->table} limit 15;";
            $res = $this->db->query($query);
            $fields = $res->fetchAll(PDO::FETCH_OBJ);
            return $fields;
        }
    }
?>