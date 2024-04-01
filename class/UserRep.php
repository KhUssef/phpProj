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
     * allows you to login and returns -1 if mail isnt in use, -2 if pwd is wrong and id of user if successfully logged in
     * @param string $mail mail used
     * @param string $pwd password  
     */
    public function login(string $mail, string $pwd)
    {
        $query = "select * from {$this->table} where email = '{$mail}'";
        $result = $this->db->query($query);
        $user = $result->fetch(PDO::FETCH_OBJ);
        if ($user == null) {
            return -1;
        } else if ($user->pwd != $pwd) {
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
     * @param string $seeking type of user can be either employee or employer
     */
    public function signup(string $mail, string $pwd, string $fname, string $seeking)
    {
        $query = "select * from {$this->table} where email = '{$mail}'";
        $result = $this->db->query($query);
        $user = $result->fetch(PDO::FETCH_OBJ);
        if ($user != null) {
            return -1;
        } else {
            $query = "select * from {$this->table} order by id desc";
            $result = $this->db->query($query);
            $user = $result->fetch(PDO::FETCH_OBJ);
            $id = ((int) $user->id) + 1;
            $query = "insert into {$this->table} values({$id}, {$mail}, {$pwd}, {$fname}, {$seeking})";
            $this->db->query($query);
            return $id;
        }
    }
    public function getuser(int $id)
    {
        $query = "select * from {$this->table} where id = {$id}";
        $result = $this->db->query($query);
        $user = $result->fetch(PDO::FETCH_OBJ);
        $lol = array($user->fullName, $user->email, $user->exp1, $user->exp2, $user->exp3, $user->exp4, $user->type);
        return $lol;
    }
    public function test()
    {
        $query = "delete from {$this->table} where id=3";
        $result = $this->db->query($query);
    }
    public function change(int $id, string $email, string $name, string $pwd, array $exps)
    {
        $query = "update {$this->table} set email = '{$email}', fullName = '{$name}' ";
        for ($i = 1; $i < count($exps) + 1; $i++) {
            $query = $query . ", exp{$i} = {$exps[$i - 1]} ";
        }
        $query = $query . ", pwd = '{$pwd}' where id = {$id}";
        $result = $this->db->query($query);
        return $result;
    }
}