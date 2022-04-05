<?php
class taskModel {
    
    public function __construct(
        public string $name,
        public string $description
        ){}

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
}