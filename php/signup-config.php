<?php
    session_start();
    include_once "config.php";
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $re_password = mysqli_real_escape_string($conn, $_POST['re-password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    if(!empty($name) && !empty($email) && !empty($password) && !empty($phone)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM user WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
            }else{
                if(strcmp($password,$re_password) == 0){
                    $time = time();
                    $ran_id = rand(time(), 100000000);
                    $status = "Offline now";
                    
                    $encrypt_pass = md5($password); /// encryption for password 
                    $insert_query = mysqli_query($conn, "INSERT INTO user (unique_id, email, password, phone, name, status)
                    VALUES ({$ran_id}, '{$email}','{$encrypt_pass}', '{$phone}', '{$name}','{$status}')");
                    if($insert_query){
                        $select_sql2 = mysqli_query($conn, "SELECT * FROM user WHERE email = '{$email}'");
                            if(mysqli_num_rows($select_sql2) > 0){
                                $result = mysqli_fetch_assoc($select_sql2);
                                $_SESSION['unique_id'] = $result['unique_id'];
                                echo "success";
                            }else{
                                echo "This email address not Exist!";
                            }
                    }else{
                        echo "Something went wrong. Please try again!";
                    }
                }else {
                    echo "password doesn't match!";
                }       
            } 
        } else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>