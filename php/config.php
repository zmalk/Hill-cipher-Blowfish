<?php
  $hostname = "localhost";
  $username = "id20079287_hisham";
  $password = "J{_3sK|O}9t&W|@r";
  $dbname = "id20079287_chat";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
