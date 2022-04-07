<?php
require_once 'baseModel.php';

class userModel extends baseModel{

        public int $id;
        public string $name;
        public string $email;
        public string $description;
        public string $address;
        public string $postalCode;
        public string $password;

    public function __construct(){
        parent::__construct();
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setName(string $name){
        $this->name = $this->conn->real_escape_string($name);
    }

    public function setEmail(string $email){
        $this->email = $this->conn->real_escape_string($email);
    }

    public function setDescription(string $description){
        $this->description = $this->conn->real_escape_string($description);
    }

    public function setAddress(string $address){
        $this->address = $this->conn->real_escape_string($address);
    }

    public function setPostalCode(string $postalCode){
        $this->postalCode = $this->conn->real_escape_string($postalCode);
    }

    public function setPassword(string $password){
        $this->password = $this->conn->real_escape_string(password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]));
    }

    public function getId(){
        return $this->id;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function getDescription(): string{
        return $this->description;
    }

    public function getAddress(): string{
        return $this->address;
    }

    public function getPostalCode(): string{
        return $this->postalCode;
    }

    public function getPassword(): string{
        return $this->password;
    }

    public function saveUser(userModel $webUser){
        try {

        $now=date('Y-m-d h:m:s');
        $name=$webUser->getName();
        $email=$webUser->getEmail();
        $description = $webUser->getDescription();
        $address=$webUser->getAddress();
        $postalCode=$webUser->getPostalCode();
        $password=$webUser->getPassword();

        $stmt = $this->conn->prepare("INSERT INTO `web_user` (`id`, `created`, `name`, `email`, `description`, `address`, `postal_code`, `password`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss",$now,$name,$email,$description,$address,$postalCode,$password);
        $stmt->execute();
        return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getOneUser(string $emailUser){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM web_user WHERE email=?");
        $stmt->bind_param("s", $emailUser);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getIdForEmail(string $emailUser){
        try {
        $stmt = $this->conn->prepare("SELECT id FROM web_user WHERE email=?");
        $stmt->bind_param("s", $emailUser);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['id'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    
}