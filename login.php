<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;200&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            overflow: none;
        }

        .main {
            height: 100vh;
            width: 100vw;
            background-size: contain;
            background-image: url(background.avif);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loginbox {
            height: 420px;
            width: 350px;
            background-color: white;
            border-radius: 10px;
            font-family: 'Fira Sans', sans-serif;
        }

        .heading {
            font-size: 60px;
            text-align: center;
            margin-top: 10px;
            border-bottom: 1px solid silver;
            height: 80px;
            font-weight: bold;
        }

        input {
            margin: 20px 2px 2px 5px;
            height: 40px;
            width: 95%;
            letter-spacing: 4px;
            border: none;
            border-bottom: 2px solid silver;
            outline: none;
        }

        #forgot {
            margin: 15px 0px 0px 10px;
        }

        span {
            margin: 15px 0px 0px 10px;
        }

        input[type="submit"] {
            background-color: rgba(55, 55, 244, 0.651);
            color: white;
            border-radius: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: blue;
        }

        #forgot:hover {
            text-decoration: underline;
        }

        #signup:hover {
            text-decoration: underline;
        }

        input[type="checkbox"] {
            height: auto;
            width: auto;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="loginbox">
            <form action="login_backend.php" method="POST">
                <div class="heading">Login</div>
                <input type="text" placeholder="Email" name="email" id="username" maxlength="30">
                <?php 
                if(isset($_SESSION['email_v'])){
                    echo "<span style='color : red;'>";
                    echo $_SESSION['email_v'];
                    echo "</span>";
                    unset($_SESSION['email_v']);
                }
                ?>
                <input type="password" placeholder="Password" name="password" id="password" maxlength="12">
                <?php 
                if(isset($_SESSION['password_v'])){
                    echo "<span style='color : red;'>";
                    echo $_SESSION['password_v'];
                    echo "</span><br>";
                    unset($_SESSION['password_v']);
                }
                ?>
                <input type="checkbox" name="rememberme" id="rememberme"
                    onclick="alert('Your login details will be saved')">Remember me?
                <input type="submit" name="submit" value="Login" id="btn"
                    onclick="confirm('Would you like to save Password ?')">
                <br><br>
                <a id="forgot" href="#">Forgot Password ?</a>
                <br><br>
                <span>Don't have account ? </span><a id="signup" href="signup.php">Signup</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
