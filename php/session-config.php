<?php 
    session_start();
    include_once "config.php";
    if(!isset($_SESSION['unique_id'])){
        header("location: /index.php");
    }
    $current_id = $_SESSION['unique_id'];

    echo $current_id;
?>