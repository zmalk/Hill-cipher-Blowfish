<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="page-wrapper">
        <div class="current-page">
            <div class="current-login" id="showLogIn">Log In</div>
            <div class="current-signup" id="showSignUp">Sign Up</div>
        </div>

        <div class="login" id="login">
            <form class="form" action="login-config.php" method="post">
                <div>
                    <label>Email</label>
                    <input type="text" id="email-login" placeholder="Email" name="email-logIn">
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" placeholder="Password" name="password-logIn">
                </div>
                <div class="login-btn" id="login-btn">Log In</div>

            </form>
        </div>
        
        <div class="signup" id="signup">
            <form class="form" action="signup-config.php" method="post">
                <div>
                    <label>Name</label>
                    <input type="text" id="name-signup" placeholder="Name" name="name">
                </div>

                <div>
                    <label>Email</label>
                    <input type="text" id="email-signup" placeholder="Email" name="email">
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" placeholder="Password" name="password">
                </div>

                <div>
                    <label>Re-enter Password</label>
                    <input type="password" placeholder="Re-enter Password" name="re-password">
                </div>

                <div>
                    <label>Phone number</label>
                    <input type="text" placeholder="Phone number" name="phone">
                </div>
                <div class="login-btn" id="sign-up-btn">Sign up</div>
            </form>
        </div>
        

    </div>
    
    <script src="../js/switch-panel.js"></script>
    <script src="../js/LogIn-Sign-up.js"></script>


</body>
</html>