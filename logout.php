<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: http://localhost/4750-mtg-database/index.php")
?>