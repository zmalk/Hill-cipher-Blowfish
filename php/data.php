<?php 
        include_once "config.php";
        if(!isset($_SESSION['unique_id'])){
            header("location: /index.php");
        }
        ?>
<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM message WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Offline now") ? $offline = "Offline" : $offline = "Online";


        $output .=  '<a href="chat.php?user_id='. $row['unique_id'] .'"> 
                        <div class="friend" id="friend_list">
                            <img src="../images/user.png" alt="">
                            <div class="friend-info">
                                <div class="name">'. $row['name'] .'</div>
                                <div class="last-message">' . $you . $msg . '</div>
                            </div>
                            <div class="status">'.$offline.'</div>
                        </div>
                    </a>';               
    }
?>



