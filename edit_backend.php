<?php
    session_start();
    include_once 'db.php';
    if(isset($_POST['submit'])){
        $tid = $_POST['tid'];
        $id = $_POST['id'];
        $title = $_POST['title'];
        $imagename = $_FILES['image']['name'];
        $imagelocation = $_FILES['image']['tmp_name'];
        $description = $_POST['details'];
        if($title != "" && $description != ""){
            if($imagename != ""){
                unlink('images/'.$_SESSION['image']);
                unset($_SESSION['image']);
            }
            else{
                $imagename = $_SESSION['image'];
                unset($_SESSION['image']);
            }
            move_uploaded_file($imagelocation,'images/'.$imagename);
            $sql = "update user_details set title = '$title' , image = '$imagename' , details = '$description' where id = '$id' and title_id = '$tid'";
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "<script>alert('Changes applied Successfully');</script>";
                echo "<script>window.location.href = 'index.php'</script>";
            }
        }
        elseif($title == "" || $description == ""){
            if($title == ""){
                $_SESSION['title_v'] = '**Title is Required**';
                header("location:edit.php?id=".$id.'&tid='.$tid);
            }
            
            if($description == ""){
                $_SESSION['details_v'] = '**Description is Required**';
                header("location:edit.php?id=".$id.'&tid='.$tid);
            }
            header("location:edit.php?id=".$id.'&tid='.$tid);
        }
        else{
            header("location:edit.php?id=".$id.'&tid='.$tid);
        }
    }
    else{
        header('location:login.php');
    }
?>