<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<script>
            alert("Account Created Successfully!");
          </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <link rel="stylesheet" href="styless.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>LOGO .</p>
        </div>
        

       <div class="nav-menu" id="navMenu">
        <ul>
            <li><a href="#" class="link active">Home</a></li>
            <li><a href="#" class="link">About</a></li>
            <li><a href="#" class="link">Contact</a></li>
        </ul>
    </div>

        
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
         
    </nav>
    <!-----------FORM BOX----------------->
     <div class="form-box">

        <!-----------LOGIN FORM----------------->
    <div class="login-container" id="login">
        <div class="top">
            <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
            <header>Login</header>
        </div>
        <div class="input-box">
        <form method ="post" action ="register.php">
            <input type="text" class="input-field" name = "Email" placeholder="Email">
            <i class="bx bx-user"></i>
        </div>
        <div class="input-box">
            <input type="password" class="input-field" name = "Password" placeholder="Password">
            <i class="bx bx-lock-alt"></i>
        </div>
        <div class="input-box">
            <input type="submit" class="submit" value="Sign In" name = "signIn" >
            
            </form>
        </div>
        
        <div class="two-col">
            <div class="one">
                <input type="checkbox" id="login-check">
                <label for="login-check"> Remeber Me</label>
            </div>
            <div class="two">
                <label><a href="#"></a>Forgot password?</a></label>
            </div>
            
    </div>
    </div>

    <!-----------REGISTRATION FORM----------------->
    <div class="register-container" id="register">
        <div class="top">
            <span>Have an account? <a href="#" onclick="login()">Login</a></span>
            <header>Sign Up</header>
        </div>
        <form method ="post" action ="register.php">
        <div class="two-forms">
            <div class="input-box">
                <input type="text" class="input-field" name = "Firstname" placeholder="Firstname">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" name = "Lastname" placeholder="Lastname">
                <i class="bx bx-user"></i>
            </div>
        </div>
        <div class="input-box">
        <?php if (!empty($message)) { echo "<p class='message'>$message</p>"; } ?>
            <input type="text" class="input-field" name = "Email" placeholder="Email">
            <i class="bx bx-envelope"></i>
        </div>
        <div class="input-box">
            <input type="password" class="input-field" name = "Password" placeholder="Password">
            <i class="bx bx-lock-alt"></i>
        </div>
        <div class="input-box">
            <input type="submit" class="submit" value="Register" name = "signUp">
        </div>
        </form>
        <div class="two-col">
            <div class="one">
                <input type="checkbox" id="register-check">
                <label for="register-check"> Remeber Me</label>
            </div>
            <div class="two">
                <label><a href="#">Terms & Conditions</a></label>
            </div>
           </div>
        </div>
       </div>
    </div>

    <script>
        function myMenuFunction(){
            var i = document.getElementById("navMenu");

            if(i.className === "nav-menu"){
                i.className += " responsive";
            }else{
                i.className =  "nav-menu";
            }
        }
    </script>

        <Script>
            
            var a = document.getElementById("loginBtn");
            var b = document.getElementById("registerBtn");
            var x = document.getElementById("login");
            var y = document.getElementById("register");

            function login(){
                x.style.left = "4px";
                y.style.right = "-520px";
                a.className += " white-btn";
                b.className = "btn";
                x.style.opacity = 1;
                y.style.opacity = 0;
            }

            function register(){
                x.style.left = "-510px";
                y.style.right = "5px";
                a.className = "btn";
                b.className += " white-btn";
                x.style.opacity = 0;
                y.style.opacity = 1;
            }


        </Script>


</body>
</html>



