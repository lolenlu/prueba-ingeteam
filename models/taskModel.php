<?php
require_once 'baseModel.php';

class taskModel extends baseModel{
    
    public string $name;
    public string $description;

    public function __construct(){
        parent::__construct();
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getDescription(): string{
        return $this->description;
    }

    public function saveTaskForUser(int $idUser){

    }
}