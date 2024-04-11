<?php
class appRep
{
    private $db = null;
    private $table = 'applicants';

    public function __construct()
    {
        $this->db = connexionBd::getInstance();
    }

    /**
     * Applies for a job by a user.
     *
     * @param int $uid The user ID.
     * @param int $jid The job ID.
     *
     * @return string Returns 'true' if the application is successful, 'false' otherwise.
     */
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
    /**
     * Removes all applications associated with a job.
     *
     * @param int $id The job ID.
     */

    public function remove($id)
    {
        $query = "DELETE FROM {$this->table} WHERE jobid = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    /**
     * Retrieves user IDs of all applicants for a specific job.
     *
     * @param int $id The job ID.
     *
     * @return array An array containing user IDs of applicants for the job.
     */

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