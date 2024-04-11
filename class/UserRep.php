<?php
class UserRep
{
    private $db = null;
    private $table = 'users';
    public function __construct()
    {
        $this->db = connexionBd::getInstance();
    }

    /**
     * allows you to login and returns -1 if mail isn't in use, -2 if pwd is wrong and id of user if successfully logged in
     * @param string $mail mail used
     * @param string $pwd password  
     */
    public function login(string $mail, string $pwd)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = :mail";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if ($user === false) {
            return -1;
        } else if ($user->pwd !== $pwd) {
            return -2;
        } else {
            return $user->id;
        }
    }

    /**
     * Sign up a new user.
     *
     * @param string $mail The email of the user.
     * @param string $pwd The password of the user.
     * @param string $fname The full name of the user.
     * @param string $type The type of the user(can be either user or amdin).
     * @return int Returns the ID of the newly created user if successful, or -1 if the email already exists.
     */
    public function signup(string $mail, string $pwd, string $fname, string $type)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = :mail";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if ($user !== false) {
            return -1;
        } else {
            $query = "SELECT * FROM {$this->table} ORDER BY id DESC LIMIT 1";
            $stmt = $this->db->query($query);
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            $id = ((int) $user->id) + 1;
            $query = "INSERT INTO {$this->table}(id, email, pwd, fullName, type) VALUES (:id, :mail, :pwd, :fname, :type)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':pwd', $pwd);
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':type', $type);
            $stmt->execute();
            return $id;
        }
    }

    /**
     * Retrieves a user from the database based on the provided ID.
     *
     * @param int $id The ID of the user to retrieve.
     * @return array An array containing the user's full name, email, and experience details.
     */
    public function getuser(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $lol = array($user->fullName, $user->email, $user->exp1, $user->exp2, $user->exp3, $user->exp4, $user->type);
        return $lol;
    }

    /**
     * Updates the user information in the database.
     *
     * @param int $id The ID of the user.
     * @param string $email The new email address of the user.
     * @param string $name The new full name of the user.
     * @param string $pwd The new password of the user.
     * @param array $exps An array of new experiences for the user.
     * @return int Returns 1 if the update was successful, -1 otherwise.
     */
    public function change(int $id, string $email, string $name, string $pwd, array $exps)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);

        if (!(count($user) == 0 or (count($user) == 1 and $user[0]->id == $id))) {
            return -1;
        }

        $query = "UPDATE {$this->table} SET email = :email, fullName = :name";

        for ($i = 1; $i <= count($exps); $i++) {
            $query .= ", exp{$i} = :exp{$i}";
        }

        $query .= ", pwd = :pwd WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':pwd', $pwd);

        for ($i = 0; $i < count($exps); $i++) {
            $stmt->bindParam(":exp" . ($i + 1), $exps[$i]);
        }

        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return 1;
    }

    /**
     * Retrieve all users from the database.
     *
     * @return array An array of user objects.
     */
    public function getusers()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->db->query($query);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    /**
     * Deletes a user from the database based on the provided ID.
     *
     * @param int $id The ID of the user to delete.
     * @return void
     */
    public function delete(int $id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}