<?php
class Database{
    public static function connect(){
        $db = new mysqli('localhost','root','root','project_ingeteam'); //CONFIG YOUR LOCAL CONNECTION
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}