<?php
    session_start();
    include_once 'db.php';
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $imagename = $_FILES['image']['name'];
        $imagelocation = $_FILES['image']['tmp_name'];
        $description = $_POST['details'];
        if($title != "" && $description != "" && $imagename != ""){
            move_uploaded_file($imagelocation,'images/'.$imagename);
            $sql = "insert into user_details (id,title,image,details) values ('$id','$title','$imagename','$description')";
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "<script>alert('Details Posted Successfully');</script>";
                echo "<script>window.location.href = 'index.php'</script>";
            }
        }
        elseif($title == "" || $description == "" || $imagename == ""){
            if($title == ""){
                $_SESSION['title_v'] = '**Title is Required**';
                header("location:addnew.php?id=".$id);
            }
            
            if($description == ""){
                $_SESSION['details_v'] = '**Description is Required**';
                
                header("location:addnew.php?id=".$id);
            }

            if($imagename == ""){
                $_SESSION['image_v'] = '**Image is Required**';
                header("location:addnew.php?id=".$id);
            }
            header("location:addnew.php?id=".$id);
        }
        else{
            header("location:addnew.php?id=".$id);
        }
    }
    else{
        header('location:login.php');
    }
?>