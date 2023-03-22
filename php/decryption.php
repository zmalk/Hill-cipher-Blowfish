<?php 

include_once "config.php";
if(!isset($_SESSION['unique_id'])){
      header("location: /index.php");
}  

$message = mysqli_real_escape_string($conn, $_POST['message']);
$msg_id = mysqli_real_escape_string($conn, $_POST['msg_id']);
$updateQuery = "UPDATE message SET msg = '{$message}' WHERE msg_id = {$msg_id}";     


$sql = mysqli_query($conn,$updateQuery);

?>  