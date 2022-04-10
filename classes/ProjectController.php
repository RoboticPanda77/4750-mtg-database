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
        include("templates/welcome.php");
        include("templates/footer.php");
    }
    public function howtoDoFunc() {

        $data = $this->db->query("select * from users where username = ?;", "s","hello");
        
        include("templates/header.php");
        include("templates/demonstration.php");
        //print_r($data); <-- useful print function for arrays
        include("templates/footer.php");
    }

    public function run()
    {
        switch ($this->command) {
            case "howtoDoFunc":
                $this->howtoDoFunc();
                break;
            default:
                $this->welcome();
        }
    }

}