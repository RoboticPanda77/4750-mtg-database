<?php

class ProjectController
{
    private $command;
    private $db;

    public function __construct($command)
    {
        $this->command = $command;

        $this->db = new Database();
    }

    private function isLoggedIn()
    {
        if (!isset($_SESSION["email"])) {
            $_SESSION['badlogaccess'] = true;
            header('Location: /4750-mtg-database/index.php');
        }
       
    }

    public function welcome() {
        include("templates/header.php");
    }
    public function run()
    {
        switch ($this->command) {
            default:
                $this->welcome();
        }
    }

}