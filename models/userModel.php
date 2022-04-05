<?php
class userModel {
    
    public function __construct(
        public string $name,
        public string $email,
        public string $description,
        public string $address,
        public int $postalCode,
        public string $password
        ){}

    public function setName(string $name){
        $this->name = $name;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function setAddress(string $address){
        $this->address = $address;
    }

    public function setPostalCode(int $postalCode){
        $this->postalCode = $postalCode;
    }

    public function setPassword(string $password){
        $this->password = $password;
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

    public function getPostalCode(): int{
        return $this->postalCode;
    }

    public function getPassword(): string{
        return $this->password;
    }
}