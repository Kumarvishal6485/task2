<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;200&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .container {
            background-image: url(background.avif);
            background-size: contain;
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .signupbox {

            background-color: white;
            display: flex;
            flex-direction: column;
            height: 430px;
            width: 350px;
            border-radius: 20px;
        }

        .top {
            margin-top: 20px;
            margin-bottom: 8px;
            text-align: center;
            font-family: 'Fira Sans', sans-serif;
            border-bottom: 2px solid grey;
            height: 76px;

        }

        input[type="text"],
        input[type="password"] {
            font-family: 'Fira Sans', sans-serif;
            width: 95%;
            height: 40px;
            border: none;
            outline: none;
            border-bottom: 2px solid silver;
            color: black;
            font-size: 15px;
            letter-spacing: 2px;
            font-weight: bold;
            
        }

        input {
            margin: 8px 8px 8px 8px;

        }

        input[type="submit"] {
            cursor : pointer;
            width: 95%;
            height: 40px;
            color: white;
            border: none;
            outline: none;
            background-color: rgba(55, 55, 244, 0.651);
            border-radius: 12px;
            font-size: 15px;
        }

        span {
            margin-left: 10px;

        }

        h1 {
            font-size: 50px;
            font-weight: bold;
        }
    </style>
</head>

<body> 
    <div class="container">
        <div class="signupbox">
            <div class="top">
                <h1>Signup</h1>
            </div>
            <div class="inputbox">
                <form action="signup_backend.php" method="POST">
                    <input type="text" placeholder="Email" name="email" id ="email">
                    <?php 
                        if(isset($_SESSION['email_v'])){
                            echo "<span style='color : red;'>";
                            echo $_SESSION['email_v'];
                            echo "</span>";
                            unset($_SESSION['email_v']);
                        }
                    ?>
                    <input type="password" placeholder="Password" maxlength="12" id="pass"name="password">
                    <?php 
                        if(isset($_SESSION['password_v'])){
                            echo "<span style='color : red;'>";
                            echo $_SESSION['password_v'];
                            echo "</span><br>";
                            unset($_SESSION['password_v']);
                        }
                    ?>
                    <input type="password" placeholder="Confirm Password" maxlength="12" name="cpassword">
                    <?php 
                        if(isset($_SESSION['cpassword_v'])){
                            echo "<span style='color : red;'>";
                            echo $_SESSION['cpassword_v'];
                            echo "</span><br>";
                            unset($_SESSION['cpassword_v']);
                        }
                    ?>
                    <input type="submit" value="Signup" name="submit">
                </form>
                <br>
                <span>Already a Member ? </span> <a href="login.php">Login</a>
            </div>
        </div>
    </div>
</body>

</html>
