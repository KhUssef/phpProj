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
     * allows user to create new account
     * @param string $mail mail used
     * @param string $pwd password  
     * @param string $fname fullname
     * @param string $type type of user can be either user or admin
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

    public function getusers()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->db->query($query);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}