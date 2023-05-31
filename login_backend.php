<?php 
    session_start();
    include_once 'db.php';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($email == ''){
            $_SESSION['email_v'] = "Email is Required";
            header('location:login.php');
        }
        elseif(!preg_match('/[a-zA-Z0-9]{1,}[@]{1}[a-z]{2,5}[\.]{1}[a-z]{2,3}/',$email)){ 
            $_SESSION['email_v'] = "Incorrect email";
            header('location:login.php');
        }
        
        if($password == ''){
            $_SESSION['password_v'] = "Password is Required";
            header('location:login.php');
        }
        
        $sql = "select count(email) as number from users where email = '$email' and password = '$password' ";
        $result = mysqli_query($conn,$sql);
        $result = mysqli_fetch_assoc($result);
        if($result['number'] == 0){
            $sql = "select count(email) as number from users where email = '$email' ";
            $ans = mysqli_query($conn,$sql);
            $ans = mysqli_fetch_assoc($ans);
            if($ans['number'] == 0){
                echo "<script>alert('User Not Exist , Redirecting to signup')</script>";
                echo "<script>window.location.href = 'signup.php'</script>";                
            }
            else{
                $_SESSION['password_v'] = "Incorrect Password";
                header('location:login.php');
            }
        }
        elseif($result['number'] == 1){
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header('location:index.php');
        }
        else{
            echo "<script>alert('User Not Exist , Redirecting to signup')</script>";
            echo "<script>window.location.href = 'signup.php'</script>";   
        }      
    }
?>