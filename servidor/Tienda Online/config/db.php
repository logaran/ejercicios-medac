<?php

class Database
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'root', '', 'tienda_master');
        $db->query("SET NAMES 'utf8'");
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        return $db;
    }
}
