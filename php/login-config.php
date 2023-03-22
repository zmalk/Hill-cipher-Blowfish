<?php 
    session_start();
    include_once "config.php";
    $email_logIn = mysqli_real_escape_string($conn, $_POST['email-logIn']);
    $password_logIn = mysqli_real_escape_string($conn, $_POST['password-logIn']);
    if(!empty($email_logIn) && !empty($password_logIn)){
        $sql = mysqli_query($conn, "SELECT * FROM user WHERE email = '{$email_logIn}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);

            $user_pass = md5($password_logIn);
            $enc_pass = $row['password'];
  
            if($user_pass === $enc_pass){
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE user SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{
            echo "$email_logIn - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>