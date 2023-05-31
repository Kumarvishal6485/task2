<?php 
    session_start();
    include_once 'db.php';
    if(isset($_SESSION['loggedin'])){
        $id = $_GET['id'];
        $title_id = $_GET['tid'];
        $sql = "delete from user_details where id = '$id' and title_id = '$title_id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('Details Removed Successfully');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        }
    }
    else{
        echo "<script>alert('Can't perform action! Login Required');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }

?>