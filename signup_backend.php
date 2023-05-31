<?php 
    session_start();
    include_once 'db.php';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if($email == ''){
            $_SESSION['email_v'] = "Email is Required";
            header('location:signup.php');
        }
        elseif(!preg_match('/[a-zA-Z0-9]{1,}[@][a-z]{2,5}[\.][a-z]{2,3}/',$email)){ 
            $_SESSION['email_v'] = "Incorrect email";
            header('location:signup.php');
        }
        
        if($password == ''){
            $_SESSION['password_v'] = "Password is Required";
            header('location:signup.php');
        }
         
        if($cpassword == ''){
            $_SESSION['cpassword_v'] = "Confirm Password is Required";
            header('location:signup.php');
        }

        if($password !== $cpassword){
            $_SESSION['cpassword_v'] = "Confirm Password should be same as Password";
            header('location:signup.php');
        }

        if(!isset($_SESSION['email_v']) && !isset($_SESSION['password_v']) &&  !isset($_SESSION['cpassword_v'])){
            $sql = "select count(email) as number from users where email = '$email' and password = '$password'";
            $result = mysqli_query($conn,$sql);
            $result = mysqli_fetch_assoc($result);
            if($result['number'] == 0){
                $sql = "select count(email) as number from users where email = '$email'";
                $ans = mysqli_query($conn,$sql);
                $ans = mysqli_fetch_assoc($ans);
                if($ans['number'] == 0){
                    $sql = "insert into users(email,password) values ('$email','$password')";
                    $resultt = mysqli_query($conn,$sql);
                    if($resultt){
                        echo "<script>alert('Registered Successfully , Redirecting to Login')</script>";
                        echo "<script>window.location.href = 'login.php'</script>";
                    }                    
                }
                else{
                    echo "<script>alert('User Already Exist')</script>";
                    echo "<script>window.location.href = 'login.php'</script>";
                }
            }
            elseif($result['number'] == 1){
                echo "<script>alert('User Already Exist')</script>";
                echo "<script>window.location.href = 'login.php'</script>";
            }
            else{
                echo "<script>alert('User Not Exist , Redirecting to signup')</script>";
                echo "<script>window.location.href = 'signup.php'</script>";   
            }
        }        
    }
?>