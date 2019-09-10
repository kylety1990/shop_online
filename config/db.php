<?php

class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'root', '', 'shop_online', '3308');
        $db->query("SET NAME 'utf8'");
        return $db;
    }
}