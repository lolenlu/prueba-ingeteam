<?php
class Database{
    public static function connect(){
        $db = new mysqli('localhost','root','root','project_ingeteam');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}