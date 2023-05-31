<?php 
    session_start();
    include_once 'db.php';
    if(isset($_SESSION['loggedin'])){
        $email = $_SESSION['email'];
        $sql = "select id from users where email = '$email'";
        $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
        $id = $result['id'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <style>
        .forbtn{
            width : 100vw;
            height : 10vh;
        }
        
        .addbtn{
            float : right;
            margin : 30px 100px 20px 0px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">MY data</a>
            <div class="mybtn">
                <?php 
                    if(!isset($_SESSION['loggedin'])){ ?>
                        <a class="mybtn btn btn-primary" href="login.php">Login</a>
                        <a class="mybtn btn btn-success" href="signup.php">Signup</a>
                    <?php
                    }
                    else{ ?>
                        <a class="mybtn btn btn-primary" href="logout.php">Logout</a>
                    <?php
                    }
                ?>
            </div>
        </div>
    </nav>
    <div class="forbtn">
        <?php
            if(isset($_SESSION['loggedin'])){
            ?>
                <a href="addnew.php?id=<?php echo $id;?>" class="addbtn btn btn-dark">Add New</a>
            <?php    
            }
            else{ ?>
                <a href="addnew.php" class="addbtn btn btn-dark">Add New</a>   
        <?php
            }
        ?>
    </div>
    <div class="container">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Photograph</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(!isset($_SESSION['loggedin'])){ ?>
                        <tr>
                            <td><h1>No Data Exist</h1></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php
                    }
                    else{ 
                        $i=0;
                        $sql = "select child.title_id , child.title , child.image from users as parent right join user_details as child on parent.id = child.id";
                        $result = mysqli_query($conn,$sql);
                        while($data = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?php echo ++$i;?></td>
                            <td><?php echo $data['title']?></td>
                            <td><img src="<?php echo 'images/'.$data['image'];?>" style="height:100px; width:100px;"></td>
                            <td><a class="btn btn-info"href="edit.php?id=<?php echo $id;?>&tid=<?php echo $data['title_id'];?>">Edit</a><a style="margin-left : 5px;" class="btn btn-danger" href="remove.php?id=<?php echo $id;?>&tid=<?php echo $data['title_id'];?>">Remove</a></td>
                        </tr>   
                    <?php
                        }
                        if($i == 0){
                            ?>
                            <tr>
                                <td><h1>No Data Exist</h1></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                    <?php 
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function (){
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>