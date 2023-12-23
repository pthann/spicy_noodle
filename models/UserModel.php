<?php


require_once("models/Model.php");

class UserModel extends Model {

    public function __construct() {
        parent::__construct("user");
        $this->table = "user";
    }

    public function authenticate($email, $password) {
        $connection = new Connection();
        $hash = hash("sha512", $password); 
        $stmt = $connection->getConnection()->prepare("SELECT email, password  FROM $this->table WHERE email='$email' AND password = '$hash'"); 
        $stmt->execute();  
        return $stmt->rowCount() != 0;
    }

    public function getIdFromEmail($email) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT id  FROM $this->table WHERE email='$email'"); 
        $stmt->execute();  
        return $stmt->fetch(PDO::FETCH_ASSOC)["id"];
    }
}
?>
