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
        if (!isset($_SESSION["loggedin"])) {
            session_start();
            $_SESSION['badlogaccess'] = true;
            header('Location: index.php');
            exit();
        }
       
    }

    public function welcome() {
        $this->isLoggedIn();
        include("templates/header.php");
        include("templates/welcome.php");
        include("templates/footer.php");
    }
    public function collection() {
        $this->isLoggedIn();
        if(isset($_POST["searchforcard"])) {
            $searchString = "%" . $_POST["searchforcard"] . "%";
            $data = $this->db->query("select * from cards NATURAL JOIN owns_card JOIN sets ON 
            cards.s_id = sets.s_id where name LIKE ? AND u_id = ?", "si", $searchString, $_SESSION["id"]);
            $thisRan = $searchString;
        } else {
            $data = $this->db->query("select * from cards NATURAL JOIN owns_card JOIN sets ON cards.s_id = sets.s_id where u_id = ?", "i", $_SESSION["id"]);
        }
        if(isset($_GET["cn"])) {
            $card_to_display = $this->db->query("select * from cards NATURAL JOIN owns_card JOIN sets ON cards.s_id = sets.s_id
            where cn = ? AND owns_card.s_id = ? AND u_id = ?;", "iii", $_GET["cn"], $_GET["s_id"], $_SESSION["id"]);
            $_SESSION["display_full_info"] = true;
        }
        include("templates/header.php");
        include("templates/collection.php");
        include("templates/footer.php");
    }
    public function friends() {
        $this->isLoggedIn();
        $friendsList = $this->db->query("select * from users NATURAL JOIN friends_with where
         u_id = u_id1 AND u_id1 = ?", "i", $_SESSION["u_id"]);

        include("templates/header.php");
        include("templates/friendsPage.php");
        include("templates/footer.php");
    }

    public function upload_card() {
        $this->isLoggedIn();
        if(isset($_POST["searchforcard"])) {
            $searchString = "%" . $_POST["searchforcard"] . "%";
            $data = $this->db->query("select * from cards where name LIKE ?", "s", $searchString);
            $thisRan = $searchString;
        } else {
            $data = $this->db->query("select * from cards");
        }
        if(isset($_GET["cn"])) {
            
            $card_to_insert = $this->db->query("select * from cards where cn = ? AND 
            s_id = ?;", "ii", $_GET["cn"], $_GET["s_id"]);
            $user_owns = $this->db->query("select * from owns_card WHERE u_id = ? AND cn = ? AND s_id = ?
            ;", "iii", $_SESSION["id"], $_GET["cn"], $_GET["s_id"]);
            if(isset($user_owns[0]["cn"])) {
                $inserted = "goodbye";
                $this->db->query("UPDATE owns_card SET count = ? WHERE u_id = ? AND cn = ? AND s_id = ?",
                "iiii", $user_owns[0]["count"] + 1, $_SESSION["id"], $_GET["cn"], $_GET["s_id"]);
            } else {
                $this->db->query("insert into owns_card VALUES (?, ?, ?, ?);", "iiii",
                $_SESSION["id"], $_GET["cn"], 1, $_GET["s_id"]);
            }
            $_SESSION["add_success"] = true;
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
        $data = $this->db->query("select * from packs natural join sets where u_id = ?;", "s", $_SESSION["id"]);
        include("templates/header.php");
        include("templates/packs-view.php");
        include("templates/footer.php");
    }
    public function get_pack($packnum) {
        $this->isLoggedIn();
        $data = $this->db->query("select * from pack_contains natural join cards where u_id = ? and p_num = ?;", "si", $_SESSION["id"], $packnum);
        $packs = $this->db->query("select * from packs natural join sets where u_id = ? and p_num = ?;", "si", $_SESSION["id"], $packnum);
        $pack = $packs[0];
        include("templates/header.php");
        include("templates/single-pack.php");
        include("templates/footer.php");
    }
    public function artist($aname) {
        $this->isLoggedIn();
        $artist = $this->db->query("select * from artists where artist = ?;", "s", $aname);
        $a_id = $artist[0]["a_id"];
        $cards = $this->db->query("select * from drawn_by natural join cards where a_id = ?;", "i", $a_id);
        include("templates/header.php");
        include("templates/artist.php");
        include("templates/footer.php");
    }
    public function input_pack() {
        if(isset($_POST["card_number"])) 
        {
            $high_pnum = $this->db->query("select max(p_num) from packs natural join sets where u_id = ?;", "s", $_SESSION["id"]);
            $pnum = 0;
            if(isset($high_pnum[0]["max(p_num)"]))
                $pnum = $high_pnum[0]["max(p_num)"];
            $pnum += 1;
            $this->db->query("insert into owns_pack values(?, ?, ?)", "iii", $_SESSION["id"], $pnum, $_POST["set"]);
            $array = array_keys($_POST["card_number"]);
            $packval = 0;
            foreach($array as $card)
            {
                $packvals = $this->db->query("select price from cards where cn = ? and s_id = ?;", "ii", $_POST["card_number"][$card], $_POST["set"]);
                $packval += $packvals[0]["price"];
                $this->db->query("insert into pack_contains values(?, ?, ?, ?);", "iiii", $_SESSION["id"], $pnum, $_POST["card_number"][$card], $_POST["set"]);
                $card_in_collection = $this->db->query("select count from owns_card where u_id = ? and cn = ? and s_id = ?;", "iii", $_SESSION["id"], $_POST["card_number"][$card], $_POST["set"]);
                if(isset($card_in_collection[0]["count"]))
                {
                    $this->db->query("update owns_card set count = ? where u_id = ? and cn = ? and s_id = ?", "iiii", $card_in_collection[0]["count"] + 1, $_SESSION["id"], $_POST["card_number"][$card], $_POST["set"]);
                }
                else $this->db->query("insert into owns_card values(?, ?, ?, ?);", "iiii", $_SESSION["id"], $_POST["card_number"][$card], 1, $_POST["set"]);
            }
            $this->db->query("insert into packs values(?, ?, ?, ?, ?)", "iiiis", $_SESSION["id"], $pnum, $_POST["set"], $packval, $_POST["type"]);
            echo   "<html>
                        <script type='text/javascript'>
                            window.location.href = '?command=packs'
                        </script>
                    </html>";
        }
        include("templates/header.php");
        include("templates/input-pack.php");
        include("templates/footer.php");
    }

    public function wishList(){
        $this->isLoggedIn();
        include("templates/header.php");
        include("templates/wishListPage.php ");
        include("templates/footer.php");
    }

    public function logIn() {
        if (isset($_SESSION["badlogaccess"])) {
            
            $loggedMsg = "Please log in or create an account to use the full functionality of the UVA MtG Database!";
            echo "<script type='text/javascript'>alert('$loggedMsg')</script>";
            unset($_SESSION["badlogaccess"]);
            session_destroy();
        }
        include("templates/login.php");
    }
    public function logout() {
        $_SESSION = array();
        session_destroy();
        header("Location: index.php");
        exit();
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
            case "artist":
                $aname = $_GET['aname'];
                $this->artist($aname);
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
            case "collection":
                $this->collection();
                break;
            case "input_pack":
                $this->input_pack();
                break;
            case "logout":
                $this->logout();
                break;
            default:
                $this->welcome();
        }
    }

}