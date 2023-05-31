<?php
    session_start();
    include_once 'db.php';
    $id = $_GET['id'];
    $tid = $_GET['tid'];
    $sql = "select * from user_details where id = '$id' and title_id = '$tid'";
    $result = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    .container{
      transform : translateY(20%);
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a href="index.php" class="btn btn-success">Home</a>
            <div class="mybtn">
              <a class="mybtn btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
  <div class="container">
    <form action="edit_backend.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <input type="hidden" class="form-control" value="<?php echo $id;?> "name="id" id="exampleFormControlInput1">
      </div>
      <div class="form-group">
        <input type="hidden" class="form-control" value="<?php echo $tid;?> "name="tid"      id="exampleFormControlInput1" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Post Title</label>
        <input type="text" class="form-control" value="<?php echo $result['title'];?>" name="title" id="exampleFormControlInput1" placeholder="Enter Title">
        <?php 
        if(isset($_SESSION['title_v'])){
          echo "<span style='color : red;'>".$_SESSION['title_v']."</span>";
          unset($_SESSION['title_v']);  
        }
      ?>
      </div>
      <br>
      <div class="form-group">
        <label for="exampleFormControlFile1">Upload Image</label><br>
        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1"><img src="<?php echo 'images/'.$result['image'];?>" style="height:100px; width:100px;">
        <?php 
            $_SESSION['image'] = $result['image']; 
        ?>
      </div>
      <br>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Post Description (in 50 words.)</label>
        <textarea class="form-control"maxlength="500" name="details" id="exampleFormControlTextarea1" rows="3"><?php echo htmlspecialchars($result['details']);?></textarea>
        <?php 
        if(isset($_SESSION['details_v'])){
          echo "<span style='color : red;'>".$_SESSION['details_v']."</span>";
          unset($_SESSION['details_v']);  
        }
      ?>
    </div>
      <br>
      <div class="col-auto">
        <button type="submit" name="submit" class="btn btn-primary mb-2">Post Changes</button>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>