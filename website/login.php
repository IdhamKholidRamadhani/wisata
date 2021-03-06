<?php
    require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_sign.css">
    <title>Login</title>

</head>
<body>
    <div class="container">
        <div class="blueBg">
            <div class="box signin">
                <h2>Already Have an Account ?</h2>
                <button class="signinBtn">Sign in</button>
            </div>
            <div class="box signup">
                <h2>Don't Have an Account ?</h2>
                <button class="signupBtn">Sign up</button>
            </div>
        </div>
        <div class="formBx">
            <div class="form signinForm">
                <form method="post">
                    <h3>Sign In</h3>
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="pass" placeholder="Password">
                    <input type="submit" value="Login" name="login">
                    <a href="#" class="forgot">Forgot Password</a>
                </form>
            </div>

            <div class="form signupForm">
                <form method="post">
                    <h3>Sign Up</h3>
                    <input type="text" name="username" placeholder="Username">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="pass" placeholder="Password">
                    <input type="password" name="cpass" placeholder="Confirm Password">
                    <input type="submit" value="Register" name="register">
                </form>
            </div>
        </div>
    </div>

    <script>
        const signinBtn = document.querySelector('.signinBtn');
        const signupBtn = document.querySelector('.signupBtn');
        const formBx = document.querySelector('.formBx');
        const body = document.querySelector('body')

        signupBtn.onclick = function(){
            formBx.classList.add('active')
            body.classList.add('active')
        }

        signinBtn.onclick = function(){
            formBx.classList.remove('active')
            body.classList.remove('active')
        }
    </script>
</body>
</html>