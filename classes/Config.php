<?php
    class Config {
        public static $db = ["host" => 'localhost', "user" => 'root', "pass" => '', "database" => "mtg-db"];
        //Enable for local db work
        /*
        $username = 'root';
        $password = '';
        $host = 'localhost:3306';
        $dbname = '4640hw5';
        $dsn = "mysql:host=$host;dbname=$dbname";
        */
        /*public static $db = ["host" => 'localhost', "user" => 'kmm9sz', "pass" => 'bUnP6yFqgTsG',
        "database" => 'kmm9sz'];*/
        
        /*Enable for CS server deployment
        $username = 'kmm9sz';
        $password = 'bUnP6yFqgTsG';
        $host = 'localhost';
        $dbname = 'kmm9sz';
        $dsn = "mysql:host=$host;dbname=$dbname";*/
}
?>