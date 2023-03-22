<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <!-- style css file  -->
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
</head>
<body>
        <?php 
        include_once "config.php";
        ?>
        
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM user WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: /friends.php");
          }
        ?>
    <div class="chat">
        <div class="user-friend">
           <div id="back"><</div>
            <img src="../images/user.png" alt="">
            <span> <?php echo $row['name']  ?> </span> 
        </div>

        <div class="decContainer">
          <div id= "decCipher" class="decBtn">Decrypt Hill Cipher</div>
          <div id= "decBlow" class="decBtn">Decrypt Blowfish</div>
        </div>

        <div class="messages-container">

        </div>

        
        

        <form action="#" class="typing-area">
            <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
            <input type="text" class="msg_id" name="msg_id" hidden>
            <input type="text" class="inputField" name="message"  placeholder="Type a message here..." autocomplete="off">
            <div class="btns">
              <div id="sendBtn" class="btn">Send</div>
              <div id="sendCipher" class="btn">Send Hill Cipher</div>
              <div id="sendBlowfish" class="btn">Send Blowfish</div>
            </div>
      </form>

    </div>

    <script src="../js/chat.js?v=<?php echo time(); ?>"></script>
</body>
</html>