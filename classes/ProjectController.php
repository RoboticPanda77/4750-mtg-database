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

    public function friends() {

        include("templates/header.php");
        include("templates/friendsPage.php");
        include("templates/footer.php");
    }

    public function upload_card() {
        
        $thisRan = "america";
        if(isset($_POST["searchforcard"])) {
            $searchString = "%" . $_POST["searchforcard"] . "%";
            $data = $this->db->query("select * from cards where name LIKE ?;", "s", $searchString);
            $thisRan = $searchString;
        } else {
            $data = $this->db->query("select * from cards");
            
        }
        include("templates/header.php");
        include("templates/upload-card.php");
        include("templates/footer.php");
    }
    public function howtoDoFunc() {
        /*First variable is SQL query itself, ? marks variable input. Second parameter
        is always the data type in order from left to right in string format, so "si" is first ? 
        is string data type, second ? integer data type. Then, further parameters are the data
        to take the place of question marks. Thus the final query is "select * from users where
        username = "hello" AND u_id = 5;". Data is returned in an array.*/
        $data = $this->db->query("select * from users where username = ? AND u_id = ?;", "si","hello", 5);
        
        include("templates/header.php");
        include("templates/demonstration.php");
        //print_r($data); <-- useful print function for arrays
        include("templates/footer.php");
    }
    public function packs() {
        #$data = $this->db->query("select * from packs natural join sets where u_id = ?;", "i", 1);
        $data = $this->db->query("select * from packs natural join sets where u_id = ?;", "s", $_SESSION["id"]);
        include("templates/header.php");
        include("templates/packs-view.php");
        //print_r($data); <-- useful print function for arrays
        include("templates/footer.php");
    }
    public function get_pack($packnum) {
        $data = $this->db->query("select * from pack_contains natural join cards where u_id = ? and p_num = ?;", "si", $_SESSION["id"], $packnum);
        include("templates/header.php");
        include("templates/single-pack.php");
        //print_r($data); <-- useful print function for arrays
        include("templates/footer.php");
    }

    public function wishList(){
        include("templates/header.php");
        include("templates/wishListPage.php ");
        include("templates/footer.php");
    }

    public function logIn(){
        include("templates/login.php");
    }

    public function run()
    {
        switch ($this->command) {
            case "howtoDoFunc":
                $this->howtoDoFunc();
                break;
            case "friends":
                $this->friends();
                break;
            case "packs":
                $this->packs();
                break;
            case "pack":
                $packnum = $_GET['packnum'];
                $this->get_pack($packnum);
                break;
            case "upload_card":
                $this->upload_card();
                break;
            case "wish":
                $this->wishList();
                break;
            case "logIn":
                $this->logIn();
                break;
            default:
                $this->welcome();
        }
    }

}