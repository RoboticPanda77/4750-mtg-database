<?php 
spl_autoload_register(function($classname) {
    include "classes/$classname.php";
});

// Parse the command
$command = "friends";
if (isset($_GET["command"])) {
    $command = $_GET["command"];
}

session_start();

$manager = new ProjectController($command);
$manager->run(); ?>