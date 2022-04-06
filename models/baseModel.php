<?php
require_once 'config/bd.php';

abstract class baseModel{
    protected $conn;

    public function __construct(){
            $this->conn = Database::connect();
        }
}