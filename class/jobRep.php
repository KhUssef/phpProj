<?php
    class jobRep{
        private $db = null;
        private $table='jobs';
        public function __construct(){
            $this->db = connexionBd::getInstance();
        }
        public function getjobs(){
            $query = "select * from {$this->table} limit 15;";
            $res = $this->db->query($query);
            $jobs = $res->fetchAll(PDO::FETCH_OBJ);
            return $jobs;
        }
        public function formatdesc($desc){
            $a = strpos(substr($desc, 90, max(0,strlen($desc)-90)), ' ');
            return ($a < 20 ? substr($desc, 0, 90+$a) : substr($desc, 0, 100)) . '...';
        }

    }
?>