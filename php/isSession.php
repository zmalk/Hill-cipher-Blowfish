<?php 
    session_start();
    include_once "config.php";
    if(!isset($_SESSION['unique_id'])){
        echo "success";
    }else {
        echo "failed";
    }
?>