<?php
class expRep
{
    private $db = null;
    private $table = 'experience';

    public function __construct()
    {
        $this->db = connexionBd::getInstance();
    }
    /**
     * Retrieves distinct experience names from the database.
     *
     * @return array An array containing distinct experience names.
     */
    public function getfields()
    {
        $query = "SELECT DISTINCT(name) FROM {$this->table} LIMIT 50;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $fields = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $fields;
    }
    /**
     * Retrieves the name of an experience by its ID.
     *
     * @param int $id The ID of the experience.
     *
     * @return string|null The name of the experience if found, null otherwise.
     */

    public function getexpname($id)
    {
        $query = "SELECT name FROM {$this->table} WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $name = $stmt->fetch(PDO::FETCH_OBJ);
        return $name->name;
    }
    /**
     * Retrieves details of an experience by its ID.
     *
     * @param int $id The ID of the experience.
     *
     * @return string|null Details of the experience if found, null otherwise.
     */
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
    /**
     * Retrieves IDs of experiences based on a condition.
     *
     * @param string $cond The condition to filter experiences.
     *
     * @return array An array containing IDs of experiences.
     */

    public function getids($cond)
    {
        $query = "SELECT id FROM {$this->table} WHERE {$cond};";
        $query = strtolower($query);
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $ids = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $ids;
    }
    /**
     * Adds a new experience if it doesn't exist in the database.
     *
     * @param string $name The name of the experience.
     * @param int $years The years of experience.
     *
     * @return int|null The ID of the new experience if added, null otherwise.
     */
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
    /**
     * Retrieves the name and years of experience by its ID.
     *
     * @param int $id The ID of the experience.
     *
     * @return array|null An array containing the name and years of the experience if found, null otherwise.
     */
    public function getnameyears($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $name = $stmt->fetch(PDO::FETCH_OBJ);
        return array($name->name, $name->years);
    }
    /**
     * Retrieves the ID of an experience based on its name and years.
     *
     * @param string $name The name of the experience.
     * @param int $years The years of experience.
     *
     * @return int|null The ID of the experience if found, null otherwise.
     */
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