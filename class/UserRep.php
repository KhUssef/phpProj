<?php
class UserRep{
    private $db = null;
    private $table='users';
    public function __construct(){
        $this->db = connexionBd::getInstance();
    }
    /**
     * allows you to login and returns -1 if mail in use, -2 if pwd is wrong and id of user if successfully logged in
     * @param string $mail mail used
     * @param string $pwd password  
     */
    public function login(string $mail, string $pwd){
        $query = "select * from {$this->table} where email = '{$mail}'";
        $result = $this->db->query($query);
        $user = $result->fetch(PDO::FETCH_OBJ);
        if($user==null){
            return -1;
        }else if($user->pwd!=$pwd){
            return -2;
        }else{
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
    public function signup(string $mail, string $pwd,string $fname, string $seeking){
        $query = "select * from {$this->table} where email = '{$mail}'";
        $result = $this->db->query($query);
        $user = $result->fetch(PDO::FETCH_OBJ);
        if($user!=null){
            return -1;
        }else{
            $query = "select * from {$this->table} order by id desc";
            $result = $this->db->query($query);
            $user = $result->fetch(PDO::FETCH_OBJ);
            $id = ((int) $user->id) +1;
            $query = "insert into {$this->table} values({$id}, {$mail}, {$pwd}, {$fname}, {$seeking})";
            $this->db->query($query);
            return $id;
        }
    }
    public function test(){
        $query = "insert into {$this->table} values(3, 'teste', 'lol', 'idk', 'employee')";
        $result = $this->db->query($query);
        $user = $result->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    public function getuser(int $id){
        $query = "select * from {$this->table} where id = {$id}";
        $result = $this->db->query($query);
        $user = $result->fetch(PDO::FETCH_OBJ);
        $lol = array($user->fullName, $user->email);
        return $lol;
    }
}
?>