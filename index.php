<?php 
session_start();
if(isset($_SESSION["loggedin"])){
    spl_autoload_register(function($classname) {
        include "classes/$classname.php";
    });
    
    // Parse the command
    $command = "welcome";
    if (isset($_GET["command"])) {
        $command = $_GET["command"];
    }
    
    $manager = new ProjectController($command);
    $manager->run(); 
} else {
    spl_autoload_register(function($classname) {
        include "classes/$classname.php";
    });
    
    // Parse the command
    $command = "logIn";
    if (isset($_GET["command"])) {
        $command = $_GET["command"];
    }
    
    $manager = new ProjectController($command);
    $manager->run(); 
}
?>